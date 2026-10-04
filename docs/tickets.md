# Tickets Specification — Website SMP / Pesantren Islami
**Document Version:** 1.0.0  
**Target System:** Website Yayasan Bumi Ilmu (SMP & Pesantren)  
**Reference Documents:** `docs/prd.md.md`, `docs/epics.md`, `docs/architecture.md`, `docs/design-system.md`

---

## 1. Ticket Overview & Status Board

| Ticket ID | Epic | Judul Tiket | Prioritas | Estimasi | Agent Pelaksana |
|---|---|---|---|---|---|
| **TCK-001** | EPIC-1 | Inisialisasi Project, Design Tokens & Tailwind Setup | P0 | 3 SP | `agent-frontend` |
| **TCK-002** | EPIC-1 | Schema Data Content & Konfigurasi Global Dinamis | P0 | 3 SP | `agent-content-data` |
| **TCK-003** | EPIC-1 | Komponen Header Responsif & Footer Institusional | P0 | 5 SP | `agent-frontend` |
| **TCK-004** | EPIC-2 | Homepage: Hero Section dengan Dynamic PPDB CTA | P0 | 3 SP | `agent-frontend` |
| **TCK-005** | EPIC-2 | Homepage: School Intro & Educational Values (4 Pilar) | P0 | 3 SP | `agent-frontend` |
| **TCK-006** | EPIC-2 | Homepage: Education Programs & Featured Programs | P0 | 5 SP | `agent-frontend` |
| **TCK-007** | EPIC-2 | Homepage: Student Life & Showcase Teaser Grid | P1 | 5 SP | `agent-frontend` |
| **TCK-008** | EPIC-2 | Homepage: Achievements, News Updates & PPDB Banner | P0 | 5 SP | `agent-frontend` |
| **TCK-009** | EPIC-3 | Halaman Institusional Tentang Kami (`/tentang`) | P0 | 5 SP | `agent-frontend` |
| **TCK-010** | EPIC-4 | Halaman Program Pendidikan & Kurikulum (`/pendidikan`) | P0 | 5 SP | `agent-frontend` |
| **TCK-011** | EPIC-5 | Modul Kehidupan Pesantren & Santri Life (`/pesantren`) | P1 | 5 SP | `agent-frontend` |
| **TCK-012** | EPIC-6 | Hub Informasi PPDB Dinamis & Alur Pendaftaran (`/ppdb`) | P0 | 5 SP | `agent-content-data` + `agent-frontend` |
| **TCK-013** | EPIC-7 | Halaman Student Showcase Interaktif dengan Filter & Media Facade | P1 | 5 SP | `agent-frontend` |
| **TCK-014** | EPIC-7 | Student Safety & Privacy Consent Validation Gate | P0 | 3 SP | `agent-editorial-safety` |
| **TCK-015** | EPIC-8 | Modul Berita, Detail Artikel & Kalender Agenda (`/kegiatan`) | P1 | 5 SP | `agent-content-data` + `agent-frontend` |
| **TCK-016** | EPIC-8 | Halaman Rekapitulasi Prestasi & Galeri Foto | P1 | 3 SP | `agent-frontend` |
| **TCK-017** | EPIC-9 | Halaman Kontak, Peta Lokasi Facade & Kanal WhatsApp | P0 | 3 SP | `agent-frontend` |
| **TCK-018** | EPIC-10 | Optimasi Performa, Image Pipeline (WebP) & Core Web Vitals | P0 | 5 SP | `agent-qa-perf` |
| **TCK-019** | EPIC-10 | SEO Engine, OpenGraph, Sitemap & Schema JSON-LD | P0 | 3 SP | `agent-architect` |

---

## 2. Granular Ticket Specifications

### TCK-001: Inisialisasi Project, Design Tokens & Tailwind Setup
- **Epic:** EPIC-1 (Foundation)
- **Prioritas:** P0 | **Estimasi:** 3 Story Points | **Agent:** `agent-frontend`
- **Deskripsi:** Membangun fondasi styling dengan Tailwind CSS dan CSS custom properties sesuai `docs/design-system.md`. Menyiapkan warna Deep Green (`#134E4A`), Warm Gold (`#D97706`), Charcoal (`#1E293B`), dan Off-white (`#F8FAFC`). Mengatur tipografi sans-serif (`Plus Jakarta Sans` / `Inter`) dan font Arab (`Amiri`).
- **Acceptance Criteria:**
  - [ ] Palet warna terdaftar di konfigurasi Tailwind sebagai token resmi.
  - [ ] Font lokal dimuat dengan aturan `font-display: swap`.
  - [ ] Reset CSS normal dan baseline typography teruji di Chromium dan Firefox.

