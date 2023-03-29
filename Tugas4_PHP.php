<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM FUNCTION PHP</title>
</head>

<body>
    <!-- Styling CSS Internal -->
    <style>
        body {
            background-color: navy;
            color: white;
            margin: 50px;
            padding: 10px;
        }

        h1 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            margin: auto;
            font-family: Arial, sans-serif;
            font-size: 18px;
            table-layout: fixed;
            text-align: center; 
            border-style: solid;
            border-color: maroon;
            background-color: #FFFAFA;
            color: black;
            
        }

        summary {
            font-size : 24px;
            font-weight: bold;
        }

        details{
            font-size : 18px;}

        td {
            padding: 10px;
            border: 1px solid black;
        }

        input[type=text]{
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
            font-size: 18px;
        }

        input[type="radio"] {
            transform: scale(0.8);
        }

        input[type="checkbox"] {
            transform: scale(0.8);
            font-size : 11px;
        }

        input[type="select"] {
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
            font-size: 18px;
        }

        input[type="email"] {
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
            font-size: 18px;
        }

        select{
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
            font-size: 18px;
            text-align: center;
        }

        button {
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
            font-size: 18px;
        }
    </style>

    <!-- Bagian Header judul hanya pakai tag html -->
    <h1 align='center'>FORM PENERAPAN FUNCTION<br>MENGGUNAKAN PHP</h1>
    <hr color='white'>

    <!-- Bagian menampilkan soal hanya pakai tag html -->
    <details>
        <summary>SOAL</summary>
        <p>
            Lanjutkan kode dari file form_fungsi.php yang sudah dibuat pada pertemuan pembelajaran, dengan ketentuan berikut:
            <ol type = '1'>
                <li>Hitung skor skill</li>
                <li>Tentukan ketegori skill dengan fungsi</li>
            </ol>
        </p>
    </details>
    <hr color='white'>

    <?php
        // data prodi, skill, dan domisili yang akan ditampilkan pada form menggunakan array scalar
        $ar_prodi = ["SI"=>"Sistem Informasi", "TI"=>"Teknik Informatika", "ILKOM"=>"Ilmu Komunikasi", "TE"=>"Teknik Elektro"]; 

        $ar_skill = ["HTML"=>10, "CSS"=>10, "Javascript"=>20, "RWD Bootstrap"=>20, "PHP"=>30, "MSQL"=>30, "Laravel"=>40];

        $domisili = ["Jakarta", "Bandung", "Bekasi", "Malang", "Surabaya", "Lainnya"];
    ?>

    <!-- Bagian Form menggunakan tag html dan tag php -->
    <table>
        <thead>
            <tr>
                <th colspan="2" style="font-weight: bold; background-color: gold; font-size:24px;">FORM PENERAPAN FUNCTION</th>
            </tr>
        </thead>
        <tbody>
            <form action="" method="POST">
                <tr>
                    <td>NIM</td>
                    <td><input type="text" name="nim" id="" placeholder="Masukan NIM anda" required></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" id="" placeholder="Masukan NAMA anda" required></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td class="gender">
                        <input type="radio" name="jk" id="" value="L" required>Laki-laki
                        <input type="radio" name="jk" id="" value="P" required>Perempuan
                    </td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td>
                        <select name="prodi" id="" required>
                            <option value="">-- Pilih Prodi --</option>
                            <?php // menampilkan data prodi menggunakan foreach
                                foreach($ar_prodi as $prodi => $v){
                                    ?>
                                    <option value="<?= $prodi ?>"><?= $v ?></option>
                                    <?php } ?>
                                    </select>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Skill</td>
                    <td class="skillprogram">
                        <?php // menampilkan data skill menggunakan foreach
                            foreach($ar_skill as $skill => $v){
                                ?>
                                <input type="checkbox" name="skill[]" id="" value="<?= $skill ?>" ><?= $skill ?>
                                <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td>Domisili</td>
                    <td>
                        <select name="domisili" id="" required>
                            <option value="">-- Pilih Domisili --</option>
                            <?php // menampilkan data domisili menggunakan foreach
                                foreach($domisili as $d){
                                    ?>
                                    <option value="<?= $d ?>"><?= $d ?></option>
                                    <?php } ?>
                                    </select>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" id="" placeholder="example@domain.com" required></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan ="2">
                        <button name="proses">Submit</button>
                    </th>
                </tr>
            </tfoot>
        </form>
    </table>

    <!-- Bagian PHP -->
    <hr color='white'>
    <h2>OUTPUT</h2>

    <?php

        ERROR_REPORTING(0); // supaya tidak menampilkan error

        // mengecek apakah form sudah di submit
        if(isset($_POST['proses'])){
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $jk = $_POST['jk'];
            $prodi = $_POST['prodi'];
            $skill = $_POST['skill'];
            $domisili = $_POST['domisili'];
            $email = $_POST['email'];
            }

            // Hitung skor skill menggunakan foreach
            $total_skor = 0;
            foreach($skill as $s){
                $total_skor += $ar_skill[$s];
            }

            // Tentukan kategori skill menggunakan function
            function skill_kategory($skor){
                if($skor == 0){
                    return "Tidak Memadai";
                } else if($skor <= 40){
                    return "Kurang";
                } else if($skor <= 60){
                    return "Cukup";
                } else if($skor <= 100){
                    return "Baik";
                } else {
                    return "Sangat Baik";
                }
            }

            $kategori_skill = skill_kategory($total_skor); // memanggil function skill_kategory
    ?>

    <!-- Bagian Output yang disajikan dengan table -->
    <table>
        <tr>
            <th colspan="2" style="font-weight: bold; background-color: gold; font-size:24px; text-align:center;">HASIL</th>
        </tr>
        <tr>
            <td>NIM</td>
            <td><?= $nim ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?= $nama ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?= $jk ?></td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td><?= $prodi ?></td>
        </tr>
        <tr>
            <td>Skill</td>
            <td>
                <?php // menampilkan data skill yang dipilih menggunakan foreach
                    foreach($skill as $s){
                        echo $s . ", ";
                    }
                ?>
            </td>
        <tr>
            <td>Skor Skill</td>
            <td><?= $total_skor ?></td>
        </tr>
        <tr>
            <td>Kategori Skill</td>
            <td><?= $kategori_skill ?></td>
        </tr>
        </tr>
        <tr>
            <td>Domisili</td>
            <td><?= $domisili ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= $email ?></td>
    </table>

</body>
</html>