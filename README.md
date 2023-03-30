# BILSTM-W2V-SA

Aplikasi Analisis Sentimen Ulasan Produk Menggunakan BiLSTM dan Word Embedding adalah sistem yang digunakan untuk membantu pengguna dalam mengklasifikasi sentimen ulasan produk. Input sistem berupa teks ulasan yang akan diproses melalui antarmuka website menggunakan metode Bidirectional Long Short-Term Memory dan Word2Vec, dan output yang dihasilkan adalah sentimen dari teks yang diklasifikasi beserta derajat polaritasnya

<div align="center">
<img src = https://user-images.githubusercontent.com/86480193/228940549-1b303ce7-5302-4dcb-a6ed-4dba4b146c29.png height="60%" width="60%">
</div>

## Fitur

Aplikasi web ini terdiri dari 4 halaman, yaitu halaman utama, demo, dataset, dan modeling.
Halaman | Jenis | Isi
| --- | --- | ---
Home | Dokumentasi | Abstrak dan deskripsi penelitian dalam membangun sistem
Demo | Interaktif | Live Demo Analisis Sentimen
Dataset | Dokumentasi | Deskripsi, jenis, dan sampel dataset yang digunakan untuk melatih dan menguji model sistem
Modeling | Dokumentasi | Deskripsi, konfigurasi, hasil pelatihan dan pengujian model yang digunakan pada sistem

## Getting Started

### Prerequisites

- [PHP.8.2](https://www.php.net/releases/8.2/en.php)
- [MySQL](https://www.apachefriends.org/download.html)
- [Composer](https://getcomposer.org/download/)
- [NodeJS](https://nodejs.org/en/)

### Installation

- Clone the git repository:

```
$ git clone https://github.com/nadiarizkyhairunnisa/BILSTM-W2V-SA.git
$ cd bilstm-w2v-sa
```

- Install Dependencies

```
$ npm install
$ composer install
```

### Set the environment

```
$ cp .env.example .env
$ php artisan key:generate
```

To run this project, you need to set `DB_DATABASE` variable to your `.env` file. Change other variables to sync with your database configuration.

### Running

```
$ Python ./Python/app/App.py
$ cd Laravel
$ npm run dev
$ php artisan serve
$ php artisan migrate
```
