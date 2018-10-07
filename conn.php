<?php
 $conn = mysqli_connect("localhost","root","","d_modul5");
if(!$conn){
    die("Gagal Konek ".mysqli_connect_error());
}


function insert($nama,$nim,$email,$tanggal,$fakultas,$prodi)
{
    Global $conn;
    mysqli_query($conn,"INSERT INTO t_jurnal1(nama,nim,email,tanggal,fakultas,prodi) VALUES('$nama','$nim','$email','$tanggal','$fakultas','$prodi')");
    
    $query= mysqli_query($conn,"SELECT * FROM t_jurnal1  WHERE  nim='$nim'");
    $data= mysqli_fetch_array($query);
    print_r($data);
    // header("location:soal2.php");
    
}

function get($nim)
{
    Global $conn;
    $query= mysqli_query($conn,"SELECT * FROM t_jurnal1  WHERE  nim='$nim'");
    $data= mysqli_fetch_array($query);
   
    return $data;
    // header("location:soal2.php");   
}
function up($komen,$nim)
{
    Global $conn;
    mysqli_query($conn,"UPDATE t_jurnal1 SET komentar='$komen'  WHERE `nim` = '$nim' ");;
    // header("location:soal2.php");   
}






?>