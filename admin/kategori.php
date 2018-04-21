<?php 

if(isset($_GET['hapus'])) {
    $id_kategori=$_GET['hapus'];

    $hasil=mysql_query("DELETE FROM tb_kategori WHERE id_kategori='$id_kategori'");
    if($hasil){
        header("location:manage.php?page=kategori");
    }
}

?>

<div class="container">

    <h1 class="mt-4 mb-3">Manage Kategori</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">manage</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $page;?></li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <a class="btn btn-primary" href="manage.php?tambah=tambah-kategori"> Tambah Data </a>
                <br><br>
                <div class="table-responsive text-center">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%">No.</th>
                                <th width="20%">ID Kategori</th>
                                <th>Nama Kategori</th>
                                <th width="20%">&nbsp;Action&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql=mysql_query("SELECT * FROM tb_kategori");
                            $no=1;
                            while($data=mysql_fetch_array($sql)){
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data['id_kategori']; ?></td>
                                <td><?php echo $data['nama_kategori']; ?></td>
                                <td>
                                    <a class="btn btn-primary" href="manage.php?tambah=tambah-kategori&id_kategori=<?php echo $data['id_kategori'];?>">
                                        <i class="glyphicon glyphicon-pencil"></i>Ubah
                                    </a>
                                    <a class="btn btn-danger" href="manage.php?page=kategori&hapus=<?php echo $data['id_kategori'];?>">
                                        <i class="glyphicon glyphicon-remove"></i>Hapus
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