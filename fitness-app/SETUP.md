# Setup and Run Instructions

## Prerequisites
- PHP 8.2 or higher
- Composer installed
- MySQL/MariaDB running

## Step-by-Step Setup Commands

### 1. Navigate to the application directory
```bash
cd fitness-app
```

### 2. Install PHP dependencies
```bash
composer install
```

### 3. Create environment file
```bash
cp .env.example .env
```

**Note:** If `.env.example` doesn't exist, create a `.env` file manually with these settings:
```
APP_NAME="Fitness Journal"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fitness_journal_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate application key
```bash
php artisan key:generate
```

### 5. Create database (if it doesn't exist)
```sql
CREATE DATABASE fitness_journal_db;
```

Or use MySQL command line:
```bash
mysql -u root -p -e "CREATE DATABASE fitness_journal_db;"
```

### 6. Run migrations and seeders
```bash
php artisan migrate:fresh --seed
```

This will:
- Drop all existing tables
- Create the activities table
- Insert sample data

### 7. Start the development server
```bash
php artisan serve
```

### 8. Access the application
Open your browser and go to: **http://localhost:8000**

## Quick Command Summary

```bash
cd fitness-app
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```

## Troubleshooting

### If composer install fails:
- Make sure PHP 8.2+ is installed: `php -v`
- Make sure Composer is installed: `composer --version`

### If database connection fails:
- Check MySQL is running
- Verify database credentials in `.env` file
- Make sure the database exists

### If migrations fail:
- Check database connection settings in `.env`
- Make sure the database exists
- Check MySQL user has proper permissions