---

### TCK-002: Schema Data Content & Konfigurasi Global Dinamis
- **Epic:** EPIC-1 (Foundation)
- **Prioritas:** P0 | **Estimasi:** 3 Story Points | **Agent:** `agent-content-data`
- **Deskripsi:** Membuat struktur penyimpanan data terstruktur (JSON/Markdown) untuk entity: `site_config`, `school_profile`, `programs`, `ppdb_config`, `showcase`, `news`, `events`, `achievements`. Memastikan variabel dinamis seperti tahun ajaran aktif (`academic_year: "2026/2027"`) dan status PPDB (`active|inactive`) terpisah dari markup.
- **Acceptance Criteria:**
  - [ ] Seluruh schema TypeScript interface sesuai Bab 5 `docs/architecture.md`.
  - [ ] Variabel global `modules.pesantren_enabled` dapat mengubah ketersediaan modul.
  - [ ] Tidak ada string tahun ajaran yang di-hardcode dalam komponen tampilan.

---

### TCK-003: Komponen Header Responsif & Footer Institusional
- **Epic:** EPIC-1 (Foundation)
- **Prioritas:** P0 | **Estimasi:** 5 Story Points | **Agent:** `agent-frontend`
- **Deskripsi:** Mengembangkan Header sticky dan Footer global yang modular.
  - Header: Logo yayasan/sekolah, nama institusi, menu (Tentang, Pendidikan, Pesantren [kondisional], Kegiatan, Showcase, PPDB, Kontak), CTA PPDB dinamis.
  - Mobile Menu: Drawer/dropdown dengan target sentuh >= 44px.
  - Footer: Alamat resmi, legalitas/NPSN, tautan navigasi, kontak telepon/email, hak cipta.
- **Acceptance Criteria:**
  - [ ] Menu Pesantren otomatis tersembunyi jika `pesantren_enabled === false`.
  - [ ] Focus trap dan ARIA attributes (`aria-expanded`, `aria-label`) terpasang pada hamburger menu.
  - [ ] Footer menampilkan informasi legal Yayasan Bumi Ilmu secara jelas.

---

### TCK-004: Homepage: Hero Section dengan Dynamic PPDB CTA
- **Epic:** EPIC-2 (Homepage)
- **Prioritas:** P0 | **Estimasi:** 3 Story Points | **Agent:** `agent-frontend`
- **Deskripsi:** Membangun Hero section statis tanpa carousel (sesuai PRD Bab 6.2). Berisi headline inspiratif ("Membentuk Generasi Berilmu, Beradab, dan Berkarakter"), sub-deskripsi, Primary CTA (ke PPDB), Secondary CTA (ke Tentang Sekolah), dan fotografi sekolah riil berorientasi autentik.
- **Acceptance Criteria:**
  - [ ] Tidak ada slider/carousel otomatis.
  - [ ] Tombol CTA PPDB membaca status dinamis (label berubah jika pendaftaran belum dibuka).
  - [ ] Gambar latar/hero menggunakan format WebP responsif dengan atribut `fetchpriority="high"`.

---

### TCK-005: Homepage: School Intro & Educational Values (4 Pilar)
- **Epic:** EPIC-2 (Homepage)
- **Prioritas:** P0 | **Estimasi:** 3 Story Points | **Agent:** `agent-frontend`
- **Deskripsi:** Mengimplementasikan Section 6.3 (Intro Ringkas Sekolah + CTA ke Profil Lengkap) dan Section 6.4 (Nilai Pendidikan: Ilmu, Adab, Ibadah, Kemandirian) dalam grid 4 kolom di desktop dan 2 kolom di mobile.
- **Acceptance Criteria:**
  - [ ] Kartu nilai memiliki visual bersahaja, kartu berlatar putih dengan border halus.
  - [ ] Penjelasan nilai lugas, berfokus pada adab dan akhlak santri/siswa.
  - [ ] Spacing konsisten dengan 8pt grid system.

---

