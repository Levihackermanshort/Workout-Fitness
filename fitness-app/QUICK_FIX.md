# Quick Fix for PHP Version Issue

If you're getting PHP version errors, follow these steps:

## The Problem
Your Codespace has PHP 8.0, but the project requires PHP 8.2+.

## The Solution (Copy-Paste These Commands)

```bash
# 1. Check current PHP version
php -v

# 2. Add PHP repository and install PHP 8.2
sudo apt update
sudo apt install -y software-properties-common
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install -y php8.2 php8.2-cli php8.2-common php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip php8.2-sqlite3 php8.2-bcmath

# 3. Set PHP 8.2 as default
sudo update-alternatives --set php /usr/bin/php8.2

# 4. Verify it worked (should show PHP 8.2.x)
php -v

# 5. Navigate to project and remove old lock file
cd fitness-app
rm -f composer.lock

# 6. Now run the setup commands
cp .env.example .env
composer install
php artisan key:generate
touch database/database.sqlite
php artisan migrate:fresh --seed
php artisan serve --host=0.0.0.0 --port=8000
```

## Why Remove composer.lock?
The `composer.lock` file was created when PHP 8.0 was installed. It contains package versions that require PHP 8.1+. By removing it, Composer will regenerate it with versions compatible with PHP 8.2.

## All-in-One Command (After PHP Upgrade)

Once PHP 8.2 is installed and verified:

```bash
cd fitness-app && rm -f composer.lock && cp .env.example .env && composer install && php artisan key:generate && touch database/database.sqlite && php artisan migrate:fresh --seed && php artisan serve --host=0.0.0.0 --port=8000
```

