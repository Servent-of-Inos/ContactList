In order to make it work:
1. Set your db connection information in .env file in the root of the project.
2. Add php dependencies: composer install.
3. Add JavaScript dependencies: npm install.
4. Generate key for that App: php artisan key:generate.
5. Migrate and seed db with fake date: php artisan migrate --seed  (generate db schema and fill it with 50 records).
