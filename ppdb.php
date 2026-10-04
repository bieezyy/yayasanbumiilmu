<?php
$currentPage = 'ppdb';
$pageTitle = 'Informasi PPDB TA 2026/2027 — Jalur, Alur, Syarat & Biaya';
$pageDesc = 'Pusat informasi resmi Penerimaan Peserta Didik Baru (PPDB) SMP & Pesantren Yayasan Bumi Ilmu: Jadwal gelombang, syarat pendaftaran, alur tes observasi, dan rincian biaya.';
require_once __DIR__ . '/includes/header.php';

$ppdb = get_ppdb_config();
$site = get_site_config();
?>

<!-- Header Banner -->
<div class="bg-primary-900 text-white py-16 border-b border-primary-800">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <nav class="flex items-center gap-2 text-xs text-emerald-200 mb-4" aria-label="Breadcrumb">
      <a href="index.php" class="hover:underline">Beranda</a>
      <span>/</span>
      <span class="text-white font-medium">PPDB</span>
    </nav>
    <div class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-accent-500 text-white mb-3">
      Status: <?= htmlspecialchars(strtoupper($ppdb['status'])) ?> — TA <?= htmlspecialchars($ppdb['academic_year']) ?>
    </div>
    <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-white"><?= htmlspecialchars($ppdb['headline']) ?></h1>
    <p class="text-emerald-100/90 text-base max-w-2xl mt-2 leading-relaxed">
      <?= htmlspecialchars($ppdb['subheadline']) ?>
    </p>
  </div>
