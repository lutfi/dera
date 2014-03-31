<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
mysql_connect("localhost","root","telkomd2");
mysql_select_db("dera");
 ?>
<table border="1">
	<tr>
    	<td>
        <form action="" method="post">
        <pre>
        	Halaman Aturan Servis
            
            Silahkan Masukkan Kilometer
            Spedometer terakhir Anda
            
            <input type="text" name="xNilai" />
            
            <input type="submit" value="Tambah" name="xTambah" /><input type="submit" value="Hapus" name="xHapus" />
        </pre>
        </form>
         <?php
		 $nilai=$_POST['xNilai'];
		 $tambahan=200;
		 $jumlah=$nilai+$tambahan;
		 if($_POST['xTambah']){
			 $query=mysql_query("INSERT INTO jumlah SET jumlah='$jumlah', tgl_entry=now()");
			 }
		 if($_POST['xHapus']){
			//DETEKSI RECORD PALING BAWAH 
			$bawah=mysql_query("SELECT id FROM jumlah ORDER BY tgl_entry ASC LIMIT 0,1");
			$datanya=mysql_fetch_array($bawah);
			$data_terbawah=$datanya['id'];
			 $query2=mysql_query("DELETE FROM jumlah WHERE id='$data_terbawah'");
			 }
	?>
        </td>
    </tr>
   <?php
   //yang terakhir diinputkan tampil paling atas kalau nanti kurang tepat bisa dibalik menggunakan ASC
   $query3=mysql_query("select * from jumlah ORDER BY tgl_entry DESC");
   while($data=mysql_fetch_array($query3)){
	   $data_jumlah=$data['jumlah'];
   ?>
    <tr>
    	<td align="center">
        Hasilnya : <?php echo $data_jumlah; ?>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>

<?php echo phpinfo(); ?>
