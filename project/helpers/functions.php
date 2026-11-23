<?php
// BASE_URL otomatis mengikuti lokasi folder project (tidak perlu diubah).
if (!defined('BASE_URL')) {
    $dir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
    define('BASE_URL', $dir . '/');
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ---------- Library function ----------
function formatRupiah(float $angka): string {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function hitungDiskon(float $harga, float $persen = 10): float {
    return $harga * ($persen / 100);
}

function validasiEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function ringkasTeks(string $teks, int $maks = 100): string {
    if (mb_strlen($teks) <= $maks) {
        return $teks;
    }
    return mb_substr($teks, 0, $maks) . '...';
}

// ---------- Keamanan tampilan ----------
function e(?string $nilai): string {
    return htmlspecialchars($nilai ?? '', ENT_QUOTES, 'UTF-8');
}

// ---------- Navigasi ----------
function url(string $page): string {
    return BASE_URL . 'index.php?page=' . urlencode($page);
}

function redirect(string $page): void {
    header('Location: ' . url($page));
    exit;
}

function isActive(string $prefix): string {
    $page = $_GET['page'] ?? 'dashboard';
    return (is_string($page) && strpos($page, $prefix) === 0) ? 'active' : '';
}

// ---------- Pesan sukses/gagal ----------
function setFlash(string $tipe, string $pesan): void {
    $_SESSION['flash'] = ['tipe' => $tipe, 'pesan' => $pesan];
}

function tampilFlash(): void {
    if (!empty($_SESSION['flash'])) {
        $f = $_SESSION['flash'];
        echo '<div class="alert ' . e($f['tipe']) . '">' . e($f['pesan']) . '</div>';
        unset($_SESSION['flash']);
    }
}

// ---------- Perlindungan CSRF ----------
function csrfToken(): string {
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrfField(): string {
    return '<input type="hidden" name="csrf" value="' . csrfToken() . '">';
}

function csrfValid(): bool {
    return isset($_POST['csrf'], $_SESSION['csrf'])
        && hash_equals($_SESSION['csrf'], (string) $_POST['csrf']);
}
