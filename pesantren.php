<?php
require_once __DIR__ . '/includes/functions.php';
$site = get_site_config();

// Flexible Architecture Toggle (PRD Bab 5 & Bab 22)
if (!($site['modules']['pesantren_enabled'] ?? false)) {
    header('Location: tentang.php');
    exit;
}

$currentPage = 'pesantren';
$pageTitle = 'Pesantren & Kehidupan Asrama Santri';
$pageDesc = 'Program pembinaan pesantren 24 jam di SMP Yayasan Bumi Ilmu: Ritme harian santri, fasilitas asrama, tata tertib, dan bimbingan adab.';
require_once __DIR__ . '/includes/header.php';

$pesantren = get_json_data('pesantren.json');
$ppdb = get_ppdb_config();
?>

<!-- Header Banner -->
<div class="bg-primary-900 text-white py-16 border-b border-primary-800">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <nav class="flex items-center gap-2 text-xs text-emerald-200 mb-4" aria-label="Breadcrumb">
      <a href="index.php" class="hover:underline">Beranda</a>
      <span>/</span>
      <span class="text-white font-medium">Pesantren</span>
    </nav>
    <div class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-accent-500 text-white mb-3">
      Program Boarding / Asrama Terpadu
    </div>
    <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-white"><?= htmlspecialchars($pesantren['title']) ?></h1>
    <p class="text-emerald-100/90 text-base max-w-2xl mt-2 leading-relaxed">
      <?= htmlspecialchars($pesantren['tagline']) ?>
    </p>
  </div>
</div>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">

  <!-- 1. Pengantar Kehidupan Pesantren -->
  <section class="max-w-4xl mx-auto space-y-6">
    <div class="space-y-4">
      <span class="text-xs uppercase font-bold text-accent-700 tracking-wider">Filosofi Pengasuhan</span>
      <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 leading-snug">
        Membiasakan Adab, Ibadah Mandiri & Kemandirian Remaja
      </h2>
      <div class="text-slate-600 text-base leading-relaxed space-y-4">
        <?= nl2br(htmlspecialchars($pesantren['introduction'])) ?>
      </div>
      <div class="pt-4 flex items-center gap-4 text-xs text-slate-500 font-semibold">
        <span class="flex items-center gap-1.5 text-primary-700">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
          Pendampingan 24 Jam
        </span>
        <span class="flex items-center gap-1.5 text-primary-700">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
          Makan Bergizi 3x Sehari
        </span>
      </div>
    </div>
  </section>

  <!-- 2. Fasilitas Asrama & Lingkungan Kampus -->
  <section>
    <div class="text-center max-w-2xl mx-auto mb-10">
      <span class="text-xs uppercase font-bold text-accent-700 tracking-wider">Kenyamanan Santri</span>
      <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 mt-1">Fasilitas Asrama & Lingkungan Belajar</h2>
      <p class="text-sm text-slate-600 mt-2">Dukungan sarana yang aman, higienis, dan ramah bagi perkembangan fisik maupun psikis santri.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($pesantren['facilities'] as $fac): ?>
      <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm flex flex-col justify-between">
        <div>
          <div class="w-10 h-10 rounded-lg bg-primary-100 text-primary-700 flex items-center justify-center font-bold text-sm mb-4">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          </div>
          <h3 class="font-bold text-slate-900 text-base mb-2"><?= htmlspecialchars($fac['name']) ?></h3>
          <p class="text-xs text-slate-600 leading-relaxed"><?= htmlspecialchars($fac['desc']) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- 4. Tata Tertib & Kode Etik Adab Santri -->
  <section class="bg-surface-bg p-8 sm:p-12 rounded-2xl border border-slate-200 text-center">
    <div class="max-w-2xl mx-auto mb-8 text-center">
      <span class="text-xs uppercase font-bold text-accent-700 tracking-wider block">ADAB & REGULASI</span>
      <h2 class="text-2xl font-bold text-primary-900 mt-1">Tata Tertib & Kode Etik Kehidupan Santri</h2>
      <p class="text-xs text-slate-500 mt-1">
        Tata tertib ditegakkan dengan pendekatan bimbingan hikmah, edukatif, dan kasih sayang (anti kekerasan fisik).
      </p>
    </div>

    <!-- Action Buttons to Open Modals -->
    <div class="flex flex-wrap items-center justify-center gap-4">
      <button type="button" onclick="openModal('modal-tata-tertib')" class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-primary-700 text-white font-semibold text-sm hover:bg-primary-900 transition shadow hover:shadow-md cursor-pointer">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span>Tata Tertib</span>
      </button>

      <button type="button" onclick="openModal('modal-larangan')" class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-rose-700 text-white font-semibold text-sm hover:bg-rose-900 transition shadow hover:shadow-md cursor-pointer">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
        </svg>
        <span>Larangan Yayasan</span>
      </button>
    </div>
  </section>

