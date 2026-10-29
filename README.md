# Capstone Cloud Computing Project: Scalable E-Commerce Microservices Architecture

An enterprise-grade, high-availability e-commerce web application deployed on an AWS multi-node Docker Swarm cluster using an automated Jenkins CI/CD pipeline, Nginx reverse proxy, MySQL persistent database storage, and Telegram ChatOps alerting.

---

## 1. System Architecture Overview

The system runs across a distributed AWS EC2 cluster orchestrated by Docker Swarm on an internal overlay network (`app-net`):

```text
                        +----------------------------+
                        |      Internet Traffic      |
                        +--------------+-------------+
                                       | Port 80
                                       v
                     +----------------------------------+
                     |    Nginx Reverse Proxy Ingress   |
                     |  (2 Replicas, ip_hash Sessions)  |
                     +-----------------+----------------+
                                       |
                   +-------------------+-------------------+
                   |                                       |
                   v                                       v
    +-----------------------------+         +-----------------------------+
    |   Laravel Backend (Node 1)  |         |   Laravel Backend (Node 2)  |
    |   (PHP 8.2-Apache, Livewire)|         |   (PHP 8.2-Apache, Livewire)|
    +--------------+--------------+         +--------------+--------------+
                   |                                       |
                   +-------------------+-------------------+
                                       | Port 3306
                                       v
                     +----------------------------------+
                     |       MySQL 8.0 Database         |
                     |    Pinned: Manager Node Only     |
                     |  Volume: db-data (/var/lib/mysql)|
                     +----------------------------------+
```

### Microservice Breakdown
* **Ingress Layer (`nginx`)**:
  * Exposed publicly on port `80:80`.
  * Distributes incoming HTTP requests to backend containers.
  * Configured with `ip_hash` sticky routing to maintain stateful user sessions and CSRF token consistency across requests.
  * Exposes a dedicated `/health` endpoint for automated monitoring.

* **Application Layer (`backend`)**:
  * Built on PHP 8.2 with Apache (`mod_rewrite` enabled).
  * Serves the Laravel application with Composer dependency caching, production optimization, and asset handling.
  * Horizontally scalable across multiple cluster nodes with zero-downtime rolling update configurations (`delay: 10s`, `order: start-first`).

* **Database Layer (`db`)**:
  * Custom MySQL 8.0 container initialized automatically with database schema and mock records (`init.sql`).
  * Pinned strictly to the Swarm Manager node via placement constraints (`node.role == manager`) to safeguard volume persistence across service restarts.
  * Mounted to a persistent Docker named volume (`db-data`).

---

## 2. CI/CD Pipeline Automation (Jenkins)

The continuous integration and continuous deployment workflow is defined in `Jenkinsfile` using a declarative pipeline triggered on Git pushes to the `main` branch:

```text
[ Git Push to main ]
         |
         v
+------------------+     Automated syntax & environment validation
| Automated Tests  | --> (php:8.2-cli verifies artisan CLI & core scripts)
+--------+---------+
         |
         v
+------------------+     Builds & tags backend, db, and nginx images
|   Build & Push   | --> Pushes :<BUILD_NUMBER> and :latest to Docker Hub
+--------+---------+
         |
         v
+------------------+     Transfers docker-stack.yml over SSH
| Deploy to Swarm  | --> Runs docker stack deploy --with-registry-auth
+--------+---------+
         |
         v
+------------------+     Polls http://<SWARM_MANAGER_IP>/health
|  Verify Health   | --> Verifies HTTP 200 JSON status response
+--------+---------+
         |
         v
+------------------+     Dispatches ChatOps deployment alerts
| Telegram Alerts  | --> Sends Success or Failure notification
+------------------+
```

### Integrated ChatOps
Every pipeline execution posts real-time alerts to Telegram via Telegram Bot API webhooks, displaying:
* Project identifier
* Build sequence number
* Direct application access endpoint

---

## 3. Tech Stack & Infrastructure

* **Cloud Infrastructure**: AWS EC2 (Ubuntu 24.04 LTS), VPC Subnetting, Security Groups
* **Container Orchestration**: Docker Engine, Docker Swarm, Overlay Networking
* **CI/CD Automation**: Jenkins Automation Server, SSH Agent Plugin, Credentials Binding
* **Application Stack**: PHP 8.2, Apache, Laravel 9.x, Livewire, Composer
* **Database**: MySQL 8.0, Persistent Named Volumes
* **Web Server / Ingress**: Nginx 1.25 (Alpine)
* **Monitoring & Alerting**: Health check synthetic polling, Telegram API webhooks

---

## 4. Project Repository Structure

```text
├── docker-stack.yml            # Docker Swarm multi-service stack definition
├── Jenkinsfile                 # Jenkins declarative CI/CD pipeline definition
├── README.md                   # Project documentation
└── services
    ├── backend                 # Laravel backend application source
    │   ├── Dockerfile          # PHP 8.2 + Apache + Composer container definition
    │   ├── app/                # Application logic, controllers, and Livewire components
    │   ├── config/             # Laravel configuration files
    │   ├── database/           # Migrations and factories
    │   ├── public/             # Web entry point (index.php), assets, uploads
    │   ├── resources/          # Views (Blade templates) and styling
    │   ├── routes/             # Web and API routing
    │   └── storage/            # Logs, framework cache, public uploads
    ├── db                      # Database container initialization
    │   ├── Dockerfile          # MySQL 8.0 image with auto-import
    │   └── init.sql            # Initial schema and seeded records
    └── nginx                   # Reverse proxy configuration
        ├── Dockerfile          # Nginx Alpine container definition
        └── default.conf        # Sticky upstream load balancing and proxy headers
```

---

## 5. Deployment & Verification Commands

### Deploying Manually via Docker Swarm
To deploy or update the stack directly on the manager node:
```bash
sudo docker stack deploy -c docker-stack.yml capstone-app --with-registry-auth
```

### Inspecting Swarm Services
```bash
# Check service replicas and ports
sudo docker service ls

# View placement of individual service tasks
sudo docker service ps capstone-app_backend
sudo docker service ps capstone-app_nginx
sudo docker service ps capstone-app_db
```

### Verifying Service Logs
```bash
sudo docker service logs -f capstone-app_backend
sudo docker service logs -f capstone-app_nginx
```

### Health Check Verification
```bash
curl -i http://<SWARM_MANAGER_IP>/health
```

**Expected response:**
```json
HTTP/1.1 200 OK
Content-Type: application/json

{"status":"UP","app":"ecomm-laravel"}
```