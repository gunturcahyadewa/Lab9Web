<?php
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    setFlash('error', 'ID tidak valid.');
    redirect('user/list');
}

$stmt = $pdo->prepare('SELECT id, nama, email FROM users WHERE id = ?');
$stmt->execute([$id]);
$user = $stmt->fetch();
if (!$user) {
    setFlash('error', 'Data tidak ditemukan.');
    redirect('user/list');
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfValid()) {
        $errors[] = 'Token keamanan tidak valid.';
    }
    $user['nama']  = trim($_POST['nama'] ?? '');
    $user['email'] = trim($_POST['email'] ?? '');

    if ($user['nama'] === '') {
        $errors[] = 'Nama wajib diisi.';
    }
    if (!validasiEmail($user['email'])) {
        $errors[] = 'Format email tidak valid.';
    }

    if (!$errors) {
        $upd = $pdo->prepare('UPDATE users SET nama = ?, email = ? WHERE id = ?');
        $upd->execute([$user['nama'], $user['email'], $id]);
        setFlash('success', 'Data pengguna berhasil diperbarui.');
        redirect('user/list');
    }
}
?>
<section>
  <h2>Edit Pengguna</h2>
  <?php foreach ($errors as $err): ?>
    <div class="alert error"><?= e($err) ?></div>
  <?php endforeach; ?>

  <form method="post" action="">
    <?= csrfField() ?>
    <label>Nama</label>
    <input type="text" name="nama" value="<?= e($user['nama']) ?>" required>
    <label>Email</label>
    <input type="email" name="email" value="<?= e($user['email']) ?>" required>
    <br><br>
    <button type="submit">Update</button>
    <a href="<?= url('user/list') ?>">Batal</a>
  </form>
</section>
