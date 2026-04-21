<html>
<head><title>Contoh Penggunaan UDF</title></head>
<body>
<!-- Menentukan Form Input -->
<form method="post">
Masukkan Bilangan Pertama : <br>
<input type="text" name="A" size=10> <br>
Masukkan Bilangan Kedua : <br>
<input type="text" name="B" size=10> <br>
<input type="submit" value="hitung">
</form>
<?php
if (isset($_POST["A"]) && isset($_POST["B"])) {
    $a = $_POST["A"];
    $b = $_POST["B"];
    function jumlah($A, $B) {
        $jumlahbil = $A + $B;
        return $jumlahbil;
    }
    function kurang($A, $B) {
        $kurangbil = $A - $B;
        return $kurangbil;
    }
    function kali($A, $B) {
        $kalibil = $A * $B;
        return $kalibil;
    }
    function bagi($A, $B) {
        $bagibil = $A / $B;
        return $bagibil;
    }
    echo "<br>";
    echo "Hasil Penjumlahan: " . jumlah($a, $b) . "<br>";
    echo "Hasil Pengurangan: " . kurang($a, $b) . "<br>";
    echo "Hasil Perkalian: " . kali($a, $b) . "<br>";
    echo "Hasil Pembagian: " . bagi($a, $b) . "<br>";
}
?>
</body>
</html>