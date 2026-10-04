<?php
$currentPage = 'kegiatan';
$pageTitle = 'Kegiatan, Berita, Agenda & Dokumentasi Sekolah';
$pageDesc = 'Kabar terbaru seputar kegiatan belajar, agenda publik mendatang, rekap prestasi, dan dokumentasi galeri SMP & Pesantren Yayasan Bumi Ilmu.';
require_once __DIR__ . '/includes/header.php';

$newsList = get_json_data('news.json');
$eventsList = get_json_data('events.json');
$achievements = get_json_data('achievements.json');
$galleryList = get_json_data('gallery.json');
?>

<!-- Header Banner -->
<div class="bg-primary-900 text-white py-16 border-b border-primary-800">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <nav class="flex items-center gap-2 text-xs text-emerald-200 mb-4" aria-label="Breadcrumb">
      <a href="index.php" class="hover:underline">Beranda</a>
      <span>/</span>
      <span class="text-white font-medium">Kegiatan</span>
    </nav>
    <div class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-accent-500 text-white mb-3">
      Informasi Publik & Agenda Resmi
    </div>
    <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-white">Kegiatan, Berita & Dokumentasi</h1>
    <p class="text-emerald-100/90 text-base max-w-2xl mt-2 leading-relaxed">
      Mengikuti dinamika pembelajaran, agenda pertemuan sekolah, dan rekam jejak capaian santri.
    </p>
  </div>
</div>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-20">

  <!-- 1. Berita Sekolah Terbaru -->
  <section id="berita">
    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8">
      <div>
        <span class="text-xs uppercase font-bold text-accent-700 tracking-wider">Warta Terkini</span>
        <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 mt-1">Berita & Rilis Sekolah</h2>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <?php foreach ($newsList as $news): ?>
      <article class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
        <div class="p-6">
          <div class="flex items-center gap-2 mb-3">
            <span class="px-2.5 py-0.5 rounded text-xs font-medium bg-primary-100 text-primary-800">
              <?= htmlspecialchars($news['category']) ?>
            </span>
            <time class="text-xs text-slate-400"><?= htmlspecialchars($news['date']) ?></time>
          </div>
          <h3 class="font-bold text-slate-900 text-base mb-3 leading-snug">
            <?= htmlspecialchars($news['title']) ?>
          </h3>
          <p class="text-xs text-slate-600 leading-relaxed mb-4">
            <?= htmlspecialchars($news['excerpt']) ?>
          </p>
        </div>
        <div class="p-6 pt-0 border-t border-slate-100 mt-auto flex items-center justify-between">
          <span class="text-xs text-slate-400">Durasi: <?= htmlspecialchars($news['read_time']) ?></span>
          <a href="berita-detail.php?id=<?= urlencode($news['id']) ?>" class="text-xs font-bold text-primary-700 hover:text-primary-900 flex items-center gap-1">
            Baca Selengkapnya &rarr;
          </a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- 2. Agenda Kegiatan Publik Mendatang -->
  <section id="agenda" class="bg-white p-8 sm:p-12 rounded-3xl border border-slate-200 shadow-sm">
    <div class="max-w-2xl mb-8">
      <span class="text-xs uppercase font-bold text-accent-700 tracking-wider">Kalender Publik</span>
      <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 mt-1">Agenda & Jadwal Kegiatan</h2>
      <p class="text-xs sm:text-sm text-slate-500 mt-1">Jadwal kegiatan terbuka untuk calon wali santri, santri, dan masyarakat umum.</p>
    </div>

    <div class="space-y-4">
      <?php foreach ($eventsList as $event): ?>
      <div class="flex flex-col md:flex-row md:items-center justify-between p-6 rounded-2xl bg-slate-50 border border-slate-200 hover:bg-white transition-all gap-4">
        <div class="md:w-1/4">
          <span class="inline-block px-3 py-1 rounded bg-primary-700 text-white font-bold text-xs mb-1">
            <?= htmlspecialchars($event['date']) ?>
          </span>
          <span class="block text-xs font-medium text-slate-500"><?= htmlspecialchars($event['time']) ?></span>
        </div>
        <div class="md:w-1/2 space-y-1">
          <span class="text-xs font-semibold text-accent-700 uppercase tracking-wide"><?= htmlspecialchars($event['category']) ?></span>
          <h3 class="font-bold text-slate-900 text-base"><?= htmlspecialchars($event['title']) ?></h3>
          <p class="text-xs text-slate-600 leading-relaxed"><?= htmlspecialchars($event['description']) ?></p>
        </div>
        <div class="md:w-1/4 md:text-right">
          <span class="text-xs font-semibold text-slate-500 block">Lokasi:</span>
          <span class="text-xs font-medium text-primary-900"><?= htmlspecialchars($event['location']) ?></span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- 3. Rekapitulasi Prestasi Santri Lengkap -->
  <section id="prestasi">
    <div class="max-w-2xl mb-8">
      <span class="text-xs uppercase font-bold text-accent-700 tracking-wider">Pencapaian Mutqin</span>
      <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 mt-1">Rekapitulasi Prestasi Santri</h2>
      <p class="text-xs sm:text-sm text-slate-500 mt-1">Capaian kejuaraan sains, musabaqah tahfidz, dan bahasa asing.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php foreach ($achievements as $ach): ?>
      <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
        <div>
          <span class="inline-block px-2.5 py-1 rounded text-xs font-semibold bg-accent-100 text-accent-700 mb-3">
            <?= htmlspecialchars($ach['level']) ?> • <?= htmlspecialchars($ach['year']) ?>
          </span>
          <h3 class="font-bold text-slate-900 text-sm mb-2 leading-snug"><?= htmlspecialchars($ach['title']) ?></h3>
          <p class="text-xs font-semibold text-primary-700 mb-1"><?= htmlspecialchars($ach['recipient']) ?></p>
        </div>
        <p class="text-xs text-slate-400 pt-3 border-t border-slate-100 mt-3"><?= htmlspecialchars($ach['event']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- 4. Galeri Dokumentasi Foto Kegiatan -->
  <section id="galeri" class="bg-surface-bg p-8 sm:p-12 rounded-3xl border border-slate-200">
    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8">
      <div>
        <span class="text-xs uppercase font-bold text-accent-700 tracking-wider">Dokumentasi Visual</span>
        <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 mt-1">Galeri Aktivitas Pembelajaran</h2>
      </div>
      <a href="showcase.php" class="mt-2 sm:mt-0 text-xs font-bold text-primary-700 hover:underline">
        Lihat Karya & Student Showcase &rarr;
      </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($galleryList as $gal): ?>
      <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm flex flex-col justify-between">
        <div class="aspect-[16/10] bg-gradient-to-br from-primary-800 to-primary-900 text-white flex flex-col items-center justify-center p-6 text-center">
          <svg class="w-8 h-8 text-accent-100 mb-2 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
          </svg>
          <span class="text-xs text-emerald-100 font-semibold">[<?= htmlspecialchars($gal['category']) ?>]</span>
        </div>
        <div class="p-5 space-y-2">
          <div class="flex items-center justify-between text-[11px] text-slate-400">
            <span><?= htmlspecialchars($gal['category']) ?></span>
            <span><?= htmlspecialchars($gal['date']) ?></span>
          </div>
          <h3 class="font-bold text-slate-900 text-sm"><?= htmlspecialchars($gal['title']) ?></h3>
          <p class="text-xs text-slate-500 leading-relaxed"><?= htmlspecialchars($gal['caption']) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

</div>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
