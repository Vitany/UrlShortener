### Installation

1. Clone repo

2. Change to directory

````
cd urlShortener
````   

3. Install dependencies

````
composer install
````

4. Copy .env file

```
cp .env.example .env
```

5. Modify `DB_*` value in `.env` with your database config.

6. Migrate
````
php artisan migrate
````

7. Install Node modules
````
npm install
````

9. Build

````
npm run watch
````