</div>

<!-- Modal 1: Tata Tertib -->
<div id="modal-tata-tertib" class="fixed inset-0 z-50 hidden bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4" role="dialog" aria-modal="true" aria-labelledby="modal-tata-tertib-title">
  <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[85vh] flex flex-col shadow-2xl overflow-hidden border border-slate-200">
    <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between bg-primary-50">
      <div class="flex items-center gap-2">
        <span class="w-8 h-8 rounded-lg bg-primary-700 text-white flex items-center justify-center text-sm font-bold">✓</span>
        <h3 id="modal-tata-tertib-title" class="font-bold text-primary-900 text-lg">Tata Tertib Kehidupan Santri</h3>
      </div>
      <button type="button" onclick="closeModal('modal-tata-tertib')" class="p-1.5 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-white transition cursor-pointer" aria-label="Tutup modal">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>
    </div>

    <div class="p-6 overflow-y-auto space-y-3 text-left">
      <?php foreach ($pesantren['rules_and_conduct'] as $index => $rule): ?>
      <div class="flex items-start gap-3 p-3.5 rounded-xl bg-slate-50 border border-slate-200">
        <span class="w-6 h-6 rounded-full bg-primary-700 text-white font-bold text-xs flex items-center justify-center flex-shrink-0 mt-0.5">
          <?= $index + 1 ?>
        </span>
        <p class="text-xs sm:text-sm text-slate-700 leading-relaxed"><?= htmlspecialchars($rule) ?></p>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="px-6 py-3.5 border-t border-slate-200 bg-slate-50 flex justify-end">
      <button type="button" onclick="closeModal('modal-tata-tertib')" class="px-4 py-2 text-sm font-semibold rounded-lg bg-slate-200 text-slate-700 hover:bg-slate-300 transition cursor-pointer">
        Tutup
      </button>
    </div>
  </div>
</div>

<!-- Modal 2: Larangan Yayasan -->
<div id="modal-larangan" class="fixed inset-0 z-50 hidden bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4" role="dialog" aria-modal="true" aria-labelledby="modal-larangan-title">
  <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[85vh] flex flex-col shadow-2xl overflow-hidden border border-slate-200">
    <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between bg-rose-50">
      <div class="flex items-center gap-2">
        <span class="w-8 h-8 rounded-lg bg-rose-700 text-white flex items-center justify-center text-sm font-bold">!</span>
        <h3 id="modal-larangan-title" class="font-bold text-rose-900 text-lg">Larangan Yayasan</h3>
      </div>
      <button type="button" onclick="closeModal('modal-larangan')" class="p-1.5 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-white transition cursor-pointer" aria-label="Tutup modal">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>
    </div>

    <div class="p-6 overflow-y-auto space-y-3 text-left">
      <?php foreach (($pesantren['prohibitions'] ?? []) as $index => $proh): ?>
      <div class="flex items-start gap-3 p-3.5 rounded-xl bg-rose-50/50 border border-rose-200/80">
        <span class="w-6 h-6 rounded-full bg-rose-700 text-white font-bold text-xs flex items-center justify-center flex-shrink-0 mt-0.5">
          <?= $index + 1 ?>
        </span>
        <p class="text-xs sm:text-sm text-slate-700 leading-relaxed"><?= htmlspecialchars($proh) ?></p>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="px-6 py-3.5 border-t border-slate-200 bg-slate-50 flex justify-end">
      <button type="button" onclick="closeModal('modal-larangan')" class="px-4 py-2 text-sm font-semibold rounded-lg bg-slate-200 text-slate-700 hover:bg-slate-300 transition cursor-pointer">
        Tutup
      </button>
    </div>
  </div>
</div>

<!-- Modal Script -->
<script>
  function openModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
      modal.classList.remove('hidden');
      document.body.classList.add('overflow-hidden');
    }
  }

  function closeModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
      modal.classList.add('hidden');
      document.body.classList.remove('overflow-hidden');
    }
  }

  // Close when clicking outside of modal card
  ['modal-tata-tertib', 'modal-larangan'].forEach(function(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
      modal.addEventListener('click', function(e) {
        if (e.target === modal) {
          closeModal(modalId);
        }
      });
    }
  });

  // Close on Escape key press
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      closeModal('modal-tata-tertib');
      closeModal('modal-larangan');
    }
  });
</script>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
