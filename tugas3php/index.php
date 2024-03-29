<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Data Nilai Mahasiswa</h2>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Nilai</th>
                    <th>Grade</th>
                    <th>Predikat</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $nilai_mahasiswa = [
                    ['nim' => '00001', 'nama' => 'Hou Yi', 'nilai' => 97],
                    ['nim' => '00002', 'nama' => 'Alessio', 'nilai' => 93],
                    ['nim' => '00003', 'nama' => 'Diaochan', 'nilai' => 89],
                    ['nim' => '00004', 'nama' => 'Arthur', 'nilai' => 78],
                    ['nim' => '00005', 'nama' => 'Kaizer', 'nilai' => 84],
                    ['nim' => '00006', 'nama' => 'Fang', 'nilai' => 62],
                    ['nim' => '00007', 'nama' => 'Lam', 'nilai' => 65],
                    ['nim' => '00008', 'nama' => 'Mushashi', 'nilai' => 55],
                    ['nim' => '00009', 'nama' => 'Donghuang', 'nilai' => 50],
                    ['nim' => '00010', 'nama' => 'Kongming', 'nilai' => 78]
                ];

                function hitungGrade($nilai) {
                    if ($nilai >= 90) {
                        return 'A';
                    } elseif ($nilai >= 80) {
                        return 'B';
                    } elseif ($nilai >= 70) {
                        return 'C';
                    } elseif ($nilai >= 60) {
                        return 'D';
                    } else {
                        return 'E';
                    }
                }

                function hitungPredikat($grade) {
                    switch ($grade) {
                        case 'A':
                            return 'Memuaskan';
                            break;
                        case 'B':
                            return 'Bagus';
                            break;
                        case 'C':
                            return 'Cukup';
                            break;
                        case 'D':
                            return 'Kurang';
                            break;
                        case 'E':
                            return 'Buruk';
                            break;
                        default:
                            return 'Tidak Valid';
                    }
                }

                $nilai_tertinggi = max(array_column($nilai_mahasiswa, 'nilai'));
                $nilai_terendah = min(array_column($nilai_mahasiswa, 'nilai'));
                $total_nilai = array_sum(array_column($nilai_mahasiswa, 'nilai'));
                $jumlah_mahasiswa = count($nilai_mahasiswa);
                
                foreach ($nilai_mahasiswa as $mahasiswa) {
                    $nim = $mahasiswa['nim'];
                    $nama = $mahasiswa['nama'];
                    $nilai = $mahasiswa['nilai'];
                    $grade = hitungGrade($nilai);
                    $predikat = hitungPredikat($grade);
                    $keterangan = ($grade == 'E') ? 'Tidak Lulus' : 'Lulus';

                    echo "<tr><td>$no</td><td>$nim</td><td>$nama</td><td>$nilai</td><td>$grade</td><td>$predikat</td><td>$keterangan</td></tr>";
                    $no++;
                }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">Nilai Tertinggi: <?php echo $nilai_tertinggi; ?></td>
                </tr>
                <tr>
                    <td colspan="7">Nilai Terendah: <?php echo $nilai_terendah; ?></td>
                </tr>
                <tr>
                    <td colspan="7">Nilai Rata-rata: <?php echo round($total_nilai / $jumlah_mahasiswa, 2); ?></td>
                </tr>
                <tr>
                    <td colspan="7">Jumlah Mahasiswa: <?php echo $jumlah_mahasiswa; ?></td>
                </tr>
                <tr>
                    <td colspan="7">Jumlah Keseluruhan Nilai: <?php echo $total_nilai; ?></td>
                </tr>
            </tfoot>
        </table>
        <?php
            $startYear = 2024;
            $currentYear = date('Y');
            echo "&copy; Calvin, $startYear&ndash;$currentYear";
            ?>
    </div>
</body>

</html>