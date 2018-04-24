<?php
session_start();

include "config.php";

if(isset($_SESSION['id_member'])){
    $id_member = $_SESSION['id_member'];
}
if(isset($_GET['action'])){
    if($_GET['action']=='hapus'){
        $id_transaksi = $_GET['id'];
        $jum = $_GET['jum'];

        $hasil=mysql_query("DELETE FROM tb_transaksi WHERE id_transaksi='$id_transaksi'");
        
        if($hasil){
            header("location:my-transaction.php");
        }
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

    <?php include 'title.php'; ?>

    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">

        <h1 class="mb-3" style="margin-top: 4%;">History Transaction</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="table-responsive text-center">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="5%">No.</th>
                                    <th width="15%">ID Transaksi</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Jumlah Game</th>
                                    <th>Total</th>
                                    <th width="20%">&nbsp;Action&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql=mysql_query("SELECT * FROM tb_transaksi GROUP BY id_transaksi ORDER BY tanggal_transaksi DESC");
                                $no=1;
                                while($data=mysql_fetch_array($sql)){
                                    $id_transaksi = $data['id_transaksi'];
                                    $count = mysql_query("SELECT *, count(id_transaksi), sum(harga) FROM tb_transaksi, tb_produk WHERE tb_transaksi.id_produk=tb_produk.id_game AND id_transaksi='$id_transaksi'");
                                    $c = mysql_fetch_array($count);
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data['id_transaksi']; ?></td>
                                    <td><?php echo $data['tanggal_transaksi']; ?></td>
                                    <td><?php echo $c['count(id_transaksi)']; ?></td>
                                    <td>Rp. <?php echo number_format($c['sum(harga)'], 2); ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="detail-transaction.php?id=<?php echo $data['id_transaksi'];?>">
                                            <i class="glyphicon glyphicon-pencil"></i>Detail
                                        </a>
                                        <a class="btn btn-danger" href="my-transaction.php?action=hapus&id=<?php echo $data['id_transaksi'];?>&jum=<?php echo $c['count(id_transaksi)'];?>">
                                            <i class="glyphicon glyphicon-remove"></i>Cancel
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                $no++;
                                } ?>
                            </tbody>
                        </table>
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