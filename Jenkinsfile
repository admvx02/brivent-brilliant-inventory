pipeline {
    agent any

    environment {
        COMPOSE_CMD = "docker compose -f docker-compose.yml"
    }

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/MastPutro/brivent.git'
            }
        }

        stage('Build & Up Containers') {
            steps {
                sh "${COMPOSE_CMD} down || true"
                sh "${COMPOSE_CMD} build --no-cache"
                sh "${COMPOSE_CMD} up -d"
            }
        }

        stage('Laravel Setup') {
            steps {
                sh "${COMPOSE_CMD} exec -T app php artisan migrate --force"
                sh "${COMPOSE_CMD} exec -T app php artisan config:clear"
                sh "${COMPOSE_CMD} exec -T app php artisan route:clear"
            }
        }
    }
}
