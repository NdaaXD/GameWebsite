<h2 class="text-center" style="margin-top: 60px; margin-bottom: 40px;">LATEST GAMES</h2>
<div class="row text-center">
	<?php

	$all=mysql_query("SELECT * FROM tb_produk, tb_kategori WHERE tb_kategori.id_kategori=tb_produk.id_kategori ORDER BY id_game DESC LIMIT 4");

	while($c=mysql_fetch_array($all)){
		$id_game = $c['id_game'];
		$nama_game = $c['nama_game'];
		$kategori = $c['nama_kategori'];
		$jumlah_dvd = $c['jumlah_dvd'];
		$harga = $c['harga'];
		$image_game = $c['image_game'];
	?>
	<div class="col-lg-3 col-md-6 mb-4">
		<div class="card">
			<img class="card-img-top" style="height: 150px;" src="images/event/<?php echo $image_game;?>" alt="<?php echo $image_game ?>">
			<div class="card-body">
				<h4 class="card-title"><?php echo $nama_game;?></h4>
                <h6 class="my-3"><i><?php echo $kategori;?></i></h6>
				<p class="card-text"><?php echo $jumlah_dvd;?> DVD<br/>
                Rp. <?php echo $harga;?><br/>
			</div>
			<div class="card-footer">
				<?php
	            if(isset($_SESSION['id'])){
	            	echo "<a href=\"#.php\" class=\"btn btn-primary\">Add to Cart</a>";
	            }
	            else{
	                echo "<a href=\"#\" onClick=\"onCartClick()\" class=\"btn btn-primary\">Add to Cart</a>";
	            }
	            ?>
			</div>
		</div>
	</div>
	<?php }?>

	<script type="text/javascript">
	function onCartClick() {
	 
	  var confirmmessage = "Untuk melakukan transaksi anda harus login";
	  var go = "login.php";
	 
	  if (confirm(confirmmessage)) {
	      window.location = go;
	  }
	 
	}
	</script>
	
</div>