# CodeIgniter 4 LogBook Generate

## Installasi

1. **`git clone https://github.com/saepulfariz/ci4_logbook.git`**
2. **`cd ci4_logbook`**
3. **`composer update`**
4. copy env to .env for cmd **copy env .env** or git bash linux **cp env .env**
5. Create database in http://localhost/phpmyadmin with name ci4_logbook
6. open cmd **`php spark migrate`** for migrate database or **`php spark migrate:rollback`** for rollback database
7. input again **`php spark db:seed all`** for seed database
8. next **`php spark serve`** for running project
9. visit http://localhost:8080

## Login

Role User

1. admin
2. Mahasiswa

User

1. role : admin && username : admin && password : 12345678
2. role : mahasiswa && username : D1A200029 && password : 12345678

## Fiktur

1. Kelola logbook mahasiswa
2. Export logbook jadi pdf sesuai format MBKM yang di pilih
3. Bisa ganti MBKM dan Tempat/Title MBKM nya.

# by saepulfariz
