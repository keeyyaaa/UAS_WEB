<img width="1918" height="976" alt="image" src="https://github.com/user-attachments/assets/7a7269a4-3213-4161-89a3-e714ec946e4b" /># 🌱 Sistem Informasi Manajemen Apotek (SiApotek)

**Project Ujian Akhir Semester (UAS) - Pemrograman Web**

---

## 👤 Identitas Mahasiswa
| Data | Keterangan |
| :--- | :--- |
| **Nama** | **Ica Rizqiah** |
| **NIM** | **312410554** |
| **Kelas** | **TI.24.A5** |
| **Mata Kuliah** | **Pemrograman Web** |
| **Dosen** | **Agung Nugroho, S.Kom., M.Kom.** |

---

## 📖 Deskripsi Project
**SiApotek** adalah aplikasi berbasis web yang dibangun untuk mempermudah manajemen stok obat di sebuah apotek. Aplikasi ini dikembangkan menggunakan bahasa pemrograman **PHP Native** dengan menerapkan konsep **OOP (Object Oriented Programming)** dan arsitektur **MVC (Model-View-Controller)** sesuai dengan ketentuan tugas.

Aplikasi ini tidak menggunakan framework PHP (seperti Laravel/CI), melainkan membangun struktur routing dan controller sendiri untuk memahami logika dasar framework modern. Desain antarmuka dibuat **Responsive (Mobile First)** menggunakan Bootstrap 5 dengan tema *Pastel Green Aesthetic* yang ramah pengguna.

### ✅ Fitur Utama
Sesuai dengan ketentuan soal UAS, aplikasi ini memiliki fitur:
1. **Arsitektur MVC & Routing:** Menggunakan `.htaccess` untuk *pretty URL* dan memisahkan logika (Controller), data (Model), dan tampilan (View).
2. **Multi-User Login (Role-Based):**
    * **Admin:** Akses penuh (CRUD Data Obat, Manajemen Kategori).
    * **Kasir (User):** Akses terbatas (Hanya bisa melihat stok obat).
3. **CRUD Lengkap:** Fitur Tambah, Baca, Ubah, dan Hapus data obat.
4. **Pencarian (Live Search):** Mencari obat berdasarkan nama atau kode obat.
5. **Pagination:** Pembagian halaman data agar tabel tidak terlalu panjang.
6. **Desain Responsive:** Tampilan menyesuaikan layar HP dan Laptop menggunakan Bootstrap 5.
---

## 🛠️ Teknologi yang Digunakan
* **Backend:** PHP 8 (OOP Style)
* **Frontend:** HTML5, CSS3, Bootstrap 5 (CDN)
* **Database:** MySQL / MariaDB
* **Server:** Apache (XAMPP / Laragon)
* **Tools:** Visual Studio Code, Git

---

## 📂 Struktur Direktori (Modular MVC)
Struktur folder disusun secara modular untuk kerapihan kode:

```text
uas-apotek/
│
├── app/                        <-- (OTAK APLIKASI: Core Logic)
│   ├── config/
│   │   └── config.php          <-- Konfigurasi Database & Base URL
│   ├── controllers/            <-- (PENGENDALI: Menghubungkan Model & View)
│   │   ├── Home.php            <-- Logika Halaman Utama
│   │   ├── Login.php           <-- Logika Autentikasi
│   │   └── Obat.php            <-- Logika CRUD Obat & Pagination
│   ├── core/                   <-- (MESIN MVC)
│   │   ├── App.php             <-- Routing System
│   │   ├── Controller.php      <-- Parent Class
│   │   ├── Database.php        <-- Wrapper PDO Database
│   │   └── Flasher.php         <-- Notifikasi Pop-up
│   ├── models/                 <-- (DATA: Query ke Database)
│   │   ├── User_model.php
│   │   └── Obat_model.php
│   └── views/                  <-- (TAMPILAN: HTML & Bootstrap)
│       ├── templates/          <-- Header (Navbar) & Footer
│       ├── home/
│       ├── login/
│       └── obat/
│
├── public/                     <-- (AKSES PUBLIK)
│   ├── css/
│   ├── img/
│   ├── js/
│   └── index.php               <-- Pintu Masuk Aplikasi
│
├── .htaccess                   <-- Pengaturan Routing URL
└── README.md                   <-- Dokumentasi Project
```

🚀 Panduan Instalasi (Cara Menjalankan)
1. Clone / Download: Simpan folder uas-apotek ke dalam folder htdocs (jika menggunakan XAMPP).

2. Siapkan Database:

- Buka phpMyAdmin (http://localhost/phpmyadmin).

- Buat database baru bernama: db_apotek.

- Import file SQL (ada di bawah) atau jalankan query manual.

3. Konfigurasi Project:

- Buka file app/config/config.php.

- Pastikan BASEURL sesuai dengan folder kamu: define('BASEURL', 'http://localhost/uas-apotek/public');

4. Jalankan: Buka browser dan akses: http://localhost/uas-apotek

## 🔐 Akun Demo (Login)

Gunakan akun berikut untuk menguji sistem:

**1. Admin**

- Username   : admin
- Password   : 12345
- Hak akses  : Tambah, Edit, Hapus, Lihat

**2. Kasir**

- Username   : kasir1
- Password   : 12345
- Hak akses  : Hanya Lihat Data & Search

## 💾 Skema Database (SQL)

Jalankan query ini di phpMyAdmin untuk membuat struktur tabel:

```
-- Tabel Users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap VARCHAR(100),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    role ENUM('admin', 'kasir')
);

INSERT INTO users VALUES 
(NULL, 'Administrator', 'admin', MD5('12345'), 'admin'),
(NULL, 'Kasir Cantik', 'kasir1', MD5('12345'), 'kasir');

-- Tabel Kategori
CREATE TABLE kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(50)
);

INSERT INTO kategori VALUES (NULL, 'Obat Bebas'), (NULL, 'Obat Keras'), (NULL, 'Vitamin');

-- Tabel Obat
CREATE TABLE obat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_obat VARCHAR(20),
    nama_obat VARCHAR(100),
    kategori_id INT,
    harga_beli DECIMAL(10,2),
    harga_jual DECIMAL(10,2),
    stok INT,
    keterangan TEXT,
    gambar VARCHAR(255) DEFAULT 'default.jpg',
    FOREIGN KEY (kategori_id) REFERENCES kategori(id)
);

```

## 📸 Screenshot Aplikasi

1. Halaman Login.
![foto]()

2. Dashboard Utama

- Admin
![foto]()

- Kasir1
![foto]()

3. Home
![foto]()


## Screenshot fitur CRUD

1. Form Tambah Data (The CRUD – Create)
![foto]()

2. Setelah mengisi Form Tambah Data (The CRUD - Read) 
![foto]()

3. Form Edit Data (The CRUD – Update)
![foto]()

4. Validasi Hapus (The CRUD – Delete)
![foto]()
