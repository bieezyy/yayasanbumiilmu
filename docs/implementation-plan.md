# Implementation Plan — Website SMP / Pesantren Islami
**Document Version:** 1.0.0  
**Target System:** Website Yayasan Bumi Ilmu (SMP & Pesantren)  
**Reference Document:** `docs/prd.md.md` (Bab 19, 22, 28)

---

## 1. Development Philosophy & Phased Strategy

Mengacu pada PRD Bab 28 (*Development Philosophy*), pendekatan pengembangan dilakukan secara iteratif dan bertahap:

```text
Define ──► Design ──► Build ──► Test ──► Publish ──► Observe ──► Improve
```

Implementasi dibagi menjadi **5 Fase Eksekusi** yang logis untuk memastikan rilis awal (MVP) dapat segera diuji dan dimanfaatkan oleh sekolah, tanpa mengorbankan kualitas maupun keselamatan privasi siswa.

---

## 2. Master Phase Timeline & Roadmap

```text
┌────────────────────────────────────────────────────────────────────────┐
│ FASE 0: Inception, Design Tokens & Project Foundation                  │
│ [Durasi: Sprint 1] ── TCK-001, TCK-002                                 │
├────────────────────────────────────────────────────────────────────────┤
│ FASE 1: Core Layout, 12 Homepage Sections & Institutional Hub (P0)     │
│ [Durasi: Sprint 2] ── TCK-003, TCK-004, TCK-005, TCK-006, TCK-008,    │
│                       TCK-009, TCK-010, TCK-017                        │
├────────────────────────────────────────────────────────────────────────┤
│ FASE 2: Admissions (PPDB Dinamis) & Modul Pesantren (P0/P1)            │
│ [Durasi: Sprint 3] ── TCK-011, TCK-012                                 │
├────────────────────────────────────────────────────────────────────────┤
│ FASE 3: Student Showcase, News, Agenda & Student Safety Guard (P1)     │
│ [Durasi: Sprint 4] ── TCK-007, TCK-013, TCK-014, TCK-015, TCK-016     │
├────────────────────────────────────────────────────────────────────────┤
│ FASE 4: SEO, Performance Hardening, Accessibility & Launch Readiness   │
│ [Durasi: Sprint 5] ── TCK-018, TCK-019, Audit Akhir & Deployment       │
└────────────────────────────────────────────────────────────────────────┘
```

---

## 3. Phase Breakdown & Execution Milestones

### Fase 0: Inception, Design Tokens & Project Foundation
- **Fokus Utama:** Persiapan arsitektur dasar, sistem styling, dan pemodelan data decoupled.
- **Tiket:** `TCK-001`, `TCK-002`.
- **Langkah-langkah:**
  1. Setup struktur repository dan konfigurasi build modern (Astro/Next.js/Tailwind).
  2. Injeksi token desain (Deep Islamic Green `#134E4A`, Warm Gold `#D97706`, Charcoal `#1E293B`, Off-white `#F8FAFC`).
  3. Konfigurasi font lokal (`Plus Jakarta Sans` dan `Amiri` untuk teks Arab).
  4. Penyusunan struktur flat-file JSON/Markdown di direktori data (`/src/content/` atau `/data/`).
- **Milestone 0 DoD (Definition of Done):**
  - Token CSS dan variabel typography terverifikasi.
  - Mock data untuk profil sekolah dan status PPDB berhasil dibaca oleh sistem tanpa error.

---

### Fase 1: Core Layout, 12 Homepage Sections & Institutional Hub (P0 Baseline)
- **Fokus Utama:** Peluncuran wajah utama sekolah dan informasi institusional dasar yang berwibawa.
- **Tiket:** `TCK-003`, `TCK-004`, `TCK-005`, `TCK-006`, `TCK-008`, `TCK-009`, `TCK-010`, `TCK-017`.
- **Langkah-langkah:**
  1. Membangun Navigation Header responsif (desktop bar & mobile drawer) dan Footer institusi (`TCK-003`).
  2. Membangun 12 section modular di Homepage (`TCK-004`, `TCK-005`, `TCK-006`, `TCK-008`):
     - Hero Section (tanpa carousel otomatis, foto autentik sekolah, CTA ganda).
     - School Introduction & 4 Educational Values.
     - Education Programs & Featured Programs.
     - Achievements summary & News updates preview.
     - PPDB dynamic banner.
  3. Membangun Halaman Tentang Kami (`/tentang`) mencakup Visi Misi, Sejarah, dan Struktur Organisasi (`TCK-009`).
  4. Membangun Halaman Program Pendidikan (`/pendidikan`) mencakup Kurikulum dan Ekstrakurikuler (`TCK-010`).
  5. Membangun Halaman Kontak (`/kontak`) dengan Facade Google Maps dan tautan WhatsApp resmi (`TCK-017`).
- **Milestone 1 DoD:**
  - Calon wali murid dapat memahami profil sekolah, program pendidikan, dan lokasi sekolah secara menyeluruh di desktop dan mobile.

---

