# 🌐 **Warnet Modern Gaming Cafe**

**Dibuat oleh:**  
- **Riko Gunawan**  
  Email: rikogunawan100@gmail.com  

---

## 🖥️ **Deskripsi Proyek**  
Aplikasi berbasis web untuk mengelola **Warnet Modern Gaming Cafe**, yang dirancang untuk memberikan pengalaman terbaik dalam manajemen pelanggan, pemesanan komputer, dan sistem point reward.  

Aplikasi ini dibangun menggunakan framework **Laravel** dengan antarmuka yang modern dan responsif, menawarkan kemudahan penggunaan untuk administrator maupun pengguna.

---

## 🚀 **Teknologi dan Layanan yang Digunakan**
- **Laravel**: Framework PHP untuk pengembangan web modern.  
- **Blade**: Template engine untuk membuat UI yang dinamis.  
- **MySQL**: Basis data untuk menyimpan informasi pengguna, sesi, dan transaksi.  
- **Bootstrap**: Untuk desain front-end responsif.  
- **FontAwesome**: Ikon interaktif untuk tampilan profesional.  

---

## 📱 **Fitur Utama**
- **Login dan Registrasi Pengguna**: Akses aman untuk pelanggan dan admin.  
- **Dashboard Admin**: Menampilkan laporan aktivitas, pendapatan, dan status komputer.  
- **Manajemen Komputer**: Mengatur status komputer (online/offline) dan sesi pengguna.  
- **Sistem Pemesanan**: Memungkinkan pengguna memesan komputer langsung dari platform.  
- **Point Reward**: Sistem poin berdasarkan waktu penggunaan komputer.  
- **Riwayat Transaksi**: Melacak aktivitas dan pembayaran pelanggan.  
- **Responsive Design**: Tampilan optimal di desktop maupun perangkat mobile.

---

## 📸 **Tangkapan Layar**

### Login Screen
![Login Screen](https://github.com/user-attachments/assets/904831c7-90ac-4e4c-b294-26ce298c4e3a)

### Dashboard
![Warnet1](https://github.com/user-attachments/assets/134e5b09-fdc0-4acb-997d-fd248768f95a)

### Manajemen Komputer
![Warnet1b](https://github.com/user-attachments/assets/cab6d635-ede1-4c11-a97a-433fc7d33a1a)

### Detail Komputer
![Warnet2](https://github.com/user-attachments/assets/faf992f5-1632-4736-896d-6f448c04a2a1)

### Riwayat Transaksi
![Warnet3](https://github.com/user-attachments/assets/4b776360-ca43-4a55-af1f-43f00d6e3993)

### Sistem Reward
![Warnet4](https://github.com/user-attachments/assets/910c8c7f-075a-41c7-8cfb-9a78679a4e5e)

### Sistem Poin
![Warnet5](https://github.com/user-attachments/assets/d093d2e9-0f11-4fa1-a2f2-8038621b1646)

### Pengaturan
![Warnet6](https://github.com/user-attachments/assets/f8b263a6-3f9f-43ef-9b86-b6cb5797ea7c)

### Pemesanan Komputer
![Warnet7](https://github.com/user-attachments/assets/fcb751af-8aed-4b5f-a2e0-b80b39cba73f)

### Daftar Pengguna
![Warnet8](https://github.com/user-attachments/assets/ac9c834a-9b68-40f6-8457-7b41fd640598)

### Pengaturan Admin
![Warnet9](https://github.com/user-attachments/assets/0e1c336c-e387-4005-8e6a-3ff45589f7ee)

## 🛠️ **Instalasi dan Pengaturan**

1. Clone repositori ini:
Jalankan perintah berikut di terminal untuk mengunduh kode proyek.
 
 ```bash
 git clone https://github.com/nama-kamu/warnet-modern-cafe.git
 ```

2. Instal dependensi:
Gunakan Composer untuk menginstal semua dependensi proyek Laravel.

```bash
composer install
```

3. Buat file `.env`:
Salin file `.env.example` menjadi `.env`, lalu sesuaikan konfigurasi database Anda di dalam file tersebut.
Contoh:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=warnet-management
DB_USERNAME=root
DB_PASSWORD=
```

4. Jalankan migrasi database:
Buat tabel database menggunakan perintah berikut:

```bash
php artisan migrate
```

5. Jalankan aplikasi:
Gunakan perintah berikut untuk memulai server lokal Laravel.

```bash
php artisan serve
```

6. Akses aplikasi di browser:
Buka aplikasi Anda di browser dengan mengunjungi:

```
http://127.0.0.1:8000
```

