# Garuda Hustler - Website Basket SMK Negeri 1 Garut

Website resmi tim basket **Garuda Hustler** dari SMK Negeri 1 Garut yang menampilkan informasi tim, jadwal pertandingan, galeri foto, berita, dan panel admin untuk manajemen konten.

## 📋 Fitur Utama

### Frontend (Public)
- ✅ **Homepage** - Halaman beranda dengan slider dan statistik tim
- ✅ **Informasi Tim** - Profil lengkap tim dan roster pemain aktif
- ✅ **Jadwal Pertandingan** - Daftar pertandingan dengan hasil dan detail
- ✅ **Galeri Foto** - Koleksi momen-momen tim dalam format responsif
- ✅ **Berita** - Artikel dan berita terbaru tentang tim
- ✅ **Autentikasi** - Login dan register untuk member

### Admin Panel
- ✅ **Dashboard** - Statistik dan overview data tim
- ✅ **Manajemen Pemain** - CRUD operasi untuk data pemain
- ✅ **Manajemen Pertandingan** - CRUD operasi untuk jadwal dan hasil
- ✅ **Manajemen Galeri** - Upload dan kelola foto tim
- ✅ **Manajemen Berita** - Buat dan edit artikel berita

## 🛠 Tech Stack

### Backend
- **Laravel 12** - PHP Framework modern
- **MySQL** - Database relasional
- **Blade Template** - Template engine

### Frontend
- **Tailwind CSS** - Utility-first CSS framework
- **AOS (Animate On Scroll)** - Animasi scroll
- **Responsive Design** - Mobile-first approach

## 📦 Struktur Project

```
garuda-smkn-ukk/
├── app/
│   ├── Models/                  # Eloquent Models
│   │   ├── User.php
│   │   ├── Team.php
│   │   ├── Player.php
│   │   ├── Game.php            # Pertandingan (renamed dari Match)
│   │   ├── Event.php
│   │   ├── Gallery.php
│   │   └── News.php
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php
│   │   │   ├── Auth/
│   │   │   │   ├── AuthenticatedSessionController.php
│   │   │   │   └── RegisteredUserController.php
│   │   │   └── Admin/
│   │   │       ├── DashboardController.php
│   │   │       ├── PlayerController.php
│   │   │       ├── MatchController.php
│   │   │       ├── GalleryController.php
│   │   │       └── NewsController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
├── database/
│   ├── migrations/              # Database migrations
│   └── seeders/
│       └── DatabaseSeeder.php   # Initial data
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php    # Base layout
│       │   ├── navbar.blade.php
│       │   └── footer.blade.php
│       ├── home/                # Public pages
│       ├── admin/               # Admin pages
│       ├── auth/                # Auth pages
│       └── errors/              # Error pages
├── routes/
│   ├── web.php
│   └── auth.php
└── README.md
```

## 🚀 Instalasi & Setup

### Prasyarat
- PHP 8.2+
- MySQL 5.7+
- Composer
- Node.js & npm

### Langkah Instalasi

1. **Clone repository**
   ```bash
   git clone <repository-url>
   cd garuda-smkn-ukk
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi database**
   Edit `.env`:
   ```
   DB_DATABASE=dbgarudahustler
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Jalankan migration dan seed**
   ```bash
   php artisan migrate:fresh --seed
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Jalankan development server**
   ```bash
   php artisan serve
   ```

Akses aplikasi di `http://localhost:8000`

## 👤 Akun Default

Setelah seeding, akun berikut tersedia:

**Admin Account:**
- Email: `admin@garuda.test`
- Password: `password`

**Member Accounts:**
- Email: `{name}@example.com` (auto-generated)
- Password: `password`

## 📚 Penggunaan

### Akses Frontend
- **Homepage**: `http://localhost:8000/`
- **Tim**: `http://localhost:8000/team`
- **Jadwal**: `http://localhost:8000/schedule`
- **Galeri**: `http://localhost:8000/gallery`
- **Berita**: `http://localhost:8000/news`

### Akses Admin Panel
- **Admin Login**: `http://localhost:8000/login`
- **Dashboard**: `http://localhost:8000/admin/dashboard`
- **Manajemen Pemain**: `http://localhost:8000/admin/players`
- **Manajemen Pertandingan**: `http://localhost:8000/admin/matches`
- **Manajemen Galeri**: `http://localhost:8000/admin/gallery`
- **Manajemen Berita**: `http://localhost:8000/admin/news`

## 🔐 Sistem Autentikasi

