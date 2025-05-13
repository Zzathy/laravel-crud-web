# Laravel CRUD Web

A Laravel 12 application featuring simple CRUD operations for training purposes.

## Quick Setup

1. Clone the repository:
   ```sh
   git clone https://github.com/Zzathy/laravel-crud-web.git
   cd project

2. Install dependencies:
   ```sh
   composer install

3. Setup Environment:
   ```sh
   cp .env.example .env
   php artisan key:generate

4. Configure your .env file with database credentials.

5. Run migrations and seeders:
   ```sh
   php artisan migrate --seed

6. Create storage link:
   ```sh
   php artisan storage:link

7. Start the development server
   ```sh
   php artisan serve
