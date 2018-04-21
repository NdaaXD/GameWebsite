<?php
session_start();

include "../config.php";

if(!isset($_SESSION['level'])){
    header("location:../login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php include '../title.php'; ?>

    <link rel="shortcut icon" type="image/png" href="../images/favicon.png"/>

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; 

    ?>
    
    <?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else if (isset($_GET['tambah'])) {
        $tambah = @$_GET['tambah'];
    }

    if (@$page=='pelanggan') {        
        include 'pelanggan.php';
    }
    else if(@$page=='kategori'){
        include 'kategori.php';
    }
    else if(@$page=='produk'){
        include 'produk.php';
    }
    else if(@$page=='transaksi'){
        include 'transaksi.php';
    }

    else if(@$tambah=='tambah-kategori'){
        include 'tambah-kategori.php';
    }
    else if(@$tambah=='tambah-produk'){
        include 'tambah-produk.php';
    }
    ?>

    <?php include '../footer.php'; ?>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
    <script src="../js/custom.js"></script>

</body>
</html>