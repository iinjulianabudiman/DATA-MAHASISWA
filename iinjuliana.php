<?php
    $koneksi = mysqli_connect("localhost", "root", "", "uho");

    if($koneksi){
        //echo "Alhamdulillah sudah terkoneksi";
    }else{
        echo "Aduh, gagal nih gan";
    }
?>

<h1>Masukan Data mahasiswa</h1>

<form action="" method="post">
<table border="2">
    <tr>
        <td>NIM  </td>
        <td><input type="text" name="NIM"></td>
    </tr>
    <tr>
        <td>NAMA  </td>
        <td><input type="text" name="NAMA"></td>
    </tr>
    <tr>
        <td>JURUSAN  </td>
        <td><input type="text" name="JURUSAN"></td>
    </tr>
    <tr>
        <td>ALAMAT  </td>
        <td><input type="text" name="ALAMAT"></td>
    </tr>
    <tr>
        <td>No_Hp  </td>
        <td><input type="text" name="No_Hp"></td>
    </tr>
</table>
    <input type="submit" name="registrasi" value="Input">
</form>
<h1>Data Mahasiswa</h1>
<table border="2">
    <thead>
        <th>No</th>
        <th>NIM</th>
        <th>NAMA</th>
        <th>JURUSAN</th>
        <th>ALAMAT</th>
        <th>No Hp</th>
        <th>aksi</th>
        
    </thead>
    <tbody>

        <?php
            $sqlView = "SELECT * FROM `mahasiswa`";
            $cekView = mysqli_query($koneksi, $sqlView);

            $nomor = 1;
            while($data = mysqli_fetch_array($cekView)){
        ?>
        <tr>
            <td><?=$nomor ?></td>
            <td><?=$data[1] ?></td>
            <td><?=$data[2] ?></td>
            <td><?=$data[3] ?></td>
            <td><?=$data[4] ?></td>
            <td><?=$data[5] ?></td>
            <td>
                <a href="iinjuliana.php?id=<?=$data[0]?>">Delete</a>
            </td>
        </tr>
        <?php
            $nomor++; // ++ = nomor+1; 
            }
        ?>
    <!-- /end -->
    </tbody>
</table>

<?php
    if(isset($_POST['registrasi'])){
        $sqlInput = "INSERT INTO `mahasiswa` (`NIM`,`NAMA`,`JURUSAN`,`ALAMAT`,`No_Hp`)
                VALUES ('$_POST[NIM]', '$_POST[NAMA]', '$_POST[JURUSAN]', '$_POST[ALAMAT]', '$_POST[No_Hp]')";
        $cekInput = mysqli_query($koneksi, $sqlInput);
        if($cekInput){
            // echo "Datanya udah masuk gan";
            echo "<script> window.location = 'iinjuliana.php' </script>";
        }else{
            echo "Aduh.. Gagal masuk datanya gan";
        }
    }

    if(isset($_GET['id'])){
        $sqlDelete = "DELETE FROM `mahasiswa` WHERE
        `mahasiswa`.`id` = '$_GET[id]'";
        $cekDelete = mysqli_query($koneksi, $sqlDelete);

        if($cekDelete){
            // echo "Datanya udah masuk gan";
            echo "<script> window.location = 'iinjuliana.php' </script>";
        }else{
            echo "Aduh.. Gagal ngehapus datanya gan";
        }
    }
?>