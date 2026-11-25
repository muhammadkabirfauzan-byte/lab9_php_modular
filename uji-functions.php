<?php
require_once __DIR__ . '/helpers/functions.php';

echo "<h2>Pengujian Library Function</h2>";

echo "Format Rupiah: " . formatRupiah(150000) . "<br>";

echo "Diskon: " . formatRupiah(hitungDiskon(200000, 10)) . "<br>";

echo "Validasi Email: ";
echo validasiEmail("kabir@gmail.com") ? "Email Valid" : "Email Tidak Valid";
echo "<br>";

echo "Ringkasan Teks: ";
echo ringkasTeks("PHP modular membantu program menjadi lebih terstruktur dan mudah dikembangkan.", 30);
?>