<?php
session_start();

include "config.php";

if(isset($_SESSION['id_member'])){
    $id_member = $_SESSION['id_member'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php include 'title.php'; ?>

    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <?php

        if(isset($_GET['id'])){
            $id_transaksi = $_GET['id'];
        }

        ?>

        <h1 class="mb-3" style="margin-top: 4%;">Detail Transaction (ID #<?php echo $id_transaksi; ?>)</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="table-responsive text-center">
                        <table class="table table-bordered" id="dataTable" cellspacing="0" style="width: 80%; margin: 0 10% 0;">
                            <thead>
                                <tr>
                                    <th width="30%">Nama Game</th>
                                    <th width="15%">Kategori</th>
                                    <th width="15%">Jumlah DVD</th>
                                    <th width="15%">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($_GET['id'])){
                                    $total = 0;
                                    $sql=mysql_query("SELECT * FROM tb_produk, tb_transaksi WHERE tb_produk.id_game=tb_transaksi.id_produk AND id_transaksi='$id_transaksi'");
                                    while ($data=mysql_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td><?php echo $data['nama_game']; ?></td>
                                    <td>
                                    <?php 
                                    $id_kategori = $data['id_kategori'];
                                    $kate=mysql_query("SELECT * FROM tb_kategori WHERE id_kategori='$id_kategori'");
                                    $gori=mysql_fetch_array($kate);
                                    echo $gori['nama_kategori']; 
                                    ?>
                                    </td>
                                    <td><?php echo $data['jumlah_dvd']; ?></td>
                                    <td><?php echo number_format($data['harga'])  ?></td>
                                </tr>
                                <?php
                                    $total = $total + $data["harga"];
                                    }

                                ?>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td >Rp. <?php echo number_format($total, 2); ?></td>
                                </tr>
                                <?php
                                }
                                
                                ?>
                            </tbody>
                        </table>
                        <a style="width: auto; margin: 3% 0 0;" class="btn btn-info" href="my-transaction.php" >Back</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <?php include 'footer.php'; ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>