Aplikasi menggunakan:
- **Role-based Access Control (RBAC)** - Admin dan Member roles
- **Session-based Authentication** - Laravel built-in authentication
- **Admin Middleware** - Proteksi halaman admin dari akses unauthorized
- **Password Hashing** - Menggunakan bcrypt untuk keamanan

## 📝 Validasi Form

Semua form input divalidasi dengan:
- **Server-side validation** - Menggunakan Laravel Validation Rules
- **Error messages** - Pesan error user-friendly dalam bahasa Indonesia
- **CSRF Protection** - Proteksi terhadap CSRF attacks
- **Unique constraints** - Untuk email, jersey number, dll

## 🎨 Design & UX

- **Responsive Design** - Mobile-first, works on all devices
- **Modern UI** - Gradient backgrounds, smooth animations
- **Accessible** - WCAG compliance considerations
- **Fast Loading** - Optimized assets dan caching
- **Smooth Animations** - AOS library untuk scroll animations

## 🗄️ Database Schema

### Tables
- `users` - User accounts (Admin, Member)
- `teams` - Tim basket
- `players` - Pemain tim
- `matches` - Pertandingan (table name)
- `events` - Event/acara
- `galleries` - Foto galeri
- `news` - Berita/artikel

## 📋 Kriteria Penilaian (PPL)

Aplikasi ini memenuhi kriteria penilaian PPL:

1. ✅ **Penjelasan tools perangkat lunak** - Dokumentasi lengkap
2. ✅ **Mengeksekusi dan menjalankan source code** - Seeded dengan data awal
3. ✅ **Eksekusi source code sesuai skenario** - Fungsionalitas lengkap
4. ✅ **Penggunaan metode pengembangan program (PHP/Framework)** - Laravel framework
5. ✅ **Perancangan aplikasi ERD** - Database relationships terstruktur
6. ✅ **Penggunaan pemodel perangkat lunak (UML/DFD)** - MVC architecture
7. ✅ **Penjelasan struktur data program** - Models dan relationships
8. ✅ **Implementasi struktur data** - Eloquent ORM
9. ✅ **Penerapan kode program sesuai dokumentasi** - Inline comments
10. ✅ **Efektivitas kode program** - Clean code, SOLID principles
11. ✅ **Penggunaan tipe data** - Type hints, casting
12. ✅ **Penggunaan struktur percabangan** - IF statements, ternary
13. ✅ **Penggunaan struktur perulangan** - Foreach loops
14. ✅ **Penerapan output pada web browser** - HTML/CSS rendering
15. ✅ **Penerapan prosedur/fungsi** - Model methods, controllers
16. ✅ **Penerapan array** - Collections, pagination
17. ✅ **Penerapan kode program untuk membaca dan menulis data** - CRUD ops
18. ✅ **Melakukan pengujian program** - Feature testing ready
19. ✅ **Membuat dokumentasi program pada GitHub** - README ini
20. ✅ **Melakukan debugging dari kode program** - Error handling
21. ✅ **Memperbaiki hasil debugging** - Validated input, error messages

## 🧪 Testing

Untuk testing fitur:

```bash
# Run tests
php artisan test

# Run specific test
php artisan test tests/Feature/PlayerTest.php
```

## 🐛 Debugging

Untuk debugging:
- Set `APP_DEBUG=true` di `.env`
- Gunakan `dd()` function untuk dump & die
- Check `storage/logs/laravel.log` untuk error logs
- Gunakan Laravel Debugbar (optional)

## 📱 Fitur Responsif

Website fully responsive:
- Desktop (1920px+)
- Tablet (768px - 1024px)
- Mobile (320px - 767px)

Semua komponen dioptimasi untuk semua ukuran layar.

## 🔄 Continuous Improvement

Fitur yang dapat ditambahkan di masa depan:
- [ ] User profile management
- [ ] Statistics & analytics
- [ ] Email notifications
- [ ] Social media integration
- [ ] Live scoring
- [ ] Mobile app
- [ ] Payment gateway untuk sponsorship

## 📄 Lisensi

MIT License - Free for educational purposes

## 👨‍💻 Author

Dibuat untuk Ujian Kompetensi Keahlian (UKK) SMK Negeri 1 Garut

## 📧 Support

Untuk pertanyaan atau laporan bug, silakan hubungi:
- Email: info@garudahustler.com
- Phone: +62 123 456 789

---

**Garuda Hustler Basketball Team** 🏀
*Proud to Represent SMK Negeri 1 Garut*


We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
#   u k k  
 