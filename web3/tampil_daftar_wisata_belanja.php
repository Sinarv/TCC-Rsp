<?php
	$nama_wisata = "";
	if(isset($_POST["nama_wisata"])){
		$nama_wisata = $_POST["nama_wisata"];
	}

	include "koneksi.php";

	$sql = "SELECT * FROM data
			WHERE id LIKE '4%'
			ORDER BY id DESC";
	$hasil = mysqli_query($kon, $sql);
	if(!$hasil){
		die("Gagal query..".mysqli_error($kon));
	}
?>
<div class="table-responsive">
<table class="table" border="1">
	<tr style="background-color: #4169E1;">
		<th>Foto</th>
		<th>Nama Wisata</th>
		<th></th>
	</tr>
	<?php
		$no = 0;
		while($row = mysqli_fetch_assoc($hasil)){
			echo "<tr>";
			echo "<td><a href='pict/{$row['foto']}'>
				  <img src='thumb/{$row['foto']}' width='100'/>
				  </a></td>";				  
			echo "<td>".$row['nama']."</td>";
			echo "<td>";
			echo "<a href='data_lengkap_wisata.php?nama=".$row['nama']."' class='btn btn-primary' role='button'>Lihat</a>";
			echo "</td>";
			echo "</tr>";
		}
	?>
</table>
</div>