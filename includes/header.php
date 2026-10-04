<?php
require_once __DIR__ . '/functions.php';
$site = get_site_config();
$ppdb = get_ppdb_config();

$pageTitle = isset($pageTitle) ? $pageTitle . ' — ' . $site['site_name'] : $site['site_name'] . ' — ' . $site['tagline'];
$pageDesc = isset($pageDesc) ? $pageDesc : $site['tagline'] . ' di bawah naungan ' . $site['foundation_name'];
$currentPage = isset($currentPage) ? $currentPage : 'home';
$pesantrenEnabled = $site['modules']['pesantren_enabled'] ?? false;
$ppdbActive = ($ppdb['status'] ?? 'inactive') === 'active';
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>">
  <meta name="theme-color" content="#134E4A">

  <!-- Open Graph / Meta -->
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pageDesc) ?>">
  <meta property="og:type" content="website">

  <!-- Schema.org JSON-LD (PRD Bab 15 SEO) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "EducationalOrganization",
    "name": "<?= htmlspecialchars($site['site_name']) ?>",
    "description": "<?= htmlspecialchars($site['tagline']) ?>",
    "url": "https://bumiilmu.sch.id",
    "telephone": "<?= htmlspecialchars($site['contact']['phone']) ?>",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "<?= htmlspecialchars($site['contact']['address']) ?>",
      "addressCountry": "ID"
    }
  }
  </script>

  <!-- Google Fonts: Plus Jakarta Sans & Amiri -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Tailwind CSS via CDN with customized Design Tokens -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              50: '#F0FDF4',
              100: '#DCFCE7',
              500: '#15803D',
              700: '#134E4A',
              800: '#115E59',
              900: '#064E3B',
            },
            accent: {
              100: '#FEF3C7',
              500: '#D97706',
              700: '#B45309',
            },
            surface: {
              bg: '#F8FAFC',
              card: '#FFFFFF',
              muted: '#F1F5F9',
            },
            charcoal: {
              DEFAULT: '#1E293B',
              dark: '#0F172A',
            }
          },
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'system-ui', '-apple-system', 'sans-serif'],
            arabic: ['"Amiri"', 'serif'],
          }
        }
      }
    }
  </script>
  <style>
    body {
      background-color: #F8FAFC;
      color: #0F172A;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
    :focus-visible {
      outline: 2px solid #134E4A;
      outline-offset: 2px;
    }

    /* ========================================================
       MIKRO-ANIMASI SENTUHAN (TOUCH INTERACTIONS)
       Halus, responsif, elegan & tidak berlebihan
       ======================================================== */

    /* Animasi Ripple Saat Pengguna Menyentuh Layar */
    .touch-ripple-effect {
      position: fixed;
      width: 28px;
      height: 28px;
      margin-left: -14px;
      margin-top: -14px;
      border-radius: 50%;
      pointer-events: none;
      z-index: 99999;
      background: radial-gradient(circle, rgba(21, 128, 61, 0.35) 0%, rgba(19, 78, 74, 0.12) 45%, rgba(19, 78, 74, 0) 70%);
      box-shadow: 0 0 10px rgba(21, 128, 61, 0.3);
      border: 1.5px solid rgba(21, 128, 61, 0.45);
      animation: touchRippleAnim 0.45s cubic-bezier(0.12, 0.8, 0.32, 1) forwards;
      will-change: transform, opacity;
    }

    @keyframes touchRippleAnim {
      0% {
        transform: scale(0.35);
        opacity: 0.95;
      }
      50% {
        opacity: 0.55;
      }
      100% {
        transform: scale(3.2);
        opacity: 0;
      }
    }

    /* Hilangkan kotak highlight bawaan browser mobile */
    a, button, [role="button"], input, select, textarea, summary {
      -webkit-tap-highlight-color: transparent;
    }

    /* Efek pegas taktil untuk tombol & elemen interaktif saat ditekan/disentuh */
    button:not(:disabled),
    a.inline-flex,
    a[class*="rounded-lg"],
    a[class*="rounded-xl"],
    a[class*="rounded-full"],
    a[class*="bg-primary"],
    a[class*="bg-accent"] {
      transition: transform 0.2s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.2s cubic-bezier(0.16, 1, 0.3, 1), background-color 0.15s ease, color 0.15s ease;
    }

    /* Kompresi taktil lembut ketika disentuh / ditekan */
    button:not(:disabled):active,
    a.inline-flex:active,
    a[class*="rounded-lg"]:active,
    a[class*="rounded-xl"]:active,
    a[class*="rounded-full"]:active,
    a[class*="bg-primary"]:active,
    a[class*="bg-accent"]:active {
      transform: scale(0.96) !important;
    }

    /* Hover elevasi lembut untuk desktop */
    @media (hover: hover) and (pointer: fine) {
      button:not(:disabled):hover,
      a[class*="bg-primary-700"]:hover,
      a[class*="bg-accent-500"]:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px -3px rgba(19, 78, 74, 0.22);
      }
    }

    /* Animasi sentuh kartu konten */
    article,
    .card-touch,
    div[class*="border border-slate-200"][class*="rounded-"] {
      transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.25s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.2s ease;
    }

    @media (hover: hover) and (pointer: fine) {
      article:hover,
      .card-touch:hover,
      div[class*="border border-slate-200"][class*="rounded-"]:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 24px -6px rgba(19, 78, 74, 0.08), 0 4px 6px -4px rgba(19, 78, 74, 0.04);
      }
    }

    article:active,
    .card-touch:active {
      transform: scale(0.985);
    }

    /* Zoom halus pada gambar dalam kartu saat disentuh/hover */
    article img,
    .card-touch img {
      transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }
    article:hover img,
    .card-touch:hover img {
      transform: scale(1.03);
    }

    /* Animasi Wiggle Saat Disentuh / Ditekan */
    @keyframes touchWiggle {
      0% { transform: scale(1) rotate(0deg); }
      20% { transform: scale(0.96) rotate(-3.5deg); }
      40% { transform: scale(1.02) rotate(3deg); }
      60% { transform: scale(0.99) rotate(-1.5deg); }
      80% { transform: scale(1.01) rotate(1deg); }
      100% { transform: scale(1) rotate(0deg); }
    }

    .animate-wiggle {
      animation: touchWiggle 0.42s cubic-bezier(0.36, 0.07, 0.19, 0.97) both !important;
      transform-origin: center center;
      will-change: transform;
    }

    /* Tombol WhatsApp Floating dengan animasi denyut & Wiggle berkala */
    @keyframes waWigglePulse {
      0%, 75%, 100% {
        transform: scale(1) rotate(0deg);
        box-shadow: 0 4px 14px 0 rgba(16, 185, 129, 0.4);
      }
      80% {
        transform: scale(1.05) rotate(-6deg);
        box-shadow: 0 6px 22px 0 rgba(16, 185, 129, 0.65);
      }
      85% {
        transform: scale(1.05) rotate(6deg);
      }
      90% {
        transform: scale(1.03) rotate(-3deg);
      }
      95% {
        transform: scale(1.01) rotate(2deg);
      }
    }

    .wa-floating-btn {
      animation: waWigglePulse 4.5s infinite ease-in-out;
      transition: transform 0.2s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.2s ease;
    }
    .wa-floating-btn:active {
      transform: scale(0.92) !important;
    }

    @media (prefers-reduced-motion: reduce) {
      * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
        scroll-behavior: auto !important;
      }
      .touch-ripple-effect,
      .wa-floating-btn,
      .animate-wiggle {
        animation: none !important;
      }
    }
  </style>