</div>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">

  <!-- 1. Jadwal Gelombang Pendaftaran -->
  <section class="bg-white p-8 sm:p-12 rounded-2xl border border-slate-200 shadow-sm">
    <div class="max-w-2xl mb-8">
      <span class="text-xs uppercase font-bold text-accent-700 tracking-wider">Jadwal & Kuota</span>
      <h2 class="text-2xl font-bold text-primary-900 mt-1">Gelombang Pendaftaran TA <?= htmlspecialchars($ppdb['academic_year']) ?></h2>
      <p class="text-xs sm:text-sm text-slate-500 mt-1">Pendaftaran ditutup sewaktu-waktu apabila kuota kelas telah terpenuhi.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <?php foreach ($ppdb['waves'] as $wave): ?>
      <div class="p-6 rounded-xl border border-slate-200 <?= $wave['status'] === 'Dibuka' ? 'bg-primary-50/50 border-primary-700/40' : 'bg-slate-50' ?> flex flex-col justify-between">
        <div>
          <div class="flex items-center justify-between mb-3">
            <span class="px-2.5 py-1 rounded text-xs font-bold <?= $wave['status'] === 'Dibuka' ? 'bg-primary-700 text-white' : 'bg-slate-300 text-slate-700' ?>">
              <?= htmlspecialchars($wave['status']) ?>
            </span>
            <span class="text-xs font-semibold text-slate-500">Kuota: <?= htmlspecialchars($wave['quota']) ?></span>
          </div>
          <h3 class="text-lg font-bold text-slate-900 mb-1"><?= htmlspecialchars($wave['name']) ?></h3>
          <p class="text-xs text-primary-800 font-medium">Periode: <?= htmlspecialchars($wave['period']) ?></p>
        </div>
        <?php if ($wave['status'] === 'Dibuka'): ?>
        <div class="mt-4 pt-4 border-t border-primary-200/60">
          <a href="https://wa.me/<?= $site['contact']['whatsapp'] ?>?text=<?= urlencode('Assalamu\'alaikum, saya ingin mendaftar PPDB ' . $wave['name']) ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center w-full px-4 py-2.5 rounded-lg bg-primary-700 text-white font-semibold text-xs hover:bg-primary-900 transition shadow">
            <span>Daftar</span>
            <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
          </a>
        </div>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- 2. Alur 4 Tahap Pendaftaran -->
  <section>
    <div class="text-center max-w-2xl mx-auto mb-12">
      <span class="text-xs uppercase font-bold text-accent-700 tracking-wider">Langkah Mudah</span>
      <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 mt-1">Alur Pendaftaran Santri Baru</h2>
      <p class="text-sm text-slate-600 mt-2">Empat tahapan terstruktur mulai dari pendaftaran hingga konfirmasi santri resmi.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php foreach ($ppdb['steps'] as $step): ?>
      <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm relative">
        <span class="w-10 h-10 rounded-xl bg-primary-700 text-white font-bold text-base flex items-center justify-center mb-4">
          <?= htmlspecialchars($step['step_number']) ?>
        </span>
        <h3 class="font-bold text-slate-900 text-base mb-2"><?= htmlspecialchars($step['title']) ?></h3>
        <p class="text-xs text-slate-600 leading-relaxed"><?= htmlspecialchars($step['description']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- 3. Persyaratan Administrasi & Berkas -->
  <section class="bg-white p-8 sm:p-12 rounded-2xl border border-slate-200 shadow-sm">
    <div class="max-w-2xl mb-6">
      <span class="text-xs uppercase font-bold text-accent-700 tracking-wider">Kelengkapan Dokumen</span>
      <h2 class="text-2xl font-bold text-primary-900 mt-1">Persyaratan Calon Siswa & Santri</h2>
    </div>

    <div class="space-y-4">
      <!-- Poin 1 -->
      <div class="flex items-start gap-3 p-4 rounded-xl bg-slate-50 border border-slate-200">
        <span class="w-6 h-6 rounded-full bg-primary-700 text-white font-bold text-xs flex items-center justify-center flex-shrink-0 mt-0.5">
          1
        </span>
        <div class="text-xs sm:text-sm text-slate-700 leading-relaxed">
          Berusia maksimal 12 tahun.
        </div>
      </div>

      <!-- Poin 2 -->
      <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 space-y-3">
        <div class="flex items-start gap-3">
          <span class="w-6 h-6 rounded-full bg-primary-700 text-white font-bold text-xs flex items-center justify-center flex-shrink-0 mt-0.5">
            2
          </span>
          <div class="text-xs sm:text-sm font-semibold text-slate-800 leading-relaxed">
            Menyerahkan kelengkapan identitas santri/santriwati, yang meliputi:
          </div>
        </div>
        <div class="ml-9 grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs sm:text-sm text-slate-700">
          <div class="flex items-start gap-2 p-2.5 rounded-lg bg-white border border-slate-200/80">
            <span class="font-bold text-accent-700">2.1.</span>
            <span>Asli dan fotokopi Akte Kelahiran/Kenal Lahir dari calon santri/santriwati</span>
          </div>
          <div class="flex items-start gap-2 p-2.5 rounded-lg bg-white border border-slate-200/80">
            <span class="font-bold text-accent-700">2.2.</span>
            <span>Asli buku rapor (bagi yang sudah dimiliki calon santri/santriwati)</span>
          </div>
          <div class="flex items-start gap-2 p-2.5 rounded-lg bg-white border border-slate-200/80">
            <span class="font-bold text-accent-700">2.3.</span>
            <span>Asli dan fotokopi ijazah serta penghargaan (bagi yang sudah memiliki)</span>
          </div>
          <div class="flex items-start gap-2 p-2.5 rounded-lg bg-white border border-slate-200/80">
            <span class="font-bold text-accent-700">2.4.</span>
            <span>Fotokopi Kartu Keluarga/wali</span>
          </div>
          <div class="flex items-start gap-2 p-2.5 rounded-lg bg-white border border-slate-200/80 sm:col-span-2">
            <span class="font-bold text-accent-700">2.5.</span>
            <span>Fotokopi KTP orang tua/wali</span>
          </div>
        </div>
      </div>

      <!-- Poin 3 -->
      <div class="flex items-start gap-3 p-4 rounded-xl bg-slate-50 border border-slate-200">
        <span class="w-6 h-6 rounded-full bg-primary-700 text-white font-bold text-xs flex items-center justify-center flex-shrink-0 mt-0.5">
          3
        </span>
        <div class="text-xs sm:text-sm text-slate-700 leading-relaxed">
          Memahami dan menandatangani Surat Pernyataan Kesediaan santri/santriwati.
        </div>
      </div>

      <!-- Poin 4 -->
      <div class="flex items-start gap-3 p-4 rounded-xl bg-slate-50 border border-slate-200">
        <span class="w-6 h-6 rounded-full bg-primary-700 text-white font-bold text-xs flex items-center justify-center flex-shrink-0 mt-0.5">
          4
        </span>
        <div class="text-xs sm:text-sm text-slate-700 leading-relaxed">
          Menandatangani Berita Acara Penyerahan santri/santriwati dari pihak Orang Tua/wali ke Pelaksana Harian Pondok Bumi Ilmu.
        </div>
      </div>
    </div>
  </section>

  <!-- Konsultasi & Pendaftaran WhatsApp Box -->
  <section class="bg-gradient-to-r from-primary-800 to-primary-900 text-white p-8 sm:p-12 rounded-2xl shadow-xl text-center space-y-6">
    <div class="max-w-2xl mx-auto space-y-3">
      <h2 class="text-2xl sm:text-3xl font-bold text-white">Siap Mendaftarkan Putra-Putri Anda?</h2>
      <p class="text-sm text-emerald-100/90 leading-relaxed">
        Panitia PPDB Yayasan Bumi Ilmu siap melayani konsultasi pemilihan program, jadwal survei langsung, dan bantuan pengisian formulir.
      </p>
    </div>

    <div>
      <a href="https://wa.me/<?= $site['contact']['whatsapp'] ?>?text=<?= urlencode($ppdb['whatsapp_message']) ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center px-8 py-4 rounded-xl bg-accent-500 text-white font-bold text-base hover:bg-accent-700 transition shadow-lg">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
          <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"></path>
        </svg>
        Hubungi WhatsApp Panitia PPDB (<?= htmlspecialchars($site['contact']['whatsapp_display']) ?>)
      </a>
    </div>
  </section>

</div>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
