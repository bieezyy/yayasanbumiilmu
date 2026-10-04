# Design System — Website SMP / Pesantren Islami
**Document Version:** 1.0.0  
**Brand Identity:** Yayasan Bumi Ilmu (SMP & Pesantren)  
**Reference Document:** `docs/prd.md.md` (Bab 11, 12, 13, 14)

---

## 1. Visual Direction & Brand Personality

Desain antarmuka merefleksikan nilai-nilai institusi pendidikan Islam modern:
- **Tenang & Bersahaja:** Mengutamakan kelapangan (*generous whitespace*), warna yang menyejukkan, dan hierarki visual yang jelas.
- **Institusional & Profesional:** Struktur formal yang membangun rasa percaya orang tua dan masyarakat tanpa terasa kaku.
- **Minim Distraksi:** Tidak ada animasi melayang yang tidak perlu (*no parallax/heavy keyframes*), tanpa efek gradasi norak, dan tanpa ornamen kaligrafi/arabesque yang terlalu padat.
- **Autentik:** Mengandalkan fotografi kegiatan dan kehidupan nyata siswa/santri.

---

## 2. Color Palette & Design Tokens

Sistem warna dirancang dengan kontras tinggi (memenuhi kriteria WCAG 2.1 AA) dengan *Deep Islamic Green* sebagai jangkar identitas institusi dan *Warm Gold* sebagai aksen kehormatan/prestasi.

```text
┌─────────────────┐ ┌─────────────────┐ ┌─────────────────┐ ┌─────────────────┐
│   Deep Green    │ │    Warm Gold    │ │    Charcoal     │ │    Off-White    │
│     #134E4A     │ │     #D97706     │ │     #1E293B     │ │     #F8FAFC     │
│   (Primary)     │ │    (Accent)     │ │     (Text)      │ │  (Background)   │
└─────────────────┘ └─────────────────┘ └─────────────────┘ └─────────────────┘
```

### 2.1 Token Definitions

```css
:root {
  /* Brand Primary - Deep Green */
  --color-primary-50: #F0FDF4;
  --color-primary-100: #DCFCE7;
  --color-primary-500: #15803D;
  --color-primary-700: #134E4A; /* Primary Brand */
  --color-primary-900: #064E3B; /* Header/Footer Deep */

  /* Accent - Warm Gold / Amber */
  --color-accent-100: #FEF3C7;
  --color-accent-500: #D97706; /* Accent highlights & badges */
  --color-accent-700: #B45309;

  /* Neutrals & Charcoal Surface */
  --color-surface-bg: #F8FAFC;   /* Body Off-white background */
  --color-surface-card: #FFFFFF; /* Pure white card containers */
  --color-surface-muted: #F1F5F9;

  /* Typography / Text Colors */
  --color-text-main: #0F172A;      /* Charcoal heading & primary text (Ratio 12:1) */
  --color-text-muted: #475569;     /* Secondary / meta descriptions (Ratio 5.8:1) */
  --color-text-subtle: #64748B;    /* Captions & helper text */
  --color-text-inverted: #FFFFFF;  /* Text on dark backgrounds */

  /* Borders & Dividers */
  --color-border-subtle: #E2E8F0;
  --color-border-focus: #134E4A;

  /* Semantic Feedback */
  --color-success: #16A34A;
  --color-warning: #CA8A04;
  --color-info: #0284C7;
}
```

---

## 3. Typography Hierarchy

