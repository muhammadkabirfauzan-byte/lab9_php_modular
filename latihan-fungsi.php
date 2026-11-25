
<?php
function konversiCelciusKeFahrenheit($c) {
    return ($c * 9/5) + 32;
}

function tentukanStatusNilai($nilai) {
    if ($nilai >= 80) {
        return "A";
    } elseif ($nilai >= 70) {
        return "B";
    } elseif ($nilai >= 60) {
        return "C";
    } else {
        return "D";
    }
}

function hitungTotal($harga, $jumlah) {
    return $harga * $jumlah;
}

echo "25 derajat Celcius = ";
echo konversiCelciusKeFahrenheit(25);
echo " derajat Fahrenheit<br>";

echo "Nilai 85 mendapatkan status: ";
echo tentukanStatusNilai(85);
echo "<br>";

echo "Total harga: Rp ";
echo hitungTotal(15000, 3);
?>
