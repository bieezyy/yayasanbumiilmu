<?php
require_once __DIR__ . '/includes/functions.php';
$newsList = get_json_data('news.json');

$newsId = isset($_GET['id']) ? trim($_GET['id']) : '';
$currentNews = null;

foreach ($newsList as $item) {
    if ($item['id'] === $newsId || ($item['slug'] ?? '') === $newsId) {
        $currentNews = $item;
        break;
    }
}

// Fallback jika tidak ditemukan, gunakan berita pertama
if (!$currentNews && !empty($newsList)) {
    $currentNews = $newsList[0];
}

$currentPage = 'kegiatan';
$pageTitle = $currentNews['title'];
$pageDesc = $currentNews['excerpt'];
require_once __DIR__ . '/includes/header.php';
?>

<!-- Header Banner -->
<div class="bg-primary-900 text-white py-16 border-b border-primary-800">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <nav class="flex items-center gap-2 text-xs text-emerald-200 mb-4" aria-label="Breadcrumb">
      <a href="index.php" class="hover:underline">Beranda</a>
      <span>/</span>
      <a href="kegiatan.php" class="hover:underline">Kegiatan</a>
      <span>/</span>
      <span class="text-white font-medium truncate max-w-xs">Warta Sekolah</span>
    </nav>
    <div class="flex items-center gap-2 mb-3">
      <span class="px-2.5 py-0.5 rounded text-xs font-semibold bg-accent-500 text-white">
        <?= htmlspecialchars($currentNews['category']) ?>
      </span>
      <span class="text-xs text-emerald-200">
        <?= htmlspecialchars($currentNews['date']) ?> • Waktu Baca <?= htmlspecialchars($currentNews['read_time']) ?>
      </span>
    </div>
    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold tracking-tight text-white leading-tight">
      <?= htmlspecialchars($currentNews['title']) ?>
    </h1>
  </div>
</div>

<article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
  <div class="bg-white p-8 sm:p-12 rounded-3xl border border-slate-200 shadow-sm space-y-8">
    
    <!-- Lead Excerpt -->
    <div class="border-l-4 border-primary-700 pl-4 py-1 text-slate-700 text-base sm:text-lg font-medium leading-relaxed bg-slate-50 rounded-r-lg">
      <?= htmlspecialchars($currentNews['excerpt']) ?>
    </div>

    <!-- Article Visual Facade -->
    <div class="aspect-[16/9] bg-gradient-to-br from-primary-800 to-primary-900 rounded-2xl flex flex-col items-center justify-center p-8 text-white text-center">
      <svg class="w-12 h-12 text-accent-100 mb-3 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
      </svg>
      <span class="text-xs sm:text-sm text-emerald-100 font-semibold">[Dokumentasi Liputan Resmi Humas Yayasan Bumi Ilmu]</span>
      <span class="text-xs text-emerald-200 mt-1">Cisarua, Bogor — <?= htmlspecialchars($currentNews['date']) ?></span>
    </div>

    <!-- Article Body Text -->
    <div class="prose max-w-none text-slate-700 text-base leading-relaxed space-y-4">
      <p>
        <strong>CISARUA, BOGOR</strong> — SMP & Pesantren Yayasan Bumi Ilmu senantiasa berkomitmen untuk menghadirkan pembinaan komprehensif bagi seluruh santri. Kegiatan ini merupakan bagian terpadu dari kalender akademik dan kepengasuhan pondok guna merefleksikan nilai-nilai keilmuan, adab, ibadah, dan kemandirian nyata.
      </p>
      <p>
        Kepala Sekolah dan Mudir Pesantren menyampaikan apresiasi mendalam kepada seluruh asatidz, pembina kamar, dan orang tua santri yang tak henti memberikan dukungan moral serta spiritual. Sinergi antara rumah dan pondok menjadi kunci keberhasilan pembinaan generasi berkarakter qur'ani.
      </p>
      <p>
        Diharapkan melalui kegiatan ini, para santri semakin termotivasi untuk terus mengasah kemampuan akademis, memperkuat hafalan Al-Qur'an dengan kualitas mutqin, serta menjunjung tinggi akhlakul karimah dalam pergaulan sehari-hari baik di lingkungan pesantren maupun di tengah masyarakat luas.
      </p>
    </div>

    <!-- Back Navigation & Meta -->
    <div class="pt-8 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
      <a href="kegiatan.php" class="inline-flex items-center text-sm font-semibold text-primary-700 hover:text-primary-900">
        &larr; Kembali ke Indeks Berita & Kegiatan
      </a>
      <a href="ppdb.php" class="inline-flex items-center px-4 py-2 rounded-lg bg-primary-700 text-white text-xs font-semibold hover:bg-primary-900 transition">
        Konsultasi PPDB TA <?= htmlspecialchars(get_ppdb_config()['academic_year']) ?>
      </a>
    </div>

  </div>
</article>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
