<?php
$currentPage = 'home';
$pageTitle = 'Beranda';
require_once __DIR__ . '/includes/header.php';

$profile = get_json_data('school_profile.json');
$programs = get_json_data('programs.json');
$newsList = get_json_data('news.json');
$achievements = get_json_data('achievements.json');
?>

<!-- ==========================================
     SECTION 6.2: HERO SECTION
     Tanpa carousel, foto autentik, CTA dinamis
     ========================================== -->
<section class="relative bg-gradient-to-b from-primary-50/50 to-surface-bg border-b border-slate-200 overflow-hidden">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-stretch">
      
      <!-- Hero Copy -->
      <div class="lg:col-span-5 space-y-6 text-left flex flex-col justify-center">
        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-primary-100 text-primary-800 text-xs font-semibold tracking-wide uppercase">
          <span class="w-2 h-2 rounded-full bg-primary-700"></span>
          Pendidikan Islam Terpadu & Berkarakter
        </div>

        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-primary-900 tracking-tight leading-tight">
          Membentuk Generasi Berilmu, Beradab, dan Berkarakter.
        </h1>

        <p class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-2xl">
          Yayasan Bumi Ilmu memadukan konsep akademik nasional, kemandirian, dan pembinaan tahfidz Al-Qur’an dalam suasana belajar yang nyaman dan didukung lingkungan asri yang mendukung tumbuh kembang santri.
        </p>

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-2">
          <?php if ($ppdbActive): ?>
          <a href="ppdb.php" class="inline-flex items-center justify-center px-6 py-3.5 rounded-lg bg-primary-700 text-white font-semibold text-base hover:bg-primary-900 transition-all shadow-md hover:shadow">
            <span>Daftar PPDB TA <?= htmlspecialchars($ppdb['academic_year']) ?></span>
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
          </a>
          <?php endif; ?>
          <a href="kontak.php" class="inline-flex items-center justify-center px-6 py-3.5 rounded-lg border-2 border-primary-700 text-primary-700 font-semibold text-base hover:bg-primary-50 transition-colors">
            Coba Kelas Trial
          </a>
        </div>

      </div>

      <!-- Hero Visual Representation -->
      <div class="lg:col-span-7 relative flex">
        <div class="relative w-full h-full min-h-[380px] sm:min-h-[460px] lg:min-h-[520px] rounded-2xl overflow-hidden shadow-2xl border border-slate-200 bg-white">
          <img src="assets/img/1.png?v=<?= file_exists(__DIR__ . '/assets/img/1.png') ? filemtime(__DIR__ . '/assets/img/1.png') : time() ?>" alt="Yayasan Bumi Ilmu" class="w-full h-full object-cover" fetchpriority="high">
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ==========================================
     SECTION 6.5: EDUCATION PROGRAMS
     ========================================== -->
<section class="py-16 bg-white border-b border-slate-200">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
      <div>
        <h2 class="text-xs uppercase font-bold text-accent-700 tracking-wider">Rancang Bangun Kurikulum</h2>
        <p class="text-2xl sm:text-3xl font-bold text-primary-900 mt-1">Program Pendidikan Pondok</p>
      </div>
      <a href="pendidikan.php" class="mt-4 md:mt-0 text-sm font-semibold text-primary-700 hover:text-primary-900">
        Pelajari Seluruh Program & Ekstrakurikuler &rarr;
      </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <div class="p-6 rounded-xl border border-slate-200 bg-slate-50/50 hover:bg-white transition-colors">
        <h3 class="text-xl font-bold text-primary-900 mb-1">Olah Jiwa</h3>
        <p class="text-xs font-semibold text-accent-700 uppercase tracking-wide mb-3">Pendidikan Agama dan Akhlak</p>
        <p class="text-sm text-slate-600 leading-relaxed">Pembinaan ruhiyah santri melalui penanaman akidah yang lurus, ibadah praktis, pembiasaan akhlak karimah, serta program tahfidzul Qur'an mutqin yang membimbing jiwa agar senantiasa dekat kepada Allah ta'ala.</p>
      </div>
      <div class="p-6 rounded-xl border border-slate-200 bg-slate-50/50 hover:bg-white transition-colors">
        <h3 class="text-xl font-bold text-primary-900 mb-1">Olah Rasio</h3>
        <p class="text-xs font-semibold text-accent-700 uppercase tracking-wide mb-3">Pendidikan Semi Formal</p>
        <p class="text-sm text-slate-600 leading-relaxed">Pengasahan daya nalar, kecerdasan intelektual, dan penguasaan sains serta bahasa melalui pembelajaran terstruktur yang mengintegrasikan kurikulum akademik esensial dengan pemikiran kritis islami.</p>
      </div>
      <div class="p-6 rounded-xl border border-slate-200 bg-slate-50/50 hover:bg-white transition-colors">
        <h3 class="text-xl font-bold text-primary-900 mb-1">Olah Rasa</h3>
        <p class="text-xs font-semibold text-accent-700 uppercase tracking-wide mb-3">Pendidikan Keterampilan</p>
        <p class="text-sm text-slate-600 leading-relaxed">Pengembangan kepekaan rasa, kreativitas, dan kecakapan hidup (life skills) santri melalui karya seni bernilai Islami, literasi komunikasi, serta kemandirian wirausaha dan karya terapan praktis.</p>
      </div>
      <div class="p-6 rounded-xl border border-slate-200 bg-slate-50/50 hover:bg-white transition-colors">
        <h3 class="text-xl font-bold text-primary-900 mb-1">Olah Raga</h3>
        <p class="text-xs font-semibold text-accent-700 uppercase tracking-wide mb-3">Pendidikan Jasmani</p>
        <p class="text-sm text-slate-600 leading-relaxed">Pembinaan kebugaran fisik, ketahanan jasmani, dan disiplin santri melalui olahraga sunnah, kepanduan, dan aktivitas luar ruangan untuk membentuk pribadi yang sehat, kuat, dan tangguh.</p>
      </div>
    </div>
  </div>
