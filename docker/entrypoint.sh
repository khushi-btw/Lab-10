#!/bin/sh
# =============================================================================
# entrypoint.sh â€” Start Apache listening on the port Render provides
# =============================================================================
set -e

# Render sets $PORT; fall back to 8080 for local Docker testing
PORT="${PORT:-8080}"

echo "Starting Apache on port $PORT ..."

# 1. Update Apache's global Listen directive
sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf

# 2. Update the default VirtualHost port
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" \
    /etc/apache2/sites-enabled/000-default.conf

# 3. Set ServerName to suppress the FQDN warning
echo "ServerName localhost" >> /etc/apache2/apache2.conf

# 4. Launch Apache in the foreground
exec apache2-foreground
