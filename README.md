# Simple login page layout with functionality

To run project on your device:

1. Clone git repository ans switch to project directory.
2. Install composer dependencies: `composer install`.
3. Install npm dependencies: `npm install`.
4. Create copy of .env file: `cp .env.example .env`.
5. Generate an app encryption key: `php artisan key:generate`.
6. Create database and register database connection in `.env` file.
7. Migrate database: `php artisan migrate`.
8. Seed database: `php artisan db:seed`.
9. Login with username: `imfullstack@imawesome.com`, password: `cool`.