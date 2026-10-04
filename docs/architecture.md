# Architecture Specification — Website SMP / Pesantren Islami
**Document Version:** 1.0.0  
**Target System:** Website Yayasan Bumi Ilmu (SMP & Pesantren)  
**Reference Document:** `docs/prd.md.md`

---

## 1. Architectural Vision & Principles

Sesuai dengan PRD Bab 1, 2, dan 3, arsitektur sistem dirancang dengan prinsip:
1. **Content First & Decoupled Data:** Konten terpisah dari tata letak (presentation layer). Perubahan data (tahun ajaran, PPDB, nama program) tidak memerlukan kompilasi ulang kode atau perombakan markup.
2. **Modular & Component-Driven:** Setiap section di Homepage dan sub-halaman merupakan komponen independen yang dapat diaktifkan, dinonaktifkan (*feature toggling*), atau diatur ulang urutannya.
3. **Resilience & Graceful Degradation:** Integrasi eksternal (Instagram feed, YouTube embed, Google Maps) tidak boleh menjadi *Single Point of Failure (SPOF)*. Jika pihak ketiga down, komponen fallback (kartu pratinjau statis + tautan langsung) otomatis aktif.
4. **Performance by Default:** Minimalisir JavaScript runtime, maksimalkan Static Site Generation (SSG) / pre-rendering, optimasi gambar (WebP/AVIF), dan Core Web Vitals kelas satu.
5. **No Premature Complexity:** Menghindari sistem monolitik berat atau fitur di luar cakupan (LMS, portal nilai, ERP) sesuai PRD Bab 21 (*Non-Goals*).

---

## 2. High-Level Architecture Diagram

```text
┌────────────────────────────────────────────────────────────────────────┐
│                          PRESENTATION LAYER                            │
│  [Responsive Layout: Mobile-First / Tablet / Desktop / Large Screen]   │
│  ┌───────────────────────┐  ┌───────────────────┐  ┌─────────────────┐ │
│  │ Navigation & Header   │  │ Modular Sections  │  │ Footer & CTA    │ │
│  └───────────────────────┘  └───────────────────┘  └─────────────────┘ │
└────────────────────────────────────▲───────────────────────────────────┘
                                     │
┌────────────────────────────────────┴───────────────────────────────────┐
│                        DATA & COMPONENT ADAPTER                        │
│  - Feature Toggles (PPDB Active, Pesantren Module, Showcase Filters)   │
│  - SEO Engine & OpenGraph Generator                                    │
│  - Media & Embed Safe Fallback Handler                                 │
└────────────────────────────────────▲───────────────────────────────────┘
                                     │
┌────────────────────────────────────┴───────────────────────────────────┐
│                           CONTENT REPOSITORY                           │
│  ┌───────────────────────┐  ┌───────────────────┐  ┌─────────────────┐ │
│  │ Structured Data/JSON  │  │ Markdown/Articles │  │ Asset Storage   │ │
│  │ (Settings, Programs,  │  │ (News, Events,    │  │ (Optimized WebP,│ │
│  │  PPDB, Profile)       │  │  Showcase)        │  │  Consent-Checked│ │
│  └───────────────────────┘  └───────────────────┘  └─────────────────┘ │
│                                    ▲                                   │
│                        (Optional CMS Admin / API)                      │
└────────────────────────────────────────────────────────────────────────┘
```

---

## 3. Technology Stack & Runtime Strategy

