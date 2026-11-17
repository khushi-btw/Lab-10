
#!/bin/sh
set -e

# Use Render's assigned port
PORT="${PORT:-8080}"

echo "Starting Apache on port $PORT ..."

# Update Apache listening port
sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf

# Update VirtualHost port
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" \
    /etc/apache2/sites-enabled/000-default.conf

# Set server name
echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Start Apache
exec apache2-foreground