### Fase 2: Admissions (PPDB Dinamis) & Modul Pesantren (P0 & P1)
- **Fokus Utama:** Pusat informasi pendaftaran murid baru dan modul kepesantrenan fleksibel.
- **Tiket:** `TCK-011`, `TCK-012`.
- **Langkah-langkah:**
  1. Mengembangkan halaman PPDB interaktif (`/ppdb`):
     - Membaca tahun ajaran dan status periode dari file konfigurasi.
     - Menyajikan alur pendaftaran 4 langkah, syarat administrasi, dan simulasi biaya transparan.
     - Menghubungkan CTA konsultasi langsung ke WhatsApp panitia PPDB dengan teks pembuka otomatis.
  2. Mengembangkan modul asrama pesantren (`/pesantren`):
     - Jadwal ritme 24 jam santri (timeline visual).
     - Fasilitas asrama dan panduan adab santri.
     - Memverifikasi mekanisme toggle `modules.pesantren_enabled` bekerja sempurna.
- **Milestone 2 DoD:**
  - Kampanye pendaftaran siswa baru dapat dijalankan dengan tautan PPDB resmi dan nomor panitia terverifikasi.

---

### Fase 3: Student Showcase, News, Agenda & Student Safety Guard (P1)
- **Fokus Utama:** Memperlihatkan kehidupan nyata dan karya santri/murid dengan proteksi privasi ketat.
- **Tiket:** `TCK-007`, `TCK-013`, `TCK-014`, `TCK-015`, `TCK-016`.
- **Langkah-langkah:**
  1. Membangun Halaman Student Showcase (`/showcase`):
     - Filter instan kategori (Learning, Islamic, Creativity, Sports, Events, Achievement, Student Projects).
     - Komponen media facade (ringan, tidak membebani halaman).
  2. Mengintegrasikan Gate Validasi Keselamatan Siswa (`TCK-014`):
     - Filter otomatis: menyaring item tanpa flag persetujuan wali murid.
     - Mencegah kebocoran nomor pribadi atau data identitas sensitif.
  3. Membangun modul Berita, Detail Artikel Markdown, dan Kalender Agenda Kegiatan (`TCK-015`, `TCK-016`).
- **Milestone 3 DoD:**
  - Karya dan aktivitas siswa tersaji secara autentik, aman, dan dapat dibagikan ke media sosial dengan pratinjau yang rapi.

---

### Fase 4: SEO, Performance Hardening, Accessibility & Launch Readiness
- **Fokus Utama:** Pengujian menyeluruh, audit kepatuhan, optimasi kecepatan, dan kesiapan rilis produksi.
- **Tiket:** `TCK-018`, `TCK-019`, dan Checklist Penerimaan PRD Bab 25.
- **Langkah-langkah:**
  1. Kompresi seluruh aset visual ke format WebP/AVIF dengan penataan `srcset` responsif.
  2. Audit aksesibilitas WCAG 2.1 AA (kontras rasio, fokus keyboard, screen reader tags, `prefers-reduced-motion`).
  3. Pembuatan sitemap.xml otomatis, robots.txt, dan penambahan JSON-LD `EducationalOrganization`.
  4. Stress test kecepatan di jaringan 3G/4G simulasi mobile.
  5. Konfigurasi web server hosting (Apache/XAMPP atau Edge hosting) dengan header keamanan (CSP, HSTS, X-Content-Type).
- **Milestone 4 DoD (Production Release):**
  - Seluruh 13 butir Acceptance Criteria PRD Bab 25 terpenuhi 100%.
  - Skor Lighthouse: Performance >= 90, Accessibility >= 95, Best Practices >= 90, SEO >= 95.

---

## 4. Risk Mitigation & Contingency Strategy

| Risiko Potensial | Dampak | Strategi Mitigasi Terencana |
|---|---|---|
| **Embed Instagram/YouTube lambat atau terblokir** | Tinggi | Gunakan komponen Facade: load gambar cover lokal statis + tautan langsung ke aplikasi terkait. |
| **Foto siswa diunggah tanpa izin wali murid** | Kritis | Terapkan validasi `privacy_consent_verified === true` di level adapter data sebelum data sampai ke view. |
| **Perubahan tahun ajaran / biaya PPDB mendadak** | Sedang | Pisahkan seluruh teks temporal ke file JSON terpusat (`ppdb_config.json`); non-developer staf dapat mengubahnya dalam 1 menit. |
| **Sekolah belum memutuskan membuka asrama/pesantren** | Sedang | Buat modul Pesantren bersifat modular dengan toggle on/off global (`pesantren_enabled: false`). |
| **Server lokal sekolah/yayasan memiliki spek terbatas** | Sedang | Gunakan arsitektur static-first pre-rendered; server hanya melayani file statis HTML/CSS/WebP super ringan. |

---

## 5. Definition of Done (DoD) & Acceptance Sign-off

Sebuah tiket atau fase hanya dinyatakan selesai (*DONE*) jika:
1. Memenuhi seluruh Acceptance Criteria spesifik pada tiket bersangkutan di `docs/tickets.md`.
2. Telah melalui checklist `docs/code-review.md` tanpa ada temuan berstatus *Critical* atau *High*.
3. Tidak memunculkan error linting atau kegagalan build statis.
4. Tampilan terverifikasi responsif pada 3 ukuran layar: Mobile (375px), Tablet (768px), dan Desktop (1280px).
5. Data teks dan gambar terpisah dari kode komponen tampilan.
