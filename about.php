<?php
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/helpers.php';

$harga  = $_POST['harga'] ?? '';
$jumlah = $_POST['jumlah'] ?? '';
?>
<section class="content">
  <h2>Tentang Aplikasi</h2>
  <p>Halaman ini menjelaskan tujuan aplikasi.</p>

  <h3>Uji Function</h3>
  <form method="post" action="">
    <p>Harga satuan (Rp)<br>
      <input type="number" step="any" min="0" name="harga" value="<?= e((string) $harga) ?>">
    </p>
    <p>Jumlah<br>
      <input type="number" min="0" name="jumlah" value="<?= e((string) $jumlah) ?>">
    </p>
    <button type="submit">Hitung Total</button>
  </form>

  <?php if (is_numeric($harga) && is_numeric($jumlah)): ?>
    <h3>Hasil</h3>
    <p>Total belanja (<?= (int) $jumlah ?> x <?= formatRupiah((float) $harga) ?>):
       <strong><?= formatRupiah(hitungTotal((float) $harga, (int) $jumlah)) ?></strong></p>
  <?php endif; ?>
</section>
<?php require_once __DIR__ . '/footer.php'; ?>