| Layer | Rekomendasi Teknologi | Alasan Pemilihan |
|---|---|---|
| **Frontend Framework** | Modern SSG / SSR (Astro / Next.js / Nuxt / Tailwind CSS) | Kinerja rendering statis instan, zero-JS by default untuk konten statis, modularitas komponen tinggi. |
| **Styling & Design Tokens** | Tailwind CSS + CSS Custom Properties | Konsistensi design system (warna, tipografi, spacing) dan kemudahan kustomisasi tema institusi. |
| **Content Store (MVP)** | Flat-file Structured Content (JSON / YAML / Markdown Frontmatter) | Tidak memerlukan database rumit di awal, mudah di-version control, bebas biaya lisensi, pembaruan instan. |
| **Content Store (Future/CMS)** | Headless CMS / Lightweight Admin Panel (Prisma/SQLite atau Strapi/Decap) | Dapat dicolokkan ke adapter data tanpa merusak antarmuka publik yang sudah ada. |
| **Asset Pipeline** | Sharp / Squoosh / Built-in Image Optimization | Kompresi otomatis gambar ke WebP/AVIF, pembuatan `srcset` responsif, dan lazy loading native. |
| **Hosting Environment** | Multi-environment: Static Web Server (Apache/XAMPP, Nginx, atau Edge CDN) | Fleksibel untuk server lokal yayasan (XAMPP/Apache) maupun cloud deployment. |

---

## 4. Information Architecture & Routing Design

### 4.1 URL Hierarchy

| Route Path | View/Page | Sifat Konten | Toggle Key |
|---|---|---|---|
| `/` | Homepage (12 Modular Sections) | Dinamis gabungan | `always_on` |
| `/tentang` | Profil, Visi & Misi, Nilai, Struktur | Semi-statis | `always_on` |
| `/pendidikan` | Kurikulum, Program Keislaman, Ekstrakurikuler | Dinamis berbasis program | `always_on` |
| `/pesantren` | Program Asrama, Kehidupan Santri, Tata Tertib | Modular Pesantren | `modules.pesantren_enabled` |
| `/kegiatan` | Indeks Berita, Agenda, Prestasi, Galeri | Dinamis berkala | `always_on` |
| `/kegiatan/berita/[slug]` | Detail Berita Sekolah | Dinamis berkala | `always_on` |
| `/kegiatan/agenda` | Kalender Agenda Publik | Dinamis berkala | `always_on` |
| `/kegiatan/prestasi` | Rekapitulasi Prestasi Siswa | Dinamis berkala | `always_on` |
| `/showcase` | Student Showcase & Karya Kreatif | Dinamis berkala | `always_on` |
| `/ppdb` | Informasi, Syarat, Alur, Jadwal, Biaya PPDB | Dinamis per-periode | `always_on` |
| `/kontak` | Alamat, Peta, Kanal Resmi WhatsApp & Medsos | Semi-statis | `always_on` |

### 4.2 Dynamic Routing & Modular Rules
- **Pesantren Toggle (`modules.pesantren_enabled`):** Jika bernilai `false`, rute `/pesantren` dialihkan (301/302) ke `/tentang` atau mengembalikan 404 elegan, dan menu `Pesantren` otomatis hilang dari Header & Footer.
- **PPDB Dynamic Banner:** Banner PPDB pada Hero dan Section 6.11 hanya muncul jika `ppdb.status === "active"`. Jika `"inactive"`, CTA berubah menjadi "Pemberitahuan PPDB Mendatang" atau section disembunyikan.

---

## 5. Domain Entities & Data Modeling

Pemisahan data dari template mematuhi PRD Bab 8, 9, dan 10:

### 5.1 Entity Schemas

