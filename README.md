# AlpetG

#### Update composer
```
composer update
```

#### Config
Copy .env.example and make new file ".env" <br />
and change Database config and Website name("APP_NAME") 
```
APP_NAME=YOUR_WEBSITE_NAME

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

#### Migrate Databases
```
php  artisan migrate --seed
```
```
php  artisan migrate --seed
```

#### Generate Key
```
php artisan key:generate
```
#### Start server
```
php artisan serve
```

#### Account

###### Super Admin
```
us: admin
pw: Admin123
```

###### Normal User
```
us: user
pw: User123
```

And u are ready to go!!
