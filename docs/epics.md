# Epics Specification — Website SMP / Pesantren Islami
**Document Version:** 1.0.0  
**Target System:** Website Yayasan Bumi Ilmu (SMP & Pesantren)  
**Reference Document:** `docs/prd.md.md` (Bab 4, 5, 6, 7, 19, 24)

---

## 1. Epics Portfolio & Priority Matrix

Pembagian Epic mengacu pada skala prioritas PRD Bab 24:
- **P0 (Essential):** Pondasi wajib agar website berfungsi memenuhi tujuan primer (Profil, Pendidikan, PPDB, Kontak, Homepage).
- **P1 (Important):** Pengalaman autentik sekolah dan dinamisme konten (Student Showcase, Berita, Agenda, Prestasi).
- **P2 (Enhancement):** Fitur pendukung (Integrasi media sosial ber-fallback aman, filter interaktif lanjutan).
- **P3 (Future):** Di luar scope MVP (Portal Siswa, LMS, Sistem Pembayaran Online).

```text
┌────────────────────────────────────────────────────────────────────────┐
│ EPIC-1: Foundation, Design Tokens & Base Layout (P0)                  │
├────────────────────────────────────────────────────────────────────────┤
│ EPIC-2: Homepage 12 Modular Sections (P0)                              │
├────────────────────────────────────────────────────────────────────────┤
│ EPIC-3: Institutional Identity & School Profile (P0)                   │
├────────────────────────────────────────────────────────────────────────┤
│ EPIC-4: Education & Islamic Programs Hub (P0)                          │
├────────────────────────────────────────────────────────────────────────┤
│ EPIC-5: Pesantren & Santri Life Modular Hub (P1 - Toggleable)          │
├────────────────────────────────────────────────────────────────────────┤
│ EPIC-6: Dynamic PPDB & Admissions Information Hub (P0)                 │
├────────────────────────────────────────────────────────────────────────┤
│ EPIC-7: Student Showcase & Creative Works Experience (P1)              │
├────────────────────────────────────────────────────────────────────────┤
│ EPIC-8: Activities, News, Events & Achievements (P1)                   │
├────────────────────────────────────────────────────────────────────────┤
│ EPIC-9: Contact, Location & Official Channels (P0)                     │
├────────────────────────────────────────────────────────────────────────┤
│ EPIC-10: Performance, Core Web Vitals, SEO & Privacy Compliance (P0)   │
└────────────────────────────────────────────────────────────────────────┘
```

---

## 2. Epic Details

### EPIC-1: Foundation, Design Tokens & Base Layout
- **Prioritas:** P0 (Essential)
- **Tujuan Pengguna:** Pengunjung menikmati antarmuka yang bersih, cepat dimuat, konsisten, dan mudah dinavigasi di mobile maupun desktop.
- **Deskripsi:** Menyiapkan kerangka kerja modern, token desain (warna Deep Islamic Green, Warm Gold, Charcoal, Off-white), tipografi sans-serif & kaligrafi/arab, struktur grid 8pt, layout utama (Header responsif + Footer informatif), serta konfigurasi data store statis terstruktur.
- **Kriteria Penerimaan (Acceptance Criteria):**
  1. Token warna dan tipografi terpasang sesuai `docs/design-system.md`.
  2. Header sticky memiliki navigasi ringkas, logo institusi, dan tombol CTA dinamis.
  3. Menu mobile hamburger terbuka mulus dengan area sentuh minimal 44x44px.
  4. Footer memuat alamat legal, navigasi cepat, kontak resmi, dan hak cipta.
  5. Konfigurasi global mendukung toggle modul (misal: `pesantren_enabled`).
- **Dependensi:** Tidak ada.

---

### EPIC-2: Homepage 12 Modular Sections
- **Prioritas:** P0 (Essential)
- **Tujuan Pengguna:** Calon orang tua dan siswa memperoleh gambaran menyeluruh tentang identitas sekolah, nilai, program, dan panggilan aksi (CTA) dalam satu halaman ringkas tanpa distraksi.
- **Deskripsi:** Membangun 12 section modular sesuai PRD Bab 6: Header, Hero (foto nyata + headline inspiratif), School Introduction, Educational Values (4 nilai), Education Programs (4 pilar), Featured Programs (3-5 unggulan), Student Life, Student Showcase Teaser, Achievements, News Updates, PPDB Banner CTA, dan Footer.
- **Kriteria Penerimaan (Acceptance Criteria):**
  1. Seluruh 12 section tersaji dengan hierarki visual jelas dan jarak konsisten.
  2. Hero tidak menggunakan carousel otomatis; CTA mengarah ke PPDB dan Profil.
  3. Komponen PPDB Banner CTA otomatis menyesuaikan status buka/tutup dari konfigurasi data.
  4. Bebas dari animasi berlebih atau elemen dekoratif yang tidak fungsional.
