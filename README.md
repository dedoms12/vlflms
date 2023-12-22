<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# VLF - LMS

## Quick Start 

### install dependencies
```
composer install
```

### create env file
```
cp .env.example .env
```

### generate env key
```
php artisan key:generate
```

### migrate the migration and seed the database
```
php artisan migrate:fresh --seed
```

### start server
```
php artisan serve
```

### credentials
```
username: admin
password: 1234
```

### test the api
#### Daily
```
http://127.0.0.1:8000/api/reports/date-wise?date=2023-12-15
```
#### Monthly
```
http://127.0.0.1:8000/api/reports/month-wise?month=2023-12
```
#### Not returned
```
http://127.0.0.1:8000/api/reports/not-returned
```
check your url first, it may not match with the api url.
