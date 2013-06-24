<?php
$nim = $_POST['nim'];
$foto= $_FILES['foto']['name'];

if ($foto=="") {
  echo "<script>alert('anda belum memasukkan foto');location.href='index.php'</script>";
	}
	else {
	
	include("app/koneksi.php");
	
	mysql_query("insert into t_mahasiswa set foto='$foto' where nim = '$nim'") or die (mysql_error());//insert data nama file ke database
	
	
	$move = move_uploaded_file($_FILES['foto']['tmp_name'], 'C:/xampp/htdocs/karir_new/member/foto/'.$_FILES['foto']['name']); //save image to the folder, pastikan file directory save upload image nya sudah benar.
	
	if($move){
	echo "<script>alert('selamat foto berhasil diupload');location.href='index.php'</script>";
	
	header ("location:index.php");
	}else
		{
		echo "<script>alert('maaf  foto gagal diupload');location.href='index.php'</script>";
	
		header ("location:index.php");
		}
	}
?>
