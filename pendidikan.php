<?php
$currentPage = 'pendidikan';
$pageTitle = 'Pendidikan & Kurikulum Terpadu';
$pageDesc = 'Rancang bangun kurikulum akademik, program pembinaan keislaman, tahfidz Al-Qur\'an bersanad, dan ekstrakurikuler di SMP & Pesantren Yayasan Bumi Ilmu.';
require_once __DIR__ . '/includes/header.php';

$programs = get_json_data('programs.json');
?>

<!-- Header Banner -->
<div class="bg-primary-900 text-white py-16 border-b border-primary-800">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <nav class="flex items-center gap-2 text-xs text-emerald-200 mb-4" aria-label="Breadcrumb">
      <a href="index.php" class="hover:underline">Beranda</a>
      <span>/</span>
      <span class="text-white font-medium">Pendidikan</span>
    </nav>
    <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-white">Kurikulum & Program Pendidikan</h1>
    <p class="text-emerald-100/90 text-base max-w-2xl mt-2 leading-relaxed">
      Integrasi kurikulum nasional, penguasaan sains kontemporer, dan tradisi keilmuan Islam bersanad.
    </p>
  </div>
</div>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-20">

  <!-- 1. Empat Pilar Rancang Bangun Kurikulum -->
  <section>
    <div class="max-w-3xl mb-10">
      <span class="text-xs uppercase font-bold text-accent-700 tracking-wider">Arsitektur Pembelajaran</span>
      <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 mt-1">4O Sebagai Pilar Kurikulum Terpadu</h2>
      <p class="text-slate-600 text-sm mt-2 leading-relaxed">
        Kami merancang ekosistem belajar yang seimbang antara kecerdasan akal, kebersihan hati, dan kecakapan hidup.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <?php foreach ($programs['categories'] as $cat): ?>
      <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
        <div>
          <span class="inline-block px-3 py-1 rounded text-xs font-semibold bg-primary-100 text-primary-800 mb-4 uppercase">
            <?= htmlspecialchars($cat['pilar_label'] ?? ('Pilar ' . $cat['title'])) ?>
          </span>
          <h3 class="text-xl font-bold text-primary-900 mb-2"><?= htmlspecialchars($cat['title']) ?></h3>
          <p class="text-xs font-semibold text-accent-700 mb-4"><?= htmlspecialchars($cat['tagline']) ?></p>
          <p class="text-sm text-slate-600 leading-relaxed"><?= htmlspecialchars($cat['description']) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- 2. Program Unggulan (Featured Programs) -->
  <section id="unggulan" class="bg-primary-900 text-white p-8 sm:p-12 rounded-3xl shadow-xl">
    <div class="text-center max-w-2xl mx-auto mb-12">
      <span class="text-xs uppercase font-bold text-accent-100 tracking-wider">Distinctive Focus</span>
      <h2 class="text-2xl sm:text-3xl font-bold text-white mt-1">Program Unggulan Sekolah</h2>
      <p class="text-sm text-emerald-100/80 mt-2">Fokus akselerasi kemampuan santri untuk menjadi teladan bagi lingkungannya.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <?php foreach ($programs['featured_programs'] as $prog): ?>
      <div class="bg-primary-800/80 p-6 rounded-2xl border border-emerald-700/60 space-y-3">
        <div class="flex items-center justify-between">
          <span class="px-2.5 py-0.5 rounded text-xs font-semibold bg-accent-500 text-white">
            <?= htmlspecialchars($prog['category']) ?>
          </span>
          <span class="text-xs font-medium text-emerald-200"><?= htmlspecialchars($prog['highlight']) ?></span>
        </div>
        <h3 class="text-lg font-bold text-white"><?= htmlspecialchars($prog['title']) ?></h3>
        <p class="text-xs sm:text-sm text-emerald-100/80 leading-relaxed"><?= htmlspecialchars($prog['description']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- 3. Ekstrakurikuler & Bakat Minat -->
  <section class="bg-white p-8 sm:p-12 rounded-2xl border border-slate-200 shadow-sm">
    <div class="max-w-3xl mb-10">
      <span class="text-xs uppercase font-bold text-accent-700 tracking-wider">Pengembangan Potensi</span>
      <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 mt-1">Ekstrakurikuler & Keterampilan Santri</h2>
      <p class="text-slate-600 text-sm mt-2">
        Mewadahi keragaman talenta santri melalui kegiatan olahraga sunnah, sains komputasi, dan kepanduan.
      </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($programs['extracurriculars'] as $ekskul): ?>
      <div class="p-5 rounded-xl border border-slate-200 bg-slate-50 flex items-center justify-between">
        <div>
          <h3 class="font-bold text-slate-800 text-sm"><?= htmlspecialchars($ekskul['name']) ?></h3>
          <span class="text-xs text-primary-700 font-medium"><?= htmlspecialchars($ekskul['category']) ?></span>
        </div>
        <span class="text-xs bg-white px-2.5 py-1 rounded border border-slate-200 text-slate-500 font-semibold">
          <?= htmlspecialchars($ekskul['frequency']) ?>
        </span>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- 4. Modul Pesantren & Asrama (Conditional Toggle sesuai PRD Bab 5) -->
  <?php if ($pesantrenEnabled): ?>
  <section id="pesantren" class="p-8 sm:p-12 rounded-3xl bg-surface-bg border border-slate-200">
    <div class="max-w-3xl mb-8">
      <span class="text-xs uppercase font-bold text-accent-700 tracking-wider">Program Asrama</span>
      <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 mt-1">Kehidupan Santri & Ritme Harian Pesantren</h2>
      <p class="text-slate-600 text-sm mt-2">
        Bagi santri program boarding/pesantren, ritme hidup 24 jam didampingi oleh musyrif asrama dengan jadwal terstruktur.
      </p>
    </div>

    <!-- Timeline Ritme Harian -->
    <div class="space-y-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="p-5 rounded-xl bg-white border border-slate-200">
          <span class="text-xs font-bold text-accent-700 block mb-1">03.30 - 06.30 WIB</span>
          <h3 class="font-bold text-slate-900 text-sm mb-1">Qiyamullail & Tahfidz</h3>
          <p class="text-xs text-slate-500">Tahajjud, Subuh berjamaah, zikir al-matsurat, dan talaqqi hafalan Al-Qur'an.</p>
        </div>
        <div class="p-5 rounded-xl bg-white border border-slate-200">
          <span class="text-xs font-bold text-accent-700 block mb-1">07.00 - 15.30 WIB</span>
          <h3 class="font-bold text-slate-900 text-sm mb-1">KBM Formal & Laboratorium</h3>
          <p class="text-xs text-slate-500">Pembelajaran kurikulum terpadu di kelas modern, sains praktikum, dan istirahat Dzuhur berjamaah.</p>
        </div>
        <div class="p-5 rounded-xl bg-white border border-slate-200">
          <span class="text-xs font-bold text-accent-700 block mb-1">16.00 - 17.30 WIB</span>
          <h3 class="font-bold text-slate-900 text-sm mb-1">Olahraga & Ekstrakurikuler</h3>
          <p class="text-xs text-slate-500">Panahan, beladiri, klub robotika, atau perkebunan hidroponik mandiri.</p>
        </div>
        <div class="p-5 rounded-xl bg-white border border-slate-200">
          <span class="text-xs font-bold text-accent-700 block mb-1">18.00 - 21.00 WIB</span>
          <h3 class="font-bold text-slate-900 text-sm mb-1">Kajian Kitab & Muraja'ah</h3>
          <p class="text-xs text-slate-500">Maghrib berjamaah, taklim adab santri, muraja'ah mandiri, dan istirahat malam teratur.</p>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

</div>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
