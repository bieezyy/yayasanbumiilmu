<?php
$currentPage = 'tentang';
$pageTitle = 'Tentang Kami — Profil, Visi, Misi & Dewan Pendidik';
$pageDesc = 'Profil resmi SMP & Pesantren Yayasan Bumi Ilmu: Sejarah pendirian, visi misi keislaman terpadu, 4 nilai dasar pembinaan santri, dan dewan pendidik.';
require_once __DIR__ . '/includes/header.php';

$profile = get_json_data('school_profile.json');
?>

<!-- Header Banner -->
<div class="bg-primary-900 text-white py-16 border-b border-primary-800">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <nav class="flex items-center gap-2 text-xs text-emerald-200 mb-4" aria-label="Breadcrumb">
      <a href="index.php" class="hover:underline">Beranda</a>
      <span>/</span>
      <span class="text-white font-medium">Tentang Kami</span>
    </nav>
    <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-white">Profil & Identitas Institusi</h1>
    <p class="text-emerald-100/90 text-base max-w-2xl mt-2 leading-relaxed">
      Mengenal lebih dekat visi keislaman, sejarah khidmat, dan dewan pendidik Yayasan Bumi Ilmu.
    </p>
  </div>
</div>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">

  <!-- 1. Profil & Sejarah Pendirian -->
  <section class="max-w-4xl mx-auto space-y-6">
    <!-- Informasi Khusus Jenjang SMP -->
    <div class="p-5 rounded-2xl bg-primary-50 border border-primary-200 flex items-start gap-4">
      <div class="w-9 h-9 rounded-xl bg-primary-700 text-white flex items-center justify-center font-bold text-sm flex-shrink-0 mt-0.5">
        <svg class="w-5 h-5 text-accent-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
      </div>
      <div>
        <h3 class="text-sm font-bold text-primary-900 mb-1">Ketentuan Jenjang Pendidikan</h3>
        <p class="text-xs sm:text-sm text-slate-700 leading-relaxed">
          Yayasan Bumi Ilmu <strong>khusus dan hanya menerima siswa yang ingin melanjutkan pendidikan pada jenjang Sekolah Menengah Pertama (SMP).</strong>
        </p>
      </div>
    </div>

    <h2 class="text-2xl font-bold text-primary-900">Sejarah & Semangat Pendirian</h2>
    <div class="text-slate-600 leading-relaxed text-base space-y-4">
      <?= nl2br(htmlspecialchars($profile['history'])) ?>
    </div>

    <!-- Arabic Quote Card -->
    <div class="bg-gradient-to-r from-primary-800 to-primary-900 text-white p-6 sm:p-8 rounded-2xl shadow-sm space-y-3 text-center">
      <p class="font-arabic text-2xl text-accent-100 leading-relaxed text-center">
        <?= htmlspecialchars($profile['arabic_quote']['text']) ?>
      </p>
      <p class="text-xs sm:text-sm text-emerald-100/90 italic border-t border-emerald-700/60 pt-3 text-center">
        <?= htmlspecialchars($profile['arabic_quote']['translation']) ?>
      </p>
    </div>
  </section>

  <!-- 2. Visi & Misi Pendidikan -->
  <section class="bg-white p-8 sm:p-12 rounded-2xl border border-slate-200 shadow-sm">
    <div class="max-w-3xl mb-8">
      <span class="text-xs uppercase font-bold text-accent-700 tracking-wider">Arah Perjuangan</span>
      <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 mt-1">Visi & Misi Pendidikan</h2>
    </div>

    <div class="space-y-8">
      <!-- Visi -->
      <div class="p-6 rounded-xl bg-primary-50/60 border-l-4 border-primary-700">
        <h3 class="text-xs font-bold uppercase text-primary-700 tracking-wider mb-2">Visi Utama</h3>
        <p class="text-lg sm:text-xl font-semibold text-primary-900 leading-relaxed">
          "<?= htmlspecialchars($profile['vision']) ?>"
        </p>
      </div>

      <!-- Misi -->
      <div>
        <h3 class="text-xs font-bold uppercase text-accent-700 tracking-wider mb-4">Misi Strategis</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <?php foreach ($profile['missions'] as $index => $mission): ?>
          <div class="flex items-start gap-3 p-4 rounded-xl bg-slate-50 border border-slate-200">
            <span class="w-6 h-6 rounded-full bg-primary-700 text-white font-bold text-xs flex items-center justify-center flex-shrink-0 mt-0.5">
              <?= $index + 1 ?>
            </span>
            <p class="text-xs sm:text-sm text-slate-700 leading-relaxed">
              <?= htmlspecialchars($mission) ?>
            </p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- 3. Nilai Pendidikan (4 Pilar) -->
  <section>
    <div class="text-center max-w-2xl mx-auto mb-10">
      <span class="text-xs uppercase font-bold text-accent-700 tracking-wider">Karakter Santri</span>
      <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 mt-1">4 Nilai Pendidikan Terpadu</h2>
      <p class="text-sm text-slate-600 mt-2">Ditanamkan lewat pembiasaan harian terpadu di dalam kelas, asrama, dan halaqah.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php foreach ($profile['educational_values'] as $val): ?>
      <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm flex flex-col justify-between">
        <div>
          <span class="inline-block px-2.5 py-1 rounded text-xs font-semibold bg-accent-100 text-accent-700 mb-3">
            <?= htmlspecialchars($val['badge']) ?>
          </span>
          <h3 class="text-base font-bold text-primary-900 mb-2"><?= htmlspecialchars($val['title']) ?></h3>
          <p class="text-xs text-slate-600 leading-relaxed"><?= htmlspecialchars($val['description']) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- 4. Struktur Organisasi & Dewan Pendidik -->
  <section class="bg-white p-8 sm:p-12 rounded-2xl border border-slate-200 shadow-sm">
    <div class="text-center max-w-2xl mx-auto mb-10">
      <span class="text-xs uppercase font-bold text-accent-700 tracking-wider">Amanah Kepemimpinan</span>
      <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 mt-1">Dewan Pendidik & Pimpinan</h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php foreach ($profile['leadership'] as $leader): ?>
      <div class="bg-slate-50 p-6 rounded-xl border border-slate-200 text-center flex flex-col justify-between">
        <div>
          <div class="w-20 h-20 mx-auto rounded-full bg-primary-100 text-primary-700 font-bold text-2xl flex items-center justify-center mb-4 border-2 border-primary-700">
            <?= strtoupper(substr($leader['name'], 0, 1)) ?>
          </div>
          <h3 class="font-bold text-slate-900 text-sm mb-1"><?= htmlspecialchars($leader['name']) ?></h3>
          <p class="text-xs font-semibold text-accent-700 mb-2"><?= htmlspecialchars($leader['role']) ?></p>
        </div>
        <p class="text-xs text-slate-500 pt-3 border-t border-slate-200/80 leading-relaxed">
          <?= htmlspecialchars($leader['credential']) ?>
        </p>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

</div>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
