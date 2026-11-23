<?php
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/helpers.php';

$celcius = $_POST['celcius'] ?? '';
$nilai   = $_POST['nilai'] ?? '';
?>
<section class="content">
  <h2>Halaman Home</h2>
  <p>Ini adalah konten khusus halaman beranda.</p>

  <h3>Uji Function</h3>
  <form method="post" action="">
    <p>Suhu Celcius<br>
      <input type="number" step="any" name="celcius" value="<?= e((string) $celcius) ?>">
    </p>
    <p>Nilai (0-100)<br>
      <input type="number" step="any" name="nilai" value="<?= e((string) $nilai) ?>">
    </p>
    <button type="submit">Hitung</button>
  </form>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <h3>Hasil</h3>
    <?php if (is_numeric($celcius)): ?>
      <p><?= e((string) $celcius) ?> &deg;C = <?= konversiCelciusKeFahrenheit((float) $celcius) ?> &deg;F</p>
    <?php endif; ?>
    <?php if (is_numeric($nilai)): ?>
      <p>Nilai <?= e((string) $nilai) ?> = predikat <?= tentukanStatusNilai((float) $nilai) ?></p>
    <?php endif; ?>
  <?php endif; ?>
</section>
<?php require_once __DIR__ . '/footer.php'; ?>