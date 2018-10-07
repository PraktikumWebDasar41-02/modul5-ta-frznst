<?php
include ("conn.php");
session_start();
$_SESSION['nim'];
$isi= get($_SESSION['nim']);

if(!isset($_SESSION['nim'])){
    header("location:s1.php");
}
if (isset($_POST['submit'])) {
	$komen=$_POST['komen'];
	up($komen,$_SESSION['nim']);
	header("location:s3.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="POST">
	<table>
		<tr><td><?php echo $isi['nama']." (".$isi['nim'].")" ?></td></tr>
		<tr><td><textarea cols="30" rows="10" placeholder="masukan komentar" name="komen"></textarea></td></tr>
		<tr><td><input type="submit" name="submit" value="submit"></td></tr>
	</table>
</form>


</body>
</html>