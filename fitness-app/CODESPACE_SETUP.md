# GitHub Codespace Setup Instructions

These are the exact commands your teacher will use to set up and run the project.

## Important Notes

- **Vendor folder**: The `vendor` folder is NOT committed to git (it's in `.gitignore`). It WILL be created when running `composer install` - this is correct and expected. The submission requirements say NOT to include vendor in the zip file, but it must be installed to run the project.

- **PHP Version**: This project requires PHP 8.2 or higher. If your Codespace has PHP 8.0, you'll need to upgrade it first.

## Step-by-Step Commands

### 0. Check/Upgrade PHP Version (if needed)
```bash
php -v
```

If PHP version is below 8.2, upgrade it:
```bash
# For Ubuntu/Debian-based Codespaces
sudo update-alternatives --set php /usr/bin/php8.2
# Or install PHP 8.2 if not available
sudo apt update && sudo apt install -y php8.2 php8.2-cli php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip php8.2-sqlite3
```

### 1. Navigate to the application directory
```bash
cd fitness-app
```

### 2. Create environment file from example
```bash
cp .env.example .env
```

**Note:** If `.env.example` doesn't exist, the teacher will need to create a `.env` file manually with these settings:
```
APP_NAME="Fitness Journal"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=sqlite
```

### 3. Install PHP dependencies
```bash
composer install
```

### 4. Generate application key
```bash
php artisan key:generate
```

**Important:** The marking criteria mentions "php artisan key:migrate" but this is a typo. The correct command is `php artisan key:generate`.

### 5. Create SQLite database file (if using SQLite)
```bash
touch database/database.sqlite
```

**Note:** If using MySQL instead, the teacher will:
- Update `.env` with MySQL credentials
- Create the database manually

### 6. Run migrations and seeders
```bash
php artisan migrate:fresh --seed
```

This will:
- Drop all existing tables
- Create the activities table
- Seed 35 activities using the factory (enough to demonstrate pagination)

### 7. Start the development server
```bash
php artisan serve
```

### 8. Access the application
- The server will run on `http://localhost:8000`
- In GitHub Codespace, click "Ports" tab and open the forwarded port
- Or use the popup notification to open in browser

## Quick Command Summary (Copy-Paste)

**First, ensure PHP 8.2+ is installed:**
```bash
php -v  # Check version
# If PHP < 8.2, upgrade first (see step 0 above)
```

**Then run setup:**
```bash
cd fitness-app
cp .env.example .env
composer install
php artisan key:generate
touch database/database.sqlite
php artisan migrate:fresh --seed
php artisan serve --host=0.0.0.0 --port=8000
```

## For GitHub Codespace Specifically

**Important:** First check PHP version and upgrade if needed:
```bash
php -v
# If PHP < 8.2, run:
sudo apt update && sudo apt install -y php8.2 php8.2-cli php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip php8.2-sqlite3
sudo update-alternatives --set php /usr/bin/php8.2
```

Then run all setup commands at once:

```bash
cd fitness-app && \
cp .env.example .env && \
composer install && \
php artisan key:generate && \
touch database/database.sqlite && \
php artisan migrate:fresh --seed && \
php artisan serve --host=0.0.0.0 --port=8000
```

**Note:** The `--host=0.0.0.0` flag allows the server to be accessible from outside the Codespace container.

**About the vendor folder:**
- The `vendor` folder is correctly excluded from git (in `.gitignore`)
- It will be created when you run `composer install` - this is normal and required
- For submission, you should NOT include vendor in the zip file (as per requirements)
- But the teacher will run `composer install` to create it when setting up

## Verify Setup

After running the commands, you should:
1. See "Laravel development server started" message
2. Be able to access the app at the forwarded port
3. See 35 activities in the database (check the activities list page)
4. Test CRUD operations, search, and pagination

## Troubleshooting

### If composer install fails:
- Check PHP version: `php -v` (should be 8.0+)
- Check Composer: `composer --version`

### If database connection fails:
- Verify `.env` has `DB_CONNECTION=sqlite`
- Check that `database/database.sqlite` file exists
- Ensure file permissions are correct

### If migrations fail:
- Make sure the database file exists: `touch database/database.sqlite`
- Check `.env` configuration
- Try: `php artisan config:clear`

### If port forwarding doesn't work:
- Check the "Ports" tab in Codespace
- Make sure port 8000 is forwarded
- Try accessing via the Codespace URL provided

