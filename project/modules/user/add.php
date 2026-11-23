<?php
$errors = [];
$nama = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfValid()) {
        $errors[] = 'Token keamanan tidak valid.';
    }
    $nama  = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($nama === '') {
        $errors[] = 'Nama wajib diisi.';
    }
    if (!validasiEmail($email)) {
        $errors[] = 'Format email tidak valid.';
    }

    if (!$errors) {
        $stmt = $pdo->prepare('INSERT INTO users (nama, email) VALUES (?, ?)');
        $stmt->execute([$nama, $email]);
        setFlash('success', 'Data pengguna berhasil ditambahkan.');
        redirect('user/list');
    }
}
?>
<section>
  <h2>Tambah Pengguna</h2>
  <?php foreach ($errors as $err): ?>
    <div class="alert error"><?= e($err) ?></div>
  <?php endforeach; ?>

  <form method="post" action="">
    <?= csrfField() ?>
    <label>Nama</label>
    <input type="text" name="nama" value="<?= e($nama) ?>" required>
    <label>Email</label>
    <input type="email" name="email" value="<?= e($email) ?>" required>
    <br><br>
    <button type="submit">Simpan</button>
    <a href="<?= url('user/list') ?>">Batal</a>
  </form>
</section>
