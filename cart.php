<?php

if(isset($_POST["add_cart"])){

	if(isset($_SESSION["shopping_cart"])){
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");

		if(!in_array($_GET["id_game"], $item_array_id)){
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id' => $_GET["id_game"],
				'item_name' => $_POST["hidden_name"],
				'item_kategory' => $_POST["hidden_kategory"],
				'item_dvd' => $_POST["hidden_dvd"],
				'item_price' => $_POST["hidden_price"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else{
		$item_array = array(
			'item_id' => $_GET["id_game"],
			'item_name' => $_POST["hidden_name"],
			'item_kategory' => $_POST["hidden_kategory"],
			'item_dvd' => $_POST["hidden_dvd"],
			'item_price' => $_POST["hidden_price"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
	echo '<script>window.location="#cart"</script>';
}

if(isset($_GET["action"])){

	if($_GET["action"] == "delete"){
		foreach($_SESSION["shopping_cart"] as $keys => $values){
			if($values["item_id"] == $_GET["id_game"]){
				unset($_SESSION["shopping_cart"][$keys]);
				sort($_SESSION["shopping_cart"]);
				// echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="#cart"</script>';
			}
		}
	}
	else if($_GET["action"] == "buy"){
		$id_transaksi = rand(1000,100000);
		foreach($_SESSION["shopping_cart"] as $keys => $values){
			$id_game = $values['item_id'];
			$id_user = $_SESSION['id'];
			$hasil=mysql_query("INSERT INTO tb_transaksi SET id_transaksi=$id_transaksi, id_user='$id_user', id_produk='$id_game', tanggal_transaksi=NOW()");
		}
		echo '<script>window.location="detail-transaction.php?id='.$id_transaksi.'"</script>';
	}
}

?>

<h2 id="cart" class="text-center" style="margin-top: 56px; margin-bottom: 40px;">CART</h2>
<div class="row text-center" style="margin-bottom: 10%;">
	<div class="table-responsive text-center">
        <table class="table table-bordered" id="dataTable" cellspacing="0" style="width: 80%; margin: 0 10% 0;">
            <thead>
                <tr>
                    <th width="30%">Nama Game</th>
                    <th width="15%">Kategori</th>
                    <th width="15%">Jumlah DVD</th>
                    <th width="15%">Harga</th>
                    <th width="15%">&nbsp;Action&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
				if(!empty($_SESSION["shopping_cart"])){
					$total = 0;
					foreach($_SESSION["shopping_cart"] as $keys => $values){
				?>
                <tr>
                    <td><?php echo $values['item_name']; ?></td>
                    <td><?php echo $values['item_kategory']; ?></td>
                    <td><?php echo $values['item_dvd']; ?></td>
                    <td><?php echo $values['item_price']; ?></td>
                    <td>
                        <a class="btn btn-danger" href="product.php?action=delete&id_game=<?php echo $values['item_id'];?>">
                            <i class="glyphicon glyphicon-remove"></i>Remove
                        </a>
                    </td>
                </tr>
                <?php
                	$total = $total + $values["item_price"];
                	}

                ?>
                <tr>
					<td colspan="3">Total</td>
                    <td >Rp. <?php echo number_format($total, 2); ?></td>
					<td></td>
				</tr>
				<?php
				}
				
				?>
            </tbody>
        </table>
        <?php 
        	if(!empty($_SESSION["shopping_cart"])){ ?>
        		<a style="width: auto; margin: 3% 0 0;" class="btn btn-success" href="#" onclick="buyAll()">Buy All</a>
        		<?php
        	}
        	else{
        		echo "<p class=\"text-center\" style=\"width:100%; margin-top: 10px;\">(KERANJANG KOSONG)</p>";
        	}
        ?>
    </div>
</div>
<script type="text/javascript">
	function buyAll() {
	 
	  var confirmmessage = "Apakah anda yakin ingin membeli semua ?";
	  var go = "product.php?action=buy";
	 
	  if (confirm(confirmmessage)) {
	      window.location = go;
	  }
	 
	}
</script>