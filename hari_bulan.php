<?php
// Mengambil nomor bulan saat ini (1 sampai 12)
$angkaBln = date("n"); 
// Mengambil tahun saat ini untuk cek kabisat
$tahun = date("Y"); 

// Pengecekan Tahun Kabisat (diperlukan untuk bulan Februari)
$is_kabisat = (($tahun % 4 == 0 && $tahun % 100 != 0) || ($tahun % 400 == 0));

switch ($angkaBln) {
    case 1:
        $namaBln = "Januari";
        $jumlah_hari = 31;
        break;
    case 2:
        $namaBln = "Februari";
        // Cek kabisat: 29 hari jika kabisat, 28 hari jika tidak
        $jumlah_hari = $is_kabisat ? 29 : 28;
        break;
    case 3:
        $namaBln = "Maret";
        $jumlah_hari = 31;
        break;
    case 4:
        $namaBln = "April";
        $jumlah_hari = 30;
        break;
    case 5:
        $namaBln = "Mei";
        $jumlah_hari = 31;
        break;
    case 6:
        $namaBln = "Juni";
        $jumlah_hari = 30;
        break;
    case 7:
        $namaBln = "Juli";
        $jumlah_hari = 31;
        break;
    case 8:
        $namaBln = "Agustus";
        $jumlah_hari = 31;
        break;
    case 9:
        $namaBln = "September";
        $jumlah_hari = 30;
        break;
    case 10:
        $namaBln = "Oktober";
        $jumlah_hari = 31;
        break;
    case 11:
        $namaBln = "November";
        $jumlah_hari = 30;
        break;
    case 12:
        $namaBln = "Desember";
        $jumlah_hari = 31;
        break;
    default:
        $namaBln = "Bulan tidak valid";
        $jumlah_hari = 0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jumlah Hari Dalam Bulan</title>
</head>
<body>
    <h3>Jumlah Hari dalam Bulan Saat Ini (Menggunakan SWITCH)</h3>
    <p>Bulan saat ini adalah: **<?php echo $namaBln; ?>** (Tahun <?php echo $tahun; ?>)</p>
    <p>Jumlah hari dalam bulan **<?php echo $namaBln; ?>** adalah: **<?php echo $jumlah_hari; ?> hari**</p>
</body>
</html>