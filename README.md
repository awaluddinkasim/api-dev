# Laravel Users API

Project ini merupakan aplikasi **REST API menggunakan Laravel** yang menyediakan fitur **manajemen data users**. Aplikasi ini memungkinkan pengguna untuk menambahkan, mengubah, dan menghapus data users.

---

## Spesifikasi

- PHP >= 8.2
- Laravel >= 12
- Composer

---

## Instalasi

Langkah-langkah instalasi project:

### 1. Clone Repository

```bash
git clone https://github.com/awaluddinkasim/api-dev.git
cd api-dev
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Copy .env Example

```bash
cp .env.example .env
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Jalankan Migration dan Seeders

```bash
php artisan migrate:fresh --seed
```

### 6. Jalankan Server

```bash
php artisan serve
```

---

## API Endpoints

API ini menyediakan beberapa endpoint untuk mengelola data users:

- `GET /users`: Mendapatkan semua data users.
- `GET /users/{uuid}`: Mendapatkan data user berdasarkan UUID.
- `POST /users`: Menambahkan data user baru.
- `PUT /users/{uuid}`: Mengubah data user berdasarkan UUID.
- `DELETE /users/{uuid}`: Menghapus data user berdasarkan UUID.
