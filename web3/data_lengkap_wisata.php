<?php 
ob_start();
include_once ('template_atas.php') ; ?>

<html>
<br>
<?php
	$nama_wisata = "";
	if(isset($_GET["nama"])){
		$nama_wisata = $_GET["nama"];
	}

	include "koneksi.php";

	$sql = "SELECT * FROM data
			WHERE nama = '$nama_wisata' ";
	$hasil = mysqli_query($kon, $sql);
	if(!$hasil){
		die("Gagal query..".mysqli_error($kon));
	}
?>
<div class='container table-responsive'>
<table class="table" border="1">
	<tr style="background-color: #4169E1;">
		<th width='200px'>Foto</th>
		<th>Keterangan</th>
	</tr>
	<?php
		$no = 0;
		while($row = mysqli_fetch_assoc($hasil)){
			echo "<tr>";
			echo "<td><a href='pict/{$row['foto']}'>
				  <img src='thumb/{$row['foto']}' width='200' height='200'/>
				  </a></td>";				  
			echo "<td>"."Nama Tempat Wisata			: ".$row['nama']."<br>".
			     "Alamat Tempat Wisata		: ".$row['alamat']."<br>".
				 "Fasilitas Tempat Wisata		: ".$row['fasilitas']."<br>".
				 "Biaya Retribusi Tempat Wisata		: Rp.".$row['biaya']."</td>"."<br>";
			
			echo "</tr>";
		}
	?>
</table>
</div>

<br>
<br>
</html>

<?php include_once('template_bawah.php'); ?>