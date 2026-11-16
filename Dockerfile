# =============================================================================
# Dockerfile — LAB 10 PHP Workspace
# Base image: php:8.2-apache (official, Debian-based)
# =============================================================================

FROM php:8.2-apache

# ---------------------------------------------------------------------------
# 1. Enable Apache mod_rewrite (optional, keeps URLs clean)
# ---------------------------------------------------------------------------
RUN a2enmod rewrite

# ---------------------------------------------------------------------------
# 2. PHP configuration tweaks for production
# ---------------------------------------------------------------------------
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
    && echo "date.timezone = Asia/Kolkata" >> "$PHP_INI_DIR/php.ini" \
    && echo "session.cookie_httponly = 1"  >> "$PHP_INI_DIR/php.ini" \
    && echo "session.use_strict_mode = 1"  >> "$PHP_INI_DIR/php.ini"

# ---------------------------------------------------------------------------
# 3. Copy application source into the web root
# ---------------------------------------------------------------------------
COPY . /var/www/html/

# Remove Docker/CI files from the web root (they don't belong there)
RUN rm -f /var/www/html/Dockerfile \
           /var/www/html/render.yaml \
           /var/www/html/.gitignore \
           /var/www/html/README.md && \
    rm -rf /var/www/html/docker

# ---------------------------------------------------------------------------
# 4. Permissions
# ---------------------------------------------------------------------------
RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;

# ---------------------------------------------------------------------------
# 5. Apache: listen on $PORT (Render sets this at runtime)
# ---------------------------------------------------------------------------
# The entrypoint script updates the Listen directive and starts Apache.
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Default port (Render overrides with $PORT env var)
EXPOSE 8080

ENTRYPOINT ["/entrypoint.sh"]
