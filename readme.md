## Maxima Investindo Tes Backend Programmer PHP

### Progress

- Login
- Register
- Vehicle (Owner)
- Booking Vehicle (Renter)

### How to Install ?

Clone 

``` sh

git clone https://github.com/julles/maxima-tes.git

```

Copy .env.example file to .env

``` sh 

cp .env.example .env

```

Install Composer depedencies

``` sh

composer install

```

Configure your connection database in .env file

``` sh

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yourdatabase
DB_USERNAME=username
DB_PASSWORD=secrets

```

Migrating Database

``` sh 
php artisan migrate

``` 


Finish


##### Status : On Progress
