# Quick Setup Guide

## If you're getting "could not find driver" error:

The issue is that your `.env` file still has MySQL configured, but the MySQL PDO driver isn't installed.

### Solution: Use SQLite (works without MySQL)

Run these commands:

```bash
cd fitness-app

# 1. Update .env to use SQLite
sed -i 's/^DB_CONNECTION=.*/DB_CONNECTION=sqlite/' .env

# 2. Create SQLite database file
touch database/database.sqlite

# 3. Run migrations
php artisan migrate:fresh --seed

# 4. Restart server (if running)
php artisan serve
```

### Or manually edit .env file:

Open `.env` and change:
```
DB_CONNECTION=sqlite
```

Comment out or remove MySQL settings:
```
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=fitness_journal_db
# DB_USERNAME=root
# DB_PASSWORD=
```

Then:
```bash
touch database/database.sqlite
php artisan migrate:fresh --seed
```

### Check what PDO drivers are available:

```bash
php -m | grep -i pdo
```

If you see `pdo_sqlite`, SQLite will work. If not, you may need to install it.

