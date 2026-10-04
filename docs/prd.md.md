# PRD — Website SMP / Pesantren Islami
**Product Requirements Document**

> **Status:** Living Document  
> **Version:** 0.1.0  
> **Principle:** Flexible, modular, and continuously changeable  
> **Last Updated:** 27 September 2026

---

## 1. Product Overview

Website ini merupakan website resmi untuk sekolah tingkat SMP dan/atau pesantren dengan identitas:

- Islami
- Edukatif
- Formal
- Profesional
- Clean
- Minimalis
- Modern
- Informative
- Minim distraksi

Website berfungsi sebagai pusat informasi publik sekolah sekaligus media untuk memperlihatkan identitas institusi, program pendidikan, kegiatan, prestasi, dan kehidupan siswa.

Website **tidak diposisikan sebagai portal yang penuh fitur**, melainkan sebagai pengalaman informasi yang terstruktur, tenang, terpercaya, dan mudah digunakan.

---

## 2. Product Vision

> **Membangun website pendidikan yang merepresentasikan sekolah secara profesional, menyampaikan informasi dengan jelas, dan memperlihatkan kehidupan belajar siswa secara autentik.**

Website harus mampu berkembang mengikuti perubahan sekolah tanpa bergantung pada struktur halaman yang kaku.

---

## 3. Core Principles

### 3.1 Content First
Konten dan kebutuhan pengguna menjadi prioritas dibanding dekorasi visual.

### 3.2 Minimal Distraction
Setiap elemen harus memiliki tujuan. Hindari elemen hanya karena terlihat menarik.

### 3.3 Modular
Halaman, section, kategori, program, dan fitur harus dapat ditambah, dihapus, atau diubah secara independen.

### 3.4 Flexible
PRD ini adalah dokumen hidup. Informasi yang berubah di masa depan tidak boleh dianggap sebagai pelanggaran terhadap spesifikasi awal.

### 3.5 Real School Representation
Gunakan foto, aktivitas, karya, dan informasi nyata sekolah sebanyak mungkin.

### 3.6 Accessible
Website harus mudah dibaca, dinavigasi, dan digunakan pada perangkat desktop maupun mobile.

### 3.7 Institutional but Human
Tetap formal sebagai website institusi pendidikan, tetapi tidak terasa kaku atau terlalu korporat.

---

# 4. Target Users

## Primary Users

### Calon Orang Tua
Kebutuhan:
- mengenal sekolah
- memahami program pendidikan
- mengetahui nilai dan pendekatan sekolah
- mencari informasi PPDB
- melihat lingkungan dan aktivitas siswa
- menemukan kontak sekolah

### Calon Siswa
Kebutuhan:
- mengetahui kehidupan sekolah
- melihat kegiatan
- mengetahui ekstrakurikuler
- melihat fasilitas
- melihat karya dan aktivitas siswa

## Secondary Users

### Orang Tua Siswa
Kebutuhan:
- mengetahui berita dan agenda
- melihat dokumentasi kegiatan
- mengikuti perkembangan informasi sekolah

### Siswa
Kebutuhan:
- melihat karya
- melihat dokumentasi kegiatan
- mengetahui agenda publik

### Guru / Staff
Kebutuhan:
- mempublikasikan kegiatan
- mengelola informasi
- memperbarui berita dan dokumentasi

### Masyarakat
Kebutuhan:
- mengetahui profil dan legalitas/informasi umum sekolah
- mengetahui program pendidikan
- mendapatkan kontak resmi

---

# 5. Information Architecture

Struktur awal yang direkomendasikan:

