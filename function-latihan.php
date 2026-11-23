<?php
// 1. Tanpa parameter
function tampilkanSalam() {
    echo "Selamat belajar PHP modular!";
}
tampilkanSalam();
echo "<br>";

// 2. Dengan parameter
function sapaPengguna($nama) {
    echo "Halo, " . htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
}
sapaPengguna("Rina");
echo "<br>";

// 3. Dengan return
function hitungLuasPersegiPanjang($panjang, $lebar) {
    return $panjang * $lebar;
}
$luas = hitungLuasPersegiPanjang(8, 5);
echo "Luas: " . $luas . "<br>";

// 4. Type declaration dan nilai default
function hitungDiskon(float $harga, float $persen = 10): float {
    return $harga * ($persen / 100);
}
echo hitungDiskon(200000) . "<br>";      // 20000
echo hitungDiskon(200000, 15) . "<br>";  // 30000