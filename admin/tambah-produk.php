<?php

if(isset($_POST['tambah_produk'])) {
    $nama_game=$_POST['nama_game'];
    $id_kategori=$_POST['id_kategori'];
    $jumlah_dvd=$_POST['jumlah_dvd'];
    $harga=$_POST['harga'];
    $image_game = rand(1000,100000)."-".$_FILES['image_game']['name'];
    $image_loc = $_FILES['image_game']['tmp_name'];
    $folder="images/game/";
    move_uploaded_file($image_loc,$folder.$image_game);

    $hasil=mysql_query("INSERT INTO tb_produk SET nama_game='$nama_game', id_kategori='$id_kategori', jumlah_dvd='$jumlah_dvd', harga='$harga', image_game='$image_game'");
    if($hasil){
        header("location:manage.php?page=produk");
    }
}

if(isset($_GET['id_produk'])) {
    $id_produk=$_GET['id_produk'];

    $hasil=mysql_query("SELECT * FROM tb_produk WHERE id_game='$id_produk'");
    $c=mysql_fetch_array($hasil);
    $nama_game=$c['nama_game'];
    $id_kategori=$c['id_kategori'];
    $jumlah_dvd=$c['jumlah_dvd'];
    $harga=$c['harga'];
}

if(isset($_POST['edit_produk'])) {
    $nama_game=$_POST['nama_game'];
    $id_kategori=$_POST['id_kategori'];
    $jumlah_dvd=$_POST['jumlah_dvd'];
    $harga=$_POST['harga'];
    $image_game = rand(1000,100000)."-".$_FILES['image_game']['name'];
    $image_loc = $_FILES['image_game']['tmp_name'];
    $folder="../images/games/";
    move_uploaded_file($image_loc,$folder.$image_game);

    $hasil=mysql_query("UPDATE tb_produk SET nama_game='$nama_game' ,id_kategori='$id_kategori', jumlah_dvd='$jumlah_dvd', harga='$harga', image_game='$image_game' WHERE id_game='$id_produk'");
    if($hasil){
        header("location:manage.php?page=produk");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Website Cari Lawan</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mb-4 mt-4">
        <h1 class="mt-4">New Product</h1>
        <div class="row">
            <div class="col-lg-8 mb-4">
                <hr/>
                <form id="contactForm" action="" method="post" enctype="multipart/form-data" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Nama Game : </label>
                            <input name="nama_game" type="text" class="form-control" id="name" value="<?php
                            if(isset($_GET['id_produk'])){
                                echo $nama_game;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Kategori : </label>
                            <select name="id_kategori" class="form-control" id="kategori"">
                                <?php

                                $cat=mysql_query("SELECT * FROM tb_kategori");

                                while($c=mysql_fetch_array($cat)){
                                    $id_kategori = $c['id_kategori'];
                                    $nama_kategori = $c['nama_kategori'];
                                ?>
                                <option value="<?php echo $id_kategori;?>"><?php echo $nama_kategori;?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Jumlah DVD : </label>
                            <input name="jumlah_dvd" type="text" class="form-control" id="name" value="<?php
                            if(isset($_GET['id_produk'])){
                                echo $jumlah_dvd;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Harga : </label>
                            <input name="harga" type="text" class="form-control" id="name" value="<?php
                            if(isset($_GET['id_produk'])){
                                echo $harga;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Image Game :</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        <input name="image_game" type="file" id="foto">
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div id="success"></div>
                    <?php if(isset($_GET['id_produk'])){
                        echo "<button name=\"edit_produk\" type=\"submit\" class=\"btn btn-primary\" id=\"edit\">Edit Product</button>";
                    }
                    else {
                        echo "<button name=\"tambah_produk\" type=\"submit\" class=\"btn btn-primary\" id=\"tambah\">Tambah Produk</button>";
                    } ?>
                    
                </form>
            </div>
        </div>
    </div>

</body>
</html>