</section>

<!-- ==========================================
     SECTION 6.6: FEATURED PROGRAMS (KEUNGGULAN KHAS)
     Outer div tanpa background warna, kartu di dalamnya berwarna
     ========================================== -->
<section class="py-16 bg-surface-bg border-b border-slate-200">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-2xl mx-auto mb-12">
      <span class="text-xs uppercase font-bold text-accent-700 tracking-wider">Keunggulan Khas</span>
      <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 mt-1">Program Unggulan Sekolah</h2>
      <p class="text-sm text-slate-600 mt-2">Didesain khusus untuk melipatgandakan potensi spiritual, intelektual, dan kepemimpinan santri.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php foreach ($programs['featured_programs'] as $prog): ?>
      <div class="bg-gradient-to-br from-primary-800 to-primary-900 p-6 rounded-2xl text-white shadow-md hover:shadow-lg transition-all border border-emerald-800 flex flex-col justify-between">
        <div>
          <span class="inline-block px-2.5 py-0.5 rounded text-xs font-semibold bg-accent-500 text-white mb-3">
            <?= htmlspecialchars($prog['category']) ?>
          </span>
          <h3 class="text-lg font-bold text-white mb-2"><?= htmlspecialchars($prog['title']) ?></h3>
          <p class="text-xs font-semibold text-accent-100 mb-2"><?= htmlspecialchars($prog['highlight']) ?></p>
        </div>
        <p class="text-xs text-emerald-100/80 leading-relaxed mt-3 pt-3 border-t border-emerald-700/60"><?= htmlspecialchars($prog['description']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==========================================
     SECTION 6.11: PPDB DYNAMIC BANNER CTA
     Tampil saat PPDB aktif
     ========================================== -->
<?php if ($ppdbActive): ?>
<section class="py-16 bg-gradient-to-r from-primary-800 to-primary-900 text-white">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="p-8 sm:p-12 rounded-2xl bg-white/5 border border-white/10 flex flex-col md:flex-row items-center justify-between gap-8">
      <div class="space-y-3 max-w-2xl text-left">
        <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-accent-500 text-white">
          <?= htmlspecialchars($ppdb['badge_text']) ?>
        </span>
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white tracking-tight">
          Penerimaan Peserta Didik Baru (PPDB) TA <?= htmlspecialchars($ppdb['academic_year']) ?>
        </h2>
        <p class="text-sm sm:text-base text-emerald-100/90 leading-relaxed">
          <?= htmlspecialchars($ppdb['subheadline']) ?>
        </p>
        <p class="text-xs text-accent-100">
          Periode Gelombang I: <strong><?= htmlspecialchars($ppdb['start_date']) ?> s/d <?= htmlspecialchars($ppdb['end_date']) ?></strong>
        </p>
      </div>

      <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
        <a href="ppdb.php" class="inline-flex items-center justify-center px-6 py-3.5 rounded-lg bg-accent-500 text-white font-semibold text-sm hover:bg-accent-700 transition shadow-lg text-center">
          Lihat Informasi & Alur PPDB
        </a>
        <a href="https://wa.me/<?= $site['contact']['whatsapp'] ?>?text=<?= urlencode($ppdb['whatsapp_message']) ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center px-6 py-3.5 rounded-lg bg-white/10 text-white font-semibold text-sm hover:bg-white/20 transition text-center border border-white/20">
          Chat Panitia PPDB
        </a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php
// SECTION 6.12: FOOTER
require_once __DIR__ . '/includes/footer.php';
?>
