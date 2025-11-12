<?php
// Pastikan form disubmit dan data tahun diterima
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tahun'])) {
    $tahun = (int)$_POST['tahun'];

    // Aturan Tahun Kabisat:
    // 1. Habis dibagi 4 TAPI tidak habis dibagi 100, ATAU
    // 2. Habis dibagi 400.
    if (($tahun % 4 == 0 && $tahun % 100 != 0) || ($tahun % 400 == 0)) {
        $hasil = "$tahun **adalah** Tahun Kabisat.";
    } else {
        $hasil = "$tahun **bukan** Tahun Kabisat.";
    }
} else {
    $hasil = "Mohon masukkan tahun melalui form sebelumnya.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pengecekan</title>
</head>
<body>
    <h3>Hasil Pengecekan Tahun Kabisat</h3>
    <p><?php echo $hasil; ?></p>
    <br>
    <a href="form_kabisat.html">Kembali ke Form</a>
</body>
</html>