- **Dependensi:** EPIC-1.

---

### EPIC-3: Institutional Identity & School Profile (`/tentang`)
- **Prioritas:** P0 (Essential)
- **Tujuan Pengguna:** Calon wali murid, dinas, dan masyarakat memverifikasi legalitas, sejarah, visi-misi, nilai pendidikan, dan susunan kepemimpinan sekolah.
- **Deskripsi:** Membangun halaman institusional yang mencakup: Profil Umum Sekolah, Visi & Misi, Nilai-nilai Pendidikan (Ilmu, Adab, Ibadah, Kemandirian), Sejarah Singkat Pendirian, dan Struktur Organisasi / Manajemen Sekolah.
- **Kriteria Penerimaan (Acceptance Criteria):**
  1. Konten tersusun rapi dengan tipografi yang berwibawa dan mudah dibaca.
  2. Kutipan ayat/hadits pendukung visi-misi ditampilkan dengan format tipografi Arab yang tepat.
  3. Menampilkan informasi yayasan penyelenggara dan legalitas formal (NPSN jika tersedia).
- **Dependensi:** EPIC-1.

---

### EPIC-4: Education & Islamic Programs Hub (`/pendidikan`)
- **Prioritas:** P0 (Essential)
- **Tujuan Pengguna:** Calon orang tua memahami kurikulum akademis, program keislaman khas (Tahfidz, Adab), program unggulan, dan ragam ekstrakurikuler.
- **Deskripsi:** Membangun halaman informasi pendidikan yang modular. Mengelompokkan program ke dalam kategori: Kurikulum Nasional & Terpadu, Program Pembinaan Keislaman, Program Unggulan, serta Kegiatan Ekstrakurikuler (Bakat, Minat, Olahraga, Kepanduan).
- **Kriteria Penerimaan (Acceptance Criteria):**
  1. Struktur program dapat ditambah/diubah melalui data tanpa merombak layout.
  2. Setiap program memiliki deskripsi capaian, kebiasaan harian, dan dokumentasi foto autentik.
  3. Navigasi tab/sub-section memudahkan pengunjung berpindah antar-program.
- **Dependensi:** EPIC-1.

---

### EPIC-5: Pesantren & Santri Life Modular Hub (`/pesantren`)
- **Prioritas:** P1 (Important / Modular Toggle)
- **Tujuan Pengguna:** Calon santri dan orang tua mengetahui ritme harian asrama, fasilitas santri, pengasuhan, dan tata tertib kehidupan pesantren.
- **Deskripsi:** Menyediakan modul khusus bagi sekolah yang memiliki asrama/boarding. Memuat: Program Kepesantrenan, Jadwal Kehidupan Harian Santri (dari bangun tidur hingga istirahat), Fasilitas Asrama & Masjid, serta Prinsip Tata Tertib & Adab Santri.
- **Kriteria Penerimaan (Acceptance Criteria):**
  1. Seluruh modul dapat dinonaktifkan secara penuh (`modules.pesantren_enabled: false`) tanpa merusak navigasi atau build sistem jika yayasan menerapkan model non-boarding.
  2. Jadwal harian disajikan dalam bentuk timeline yang mudah dipahami orang tua.
  3. Menampilkan foto nyata lingkungan asrama yang bersih dan edukatif.
- **Dependensi:** EPIC-1, EPIC-4.

---

### EPIC-6: Dynamic PPDB & Admissions Information Hub (`/ppdb`)
- **Prioritas:** P0 (Essential)
- **Tujuan Pengguna:** Calon orang tua memperoleh kepastian persyaratan, tanggal penting, rincian biaya, dan langkah pendaftaran tanpa kebingungan.
- **Deskripsi:** Halaman informasi Penerimaan Peserta Didik Baru (PPDB) yang terikat pada data dinamis (tahun ajaran, status aktif/non-aktif, timeline gelombang pendaftaran, syarat berkas, rincian estimasi biaya, FAQ, dan tombol kontak panitia via WhatsApp).
- **Kriteria Penerimaan (Acceptance Criteria):**
  1. Tahun pelajaran (misal: 2026/2027) dan status pendaftaran dibaca dari file konfigurasi data, tidak di-hardcode.
  2. Jika periode PPDB belum buka / sudah tutup, halaman menampilkan pemberitahuan yang santun dan menyediakan formulir/link daftar minat informasi.
  3. Alur pendaftaran disajikan dalam tahapan nomor yang jelas (step-by-step).
  4. Tombol WhatsApp panitia terhubung langsung dengan template pesan salam resmi.
