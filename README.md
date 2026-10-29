# Cloud Computing Capstone: Automated Microservice Deployment

[![CI/CD Pipeline](https://img.shields.io/badge/Jenkins-Pipeline-blue?logo=jenkins)](http://13.236.178.61)
[![Docker Swarm](https://img.shields.io/badge/Docker-Swarm-2496ED?logo=docker)](https://docs.docker.com/engine/swarm/)
[![Nginx Ingress](https://img.shields.io/badge/Proxy-Nginx-009639?logo=nginx)](https://nginx.org)
[![AWS EC2](https://img.shields.io/badge/Cloud-AWS_EC2-FF9900?logo=amazon-aws)](https://aws.amazon.com/ec2/)
[![Telegram Alerting](https://img.shields.io/badge/Alerts-Telegram_Bot-26A5E4?logo=telegram)](https://telegram.org)

An end-to-end continuous integration and continuous deployment (CI/CD) pipeline on Amazon Web Services (AWS). This project automates testing, container image packaging, versioning to Docker Hub, remote deployment to a multi-node Docker Swarm cluster over SSH, live ingress health checks, and real-time Telegram operational notifications.

---

## 🏛️ System Architecture

The application adopts a containerized microservices design running inside a private Docker Swarm overlay network:

```text
               [ External User / Client ]
                           │ (HTTP: Port 80)
                           ▼
        ┌────────────────────────────────────────┐
        │      Nginx Ingress / Reverse Proxy     │
        │             (2 Replicas)               │
        └──────────────┬──────────────────┬──────┘
                       │                  │
                / (Web UI)          /api/ & /health
                       │                  │
                       ▼                  ▼
        ┌──────────────────────┐   ┌──────────────────────────┐
        │     Frontend UI      │   │     Backend REST API     │
        │  (HTML5 / CSS / JS)  │   │  (Node.js / Express API) │
        │     (2 Replicas)     │   │       (3 Replicas)       │
        └──────────────────────┘   └──────────────────────────┘
```

- **Frontend**: Client dashboard providing runtime cluster diagnostics and an interactive load balancer tester (2 replicas).
- **Backend API**: REST API returning dynamic system metadata, node health, and container IDs (3 replicas).
- **Nginx Reverse Proxy**: Single ingress point exposing port 80, routing static traffic to the frontend and proxying `/api/` and `/health` requests to backend instances (2 replicas).
- **Docker Swarm Overlay Network**: Provides isolated multi-host networking, automatic load balancing via Ingress routing mesh, and task self-healing.

---

## 📁 Repository Structure

```text
├── services/
│   ├── backend/
│   │   ├── Dockerfile
│   │   ├── index.js
│   │   ├── package.json
│   │   └── test.js             # Automated unit tests
│   ├── frontend/
│   │   ├── Dockerfile
│   │   ├── index.html          # Interactive client dashboard
│   │   └── style.css
│   └── nginx/
│       ├── Dockerfile
│       └── nginx.conf          # Reverse proxy & ingress configuration
├── docker-stack.yml            # Multi-service Swarm stack specification
├── Jenkinsfile                 # Declarative 5-stage CI/CD pipeline
└── README.md
```

---

## ⚙️ CI/CD Pipeline (Jenkins)

The pipeline is defined declaratively in `Jenkinsfile` and executes through five automated stages:

1. **Declarative Checkout SCM**: Pulls the latest commits on branch `main` from GitHub.
2. **Automated Unit Tests**: Runs backend tests inside a disposable `node:18-alpine` Docker container, preventing host environment dependency issues.
3. **Build & Push Docker Images**: Builds all 3 microservices and pushes tagged images (`latest` and `${BUILD_NUMBER}`) to Docker Hub (`ksk6699/capstone-*`).
4. **Deploy to Docker Swarm**: Copies `docker-stack.yml` securely over SSH to the AWS Swarm Manager node and deploys the stack (`capstone-app`) with `--with-registry-auth`.
5. **Verify Ingress Health**: Performs live HTTP polling against `/health` and `/api/info` to confirm healthy cluster readiness before passing the build.
6. **Post-Build Telegram Alerting**: Dispatches automated JSON payloads to the Telegram Bot API alerting the operations team with build status, build number, and endpoint URLs.

---

## 🔐 Jenkins Credentials Configuration

The pipeline requires four pre-configured credentials in Jenkins (**Manage Jenkins** > **Credentials** > **System** > **Global credentials**):

| Credential ID | Kind | Purpose |
|---|---|---|
| `docker-hub-id` | Username with password | Docker Hub registry authentication (`ksk6699`) |
| `swarm-manager-ssh` | SSH Username with private key | Secure SSH access to AWS EC2 Swarm Manager (`ubuntu`) |
| `telegram-bot-token` | Secret text | Telegram Bot API authentication token |
| `telegram-chat-id` | Secret text | Target Telegram group or private channel ID |

---

## 🚀 Deployment & Operations

### 1. Local Testing
To spin up all services locally using Docker Compose:
```bash
docker compose up -d --build
```
Access the application at `http://localhost`.

### 2. Manual Cluster Deployment on AWS
To deploy directly onto the Docker Swarm manager node:
```bash
sudo docker stack deploy -c docker-stack.yml capstone-app --with-registry-auth
```

### 3. Service Verification Commands
Inspect active services and replicas:
```bash
sudo docker service ls
```

Inspect replica task placement across nodes:
```bash
sudo docker service ps capstone-app_backend
sudo docker service ps capstone-app_frontend
sudo docker service ps capstone-app_nginx
```

Check cluster node status:
```bash
sudo docker node ls
```

---

## 🔍 Ingress Endpoints & Diagnostics

* **Web Application UI**: `[http://13.236.178.61/](http://13.236.178.61/)`
* **Health Check**: `[http://13.236.178.61/health](http://13.236.178.61/health)`  
  * Returns `{"status":"UP","timestamp":"..."}` with HTTP 200.
* **Backend Info & Load Balancing**: `[http://13.236.178.61/api/info](http://13.236.178.61/api/info)`  
  * Returns dynamic JSON containing the active `container_id` handling the request.

---

## 🔄 Environment Migration (Test to Production)

Because the system is fully codified as Infrastructure-as-Code:
1. Update `SWARM_MANAGER_IP` in `Jenkinsfile` to the new production server IP.
2. Ensure the SSH key is registered under `swarm-manager-ssh` in Jenkins.
3. Initialize Docker Swarm on the new server: `sudo docker swarm init`.
4. Push changes to GitHub—Jenkins will automatically build, deploy, verify, and notify.