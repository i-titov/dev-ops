# Symfony Docker Setup

This repository contains a basic setup for running a Symfony application using Docker containers.

## Prerequisites

Make sure you have Docker and Docker Compose installed on your system.

- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Getting Started

1. Clone this repository:

    ```bash
    git clone <repository-url>
    ```

2. Navigate into the project directory:

    ```bash
    cd <project-directory>
    ```


3. Install dependencies:

    ```bash
    docker compose bild
    ```

5. Start the Docker containers:

    ```bash
    docker-compose up -d
    ```

## Managing Docker Containers

- Start the containers:

    ```bash
    docker compose up -d
    ```

- Stop the containers:

    ```bash
    docker compose down
    ```

- View logs:

    ```bash
    docker compose logs
    ```

- Access container shell:

    ```bash
    docker-compose exec -it php-fpm bash
    ```


## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, feel free to open an issue or create a pull request.

