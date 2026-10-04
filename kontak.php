<?php
$currentPage = 'kontak';
$pageTitle = 'Kontak & Lokasi Kampus Sekolah';
$pageDesc = 'Kontak resmi SMP & Pesantren Yayasan Bumi Ilmu: Alamat lengkap kampus di Cisarua Bogor, nomor telepon kantor, WhatsApp layanan PPDB, dan peta navigasi.';
require_once __DIR__ . '/includes/header.php';

$site = get_site_config();
?>

<!-- Header Banner -->
<div class="bg-primary-900 text-white py-16 border-b border-primary-800">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <nav class="flex items-center gap-2 text-xs text-emerald-200 mb-4" aria-label="Breadcrumb">
      <a href="index.php" class="hover:underline">Beranda</a>
      <span>/</span>
      <span class="text-white font-medium">Kontak</span>
    </nav>
    <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-white">Hubungi Kami & Kunjungan Kampus</h1>
    <p class="text-emerald-100/90 text-base max-w-2xl mt-2 leading-relaxed">
      Sekretariat Yayasan Bumi Ilmu siap melayani konsultasi pendidikan, silaturahmi, dan kunjungan orang tua.
    </p>
  </div>
</div>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
    
    <!-- Left Column: Contact Cards -->
    <div class="lg:col-span-5 space-y-6">
      
      <!-- Card 1: Alamat & Yayasan -->
      <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
        <div class="w-10 h-10 rounded-lg bg-primary-100 text-primary-700 flex items-center justify-center">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
          </svg>
        </div>
        <h2 class="text-base font-bold text-primary-900">Alamat Yayasan</h2>
        <p class="text-sm text-slate-600 leading-relaxed">
          <?= htmlspecialchars($site['contact']['address']) ?>
        </p>
        <p class="text-xs text-slate-400">
          Kawasan pegunungan asri, sejuk, dan kondusif untuk konsentrasi hafalan santri.
        </p>
      </div>

      <!-- Card 2: Saluran Komunikasi Cepat -->
      <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
        <h2 class="text-base font-bold text-primary-900">Saluran Komunikasi Resmi</h2>
        
        <div class="space-y-3 text-sm">
          <div class="flex items-center justify-between pb-3 border-b border-slate-100">
            <span class="text-slate-500">WhatsApp Resmi:</span>
            <a href="https://wa.me/<?= $site['contact']['whatsapp'] ?>" target="_blank" rel="noopener noreferrer" class="font-bold text-primary-700 hover:underline">
              <?= htmlspecialchars($site['contact']['whatsapp_display']) ?>
            </a>
          </div>

          <div class="flex items-center justify-between pb-3 border-b border-slate-100">
            <span class="text-slate-500">Telepon Kantor:</span>
            <a href="tel:<?= preg_replace('/[^0-9+]/', '', $site['contact']['phone']) ?>" class="font-bold text-slate-800 hover:underline">
              <?= htmlspecialchars($site['contact']['phone']) ?>
            </a>
          </div>

          <div class="flex items-center justify-between pb-3 border-b border-slate-100">
            <span class="text-slate-500">Email Korespondensi:</span>
            <a href="mailto:<?= htmlspecialchars($site['contact']['email']) ?>" class="font-bold text-primary-700 hover:underline">
              <?= htmlspecialchars($site['contact']['email']) ?>
            </a>
          </div>

          <div class="pt-1">
            <span class="text-xs text-slate-400 block mb-1">Jam Operasional Pelayanan:</span>
            <span class="text-xs font-semibold text-slate-700 block"><?= htmlspecialchars($site['contact']['office_hours']) ?></span>
          </div>
        </div>
      </div>

      <!-- Card 3: Media Sosial Resmi -->
      <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
        <h2 class="text-base font-bold text-primary-900">Saluran Informasi Publik</h2>
        <div class="flex items-center gap-4 text-xs font-semibold text-primary-700">
          <a href="<?= htmlspecialchars($site['social_media']['instagram']) ?>" target="_blank" rel="noopener noreferrer" class="hover:underline">
            Instagram Resmi &rarr;
          </a>
          <span>•</span>
          <a href="<?= htmlspecialchars($site['social_media']['youtube']) ?>" target="_blank" rel="noopener noreferrer" class="hover:underline">
            YouTube Edukasi &rarr;
          </a>
        </div>
      </div>

    </div>

    <!-- Right Column: Peta Lokasi Facade & Panduan Rute -->
    <div class="lg:col-span-7 space-y-6">
      <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm space-y-6">
        <div>
          <span class="text-xs uppercase font-bold text-accent-700 tracking-wider">Navigasi Lokasi</span>
          <h2 class="text-2xl font-bold text-primary-900 mt-1">Peta Lokasi Yayasan</h2>
          <p class="text-xs sm:text-sm text-slate-500 mt-1">Akses navigasi langsung menuju lokasi Pondok Bumi Ilmu.</p>
        </div>

        <!-- Google Maps Embed Preview -->
        <div class="rounded-xl overflow-hidden border border-slate-200 bg-slate-100 relative group aspect-[16/10] shadow-inner">
          <iframe 
            src="https://maps.google.com/maps?q=Jl.%20Cikaso%20Kp.%20Panyingkiran%20RT01%20RW07%20Pasir%20Impun%20Atas%20Ds.%20Cikadut%20Kec.%20Cimenyan%20Kab.%20Bandung&t=&z=15&ie=UTF8&iwloc=&output=embed" 
            class="w-full h-full border-0" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade"
            title="Peta Lokasi Yayasan Bumi Ilmu">
          </iframe>
        </div>

        <div class="flex items-center justify-between flex-wrap gap-4 pt-2">
          <div>
            <h3 class="text-base font-bold text-primary-900">Yayasan Bumi Ilmu</h3>
            <p class="text-xs text-slate-600">Pasir Impun Atas, Ds. Cikadut, Kec. Cimenyan, Kab. Bandung</p>
          </div>
          <a href="https://maps.app.goo.gl/xayPTRQH8qyoeYau6" target="_blank" rel="noopener noreferrer" class="inline-flex items-center px-5 py-2.5 rounded-lg bg-primary-700 text-white font-semibold text-xs hover:bg-primary-900 transition shadow">
            <span>Buka Navigasi di Google Maps</span>
            <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
            </svg>
          </a>
        </div>

        <!-- Panduan Arah Kunjungan -->
        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 text-xs text-slate-600 space-y-2">
          <strong class="text-slate-800 block text-sm">Petunjuk Kunjungan & Survei:</strong>
          <p>1. Demi kenyamanan belajar santri, orang tua yang hendak melakukan survei pondok dianjurkan mengonfirmasi kedatangan minimal H-1 melalui WhatsApp panitia.</p>
          <p>2. Jam kunjungan terbaik adalah pukul 09.00 - 14.00 WIB untuk menyaksikan aktivitas riil pembelajaran siswa di kelas.</p>
        </div>
      </div>
    </div>

  </div>
</div>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
