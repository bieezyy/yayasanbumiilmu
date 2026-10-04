# Code Review Guidelines & Quality Checklist — Website SMP / Pesantren Islami
**Document Version:** 1.0.0  
**Target System:** Website Yayasan Bumi Ilmu (SMP & Pesantren)  
**Reference Documents:** `docs/prd.md.md`, `docs/architecture.md`, `docs/design-system.md`

---

## 1. Review Philosophy & Objectives

Proses peninjauan kode (*code review*) bertujuan untuk memastikan setiap baris kode yang masuk ke dalam repositori:
1. **Mematuhi 7 Prinsip Inti PRD:** Menjaga kesederhanaan, keterbacaan (*content first*), minim distraksi, fleksibel, dan autentik.
2. **Menegakkan Keselamatan Siswa (PRD Bab 17):** Perlindungan data pribadi anak (PII) tidak boleh dinegosiasikan.
3. **Mencegah Anti-Pattern:** Menolak *hard-coded* tahun ajaran, carousel berlebihan, animasi mengganggu, atau pembengkakan fitur di luar cakupan (*scope creep* seperti LMS/portal nilai).
4. **Menjaga Standar Aksesibilitas (WCAG 2.1 AA) & Performa Tinggi:** Memastikan website cepat dimuat di jaringan seluler dan ramah bagi semua pengguna.

---

## 2. Review Severity Classification

Setiap temuan dalam tinjauan kode wajib dikategorikan menggunakan level keparahan berikut:

| Tingkat Keparahan | Deskripsi | Aksi yang Diperlukan |
|---|---|---|
| **CRITICAL (Blocker)** | Kebocoran data pribadi siswa (PII), foto siswa tanpa consent, kegagalan build, atau pelanggaran keamanan serius. | **Wajib diperbaiki segera.** PR otomatis di-reject / tidak boleh di-merge. |
| **HIGH (Must Fix)** | Hard-coding string temporal (tahun ajaran PPDB), pelanggaran WCAG 2.1 AA (kontras buruk, tombol tanpa label ARIA, gambar tanpa alt), performa drop (CLS > 0.1, gambar uncompressed). | **Wajib diperbaiki** sebelum branch dapat di-merge. |
| **MEDIUM (Should Fix)** | Inkonsistensi token design system (misal: warna hex acak alih-alih CSS variable), struktur komponen kurang modular, kurangnya penanganan fallback embed pihak ketiga. | Dianjurkan diperbaiki pada siklus review berjalan. |
| **LOW (Nitpick / Suggestion)** | Penamaan variabel, formatting kode minor, saran penulisan dokumentasi atau komentar arsitektur. | Bersifat opsional, tidak memblokir merge. |

---

## 3. The 6-Pillar Review Checklist

Setiap reviewer (manusia maupun AI Agent) wajib memverifikasi kode terhadap 6 pilar berikut:

### Pilar 1: Kepatuhan PRD & Anti-Pattern Guard
- [ ] **Bebas Carousel Hero:** Hero section tidak menggunakan slider otomatis (PRD Bab 6.2).
- [ ] **Bebas Autoplay Audio/Video:** Tidak ada video atau audio yang berputar otomatis dengan suara (PRD Bab 12).
- [ ] **Bebas Animasi Berlebih:** Tidak ada efek melayang, parallax berat, atau gradasi warna menyilaukan (PRD Bab 12).
- [ ] **Tidak Ada Fitur Non-Goals:** Tidak menyisipkan sistem ujian online, input nilai raport, atau portal internal kompleks (PRD Bab 21).
- [ ] **Modular & Fleksibel:** Section atau halaman dapat diaktifkan/dinonaktifkan tanpa merusak halaman lain (misal: `modules.pesantren_enabled`).

### Pilar 2: Perlindungan Privasi & Keselamatan Siswa (Student Safety Audit)
- [ ] **Verifikasi Consent Publikasi:** Item Student Showcase atau dokumentasi foto memverifikasi flag `privacy_consent_verified === true` sebelum dirender.
- [ ] **Tidak Ada PII Siswa:** Tidak ada nomor WhatsApp pribadi siswa, alamat rumah siswa, atau rekam medis yang terekspos di markup HTML maupun payload JSON publik.
- [ ] **Identitas Siswa Aman:** Penamaan siswa dibatasi pada nama depan atau nama tim kegiatan dan tingkatan kelas (misal: "Ahmad - Kelas 8").