### 3.1 Font Family Selection
- **Primary Latin Font:** `Plus Jakarta Sans` atau `Inter` (Sans-serif modern, clean, mudah dibaca di mobile).
- **Secondary / Display Font (Opsional untuk Judul):** `Newsreader` atau `Cinzel` / `Merriweather` (memberikan sentuhan wibawa akademik formal).
- **Arabic Script Font (Kutipan Al-Qur'an / Hadits):** `Amiri` atau `Scheherazade New` dengan `line-height` memadai (minimal `1.8em`).

### 3.2 Type Scale

| Tingkat | Ukuran (Mobile) | Ukuran (Desktop) | Weight | Line Height | Penggunaan |
|---|---|---|---|---|---|
| **Display / Hero** | `32px` (2rem) | `48px` (3rem) | Bold (700) | `1.15` | Hero headline utama |
| **Heading 1 (H1)** | `28px` (1.75rem)| `36px` (2.25rem)| Bold (700) | `1.2` | Judul halaman utama |
| **Heading 2 (H2)** | `22px` (1.375rem)| `28px` (1.75rem)| Semi-Bold (600)| `1.3` | Judul section homepage |
| **Heading 3 (H3)** | `18px` (1.125rem)| `20px` (1.25rem)| Semi-Bold (600)| `1.4` | Judul kartu, sub-bagian |
| **Body Regular** | `16px` (1rem) | `16px` (1rem) | Regular (400) | `1.6` | Paragraf teks umum |
| **Body Medium** | `16px` (1rem) | `16px` (1rem) | Medium (500) | `1.6` | Lead paragraph, intro |
| **Small / Caption** | `14px` (0.875rem)| `14px` (0.875rem)| Regular (400) | `1.5` | Meta informasi, tanggal, label |
| **Arabic Quote** | `20px` (1.25rem)| `24px` (1.5rem) | Regular (400) | `1.8` | Teks Arab & arti |

---

## 4. Spacing, Grid & Elevation

### 4.1 8-Point Spacing Grid
- `space-1`: 4px (micro space, tag internal padding)
- `space-2`: 8px (icon gap, compact elements)
- `space-3`: 12px
- `space-4`: 16px (standard component padding)
- `space-6`: 24px (card padding)
- `space-8`: 32px (sub-section separation)
- `space-12`: 48px (section spacing on mobile)
- `space-16`: 64px (section spacing on tablet)
- `space-24`: 96px (generous section spacing on desktop)

### 4.2 Breakpoints (Mobile-First)
- **Mobile:** `< 640px` (single column, full width touch targets)
- **Tablet:** `640px - 1023px` (2-column grids)
- **Desktop:** `1024px - 1279px` (3/4-column grids, max-width container `1140px`)
- **Large Desktop:** `>= 1280px` (max-width container `1280px` centered with auto margins)

### 4.3 Restrained Shadows & Elevation
Menghindari drop shadow pekat/tebal.
- **Card Default:** `box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05); border: 1px solid var(--color-border-subtle);`
- **Card Hover:** `box-shadow: 0 4px 12px 0 rgba(19, 78, 74, 0.08); transform: translateY(-2px);`
- **Dropdown/Modal:** `box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);`

---

## 5. Core UI Component Specifications

### 5.1 Buttons & Touch Targets
Semua tombol memiliki area sentuh minimal `44px × 44px` di mobile.

- **Primary Button (Aksi Utama / PPDB):**
  - Background: `var(--color-primary-700)` (#134E4A)
  - Text: `#FFFFFF` (Semibold)
  - Hover: `var(--color-primary-900)` (#064E3B)
  - Padding: `12px 24px` | Border Radius: `8px`
- **Secondary Button (Pelajari Lebih Lanjut):**
  - Background: `transparent`
  - Border: `1px solid var(--color-primary-700)`
  - Text: `var(--color-primary-700)`
  - Hover: `var(--color-primary-50)`
- **Accent Button (PPDB Highlight):**
  - Background: `var(--color-accent-500)` (#D97706)
  - Text: `#FFFFFF`
  - Hover: `var(--color-accent-700)`

### 5.2 Cards (Restrained & Modular)
- Background putih murni dengan border tipis `1px solid var(--color-border-subtle)`.
- Radius sudut konsisten: `12px`.
- Padding internal: `24px` (desktop) atau `16px` (mobile).
- Tidak menggunakan sudut tajam berlebih atau gradasi latar kartu.

### 5.3 Badges & Category Tags
- Pill style (`border-radius: 9999px`).
- Padding: `4px 12px`, Font size: `12px` (uppercase/semibold).
- Variasi Kategori Showcase:
  - *Islamic:* Background hijau muda (`#DCFCE7`), Text hijau tua (`#166534`).
  - *Achievement:* Background kuning emas muda (`#FEF3C7`), Text amber tua (`#92400E`).
  - *Learning & Project:* Background biru muda (`#E0F2FE`), Text biru tua (`#075985`).

### 5.4 Navigation Bar (Header)
- Background putih dengan blur halus (`backdrop-filter: blur(8px); background: rgba(255,255,255,0.95);`).
- Tinggi: `72px`.
- Elemen: Logo institusi + Nama Yayasan/Sekolah di sisi kiri, menu navigasi ringkas di tengah, tombol CTA PPDB di sisi kanan.
- Mobile: Hamburger menu yang bersih dengan animasi slide-down lembut, tautan berjarak lega.

### 5.5 Student Showcase Grid & Filtering
- Filter horizontal yang dapat di-scroll di mobile (*horizontal scrollable chips*).
- Grid kartu karya: 1 kolom di mobile, 2 kolom di tablet, 3 kolom di desktop.
- Komponen pratinjau media memiliki rasio aspek terstandarisasi (`16:9` atau `4:3`) dengan lazy load dan teks alternatif deskriptif.

---

## 6. Accessibility & Motion Rules (WCAG 2.1 AA)

1. **Rasio Kontras Minimum:**
   - Semua teks utama memiliki rasio kontras terhadap background minimal `4.5:1` (teks utama mencapai `12:1`).
   - Elemen interaktif dan tombol memiliki rasio kontras minimal `3:1`.
2. **Focus Visible:**
   - State fokus keyboard wajib jelas: `outline: 2px solid var(--color-primary-700); outline-offset: 2px;`.
3. **Motion Sensitivity:**
   - Mendukung media query `@media (prefers-reduced-motion: reduce)`: nonaktifkan semua transisi posisi atau matikan animasi halus bagi pengguna dengan sensitivitas vestibular.
4. **Semantics:**
   - Struktur heading teratur (`h1` unik per halaman, diikuti `h2` untuk section, `h3` untuk sub-komponen).
   - Seluruh elemen gambar wajib memiliki atribut `alt` yang bermakna kontekstual.