```typescript
// School Profile
interface SchoolProfile {
  id: string;
  name: string;
  tagline: string;
  npsn?: string;
  legal_foundation: string;
  vision: string;
  missions: string[];
  educational_values: Array<{
    title: string;
    description: string;
    icon_identifier?: string;
  }>;
  history_summary: string;
  leadership: Array<{
    name: string;
    role: string;
    photo_url: string;
  }>;
}

// Education Program
interface EducationProgram {
  id: string;
  slug: string;
  title: string;
  category: "akademik" | "keislaman" | "karakter" | "keterampilan";
  is_featured: boolean; // Menentukan muncul di section 6.6
  summary: string;
  full_description: string;
  cover_image: string;
  order: number;
}

// PPDB Configuration
interface PPDBConfig {
  academic_year: string; // misal: "2026/2027"
  status: "active" | "inactive" | "scheduled";
  headline: string;
  description: string;
  registration_start_date: string;
  registration_end_date: string;
  requirements: string[];
  steps: Array<{ step_number: number; title: string; detail: string }>;
  fees_summary?: string;
  external_registration_url?: string;
  contact_hotline: string;
}

// Student Showcase (PRD Section 7 & 17)
interface StudentShowcaseItem {
  id: string;
  title: string;
  category: "learning" | "islamic" | "creativity" | "sports" | "events" | "achievement" | "student_projects";
  summary: string;
  student_first_name_or_team: string; // PRD 17: Lindungi nama lengkap jika sensitif
  grade_level: string; // misal: "Kelas 8"
  media_type: "image" | "video_preview" | "external_link";
  media_url: string;
  aspect_ratio: string;
  published_at: string;
  status: "draft" | "published" | "archived";
  privacy_consent_verified: boolean; // Wajib true sebelum tampil
}

// News & Updates
interface NewsItem {
  id: string;
  slug: string;
  title: string;
  category: string;
  excerpt: string;
  body_markdown: string;
  cover_image: string;
  published_at: string;
  author: string;
  status: "draft" | "published" | "archived";
}

// Achievement
interface AchievementItem {
  id: string;
  title: string;
  student_or_team: string;
  competition_name: string;
  level: "kecamatan" | "kota_kabupaten" | "provinsi" | "nasional" | "internasional";
  year: number;
  badge_image?: string;
}
```

---

## 6. Homepage Section Architecture

Sesuai urutan terstruktur PRD Bab 6:
1. **Header / Navbar:** Sticky, logo resmi, link ringkas, tombol CTA PPDB dinamis.
2. **Hero:** Headline institusi, sub-deskripsi, Primary CTA (PPDB/Profil), visual sekolah nyata (tanpa carousel otomatis).
3. **School Introduction:** Pernyataan misi ringkas + foto utama kampus.
4. **Educational Values:** Grid 4 nilai utama (Ilmu, Adab, Ibadah, Kemandirian).
5. **Education Programs:** Kategorisasi program pendidikan (Akademik, Keislaman, Karakter, Keterampilan).
6. **Featured Programs:** 3–5 program unggulan unggulan (misal: Tahfidz, Islamic Character, Leadership).
7. **Student Life:** Dokumentasi autentik keseharian belajar siswa.
8. **Student Showcase:** Galeri karya, aktivitas, dan kreasi siswa dengan filter kategori.
9. **Achievements:** Kartu ringkas prestasi kompetisi siswa dan sekolah.
10. **News / School Updates:** 3–4 rilis kabar terbaru.
11. **PPDB Banner CTA:** Banner kontras tinggi untuk pendaftaran siswa baru (tergantung status buka/tutup).
12. **Footer:** Identitas yayasan, kontak legal, Google Maps preview, social links, hak cipta.

---

## 7. Performance & Optimization Architecture

1. **Asset Pipeline:**
   - Semua gambar disimpan dalam format kompresi modern (WebP/AVIF).
   - Dimensi gambar eksplisit (`width` dan `height`) wajib dicantumkan pada HTML untuk mencegah *Cumulative Layout Shift (CLS)*.
   - Pemuatan font menggunakan CSS `font-display: swap` dengan subset latin & arab lokal tanpa ketergantungan CDN eksternal yang lambat.
2. **Third-Party Script Isolation:**
   - Tidak ada script tracking pihak ketiga yang memblokir render halaman.
   - Embed YouTube/Instagram dibungkus dalam *Facade Component*: memuat thumbnail statis terlebih dahulu; iframe asli hanya di-load saat pengguna menekan tombol "Putar Video" atau "Buka Konten".

---

## 8. Security & Student Safety Architecture

1. **No Sensitive PII Exposure:**
   - Sistem publik tidak menyimpan atau menayangkan nomor WhatsApp siswa, alamat domisili pribadi siswa, maupun rekam medis/finansial.
2. **Content Moderation Gate:**
   - Semua item showcase dan dokumentasi visual memiliki flag boolean `privacy_consent_verified: true`.
3. **Transport & Headers:**
   - HTTPS enforced.
   - Standard Content Security Policy (CSP), X-Frame-Options: `SAMEORIGIN`, X-Content-Type-Options: `nosniff`.
