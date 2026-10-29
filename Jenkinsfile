pipeline {
    agent any

    environment {
        DOCKER_HUB_USER    = 'ksk6699'
        SWARM_MANAGER_IP   = '13.236.178.61'
        DOCKER_HUB_CREDS   = credentials('docker-hub-credentials')
        SSH_KEY            = credentials('aws-swarm-ssh-key')
        TELEGRAM_TOKEN     = credentials('telegram-bot-token')
        TELEGRAM_CHAT_ID   = credentials('telegram-chat-id')
    }

    stages {
        stage('Automated Tests') {
            steps {
                echo '=== Running Automated Backend Unit Tests ==='
                dir('services/backend') {
                    sh 'node test.js'
                }
            }
        }

        stage('Build & Push Docker Images') {
            steps {
                echo '=== Logging into Docker Hub and Building Images ==='
                sh 'echo $DOCKER_HUB_CREDS_PSW | docker login -u $DOCKER_HUB_CREDS_USR --password-stdin'
                
                // Build images
                sh 'docker build -t ${DOCKER_HUB_USER}/capstone-backend:latest -t ${DOCKER_HUB_USER}/capstone-backend:${BUILD_NUMBER} ./services/backend'
                sh 'docker build -t ${DOCKER_HUB_USER}/capstone-frontend:latest -t ${DOCKER_HUB_USER}/capstone-frontend:${BUILD_NUMBER} ./services/frontend'
                sh 'docker build -t ${DOCKER_HUB_USER}/capstone-nginx:latest -t ${DOCKER_HUB_USER}/capstone-nginx:${BUILD_NUMBER} ./services/nginx'

                // Push images
                sh 'docker push ${DOCKER_HUB_USER}/capstone-backend:latest'
                sh 'docker push ${DOCKER_HUB_USER}/capstone-backend:${BUILD_NUMBER}'
                sh 'docker push ${DOCKER_HUB_USER}/capstone-frontend:latest'
                sh 'docker push ${DOCKER_HUB_USER}/capstone-frontend:${BUILD_NUMBER}'
                sh 'docker push ${DOCKER_HUB_USER}/capstone-nginx:latest'
                sh 'docker push ${DOCKER_HUB_USER}/capstone-nginx:${BUILD_NUMBER}'
            }
        }

        stage('Deploy to Docker Swarm') {
            steps {
                echo '=== Deploying Stack to AWS Docker Swarm Manager ==='
                sshagent(['aws-swarm-ssh-key']) {
                    sh "scp -o StrictHostKeyChecking=no docker-stack.yml ubuntu@${SWARM_MANAGER_IP}:~/docker-stack.yml"
                    sh """
                        ssh -o StrictHostKeyChecking=no ubuntu@${SWARM_MANAGER_IP} '
                            sudo docker stack deploy -c ~/docker-stack.yml capstone-app --with-registry-auth
                            sudo docker service ls
                        '
                    """
                }
            }
        }

        stage('Verify Ingress Health') {
            steps {
                echo '=== Verifying Live Service Health via Ingress ==='
                sh """
                    sleep 15
                    curl -fsS http://${SWARM_MANAGER_IP}/health || exit 1
                    curl -fsS http://${SWARM_MANAGER_IP}/api/info || exit 1
                """
            }
        }
    }

    post {
        success {
            echo 'Pipeline succeeded!'
            sh """
                curl -s -X POST https://api.telegram.org/bot\${TELEGRAM_TOKEN}/sendMessage \
                -d chat_id=\${TELEGRAM_CHAT_ID} \
                -d text="✅ *Deployment Successful!*%0A• Project: Capstone Cloud%0A• Build: #${BUILD_NUMBER}%0A• Endpoint: http://${SWARM_MANAGER_IP}" \
                -d parse_mode="Markdown"
            """
        }
        failure {
            echo 'Pipeline failed!'
            sh """
                curl -s -X POST https://api.telegram.org/bot\${TELEGRAM_TOKEN}/sendMessage \
                -d chat_id=\${TELEGRAM_CHAT_ID} \
                -d text="❌ *Deployment Failed!*%0A• Project: Capstone Cloud%0A• Build: #${BUILD_NUMBER}%0A• Status: Check Jenkins console output." \
                -d parse_mode="Markdown"
            """
        }
    }
}