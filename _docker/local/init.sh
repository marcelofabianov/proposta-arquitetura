#!/bin/bash

# -------------------------------------------------------------------------------------------------- #
cp _docker/local/.alias . && \
cp _docker/local/.env.example .env && \
cp _docker/local/.env.testing . && \
cp _docker/local/docker-compose.yml . && \
cp _docker/local/php/.zshrc . && \
touch .zsh_history && \
# -------------------------------------------------------------------------------------------------- #
docker compose up -d
#docker compose exec app composer install
# -------------------------------------------------------------------------------------------------- #
