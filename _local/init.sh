#!/bin/bash

# -------------------------------------------------------------------------------------------------- #
cp _local/docker/app/.alias.sh . && \
cp _local/docker/app/.env.example .env && \
cp _local/docker/app/.env.testing . && \
cp _local/docker/docker-compose.yml . && \
cp _local/docker/app/.zshrc . && \
touch .zsh_history && \
echo "Copy config files - Done"
# -------------------------------------------------------------------------------------------------- #
docker compose up -d
docker compose exec app composer install
# -------------------------------------------------------------------------------------------------- #
