FROM mysql:8.0

# Copy the initialization SQL script into the auto-run entrypoint directory
COPY init.sql /docker-entrypoint-initdb.d/init.sql

EXPOSE 3306