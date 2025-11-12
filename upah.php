<!DOCTYPE html>
<html>
<head>
    <title>Perhitungan Upah Honorer</title>
</head>
<body>
    <h3>Perhitungan Upah Karyawan Honorer</h3>
    <form method="post" action="">
        <label for="jam_kerja">Jumlah Jam Kerja (Seminggu):</label>
        <input type="number" name="jam_kerja" id="jam_kerja" required min="0">
        <br><br>
        <input type="submit" value="Hitung Upah">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['jam_kerja'])) {
        $jam_kerja = (int)$_POST['jam_kerja'];
        $upah_reguler_per_jam = 2000;
        $upah_lembur_per_jam = 3000;
        $batas_reguler = 48;
        $total_upah = 0;

        if ($jam_kerja > $batas_reguler) {
            // Ada jam lembur
            $jam_reguler = $batas_reguler;
            $jam_lembur = $jam_kerja - $batas_reguler;

            $upah_reguler = $jam_reguler * $upah_reguler_per_jam;
            $upah_lembur = $jam_lembur * $upah_lembur_per_jam;
            $total_upah = $upah_reguler + $upah_lembur;

            $keterangan = "Reguler: $jam_reguler jam (@Rp. " . number_format($upah_reguler_per_jam) . ") = Rp. " . number_format($upah_reguler) . "<br>";
            $keterangan .= "Lembur: $jam_lembur jam (@Rp. " . number_format($upah_lembur_per_jam) . ") = Rp. " . number_format($upah_lembur);

        } else {
            // Hanya jam reguler
            $total_upah = $jam_kerja * $upah_reguler_per_jam;
            $keterangan = "Reguler: $jam_kerja jam (@Rp. " . number_format($upah_reguler_per_jam) . ") = Rp. " . number_format($total_upah);
        }
        
        echo "<hr>";
        echo "<h4>Hasil Perhitungan Upah</h4>";
        echo "Jumlah Jam Kerja: **$jam_kerja jam**<br>";
        echo $keterangan . "<br>";
        echo "Total Upah yang diterima: **Rp. " . number_format($total_upah) . ",-**";
    }
    ?>
</body>
</html>