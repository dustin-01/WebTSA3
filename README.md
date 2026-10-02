# Simple CodeIgniter project

This project has task pages and customer and user account pages. You can add and edit customers and users. A user avatar can be uploaded on the edit page.

## Run locally

1. Run `composer install`.
2. Copy `env` to `.env` and enter your own database settings.
3. Run `php spark migrate` and `php spark db:seed TaskSystemSeeder` for a new database. You can also import `database.sql` instead.
4. Run `php spark serve`.
5. Open `http://localhost:8080`.

The web server must be able to write to `public/uploads` for avatar uploads. Use `public` as the web root. Do not run the migration after importing `database.sql` because the tables already exist.

## Pages

- `/` today’s tasks
- `/tasks` all tasks
- `/customers` customer list and forms
- `/users` user list and forms
- `/profile` demo profile
- `/about` about page
