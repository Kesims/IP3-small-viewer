# Small Viewer | School project

## Description
Database viewer based on Laravel. No CSS used, speedrunned in two afternoons with no previous experience with Laravel, so may or may not be broken... a bit... or a lot.

## Installation
1. Clone the repository
2. Run `composer install`
3. Edit `.env` file to match your database
3. Run `php artisan migrate --seed`
4. Run `php artisan serve` to verify
5. Fully deploy.
6. Enjoy.

Optional: You can host the database on docker with `docker-compose up -d` and then run `php artisan migrate --seed` to seed the database.

## Usage
1. Login with `admin` and `password` to see the admin mode.
2. Login with `user` and `password` to see the user mode.

## Live demo
[https://smallviewer.jetbrainer.com/](https://smallviewer.jetbrainer.com/)
