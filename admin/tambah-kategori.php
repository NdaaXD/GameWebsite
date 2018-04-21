<?php

if(isset($_POST['tambah_kategori'])) {
    $kategori=$_POST['kategori'];

    $hasil=mysql_query("INSERT INTO tb_kategori SET nama_kategori='$kategori'");
    if($hasil){
        header("location:manage.php?page=kategori");
    }
}

if(isset($_GET['id_kategori'])) {
    $id_kategori=$_GET['id_kategori'];

    $hasil=mysql_query("SELECT * FROM tb_kategori WHERE id_kategori='$id_kategori'");
    $c=mysql_fetch_array($hasil);
    $nama_kategori=$c['nama_kategori'];
}

if(isset($_POST['edit_kategori'])) {
    $kategori=$_POST['kategori'];

    $hasil=mysql_query("UPDATE tb_kategori SET nama_kategori='$kategori' WHERE id_kategori='$id_kategori'");
    if($hasil){
        header("location:manage.php?page=kategori");
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
        <h1 class="mt-4">New Kategori</h1>
        <div class="row">
            <div class="col-lg-8 mb-4">
                <hr/>
                <form id="contactForm" action="" method="post" enctype="multipart/form-data" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Nama Kategori : </label>
                            <input name="kategori" type="text" class="form-control" id="name" value="<?php
                            if(isset($_GET['id_kategori'])){
                                echo $nama_kategori;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div id="success"></div>
                    <?php if(isset($_GET['id_kategori'])){
                        echo "<button name=\"edit_kategori\" type=\"submit\" class=\"btn btn-primary\" id=\"edit\">Edit Kategori</button>";
                    }
                    else {
                        echo "<button name=\"tambah_kategori\" type=\"submit\" class=\"btn btn-primary\" id=\"tambah\">Tambah Kategori</button>";
                    } ?>
                    
                </form>
            </div>
        </div>
    </div>

</body>
</html>