### TCK-006: Homepage: Education Programs & Featured Programs
- **Epic:** EPIC-2 (Homepage)
- **Prioritas:** P0 | **Estimasi:** 5 Story Points | **Agent:** `agent-frontend`
- **Deskripsi:** Mengimplementasikan Section 6.5 (Pilar Pendidikan: Akademik, Keislaman, Karakter, Keterampilan) dan Section 6.6 (3–5 Program Unggulan: misal Tahfidz Al-Qur'an, Islamic Character, Leadership, Digital Learning).
- **Acceptance Criteria:**
  - [ ] Data program ditarik dari repository data tanpa hard-coded markup.
  - [ ] Kartu program unggulan menampilkan badge kategori dan deskripsi ringkas capaian.
  - [ ] Tautan kartu mengarah ke detail sub-halaman `/pendidikan`.

---

### TCK-007: Homepage: Student Life & Showcase Teaser Grid
- **Epic:** EPIC-2 (Homepage)
- **Prioritas:** P1 | **Estimasi:** 5 Story Points | **Agent:** `agent-frontend`
- **Deskripsi:** Mengembangkan Section 6.7 (Student Life: dokumentasi kehidupan nyata pembelajaran, ibadah, olahraga, sosial) dan Section 6.8 (Showcase Teaser: menampilkan 3-6 karya/proyek terpilih siswa dengan CTA "Lihat Semua Karya").
- **Acceptance Criteria:**
  - [ ] Rasio aspek gambar kartu seragam (16:9 atau 4:3).
  - [ ] Kartu showcase teaser memuat nama depan siswa/tim, kelas, dan kategori.
  - [ ] Terdapat link langsung ke halaman penuh `/showcase`.

---

### TCK-008: Homepage: Achievements, News Updates & PPDB Banner
- **Epic:** EPIC-2 (Homepage)
- **Prioritas:** P0 | **Estimasi:** 5 Story Points | **Agent:** `agent-frontend`
- **Deskripsi:** Menyelesaikan 3 section terakhir homepage:
  - Section 6.9: Achievements (Ringkasan prestasi kompetisi).
  - Section 6.10: News / Updates (3–4 artikel berita terbaru).
  - Section 6.11: PPDB High-Contrast Banner CTA (hanya muncul saat PPDB berstatus `active`).
- **Acceptance Criteria:**
  - [ ] Data prestasi menampilkan nama, kompetisi, tahun, dan tingkat (kota/provinsi/nasional).
  - [ ] Berita menampilkan thumbnail, kategori badge, tanggal rilis, dan ringkasan.
  - [ ] PPDB Banner otomatis hilang atau berubah status saat flag PPDB non-aktif.

---

### TCK-009: Halaman Institusional Tentang Kami (`/tentang`)
- **Epic:** EPIC-3 (Identity)
- **Prioritas:** P0 | **Estimasi:** 5 Story Points | **Agent:** `agent-frontend`
- **Deskripsi:** Membangun halaman institusi terpadu dengan navigasi internal:
  - Profil Singkat & Sejarah Pendirian Yayasan Bumi Ilmu.
  - Visi dan Misi Pendidikan Islam.
  - 4 Nilai Utama Pendidikan & Pendekatan Karakter.
  - Struktur Organisasi dan Dewan Pembina/Pendidik.
- **Acceptance Criteria:**
  - [ ] Teks ayat Al-Qur'an/Hadits ditampilkan dalam font Arab proporsional.
  - [ ] Profil dewan pendidik menampilkan nama, amanah/jabatan, dan foto formal.
  - [ ] Memuat nomor izin operasional/NPSN resmi yayasan.

---

### TCK-010: Halaman Program Pendidikan & Kurikulum (`/pendidikan`)
- **Epic:** EPIC-4 (Pendidikan)
- **Prioritas:** P0 | **Estimasi:** 5 Story Points | **Agent:** `agent-frontend`
- **Deskripsi:** Membuat halaman rincian program pendidikan:
  - Kurikulum Integrasi (Kurikulum Nasional + Muatan Lokal Keislaman).
  - Program Keislaman (Tahfidz, Tahsin bersanad, Bahasa Arab, Ibadah Praktis).
  - Program Unggulan dan Pembinaan Karakter Santri.
  - Daftar Ekstrakurikuler (Pramuka, Beladiri, Jurnalistik, Robotika/IT, Tilawah).
- **Acceptance Criteria:**
  - [ ] Informasi terstruktur dalam kartu berjarak lega (*generous whitespace*).
  - [ ] Penjelasan setiap ekstrakurikuler mencakup jadwal dan target pembinaan.

---

### TCK-011: Modul Kehidupan Pesantren & Santri Life (`/pesantren`)
- **Epic:** EPIC-5 (Pesantren)
- **Prioritas:** P1 | **Estimasi:** 5 Story Points | **Agent:** `agent-frontend`
- **Deskripsi:** Membangun modul khusus boarding/pesantren:
  - Filosofi Pendidikan Pesantren Yayasan Bumi Ilmu.
  - Jadwal Ritme Harian Santri (Subuh hingga Malam) dalam bentuk timeline.
  - Fasilitas Asrama, Masjid, dan Ruang Makan Santri.
  - Panduan Adab dan Tata Tertib Santri.
- **Acceptance Criteria:**
  - [ ] Jika `pesantren_enabled: false`, rute ini otomatis dinonaktifkan secara aman.
  - [ ] Timeline harian santri mudah dibaca di layar smartphone.
  - [ ] Menampilkan foto riil lingkungan asrama dan aktivitas santri.

---

### TCK-012: Hub Informasi PPDB Dinamis & Alur Pendaftaran (`/ppdb`)
- **Epic:** EPIC-6 (PPDB)
- **Prioritas:** P0 | **Estimasi:** 5 Story Points | **Agent:** `agent-content-data` + `agent-frontend`
- **Deskripsi:** Membangun halaman pusat informasi Penerimaan Peserta Didik Baru (PPDB):
  - Banner status dinamis (Tahun Ajaran aktif, misal 2026/2027).
  - Timeline gelombang pendaftaran (Gelombang 1, 2, Kuota).
  - Persyaratan berkas calon santri/siswa.
  - Alur pendaftaran 4 langkah (Daftar -> Observasi/Tes -> Pengumuman -> Daftar Ulang).
  - Estimasi rincian biaya transparan.
  - CTA Tombol Konsultasi via WhatsApp Resmi Panitia PPDB.
- **Acceptance Criteria:**
  - [ ] Mengambil data dari `ppdb_config.json` tanpa hard-code teks tahun di template.
  - [ ] Tombol WhatsApp mengarahkan ke link resmi `https://wa.me/...` dengan pesan template salam dan pertanyaan pendaftaran.
  - [ ] Terdapat FAQ pendaftaran yang menjawab pertanyaan calon wali murid.

---

### TCK-013: Halaman Student Showcase Interaktif dengan Filter & Media Facade
- **Epic:** EPIC-7 (Showcase)
- **Prioritas:** P1 | **Estimasi:** 5 Story Points | **Agent:** `agent-frontend`
- **Deskripsi:** Membangun halaman galeri karya & aktivitas murid (`/showcase`):
  - Filter kategori: All, Learning, Islamic, Creativity, Sports, Events, Achievement, Student Projects.
  - Tampilan grid responsif (1 kolom mobile, 2 kolom tablet, 3 kolom desktop).
  - Komponen Facade: thumbnail ringan untuk konten video/tautan luar; tidak me-load iframe berat sebelum diklik.
- **Acceptance Criteria:**
  - [ ] Filter bekerja secara instant berbasis state/URL parameter tanpa reload penuh.
  - [ ] Skor performa halaman tetap >90 meski memuat belasan item karya.
  - [ ] Kartu karya memuat nama siswa (nama depan), tingkatan kelas, dan ringkasan karya.

---

### TCK-014: Student Safety & Privacy Consent Validation Gate
- **Epic:** EPIC-7 (Showcase & Privacy)
- **Prioritas:** P0 | **Estimasi:** 3 Story Points | **Agent:** `agent-editorial-safety`
- **Deskripsi:** Menerapkan guardrail keselamatan siswa sesuai PRD Bab 17:
  - Menyaring item showcase agar hanya yang memiliki `privacy_consent_verified: true` dan `status: "published"` yang ditampilkan.
  - Sanitasi otomatis: strip nomor telepon, alamat rumah, atau data medis dari payload JSON publik.
  - Menyediakan disclaimer perlindungan privasi santri/siswa di bagian bawah galeri.
- **Acceptance Criteria:**
  - [ ] Test assertion memverifikasi bahwa item dengan `privacy_consent_verified: false` tidak pernah dirender ke HTML.
  - [ ] Tidak ada data sensitif (PII) yang bocor di markup publik.

---

### TCK-015: Modul Berita, Detail Artikel & Kalender Agenda (`/kegiatan`)
- **Epic:** EPIC-8 (Kegiatan)
- **Prioritas:** P1 | **Estimasi:** 5 Story Points | **Agent:** `agent-content-data` + `agent-frontend`
- **Deskripsi:** Membangun sistem publikasi kegiatan sekolah:
  - Indeks Berita dengan kategori, thumbnail, dan tanggal.
  - Halaman Detail Berita (`/kegiatan/berita/[slug]`) dengan tipografi artikel yang nyaman dibaca, cover foto, dan navigasi kembali.
  - Kalender/Daftar Agenda kegiatan publik mendatang (tanggal, waktu, lokasi, deskripsi).
- **Acceptance Criteria:**
  - [ ] Artikel berformat Markdown dapat dirender dengan semantic HTML (`article`, `header`, `p`).
  - [ ] Agenda masa lampau otomatis terarsipkan atau ditandai selesai.

---

### TCK-016: Halaman Rekapitulasi Prestasi & Galeri Foto
- **Epic:** EPIC-8 (Kegiatan)
- **Prioritas:** P1 | **Estimasi:** 3 Story Points | **Agent:** `agent-frontend`
- **Deskripsi:** Menghadirkan arsip prestasi santri/siswa (lomba tahfidz, sains, bahasa, olahraga) dengan filter tahun dan tingkat (kecamatan, kota, provinsi, nasional, internasional), serta galeri dokumentasi foto kegiatan sekolah yang terorganisir.
- **Acceptance Criteria:**
  - [ ] Prestasi tersusun rapi dengan badge tingkat kejuaraan.
  - [ ] Galeri foto dilengkapi atribut alt deskriptif dan lightbox sederhana tanpa animasi berat.

---

### TCK-017: Halaman Kontak, Peta Lokasi Facade & Kanal WhatsApp
- **Epic:** EPIC-9 (Kontak)
- **Prioritas:** P0 | **Estimasi:** 3 Story Points | **Agent:** `agent-frontend`
- **Deskripsi:** Membangun halaman kontak resmi institusi:
  - Alamat lengkap kampus sekolah/yayasan, kode pos, dan jam operasional kantor.
  - Preview Peta Google Maps berupa gambar statis beresolusi optimal dengan tombol "Buka di Google Maps" (mencegah beban 1MB+ script Google Maps).
  - Tautan kontak resmi: WhatsApp CS/Pendaftaran, Email domain sekolah, Akun Instagram, Kanal YouTube.
- **Acceptance Criteria:**
  - [ ] Google Maps Facade tidak memuat script eksternal saat page load awal.
  - [ ] Tautan email menggunakan format `mailto:`, telepon `tel:`, dan WhatsApp `https://wa.me/...`.

---

### TCK-018: Optimasi Performa, Image Pipeline (WebP) & Core Web Vitals
- **Epic:** EPIC-10 (Quality & Performance)
- **Prioritas:** P0 | **Estimasi:** 5 Story Points | **Agent:** `agent-qa-perf`
- **Deskripsi:** Mengoptimalkan seluruh aset gambar dan skrip untuk mencapai performa tinggi:
  - Konversi dan kompresi gambar ke WebP/AVIF.
  - Pemasangan atribut `loading="lazy"`, `decoding="async"`, `width`, dan `height` pada seluruh gambar di bawah viewport awal.
  - Optimasi CSS bundle (purging unused CSS) dan peniadaan dependensi JS yang tidak diperlukan.
- **Acceptance Criteria:**
  - [ ] Skor Lighthouse Performance >= 90 pada mobile emulation.
  - [ ] CLS (Cumulative Layout Shift) = 0.00.
  - [ ] LCP (Largest Contentful Paint) < 2.0s di jaringan seluler 4G.

---

### TCK-019: SEO Engine, OpenGraph, Sitemap & Schema JSON-LD
- **Epic:** EPIC-10 (SEO & Metadata)
- **Prioritas:** P0 | **Estimasi:** 3 Story Points | **Agent:** `agent-architect`
- **Deskripsi:** Mengimplementasikan spesifikasi SEO Bab 15 PRD:
  - Meta tags dinamis: `title` unik, `meta description`, canonical URL.
  - Open Graph tags (`og:title`, `og:image`, `og:description`) dan Twitter Card untuk pratinjau tautan media sosial.
  - File generator `sitemap.xml` dan `robots.txt`.
  - Schema Structured Data JSON-LD (`EducationalOrganization` dan `School`).
- **Acceptance Criteria:**
  - [ ] Validasi schema JSON-LD lulus uji Google Rich Results Test.
  - [ ] Metadata Open Graph menampilkan gambar pratinjau resmi saat tautan dibagikan ke WhatsApp.
  - [ ] Sitemap mencantumkan seluruh rute publik yang berstatus aktif.
