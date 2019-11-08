# Sistem Informasi - Surat Keterangan Pendamping Ijazah

Menggunakan PHP Framework CodeIgniter 3. 

## Persyaratan Sistem

- PHP version 5.4 or terbaru.
- MySQL Database
- [Download Git](https://git-scm.com/)

**Note** Bisa juga menggunakan [XAMPP](https://www.apachefriends.org/) untuk server PHP, MySQL

## Cara Install?
- Buka cmd 
- Masuk ke direktori server Anda. Contoh `cd C/xampp/htdocs/`
- Ketik di cmd `git clone URL_REPO_GITHUB NAMA_DIREKTORI`
- Buat database untuk proyek dan atur akses pada `application/config/database.php`

## Cara Configurasi Database
- Copy lalu Rename file `application/config/database-example.php` ke `application/config/database.php`
- Buka file `application/config/database.php`
- Ubah sesuai credential di laptop Anda
- ```php
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'ci-skpi',
    ```
  
## Cara Configurasi Base URL
Kita menggunakan `hosts` di local server kita, agar config nya sesuai dengan server dan memudahkan ketika migrasi ke production
- Copy lalu Rename file `application/config/config-example.php` ke `application/config/config.php`
- Buka file `application/config/config.php`
- Ubah `BASE_URL_ANDA` sesuai kebutuhan
- ```php 
  $config['base_url'] = 'http://BASE_URL_ANDA/'; 
  ```
  Contoh: 
   ```php
    $config['base_url'] = 'http://skpi.test/'; 
   ```
## Config Host
### Windows
  [Reff Tutorial](https://afsyah.com/it-developer/apache/config-virtual-host-xampp-di-windows/)

---
Oke! Sekarang kamu dapat login dengan username & password di bawah ini :
```
    username: webmaster
    password: webmaster
```

## Others
1. You should be able to access Frontend Website, Admin Panel and API Site (with Swagger Doc) respectively
2. For most API endpoints from Swagger Doc page, you will require a default API Key "anonymous" to call them; this value can be changed from **api_keys** database table