```text
Home
│
├── Tentang
│   ├── Profil Sekolah
│   ├── Visi & Misi
│   ├── Nilai Pendidikan
│   ├── Sejarah
│   └── Struktur Organisasi
│
├── Pendidikan
│   ├── Kurikulum
│   ├── Program Keislaman
│   ├── Program Unggulan
│   └── Ekstrakurikuler
│
├── Pesantren
│   ├── Program Pesantren
│   ├── Kehidupan Santri
│   ├── Asrama
│   └── Tata Tertib
│
├── Kegiatan
│   ├── Berita
│   ├── Agenda
│   ├── Prestasi
│   ├── Galeri
│   └── Student Showcase
│
├── PPDB
│   ├── Informasi
│   ├── Persyaratan
│   ├── Jadwal
│   ├── Biaya
│   └── Pendaftaran
│
└── Kontak
    ├── Alamat
    ├── Google Maps
    ├── WhatsApp
    ├── Email
    └── Media Sosial
```

### Flexible Navigation Rule

Struktur di atas adalah **baseline**, bukan struktur permanen.

Jika sekolah tidak memiliki pesantren, menu `Pesantren` dapat dihilangkan.

Jika sekolah memiliki program baru, menu/section baru dapat ditambahkan.

Jika sebuah halaman memiliki terlalu banyak konten, halaman dapat dipecah menjadi beberapa halaman.

Jika konten terlalu sedikit, beberapa halaman dapat digabung.

---

# 6. Homepage

Homepage harus ringkas dan memiliki hierarki informasi yang jelas.

## Recommended Sections

### 6.1 Header / Navigation

Isi minimal:

- Logo
- Nama sekolah
- Navigation
- CTA PPDB jika sedang aktif

Navigation tidak boleh terlalu panjang.

---

### 6.2 Hero

Tujuan:
- memperkenalkan identitas sekolah
- memberikan first impression
- mengarahkan pengguna ke informasi penting

Komponen:

- Headline
- Short description
- Primary CTA
- Secondary CTA
- School photography / visual

Contoh:

> **Membentuk Generasi Berilmu, Beradab, dan Berkarakter**

CTA:
- Tentang Sekolah
- Informasi PPDB

Hero tidak menggunakan carousel kecuali terdapat kebutuhan komunikasi yang jelas.

---

### 6.3 School Introduction

Isi:
- short introduction
- foto sekolah
- CTA menuju Profil

---

### 6.4 Educational Values

Contoh:

- Ilmu
- Adab
- Ibadah
- Kemandirian

Jumlah dan nama value dapat berubah sesuai identitas sekolah.

---

### 6.5 Education Programs

Contoh:

- Akademik
- Keislaman
- Karakter
- Keterampilan

Konten harus dapat ditambah tanpa mengubah layout utama.

---

### 6.6 Featured Programs

Menampilkan 3–5 program unggulan.

Contoh:

- Tahfidz
- Islamic Character
- Digital Learning
- Leadership
- Student Development

---

### 6.7 Student Life

Menampilkan aktivitas nyata siswa.

Contoh:
- pembelajaran
- kegiatan keislaman
- olahraga
- kreativitas
- event
- field trip
- leadership
- kegiatan sosial

---

### 6.8 Student Showcase

Section khusus untuk memperlihatkan:

- Student Projects
- Student Activities
- Student Achievements
- Creative Works
- Social Media Content

Konten dapat bersumber dari:
- website
- Instagram
- YouTube
- platform media lain
- dokumentasi internal

Integrasi media sosial bersifat opsional.

---

### 6.9 Achievements

Menampilkan prestasi siswa/sekolah secara ringkas.

Data minimal:
- Judul prestasi
- Siswa/tim
- Kompetisi
- Tahun
- Tingkat/level

---

### 6.10 News / School Updates

Menampilkan 3–4 konten terbaru.

Kategori dapat berubah sesuai kebutuhan.

---

### 6.11 PPDB CTA

Jika periode PPDB aktif:

> **Penerimaan Peserta Didik Baru**

Tahun pelajaran dapat bersifat dinamis.

CTA:
`Lihat Informasi PPDB`

Section dapat disembunyikan ketika PPDB tidak aktif.

---

### 6.12 Footer

Minimal:

- Logo
- Nama sekolah
- Alamat
- Kontak
- Navigation
- Social media
- Copyright

---

# 7. Student Showcase

