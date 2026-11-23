<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !csrfValid()) {
    setFlash('error', 'Permintaan hapus tidak valid.');
    redirect('user/list');
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if ($id) {
    $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
    $stmt->execute([$id]);
    setFlash('success', 'Data pengguna berhasil dihapus.');
} else {
    setFlash('error', 'ID tidak valid.');
}
redirect('user/list');
