<?php
$currentPage = 'showcase';
$pageTitle = 'Student Showcase — Karya & Kehidupan Nyata Santri';
$pageDesc = 'Galeri karya proyek sains, seni kaligrafi, tahfidzul Qur\'an, dan aktivitas autentik santri SMP Yayasan Bumi Ilmu.';
require_once __DIR__ . '/includes/header.php';

$allItems = get_json_data('showcase.json');

// PRD Bab 17: Filter safety gate — hanya item ber-consent yang dirender ke publik
$showcaseItems = array_filter($allItems, function($item) {
    return ($item['privacy_consent_verified'] ?? false) === true;
});

// Category Filter mapping
$categories = [
    'all' => 'Semua Karya',
    'student_projects' => 'Proyek Siswa',
    'islamic' => 'Keislaman & Tahfidz',
    'creativity' => 'Seni & Kreativitas',
    'learning' => 'Sains & Pembelajaran',
    'sports' => 'Olahraga Sunnah',
    'events' => 'Aksi Sosial & Event',
    'achievement' => 'Prestasi Juara'
];

$activeFilter = isset($_GET['kategori']) && array_key_exists($_GET['kategori'], $categories) ? $_GET['kategori'] : 'all';

if ($activeFilter !== 'all') {
    $filteredItems = array_filter($showcaseItems, function($item) use ($activeFilter) {
        return ($item['category'] ?? '') === $activeFilter;
    });
} else {
    $filteredItems = $showcaseItems;
}
?>

<!-- Header Banner -->
<div class="bg-primary-900 text-white py-16 border-b border-primary-800">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <nav class="flex items-center gap-2 text-xs text-emerald-200 mb-4" aria-label="Breadcrumb">
      <a href="index.php" class="hover:underline">Beranda</a>
      <span>/</span>
      <span class="text-white font-medium">Student Showcase</span>
    </nav>
    <div class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-accent-500 text-white mb-3">
      Karya & Pembelajaran Nyata Santri
    </div>
    <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-white">Student Showcase & Karya Santri</h1>
    <p class="text-emerald-100/90 text-base max-w-2xl mt-2 leading-relaxed">
      Apresiasi terhadap kreativitas, riset sains, keahlian kaligrafi, dan ketekunan para santri dalam belajar.
    </p>
  </div>
</div>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-10">

  <!-- Interactive Category Filter Chips (PRD Section 7.2) -->
  <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none" aria-label="Filter Kategori Showcase">
    <?php foreach ($categories as $catKey => $catLabel): ?>
      <?php 
        $isActive = ($catKey === $activeFilter);
        $btnClass = $isActive 
          ? 'bg-primary-700 text-white shadow-sm font-semibold' 
          : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 font-medium';
      ?>
      <a href="?kategori=<?= urlencode($catKey) ?>" class="px-4 py-2 rounded-full text-xs whitespace-nowrap transition-all <?= $btnClass ?>">
        <?= htmlspecialchars($catLabel) ?>
      </a>
    <?php endforeach; ?>
  </div>

  <!-- Showcase Cards Grid -->
  <?php if (empty($filteredItems)): ?>
  <div class="bg-white p-12 rounded-2xl border border-slate-200 text-center max-w-md mx-auto space-y-3">
    <p class="text-slate-500 text-sm">Belum ada karya santri yang ditampilkan pada kategori ini.</p>
    <a href="showcase.php" class="text-xs font-semibold text-primary-700 hover:underline">Lihat Semua Kategori &rarr;</a>
  </div>
  <?php else: ?>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($filteredItems as $item): ?>
    <article class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
      
      <!-- Media Card Header / Facade -->
      <div>
        <div class="aspect-[16/10] bg-gradient-to-br from-primary-800 to-primary-900 text-white p-6 flex flex-col justify-between relative">
          <div class="flex items-center justify-between">
            <span class="px-2.5 py-0.5 rounded text-[11px] font-semibold bg-accent-500 text-white">
              <?= htmlspecialchars($item['tag'] ?? 'Showcase') ?>
            </span>
            <span class="text-[11px] text-emerald-200 font-medium">
              <?= htmlspecialchars($item['published_at']) ?>
            </span>
          </div>
          <div class="text-center py-4">
            <svg class="w-10 h-10 mx-auto text-accent-100/80 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="text-xs text-emerald-100 font-medium block">[Dokumentasi Riil Santri]</span>
          </div>
        </div>

        <!-- Content Details -->
        <div class="p-6 space-y-3">
          <h2 class="text-base font-bold text-slate-900 leading-snug">
            <?= htmlspecialchars($item['title']) ?>
          </h2>
          <p class="text-xs text-slate-600 leading-relaxed">
            <?= htmlspecialchars($item['summary']) ?>
          </p>
        </div>
      </div>

      <!-- Author Metadata & Privacy Safe Representation (PRD Bab 17) -->
      <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/70 flex items-center justify-between text-xs">
        <div>
          <span class="font-bold text-primary-900 block"><?= htmlspecialchars($item['student_name']) ?></span>
          <span class="text-slate-400 text-[11px]"><?= htmlspecialchars($item['grade']) ?></span>
        </div>
        <span class="text-accent-700 font-semibold text-[11px]">Terverifikasi Aman</span>
      </div>

    </article>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

  <!-- Editorial & Student Safety Disclaimer (PRD Bab 17) -->
  <aside class="p-6 rounded-2xl bg-primary-50/70 border border-primary-200/80 text-xs text-slate-600 flex items-start gap-4">
    <div class="w-8 h-8 rounded-full bg-primary-700 text-white flex items-center justify-center flex-shrink-0 font-bold">
      i
    </div>
    <div class="space-y-1">
      <strong class="text-primary-900 block font-semibold">Komitmen Perlindungan Privasi Santri:</strong>
      <p>
        Seluruh foto, rekaman karya, dan identitas siswa yang ditampilkan dalam galeri ini telah melalui proses kurasi editorial dan memiliki izin publikasi resmi dari wali santri (consent verified). Kami tidak mempublikasikan kontak pribadi, alamat domisili anak, ataupun data sensitif lainnya demi keamanan putra-putri kita.
      </p>
    </div>
  </aside>

</div>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