## Purpose

Menampilkan kehidupan dan karya siswa secara lebih autentik.

## Content Types

### Student Project
Karya yang dibuat siswa.

### Student Activity
Aktivitas siswa dalam pembelajaran maupun kegiatan sekolah.

### Student Achievement
Prestasi individual atau kelompok.

### Creative Work
Desain, video, fotografi, tulisan, proyek digital, dan karya lainnya.

### Social Media
Konten publik sekolah/siswa yang telah dipilih dan disetujui untuk ditampilkan.

---

## Suggested Filters

```text
All
Learning
Islamic
Creativity
Sports
Events
Achievement
Student Projects
```

Filter bersifat opsional dan dapat berkembang.

---

## Social Media Integration

Website dapat menyediakan:

- link Instagram
- embed Instagram jika sesuai kebutuhan
- link YouTube
- video embed
- social media CTA

**Catatan:**
Integrasi pihak ketiga harus bersifat modular. Jika API, embed, atau kebijakan platform berubah, website tetap harus dapat berfungsi tanpa integrasi tersebut.

---

# 8. Content Management

Jika website menggunakan CMS/admin, konten sebaiknya dipisahkan dari layout.

## Content Entities

Minimal:

```text
School Profile
Program
News
Event
Achievement
Gallery
Student Showcase
Facility
Extracurricular
PPDB Information
Contact
Social Media Link
```

Setiap entity dapat dikembangkan tanpa mengubah seluruh sistem.

---

# 9. Content Status

Konten sebaiknya mendukung status:

```text
Draft
Published
Archived
Scheduled
```

Jika belum dibutuhkan pada MVP, implementasi dapat dimulai dari:

```text
Draft
Published
```

---

# 10. Dynamic Content Rules

Informasi berikut sebaiknya tidak hard-coded:

- Tahun pelajaran
- PPDB
- Agenda
- Berita
- Prestasi
- Program
- Kontak
- Social media links
- Gallery
- Student Showcase

Contoh:

Jangan membuat:

`PPDB 2026/2027`

sebagai teks permanen.

Gunakan data:

```text
academic_year = 2026/2027
status = active
```

Sehingga tahun dapat diubah tanpa mengubah struktur halaman.

---

# 11. Design System

## Visual Direction

Keywords:

```text
Islamic
Educational
Institutional
Minimal
Modern
Clean
Elegant
Warm
Professional
```

## Color

Baseline:

- Off-white / White
- Deep Green
- Charcoal
- Warm Gold sebagai accent

Warna final harus dapat disesuaikan dengan brand sekolah.

Jangan mengunci sistem hanya pada warna tersebut.

---

## Typography

Prioritas:

1. Readability
2. Hierarchy
3. Professional appearance
4. Arabic compatibility jika diperlukan

Typography dapat diganti selama hierarchy dan readability tetap terjaga.

---

# 12. Layout Principles

Gunakan:

- generous whitespace
- clear hierarchy
- consistent spacing
- restrained cards
- strong typography
- authentic photography
- subtle transitions

Hindari:

- excessive animation
- excessive gradients
- autoplay audio
- unnecessary popups
- oversized decorations
- excessive Islamic patterns
- excessive icons
- crowded cards
- infinite visual effects

---

# 13. Responsive Design

Website wajib bekerja pada:

- Mobile
- Tablet
- Desktop
- Large Desktop

Prioritas pengembangan:

```text
Mobile → Tablet → Desktop
```

Komponen harus memiliki behavior responsive yang jelas.

---

# 14. Accessibility

Target baseline:

- readable contrast
- keyboard navigation
- semantic HTML
- alt text pada gambar
- accessible buttons
- clear focus state
- readable font size
- reduced-motion consideration

---

# 15. SEO

Baseline SEO:

- unique page title
- meta description
- semantic headings
- Open Graph metadata
- descriptive URLs
- sitemap
- robots.txt
- structured data jika relevan
- optimized images

School-specific structured data dapat ditambahkan apabila informasi dan implementasinya tersedia.

