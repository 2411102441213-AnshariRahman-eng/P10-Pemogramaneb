<!DOCTYPE html>
<html>
<head>
    <title>Perhitungan Upah Berdasarkan Golongan</title>
</head>
<body>
    <h3>Perhitungan Upah Karyawan Berdasarkan Golongan</h3>
    <form method="post" action="">
        <label for="jam_kerja">Jumlah Jam Kerja (Seminggu):</label>
        <input type="number" name="jam_kerja" id="jam_kerja" required min="0">
        <br><br>
        <label for="golongan">Pilih Golongan:</label>
        <select name="golongan" id="golongan" required>
            <option value="">-- Pilih Golongan --</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
        <br><br>
        <input type="submit" value="Hitung Upah">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['jam_kerja'], $_POST['golongan'])) {
        $jam_kerja = (int)$_POST['jam_kerja'];
        $golongan = $_POST['golongan'];
        $upah_lembur_per_jam = 3000;
        $batas_reguler = 48;
        $total_upah = 0;
        $upah_reguler_per_jam = 0;
        
        // Menentukan upah reguler per jam berdasarkan golongan
        switch ($golongan) {
            case 'A': $upah_reguler_per_jam = 4000; break;
            case 'B': $upah_reguler_per_jam = 5000; break;
            case 'C': $upah_reguler_per_jam = 6000; break;
            case 'D': $upah_reguler_per_jam = 7500; break;
            default: $upah_reguler_per_jam = 0;
        }

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
        echo "Golongan Karyawan: **$golongan**<br>";
        echo "Jumlah Jam Kerja: **$jam_kerja jam**<br>";
        echo $keterangan . "<br>";
        echo "Total Upah yang diterima: **Rp. " . number_format($total_upah) . ",-**";
    }
    ?>
</body>
</html>