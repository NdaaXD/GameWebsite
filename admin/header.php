<?php
    include('../config.php');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="index.php">Administrator Toko Game</a>
    	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
    	</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-link"><a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a></li>
				<li class="nav-link dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
						<a class="dropdown-item" href="manage.php?page=pelanggan">Pelanggan</a>
						<a class="dropdown-item" href="manage.php?page=kategori">Kategori</a>
						<a class="dropdown-item" href="manage.php?page=produk">Produk</a>
                        <a class="dropdown-item" href="manage.php?page=transaksi">Transaksi</a>
					</div>
				</li>
				<li class="nav-link dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi, <b>Admin</b></a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                        <a class="dropdown-item" href="logout.php">Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>