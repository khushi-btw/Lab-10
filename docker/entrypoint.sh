#!/bin/sh
# =============================================================================
# entrypoint.sh - Start Apache listening on the port Render provides
# =============================================================================
set -e

# Use Render's assigned port
PORT="${PORT:-8080}"

echo "Starting Apache on port $PORT ..."

# 1. Update Apache global Listen directive
sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf

# Update VirtualHost port
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" \
    /etc/apache2/sites-enabled/000-default.conf

# Set server name
echo "ServerName localhost" >> /etc/apache2/apache2.conf

# 4. Launch Apache in the foreground
exec apache2-foreground