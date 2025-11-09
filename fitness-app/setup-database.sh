#!/bin/bash

# Setup script for Fitness Journal Database

echo "Setting up database..."

# Update .env file to use SQLite
if [ -f .env ]; then
    # Replace DB_CONNECTION if it exists, or add it
    if grep -q "DB_CONNECTION" .env; then
        sed -i 's/^DB_CONNECTION=.*/DB_CONNECTION=sqlite/' .env
    else
        echo "DB_CONNECTION=sqlite" >> .env
    fi
    
    # Comment out MySQL settings
    sed -i 's/^DB_HOST=/#DB_HOST=/' .env
    sed -i 's/^DB_PORT=/#DB_PORT=/' .env
    sed -i 's/^DB_DATABASE=/#DB_DATABASE=/' .env
    sed -i 's/^DB_USERNAME=/#DB_USERNAME=/' .env
    sed -i 's/^DB_PASSWORD=/#DB_PASSWORD=/' .env
else
    echo "Creating .env file..."
    cp .env.example .env
    sed -i 's/^DB_CONNECTION=.*/DB_CONNECTION=sqlite/' .env
fi

# Create SQLite database file
echo "Creating SQLite database..."
touch database/database.sqlite
chmod 664 database/database.sqlite

echo "Database setup complete!"
echo "Now run: php artisan migrate:fresh --seed"

