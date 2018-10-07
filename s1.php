<?php
include 'conn.php';
session_start();
if(isset($_POST['logout'])){
    session_destroy();
}
if(isset($_SESSION['nim'])){
    header("location:s2.php");
}
	if (isset($_POST['submit'])) {
		$nama=$_POST['nama'];
		$nim=$_POST['nim'];
        $email=$_POST['email'];
        $tanggal=$_POST['tanggal'];
        $fakultas=$_POST['fakultas'];
        $prodi=$_POST['prodi'];
        $cek=[];
        
       if(empty($nama)){
           $cek[0]="Nama harus diisi";
       }
       elseif(is_numeric($nama)==TRUE){
        $cek[0]="Inputan Salah";
    }
    elseif(strlen(trim($nama," "))>20){
        $cek[0]="Nama tidak boleh lebih dari 20 karakter";
    }
//nama
    if(empty($nim)){
        $cek[1]="NIM harus diisi";
    }
    elseif(is_numeric($nim)==FALSE){
        $cek[1]="Inputan Salah";
    }
    elseif(strlen(trim($nim," "))>10){
        $cek[1]="NIM tidak boleh lebih dari 10 karakter";
    }
//nim


     if(empty($email)){
        $cek[2]="Email harus diisi";
    }
    elseif(!preg_match("/@/",$email)&&!preg_match("/.com/",$email)){
        $cek[2]="Inputan Salah";
    }
//email
    if(empty($tanggal)){
        $cek[3]="Tanggal harus diisi";
    }
//tanggal
    if(empty($fakultas)){
        $cek[4]="Fakultas harus dipilih";
    }
//fakultas
    if(empty($prodi)){
        $cek[5]="Prodi harus dipilih";
    }
//prodi
    // print_r($cek);

    else{
        $_SESSION['nim']=$nim;
        insert($nama,$nim,$email,$tanggal,$fakultas,$prodi);
        header("location:s2.php");
    }

        }
       

	


?>


<!DOCTYPE html>
<html>
<head>
	<title>soal1</title>
</head>
<body>
	<form action="" method="POST">
		<table>
			<tr><td>Masukan nama </td><td><input type="text" name="nama" 
            value="<?php
            if(isset($_POST['submit'])){
            if(empty($cek[0])){echo $nama;}
            }?>"
            ></td></tr>
            <?php
            if(!empty($cek[0])){
                echo"<tr><td></td><td><mark>*".$cek[0]."</mark></td></tr>";
            }
            ?>
			<tr><td>Masukan nim </td><td><input type="text" name="nim"
            value="<?php
            if(isset($_POST['submit'])){
            if(empty($cek[1])){echo $nim;}
            }?>"
            
            ></td></tr>
            <?php
            if(!empty($cek[1])){
                echo"<tr><td></td><td><mark>*".$cek[1]."</mark></td></tr>";
            }
            ?>
			<tr><td>Masukan email</td><td><input type="text" name="email"
            value="<?php
            if(isset($_POST['submit'])){
            if(empty($cek[2])){echo $email;}
            }?>"
            
            ></td>
            <?php
            if(!empty($cek[2])){
                echo"<tr><td></td><td><mark>*".$cek[2]."</mark></td></tr>";
            }
            ?>
            <tr><td>Masukan tanggal</td><td><input type="date" name="tanggal"
            value="<?php
            if(isset($_POST['submit'])){
            if(empty($cek[3])){echo $tanggal;}
            }?>"
            
            ></td>
            <?php
            if(!empty($cek[3])){
                echo"<tr><td></td><td><mark>*".$cek[3]."</mark></td></tr>";
            }
            ?>
            <tr><td>Pilih Fakultas</td><td><SELECT name="fakultas">
            <option value="" selected>Pilih</option>
            <option value="FIT" >FIT</option>
            <option value="FIK" >FIK</option>
            <option value="FKB" >FKB</option>
            <option value="FEB" >FEB</option>
            <option value="FTE" >FTE</option>
            <option value="FRI" >FRI</option>
            <option value="FIF" >FIF</option>
            </td>
            <?php
            if(!empty($cek[4])){
                echo"<tr><td></td><td><mark>*".$cek[4]."</mark></td></tr>";
            }
            ?>
            <tr><td>Pilih Prodi</td><td><SELECT name="prodi">
            <option value=""  selected>Pilih</option>
            <option value="Manajemen Infromatika">MI</option>
            <option value="Teknik Informatika" >IF</option>
            <option value="Teknik Telekomunikasi" >TT</option>
            <option value="Perhotelan" >Perhotelan</option>
            <option value="Manajemen Pemasaran" >MP</option>
            </td>
            <?php
            if(!empty($cek[5])){
                echo"<tr><td></td><td><mark>*".$cek[5]."</mark></td></tr>";
            }
            ?>
			<tr><td><input type="submit" name="submit" value="submit"> </td></tr>


		
		</table>


	</form>
	
</body>
</html>