---

# 16. Performance

Prioritas:

- optimized images
- lazy loading
- minimal JavaScript
- limited third-party scripts
- compressed assets
- efficient fonts
- responsive images

Social media embeds tidak boleh membuat homepage menjadi berat secara signifikan.

Jika embed terlalu berat, gunakan preview card + external link.

---

# 17. Privacy & Student Safety

Karena website menampilkan siswa, fitur publik harus mempertimbangkan:

- izin publikasi foto/video
- izin penggunaan karya siswa
- perlindungan data pribadi
- tidak menampilkan data sensitif
- tidak menampilkan nomor kontak pribadi siswa
- tidak menampilkan informasi lokasi real-time yang berisiko
- moderasi konten sebelum publikasi

Student Showcase harus memiliki mekanisme editorial/approval jika dikelola oleh admin.

---

# 18. Admin / CMS — Optional

Admin panel tidak wajib pada fase awal.

Jika diperlukan, admin dapat mengelola:

```text
Dashboard
├── School Profile
├── Programs
├── News
├── Events
├── Achievements
├── Gallery
├── Student Showcase
├── PPDB
├── Facilities
├── Extracurricular
└── Website Settings
```

Role dapat dikembangkan menjadi:

```text
Super Admin
Content Admin
Editor
Contributor
```

Jangan mengimplementasikan role kompleks jika kebutuhan sekolah belum memerlukannya.

---

# 19. MVP Scope

MVP yang direkomendasikan:

### Public

- Home
- Tentang
- Pendidikan
- Kegiatan
- Student Showcase
- PPDB
- Kontak
- Responsive design
- SEO basic

### Content

- School Profile
- Programs
- News
- Events
- Achievements
- Gallery
- Student Showcase
- PPDB

### Optional

- Social media links
- Google Maps
- YouTube embed
- Instagram integration

---

# 20. Future Expansion

Fitur berikut **tidak wajib pada MVP**, tetapi arsitektur sebaiknya tidak menghambat penambahannya:

- Online PPDB
- Parent portal
- Student portal
- Teacher portal
- Academic information
- Announcement system
- Download center
- Digital library
- Alumni
- Career / alumni stories
- Online payment
- Event registration
- School newsletter
- Search
- Multi-language
- CMS
- Analytics dashboard
- API integrations

---

# 21. Non-Goals

Website publik ini bukan:

- Learning Management System
- Google Classroom replacement
- Student grading system
- Full school ERP
- Private parent portal
- Chat platform

Fitur-fitur tersebut dapat menjadi produk terpisah atau integrasi di masa depan.

---

# 22. Flexible Change Policy

PRD ini menggunakan prinsip:

> **Change is expected, not exceptional.**

Perubahan yang diperbolehkan:

### Content Change
Contoh:
- program baru
- nama program berubah
- prestasi bertambah
- kategori kegiatan berubah

Tidak memerlukan perubahan arsitektur utama.

### Structure Change
Contoh:
- menambah halaman Alumni
- menggabungkan News dan Events
- menambahkan halaman Pesantren

Harus dievaluasi berdasarkan user journey dan navigasi.

### Feature Change
Contoh:
- menambah CMS
- menambah search
- menambah online registration

Harus memiliki scope dan acceptance criteria tersendiri.

### Visual Change
Brand sekolah dapat berubah tanpa mengubah struktur konten.

---

# 23. Change Log

Gunakan tabel berikut untuk mencatat perubahan:

| Version | Date | Change | Reason | Impact |
|---|---|---|---|---|
| 0.1.0 | 2026-09-27 | Initial PRD | Initial product definition | Baseline |

Setiap perubahan penting harus ditambahkan ke tabel ini.

---

# 24. Requirement Priority

Gunakan prioritas:

### P0 — Essential
Tanpa fitur ini website tidak dapat memenuhi fungsi utamanya.

### P1 — Important
Penting untuk pengalaman pengguna tetapi dapat menyusul MVP.

