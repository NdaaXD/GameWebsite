<!-- <h2 class="text-center" style="margin-top: 56px; margin-bottom: 40px;">CHOOSE YOUR GAME</h2> -->
<div class="row text-center">
	<?php

	if(isset($_GET['search_game'])){
		if($_GET['search_game']==""){
			$all=mysql_query("SELECT * FROM tb_produk, tb_kategori WHERE tb_kategori.id_kategori=tb_produk.id_kategori ORDER BY id_game ASC");
		}
		else{
			$query = $_GET['search_game'];
	        $all = mysql_query("SELECT * FROM tb_produk, tb_kategori WHERE tb_kategori.id_kategori=tb_produk.id_kategori AND tb_kategori.nama_kategori='$query' ORDER BY id_game ASC");
	        if(!mysql_num_rows($all)>0){
	        	echo "<p class=\"text-center\" style=\"width:100%; margin-bottom: 40px;\">(TIDAK ADA KATEGORI YANG DIMAKSUD)</p>";
	        }
		}		
	}
	else{
		$all=mysql_query("SELECT * FROM tb_produk, tb_kategori WHERE tb_kategori.id_kategori=tb_produk.id_kategori ORDER BY id_game ASC");
	}

	while($c=mysql_fetch_array($all)){
		$id_game = $c['id_game'];
		$nama_game = $c['nama_game'];
		$kategori = $c['nama_kategori'];
		$jumlah_dvd = $c['jumlah_dvd'];
		$harga = $c['harga'];
		$image_game = $c['image_game'];
	
	?>
	<div class="col-lg-3 col-md-6 mb-4">
	<form method="post" action="product.php?action=add&id_game=<?php echo $c["id_game"]; ?>">
		<div class="card" id="<?php echo $id_game;?>">
			<img class="card-img-top" style="height: 150px;" src="images/games/<?php echo $image_game;?>" alt="<?php echo $image_game ?>" />
			<div class="card-body">
				<h4 class="card-title"><?php echo $nama_game;?></h4>
                <h6 class="my-3"><i><?php echo $kategori;?></i></h6>
				<p class="card-text"><?php echo $jumlah_dvd;?> DVD<br/>
                Rp. <?php echo number_format($harga); ?></p><br/>
			</div>
			<input type="hidden" name="hidden_name" value="<?php echo $nama_game; ?>" />
			<input type="hidden" name="hidden_kategory" value="<?php echo $kategori; ?>" />
			<input type="hidden" name="hidden_dvd" value="<?php echo $jumlah_dvd; ?>" />
			<input type="hidden" name="hidden_price" value="<?php echo $harga; ?>" />
			<div class="card-footer">
				<?php
	            if(isset($_SESSION['id'])){
	            	echo "<button name=\"add_cart\" type=\"submit\" class=\"btn btn-primary\" id=\"add\">Add to Cart</button>";
	            }
	            else{
	                echo "<a href=\"\" onClick=\"onCartClick()\" class=\"btn btn-primary\">Add to Cart</a>";
	            }
	            ?>
			</div>
		</div>
	</form>
	</div>
	<?php } ?>

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