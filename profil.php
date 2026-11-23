<?php
session_start();
require_once __DIR__ . '/helpers.php';

// Simpan data saat form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['profil'] = [
        'nama'  => trim($_POST['nama'] ?? ''),
        'nim'   => trim($_POST['nim'] ?? ''),
        'kelas' => trim($_POST['kelas'] ?? ''),
    ];
}

$profil = $_SESSION['profil'] ?? ['nama' => '', 'nim' => '', 'kelas' => ''];

require_once __DIR__ . '/header.php';
?>
<section class="content">
  <h2>Profil</h2>

  <?php if ($profil['nama'] !== ''): ?>
    <p>Nama: <?= e($profil['nama']) ?></p>
    <p>NIM: <?= e($profil['nim']) ?></p>
    <p>Kelas: <?= e($profil['kelas']) ?></p>
  <?php else: ?>
    <p>Belum ada data profil. Silakan isi form di bawah.</p>
  <?php endif; ?>

  <h3>Isi / Ubah Profil</h3>
  <form method="post" action="">
    <p>Nama<br>
      <input type="text" name="nama" value="<?= e($profil['nama']) ?>" required>
    </p>
    <p>NIM<br>
      <input type="text" name="nim" value="<?= e($profil['nim']) ?>" required>
    </p>
    <p>Kelas<br>
      <input type="text" name="kelas" value="<?= e($profil['kelas']) ?>" required>
    </p>
    <button type="submit">Simpan</button>
  </form>
</section>
<?php require_once __DIR__ . '/footer.php'; ?>