### P2 — Enhancement
Meningkatkan pengalaman tetapi bukan kebutuhan utama.

### P3 — Future
Ide atau kemungkinan pengembangan.

Contoh:

| Feature | Priority |
|---|---|
| Home | P0 |
| School Profile | P0 |
| Education Programs | P0 |
| PPDB Information | P0 |
| Contact | P0 |
| Student Showcase | P1 |
| News | P1 |
| Gallery | P1 |
| Social Media Integration | P2 |
| Online PPDB | P2 |
| Parent Portal | P3 |

Prioritas dapat berubah berdasarkan kebutuhan aktual sekolah.

---

# 25. Acceptance Criteria

Website dianggap memenuhi baseline apabila:

- [ ] Identitas sekolah terlihat jelas
- [ ] Informasi utama dapat ditemukan dengan cepat
- [ ] Navigasi tidak membingungkan
- [ ] Website responsive
- [ ] Konten dapat diperbarui
- [ ] PPDB dapat diperbarui tanpa mengubah source utama jika CMS/dynamic content tersedia
- [ ] Student Showcase dapat dikembangkan
- [ ] Social media integration tidak menjadi single point of failure
- [ ] Foto siswa memiliki proses publikasi yang sesuai
- [ ] Tidak ada elemen visual yang tidak memiliki fungsi
- [ ] Website tetap nyaman digunakan tanpa animasi berat
- [ ] Basic SEO tersedia
- [ ] Basic accessibility tersedia
- [ ] Struktur dapat menerima halaman/fitur baru

---

# 26. Product Decision Log

Gunakan bagian ini untuk keputusan yang memengaruhi arah produk.

Format:

```text
[DATE]
Decision:
Reason:
Alternatives:
Impact:
Status:
```

Contoh:

```text
[2026-09-27]
Decision:
Student activity will be represented through Student Showcase.

Reason:
More representative of school life than a generic Social Media page.

Alternatives:
Dedicated Social Media page.

Impact:
Social media becomes one content source rather than the main product structure.

Status:
Accepted
```

---

# 27. Open Questions

Bagian ini sengaja dibiarkan terbuka.

Contoh:

- Nama resmi sekolah?
- Apakah sekolah boarding/full-day?
- Apakah pesantren merupakan bagian utama atau program tambahan?
- Apakah tersedia CMS?
- Apakah PPDB dilakukan secara online?
- Apakah sekolah memiliki brand guideline?
- Apakah Instagram dan YouTube akan diintegrasikan?
- Siapa yang bertanggung jawab atas publikasi konten siswa?
- Apakah website membutuhkan bilingual?
- Apakah diperlukan halaman alumni?

Pertanyaan baru dapat ditambahkan kapan saja.

---

# 28. Development Philosophy

Jangan membangun semua fitur sekaligus.

Gunakan pendekatan:

```text
Define
↓
Design
↓
Build
↓
Test
↓
Publish
↓
Observe
↓
Improve
↓
Repeat
```

Setiap fase boleh mengubah keputusan sebelumnya apabila ditemukan kebutuhan yang lebih relevan.

---

# 29. Final Product Direction

Website harus terasa seperti:

> **“Website resmi sebuah institusi pendidikan Islam yang modern, tenang, terpercaya, dan hidup.”**

Bukan:

> website yang penuh fitur hanya karena fitur tersebut tersedia.

Prioritas utama:

```text
Clarity
    ↓
Trust
    ↓
Information
    ↓
School Identity
    ↓
Student Life
    ↓
Engagement
```

---

## Document Rule

**This PRD is a living document.**

Tidak ada bagian dari dokumen ini yang dianggap final secara permanen.

Perubahan kebutuhan, identitas sekolah, teknologi, konten, struktur organisasi, program pendidikan, perilaku pengguna, atau hasil evaluasi dapat menyebabkan PRD diperbarui.

Setiap perubahan harus mempertahankan prinsip utama:

> **Clear information, authentic school identity, minimal distraction, flexible architecture.**