</head>
<body class="min-h-screen flex flex-col bg-surface-bg text-charcoal-dark antialiased">

  <!-- Skip to Content for Accessibility -->
  <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 z-50 bg-primary-700 text-white px-4 py-2 rounded shadow-lg">
    Langsung ke konten utama
  </a>

  <!-- Top Notification Bar: Dynamic PPDB Announcement -->
  <!-- Top bar PPDB removed -->

  <!-- Sticky Institutional Header -->
  <header class="sticky top-0 z-40 bg-white/95 backdrop-blur border-b border-slate-200">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        
        <!-- School Logo & Branding -->
        <a href="index.php" class="flex items-center gap-3 group focus:rounded focus:outline-none">
          <img src="assets/img/logo.png" alt="Logo <?= htmlspecialchars($site['site_name']) ?>" class="w-12 h-12 rounded-xl object-contain shadow-sm transition-transform group-hover:scale-105">
          <div>
            <span class="block font-bold text-lg sm:text-xl text-primary-900 leading-tight">Yayasan Bumi Ilmu</span>
          </div>
        </a>

        <!-- Desktop Navigation Menu -->
        <nav class="hidden lg:flex items-center gap-5 text-sm" aria-label="Navigasi Utama">
          <a href="index.php" class="py-2 transition-colors <?= is_active_page('home', $currentPage) ?>">Beranda</a>
          <a href="tentang.php" class="py-2 transition-colors <?= is_active_page('tentang', $currentPage) ?>">Tentang</a>
          <a href="pendidikan.php" class="py-2 transition-colors <?= is_active_page('pendidikan', $currentPage) ?>">Pendidikan</a>
          <?php if ($pesantrenEnabled): ?>
          <a href="pesantren.php" class="py-2 transition-colors <?= is_active_page('pesantren', $currentPage) ?>">Pesantren</a>
          <?php endif; ?>
          <a href="kegiatan.php" class="py-2 transition-colors <?= is_active_page('kegiatan', $currentPage) ?>">Kegiatan</a>
          <a href="showcase.php" class="py-2 transition-colors <?= is_active_page('showcase', $currentPage) ?>">Showcase</a>
          <a href="ppdb.php" class="py-2 transition-colors <?= is_active_page('ppdb', $currentPage) ?>">PPDB</a>
          <a href="kontak.php" class="py-2 transition-colors <?= is_active_page('kontak', $currentPage) ?>">Kontak</a>
        </nav>

        <!-- Header CTA Button -->
        <div class="hidden sm:flex items-center gap-3">
          <a href="ppdb.php" class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-semibold rounded-lg bg-primary-700 text-white hover:bg-primary-900 transition-all shadow-sm">
            <span>Informasi PPDB</span>
            <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>

        <!-- Mobile Menu Hamburger Button -->
        <div class="flex items-center lg:hidden">
          <button id="mobile-menu-btn" type="button" class="p-2 rounded-lg text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-primary-700" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="mobile-menu">
            <svg id="hamburger-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>

      </div>
    </div>

    <!-- Mobile Drawer Menu -->
    <div id="mobile-menu" class="hidden lg:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-6 shadow-xl" aria-label="Navigasi Seluler">
      <div class="space-y-1">
        <a href="index.php" class="block px-3 py-2.5 rounded-lg text-base <?= is_mobile_active_page('home', $currentPage) ?>">Beranda</a>
        <a href="tentang.php" class="block px-3 py-2.5 rounded-lg text-base <?= is_mobile_active_page('tentang', $currentPage) ?>">Tentang Kami</a>
        <a href="pendidikan.php" class="block px-3 py-2.5 rounded-lg text-base <?= is_mobile_active_page('pendidikan', $currentPage) ?>">Pendidikan</a>
        <?php if ($pesantrenEnabled): ?>
        <a href="pesantren.php" class="block px-3 py-2.5 rounded-lg text-base <?= is_mobile_active_page('pesantren', $currentPage) ?>">Pesantren & Asrama</a>
        <?php endif; ?>
        <a href="kegiatan.php" class="block px-3 py-2.5 rounded-lg text-base <?= is_mobile_active_page('kegiatan', $currentPage) ?>">Kegiatan & Agenda</a>
        <a href="showcase.php" class="block px-3 py-2.5 rounded-lg text-base <?= is_mobile_active_page('showcase', $currentPage) ?>">Student Showcase</a>
        <a href="ppdb.php" class="block px-3 py-2.5 rounded-lg text-base <?= is_mobile_active_page('ppdb', $currentPage) ?>">Informasi PPDB</a>
        <a href="kontak.php" class="block px-3 py-2.5 rounded-lg text-base <?= is_mobile_active_page('kontak', $currentPage) ?>">Kontak Sekolah</a>
      </div>
      <div class="mt-4 pt-4 border-t border-slate-200">
        <a href="ppdb.php" class="w-full flex items-center justify-center px-4 py-3 text-center text-sm font-semibold rounded-lg bg-primary-700 text-white hover:bg-primary-900 transition">
          Daftar PPDB TA <?= htmlspecialchars($ppdb['academic_year']) ?>
        </a>
      </div>
    </div>
  </header>

  <!-- Script for accessible mobile menu toggle -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const btn = document.getElementById('mobile-menu-btn');
      const menu = document.getElementById('mobile-menu');
      const hamburger = document.getElementById('hamburger-icon');
      const close = document.getElementById('close-icon');

      if (btn && menu) {
        btn.addEventListener('click', function() {
          const isExpanded = btn.getAttribute('aria-expanded') === 'true';
          btn.setAttribute('aria-expanded', !isExpanded);
          menu.classList.toggle('hidden');
          hamburger.classList.toggle('hidden');
          close.classList.toggle('hidden');
        });
      }
    });
  </script>

  <main id="main-content" class="flex-grow">
