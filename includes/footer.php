<?php
$site = get_site_config();
$ppdb = get_ppdb_config();
?>
  </main>

  <!-- Institutional Footer -->
  <footer class="bg-primary-900 text-white mt-16 border-t-4 border-accent-500">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-12">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
        
        <!-- Column 1: School Profile & Legal -->
        <div class="space-y-4">
          <div class="flex items-center gap-3">
            <img src="assets/img/logo.png" alt="Logo <?= htmlspecialchars($site['site_name']) ?>" class="w-10 h-10 rounded-lg object-contain bg-white/10 p-1">
            <div>
              <span class="font-bold text-base block text-white"><?= htmlspecialchars($site['site_name']) ?></span>
            </div>
          </div>
          <p class="text-sm text-emerald-100/80 leading-relaxed">
            <?= htmlspecialchars($site['tagline']) ?>.
          </p>
        </div>

        <!-- Column 2: Quick Links -->
        <div>
          <h3 class="text-sm font-semibold uppercase tracking-wider text-accent-100 mb-4">Navigasi Utama</h3>
          <ul class="space-y-2 text-xs sm:text-sm text-emerald-100/90">
            <li><a href="tentang.php" class="hover:text-accent-100 transition-colors">Profil & Visi Misi</a></li>
            <li><a href="pendidikan.php" class="hover:text-accent-100 transition-colors">Kurikulum Terpadu</a></li>
            <?php if ($site['modules']['pesantren_enabled'] ?? false): ?>
            <li><a href="pesantren.php" class="hover:text-accent-100 transition-colors">Pesantren & Asrama</a></li>
            <?php endif; ?>
            <li><a href="kegiatan.php" class="hover:text-accent-100 transition-colors">Warta & Kegiatan</a></li>
            <li><a href="showcase.php" class="hover:text-accent-100 transition-colors">Student Showcase</a></li>
            <li><a href="ppdb.php" class="hover:text-accent-100 transition-colors">Informasi PPDB TA <?= htmlspecialchars($ppdb['academic_year']) ?></a></li>
            <li><a href="kontak.php" class="hover:text-accent-100 transition-colors">Peta Lokasi & Kontak</a></li>
          </ul>
        </div>

        <!-- Column 3: Contact & Hours -->
        <div>
          <h3 class="text-sm font-semibold uppercase tracking-wider text-accent-100 mb-4">Alamat Sekolah</h3>
          <address class="not-italic text-sm text-emerald-100/80 space-y-2.5">
            <p class="leading-relaxed">Jl. Cikaso Kp. Panyingkiran RT01 RW07 Pasir Impun Atas Ds. Cikadut Kec. Cimenyan Kab. Bandung</p>
            <p class="pt-1">
              <span class="block text-xs text-emerald-300">Telepon / Whatsapp:</span>
              <a href="https://wa.me/62811267133" target="_blank" rel="noopener noreferrer" class="text-white hover:underline">+62 811-267-133</a>
            </p>
          </address>
        </div>

        <!-- Column 4: PPDB CTA & Channels -->
        <div>
          <h3 class="text-sm font-semibold uppercase tracking-wider text-accent-100 mb-4">Konsultasi PPDB</h3>
          <p class="text-xs text-emerald-100/80 mb-3 leading-relaxed">
            Butuh informasi pendaftaran atau kunjungan sekolah? Hubungi panitia via WhatsApp resmi.
          </p>
          <a href="https://wa.me/<?= $site['contact']['whatsapp'] ?>?text=<?= urlencode($ppdb['whatsapp_message']) ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center w-full px-4 py-2.5 rounded-lg bg-accent-500 text-white font-semibold text-sm hover:bg-accent-700 transition shadow">
            Chat WhatsApp Panitia
          </a>
          
          <div class="mt-6 pt-4 border-t border-emerald-800">
            <span class="text-xs text-emerald-300 block mb-2">Saluran Resmi:</span>
            <div class="flex items-center gap-3 text-emerald-200">
              <a href="<?= htmlspecialchars($site['social_media']['instagram']) ?>" target="_blank" rel="noopener noreferrer" class="hover:text-white" aria-label="Instagram Resmi">Instagram</a>
              <span class="text-emerald-700">•</span>
              <a href="<?= htmlspecialchars($site['social_media']['youtube']) ?>" target="_blank" rel="noopener noreferrer" class="hover:text-white" aria-label="YouTube Resmi">YouTube</a>
            </div>
          </div>
        </div>

      </div>

      <!-- Bottom Bar -->
      <div class="mt-12 pt-8 border-t border-emerald-800/80 flex flex-col sm:flex-row items-center justify-between text-xs text-emerald-200 gap-4">
        <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($site['site_name']) ?>. Dilindungi Hak Cipta.</p>
      </div>

    </div>
  </footer>

  <!-- Floating Quick Actions (WhatsApp & Back to Top) -->
  <aside aria-label="Aksi Cepat" class="fixed bottom-6 right-5 z-40 flex flex-col items-end gap-3 pointer-events-none">
    <!-- Back to Top Button -->
    <button id="btn-back-to-top" type="button" aria-label="Kembali ke atas" class="pointer-events-auto opacity-0 translate-y-3 pointer-events-none transition-all duration-300 w-11 h-11 rounded-full bg-white text-primary-800 shadow-md border border-slate-200 flex items-center justify-center hover:bg-primary-50 hover:text-primary-900 active:scale-90 cursor-pointer">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
      </svg>
    </button>

    <!-- Floating WhatsApp CTA with breathing glow -->
    <a href="https://wa.me/<?= $site['contact']['whatsapp'] ?>?text=<?= urlencode($ppdb['whatsapp_message']) ?>" target="_blank" rel="noopener noreferrer" class="pointer-events-auto wa-floating-btn group flex items-center gap-2.5 bg-emerald-600 hover:bg-emerald-700 text-white pl-3.5 pr-4 py-3 rounded-full shadow-lg transition-all active:scale-95" aria-label="Konsultasi via WhatsApp">
      <span class="relative flex h-3 w-3">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-300 opacity-75"></span>
        <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
      </span>
      <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
      </svg>
      <span class="font-semibold text-xs tracking-wide hidden sm:inline-block">Konsultasi PPDB</span>
    </a>
  </aside>

  <!-- Interactive Touch Animations Script -->
  <script>
    (function() {
      // Hormati preferensi sensitivitas gerakan pengguna
      if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
      }

      // 1. Animasi Ripple Sentuhan / Tap Halus
      function spawnTouchRipple(x, y) {
        var ripple = document.createElement('div');
        ripple.className = 'touch-ripple-effect';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        document.body.appendChild(ripple);

        ripple.addEventListener('animationend', function() {
          if (ripple.parentNode) {
            ripple.parentNode.removeChild(ripple);
          }
        });
      }

      window.addEventListener('pointerdown', function(e) {
        // Abaikan klik kanan atau tombol mouse selain tombol utama
        if (e.pointerType === 'mouse' && e.button !== 0) return;
        spawnTouchRipple(e.clientX, e.clientY);

        // Cari elemen interaktif untuk diberi animasi wiggle saat disentuh
        var target = e.target.closest('button, a, input[type="submit"], [role="button"]') ||
                     e.target.closest('article, .card-touch, img, .badge');
        if (target) {
          target.classList.remove('animate-wiggle');
          void target.offsetWidth; // Reflow agar animasi dapat berulang setiap kali disentuh
          target.classList.add('animate-wiggle');

          target.addEventListener('animationend', function handler() {
            target.classList.remove('animate-wiggle');
            target.removeEventListener('animationend', handler);
          }, { once: true });
        }
      }, { passive: true });

      // 2. Tombol Scroll ke Atas
      var btnTop = document.getElementById('btn-back-to-top');
      if (btnTop) {
        window.addEventListener('scroll', function() {
          if (window.scrollY > 300) {
            btnTop.classList.remove('opacity-0', 'translate-y-3', 'pointer-events-none');
            btnTop.classList.add('opacity-100', 'translate-y-0');
          } else {
            btnTop.classList.add('opacity-0', 'translate-y-3', 'pointer-events-none');
            btnTop.classList.remove('opacity-100', 'translate-y-0');
          }
        }, { passive: true });

        btnTop.addEventListener('click', function() {
          window.scrollTo({ top: 0, behavior: 'smooth' });
        });
      }
    })();
  </script>
</body>
</html>
