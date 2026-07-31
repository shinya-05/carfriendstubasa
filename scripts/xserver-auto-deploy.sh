#!/bin/bash
set -eu

APP_DIR=/home/xs930418/laravel
LOCK_DIR=/tmp/carfriends-tsubasa-auto-deploy.lock

if ! mkdir "$LOCK_DIR" 2>/dev/null; then
  exit 0
fi

trap 'rmdir "$LOCK_DIR"' EXIT

cd "$APP_DIR"
git fetch origin main --quiet

LOCAL_SHA=$(git rev-parse HEAD)
REMOTE_SHA=$(git rev-parse origin/main)

if [ "$LOCAL_SHA" = "$REMOTE_SHA" ]; then
  exit 0
fi

echo "$(date '+%Y-%m-%d %H:%M:%S') Deploying $LOCAL_SHA -> $REMOTE_SHA"
/bin/bash "$APP_DIR/deploy.sh"