### Pilar 3: Integritas Data & Dynamic Content Rules
- [ ] **Bebas Hard-coded Tahun Ajaran:** String seperti `"PPDB 2026/2027"` tidak diketik permanen dalam file komponen. Wajib dibaca dari `academic_year` di data configuration.
- [ ] **Status PPDB Dinamis:** Komponen banner pendaftaran menangani status `'active'`, `'inactive'`, dan `'scheduled'` secara terpisah dengan fallback ramah.
- [ ] **Pemisahan Data & Tampilan:** Konten artikel, program, prestasi, dan galeri dipisahkan ke dalam repository data terstruktur (JSON/Markdown), bukan disematkan langsung di dalam template JSX/HTML.

### Pilar 4: Aksesibilitas (WCAG 2.1 AA) & Semantik HTML
- [ ] **Hierarki Heading Teratur:** Halaman memiliki tepat 1 tag `<h1>`, diikuti `<h2>` untuk section utama, dan `<h3>` untuk kartu/sub-bagian. Tidak ada tingkatan heading yang dilompati.
- [ ] **Target Sentuh Responsif:** Semua tombol dan link interaktif pada layar sentuh mobile berukuran minimal `44px × 44px`.
- [ ] **Teks Alternatif Gambar (Alt Text):** Seluruh elemen `<img>` memiliki atribut `alt` yang bermakna deskriptif (misal: "Santri SMP Yayasan Bumi Ilmu sedang menyimak setoran hafalan Al-Qur'an"). Hindari alt kosong atau generik seperti "image".
- [ ] **State Fokus Terlihat:** Elemen interaktif memiliki indikator fokus keyboard yang jelas (`:focus-visible`).
- [ ] **Kepatuhan Kontras:** Teks utama memiliki rasio kontras minimal 4.5:1 terhadap background (menggunakan Charcoal `#1E293B` di atas Off-white `#F8FAFC`).

### Pilar 5: Performa Web Vitals & Optimasi Aset
- [ ] **Format Gambar Modern:** Gambar menggunakan format WebP atau AVIF dengan kompresi optimal.
- [ ] **Pencegahan CLS (Layout Shift):** Elemen gambar dan container media selalu mencantumkan atribut `width` dan `height` eksplisit atau CSS aspect-ratio.
- [ ] **Lazy Loading:** Gambar di bawah viewport pertama memiliki atribut `loading="lazy"` dan `decoding="async"`. Gambar Hero di viewport atas menggunakan `fetchpriority="high"`.
- [ ] **Facade untuk Pihak Ketiga:** Integrasi Google Maps, YouTube, atau feed Instagram dibungkus dalam komponen facade (thumbnail statis lokal lebih dulu; iframe hanya dipicu saat pengguna berinteraksi). Tidak ada pembebanan script berat di awal muat halaman.

### Pilar 6: Design Tokens & Konsistensi UI
- [ ] **Penggunaan Token Resmi:** Warna menggunakan token CSS / kelas Tailwind yang telah ditetapkan (`--color-primary-700`, `--color-accent-500`, `--color-surface-bg`). Tidak ada penulisan kode warna hex sembarangan di style inline.
- [ ] **Konsistensi Spacing 8pt Grid:** Margin dan padding mengikuti skala baku (8px, 16px, 24px, 32px, 48px, 64px, 96px).
- [ ] **Dukungan prefers-reduced-motion:** Transisi halus otomatis dinonaktifkan atau disederhanakan bagi pengguna dengan konfigurasi pengurangan gerak.

---

## 4. Pull Request (PR) Submission Template

Setiap kontributor atau agent yang mengajukan perubahan wajib mengisi template PR berikut:

```markdown
### Ringkasan Perubahan
<!-- Jelaskan secara ringkas masalah apa yang diselesaikan dan apa dampaknya bagi pengguna -->

### Referensi Tiket & PRD
- Tiket: TCK-xxx
- PRD Section: [misal: Bab 6.8 Student Showcase / Bab 17 Privacy]

### Checklist Verifikasi Mandiri
- [ ] Tidak ada hard-coded tahun ajaran atau status PPDB.
- [ ] Privasi siswa terverifikasi (tidak ada data pribadi / PII anak yang bocor).
- [ ] Semua gambar memiliki alt text dan atribut width/height.
- [ ] Komponen pihak ketiga menggunakan facade (bebas SPOF).
- [ ] Responsif telah diuji di tampilan Mobile (375px) dan Desktop (1280px).
- [ ] Lighthouse score tetap stabil (Performance >= 90, Accessibility >= 95).
```
