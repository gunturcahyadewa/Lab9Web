<section>
  <h2>Dashboard</h2>
  <p>Selamat datang. Pilih menu di atas untuk mengelola data.</p>
  <p>Contoh helper: <?= formatRupiah(1500000) ?></p>
  <p>Diskon 15% dari Rp 200.000: <?= formatRupiah(hitungDiskon(200000, 15)) ?></p>
  <p><?= e(ringkasTeks('Teks panjang untuk menguji pemotongan karakter oleh function ringkasTeks.', 30)) ?></p>
</section>
