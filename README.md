## About theHawker :right_anger_bubble:

theHawker is a digital marketplace platform designed for hawkers that focused on hawkers’ products and bring them online. The features of theHawker are listed as below:

- community-based
- non-profit
- easy store setup & item listing
- zero learning curve

## Installation :speech_balloon:

1. **Install Composer Dependencies**
```
composer install
```

2. **Install NPM Dependencies**
```
npm install
```

3. **Create a copy of your .env file**
```
cp .env.example .env
```

4. **Generate an app encryption key**
```
php artisan key:generate
```

5. **Create an empty database for our application**

Create an empty database using any database tools you prefer

6. **In the .env file, add database information to allow Laravel to connect to the database**

Connect the project to the database that you just created in the previous step. 
Add the connection credentials in the `.env` file, including `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`.

7. **Migrate the database**
```
php artisan migrate
```

8. **Seed the database [Optional]**
```
php artisan db:seed
```
