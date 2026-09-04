#!/usr/bin/env bash
set -euo pipefail

if ! command -v docker >/dev/null 2>&1; then
  echo "Docker is required to run this project." >&2
  exit 1
fi

cp .env.example .env 2>/dev/null || true
if [ ! -f .env ]; then
  cp .env.example .env
fi

docker compose up --build -d

echo "Application is starting. Open http://localhost:8080"
echo "To initialize the database, visit http://localhost:8080/setup.php"