- **Dependensi:** EPIC-1.

---

### EPIC-7: Student Showcase & Creative Works Experience (`/showcase`)
- **Prioritas:** P1 (Important)
- **Tujuan Pengguna:** Siswa dan orang tua melihat apresiasi karya nyata, dokumentasi aktivitas belajar, dan prestasi murid secara autentik dan inspiratif.
- **Deskripsi:** Menghadirkan showcase dinamis karya dan kegiatan siswa sesuai PRD Bab 7. Mendukung filter: All, Learning, Islamic, Creativity, Sports, Events, Achievement, Student Projects. Mendukung kartu pratinjau media dan integrasi tautan media sosial dengan mekanisme perlindungan privasi.
- **Kriteria Penerimaan (Acceptance Criteria):**
  1. Filter kategori bekerja cepat secara responsif di perangkat mobile dan desktop.
  2. Mengimplementasikan safety flag: hanya konten bertanda `privacy_consent_verified: true` yang dirender ke publik.
  3. Identitas siswa dilindungi (hanya nama depan/panggilan dan tingkatan kelas; tanpa nomor kontak atau data pribadi).
  4. Embed eksternal menggunakan sistem facade: tidak membebani performa muat awal.
- **Dependensi:** EPIC-1.

---

### EPIC-8: Activities, News, Events & Achievements (`/kegiatan`)
- **Prioritas:** P1 (Important)
- **Tujuan Pengguna:** Masyarakat dan keluarga besar sekolah mengikuti rekam jejak kegiatan terbaru, agenda mendatang, dan capaian prestasi sekolah.
- **Deskripsi:** Modul publikasi yang memuat:
  - Berita & Artikel Sekolah (dengan halaman detail artikel ber-SEO lengkap).
  - Kalender Agenda Kegiatan publik mendatang.
  - Rekap Prestasi (Tingkat Kota/Kabupaten, Provinsi, Nasional, Internasional).
  - Galeri Dokumentasi Kegiatan.
- **Kriteria Penerimaan (Acceptance Criteria):**
  1. Daftar berita memiliki paginasi/arsip sederhana dan tanggal rilis resmi.
  2. Halaman detail artikel memuat judul, tanggal, kategori, foto utama, dan isi terstruktur.
  3. Daftar prestasi menampilkan nama siswa/tim, kompetisi, tahun, dan tingkat kejuaraan.
- **Dependensi:** EPIC-1.

---

### EPIC-9: Contact, Location & Official Channels (`/kontak`)
- **Prioritas:** P0 (Essential)
- **Tujuan Pengguna:** Pengunjung menemukan alamat fisik sekolah, navigasi peta, nomor telepon resmi yayasan, email, dan kanal media sosial terverifikasi.
- **Deskripsi:** Halaman kontak yang menyediakan alamat lengkap institusi, jam pelayanan operasional kantor tata usaha, integrasi Google Maps (facade interaktif), tautan WhatsApp resmi, email domain sekolah, dan tautan media sosial (Instagram, YouTube).
- **Kriteria Penerimaan (Acceptance Criteria):**
  1. Peta lokasi menggunakan facade/tautan langsung agar tidak melambatkan page load awal.
  2. Nomor telepon dan tautan WhatsApp dapat langsung di-klik (*click-to-chat*).
  3. Menampilkan jadwal jam operasional kantor sekolah yang jelas.
- **Dependensi:** EPIC-1.

---

### EPIC-10: Performance, Core Web Vitals, SEO & Privacy Compliance
- **Prioritas:** P0 (Essential)
- **Tujuan Pengguna:** Website dapat diakses secepat kilat bahkan di jaringan seluler lambat, mudah ditemukan di mesin pencari Google, dan menjamin keamanan privasi anak.
- **Deskripsi:** Audit performa aset (kompresi WebP/AVIF, lazy loading, font optimization), implementasi metadata SEO (Open Graph, Twitter Card, sitemap.xml, robots.txt, schema JSON-LD `EducationalOrganization`), serta validasi kepatuhan proteksi data anak (PRD Bab 17).
- **Kriteria Penerimaan (Acceptance Criteria):**
  1. Skor Google Lighthouse: Performance >= 90, Accessibility >= 95, Best Practices >= 90, SEO >= 95.
  2. First Contentful Paint (FCP) < 1.5s, Cumulative Layout Shift (CLS) < 0.1.
  3. Dokumen sitemap.xml dan robots.txt dihasilkan secara otomatis.
  4. Audit privasi menyatakan nol paparan PII (Personally Identifiable Information) siswa.
- **Dependensi:** Seluruh Epic (EPIC-1 s/d EPIC-9).
