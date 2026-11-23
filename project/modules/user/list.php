<?php
$users = $pdo->query('SELECT id, nama, email FROM users ORDER BY id DESC')->fetchAll();
?>
<section>
  <h2>Data Pengguna</h2>
  <a class="btn" href="<?= url('user/add') ?>">Tambah Pengguna</a>

  <table>
    <tr><th>No</th><th>Nama</th><th>Email</th><th>Aksi</th></tr>
    <?php if (!$users): ?>
      <tr><td colspan="4">Belum ada data.</td></tr>
    <?php endif; ?>
    <?php foreach ($users as $i => $u): ?>
      <tr>
        <td><?= $i + 1 ?></td>
        <td><?= e($u['nama']) ?></td>
        <td><?= e($u['email']) ?></td>
        <td>
          <a href="<?= url('user/edit') ?>&id=<?= (int) $u['id'] ?>">Edit</a>
          <form method="post" action="<?= url('user/delete') ?>" style="display:inline"
                onsubmit="return confirm('Hapus data ini?')">
            <?= csrfField() ?>
            <input type="hidden" name="id" value="<?= (int) $u['id'] ?>">
            <button type="submit">Hapus</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</section>
