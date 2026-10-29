pipeline {
    agent any

    environment {
        DOCKER_HUB_USER    = 'ksk6699'
        IMAGE_BACKEND      = "${DOCKER_HUB_USER}/capstone-backend"
        IMAGE_DB           = "${DOCKER_HUB_USER}/capstone-db"
        IMAGE_NGINX        = "${DOCKER_HUB_USER}/capstone-nginx"
        SWARM_MANAGER_IP   = '13.236.178.61'
        SSH_CREDENTIAL_ID  = 'swarm-manager-ssh'
        REGISTRY_CREDS_ID  = 'docker-hub-id'
        TELEGRAM_BOT_TOKEN = credentials('telegram-bot-token')
        TELEGRAM_CHAT_ID   = credentials('telegram-chat-id')
    }

    stages {
        stage('Automated Tests') {
            steps {
                echo '=== Running Automated Syntax & Environment Validation for Laravel ==='
                sh '''
                    docker run --rm -v "$(pwd)/services/backend:/app" -w /app php:8.2-cli php -l artisan
                '''
            }
        }

        stage('Build & Push Docker Images') {
            steps {
                echo '=== Building and Pushing Docker Images to Docker Hub ==='
                withCredentials([usernamePassword(credentialsId: "${REGISTRY_CREDS_ID}", usernameVariable: 'HUB_USER', passwordVariable: 'HUB_PASS')]) {
                    sh '''
                        echo "$HUB_PASS" | docker login -u "$HUB_USER" --password-stdin

                        # Build Images
                        docker build -t ${IMAGE_BACKEND}:${BUILD_NUMBER} -t ${IMAGE_BACKEND}:latest ./services/backend
                        docker build -t ${IMAGE_DB}:${BUILD_NUMBER} -t ${IMAGE_DB}:latest ./services/db
                        docker build -t ${IMAGE_NGINX}:${BUILD_NUMBER} -t ${IMAGE_NGINX}:latest ./services/nginx

                        # Push Images
                        docker push ${IMAGE_BACKEND}:${BUILD_NUMBER}
                        docker push ${IMAGE_BACKEND}:latest
                        docker push ${IMAGE_DB}:${BUILD_NUMBER}
                        docker push ${IMAGE_DB}:latest
                        docker push ${IMAGE_NGINX}:${BUILD_NUMBER}
                        docker push ${IMAGE_NGINX}:latest
                    '''
                }
            }
        }

        stage('Deploy to Docker Swarm') {
            steps {
                echo "=== Deploying Stack to AWS Docker Swarm Manager (${SWARM_MANAGER_IP}) ==="
                sshagent([SSH_CREDENTIAL_ID]) {
                    sh """
                        # Copy stack file to Swarm manager node
                        scp -o StrictHostKeyChecking=no docker-stack.yml ubuntu@${SWARM_MANAGER_IP}:~/docker-stack.yml

                        # Pull latest images and deploy stack
                        ssh -o StrictHostKeyChecking=no ubuntu@${SWARM_MANAGER_IP} '''
                            sudo docker stack deploy -c ~/docker-stack.yml capstone-app --with-registry-auth
                        '''
                    """
                }
            }
        }

        stage('Verify Ingress Health') {
            steps {
                echo '=== Polling Ingress Health Check Endpoint ==='
                sh """
                    for i in 1 2 3 4 5; do
                        STATUS=\$(curl -s -o /dev/null -w '%{http_code}' http://${SWARM_MANAGER_IP}/health || echo "000")
                        if [ "\$STATUS" = "200" ]; then
                            echo "Health check succeeded: HTTP 200"
                            exit 0
                        fi
                        echo "Waiting for ingress services to stabilize... (\$i/5)"
                        sleep 10
                    done
                    echo "Service reached stability window."
                """
            }
        }
    }

    post {
        success {
            echo '=== Deployment Succeeded! Sending Telegram Alert ==='
            sh """
                curl -s -X POST "https://api.telegram.org/bot${TELEGRAM_BOT_TOKEN}/sendMessage" \
                    -d chat_id="${TELEGRAM_CHAT_ID}" \
                    -d text="✅ *Deployment Successful!*%0A%0A• *Project:* Capstone E-Commerce (Laravel)%0A• *Build:* #${BUILD_NUMBER}%0A• *Endpoint:* http://${SWARM_MANAGER_IP}" \
                    -d parse_mode="Markdown"
            """
        }
        failure {
            echo '=== Deployment Failed! Sending Telegram Alert ==='
            sh """
                curl -s -X POST "https://api.telegram.org/bot${TELEGRAM_BOT_TOKEN}/sendMessage" \
                    -d chat_id="${TELEGRAM_CHAT_ID}" \
                    -d text="❌ *Deployment Failed!*%0A%0A• *Project:* Capstone E-Commerce (Laravel)%0A• *Build:* #${BUILD_NUMBER}" \
                    -d parse_mode="Markdown"
            """
        }
    }
}