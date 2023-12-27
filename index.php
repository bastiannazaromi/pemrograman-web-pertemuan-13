<?php
require 'koneksi/koneksi.php';

if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 'home';
}

$sql = "SELECT * FROM kategori";
$kategori = $conn->query($sql);

$sql = "SELECT berita.*, SUBSTRING(`isi`, 1, 80) as isiBerita, kategori.nama FROM berita INNER JOIN kategori ON kategori.id = berita.idKategori ORDER BY RAND() LIMIT 6";
$berita = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- ... Head Section ... -->
	<title>Portfolio Bootstrap 4</title>

	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

	<link rel="stylesheet" href="assets/custom/style.css">
</head>

<body>
	<!-- Header Start -->
	<header class="fixed-top">
		<nav class="navbar navbar-expand-lg navbar-light new-bg-secondary">
			<div class="container">
				<a class="navbar-brand" href="<?= ($page == 'berita') ? '.' : '#home'; ?>">
					<img src="assets/img/bn.png" alt="BN" width="100" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-menu">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="nav-menu">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link <?= ($page == 'berita') ? '' : 'page-scroll'; ?>" href="<?= ($page == 'berita') ? '.' : '#home'; ?>">Beranda</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?= ($page == 'berita') ? '' : 'page-scroll'; ?>" href="<?= ($page == 'berita') ? './#about' : '#about'; ?>">Tentang Saya</a>
						</li>
						<li class="nav-item dropdown <?= ($page == 'berita') ? 'active' : ''; ?>">
							<a class="nav-link dropdown-toggle" href="#" id="beritaDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Berita
							</a>
							<?php if ($kategori->num_rows > 0) : ?>
								<div class="dropdown-menu new-bg-secondary" aria-labelledby="beritaDropdown">
									<?php foreach ($kategori as $row) : ?>
										<a class="dropdown-item" href="<?php echo '?page=berita&kategori=' . $row['id']; ?>"><?php echo $row['nama']; ?></a>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</li>
						<li class="nav-item">
							<a class="nav-link <?= ($page == 'berita') ? '' : 'page-scroll'; ?>" href="<?= ($page == 'berita') ? './#portfolio' : '#portfolio'; ?>">Portfolio</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?= ($page == 'berita') ? '' : 'page-scroll'; ?>" href="<?= ($page == 'berita') ? './#contact' : '#contact'; ?>">Contact</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- Header End -->

	<!-- Content -->
	<?php include('views/' . $page . '.php'); ?>

	<!-- Footer Start -->
	<footer class="bg-dark text-light py-3">
		<div class="container">
			<div class="row">
				<div class="col-md-12 mb-3">
					<img src="assets/img/bn.png" alt="BN" width="200" />
				</div>
				<div class="col-md-4 mb-4">
					<h3 class="mb-2 text-xl font-bold">Hubungi Kami</h3>
					<p>bastian.nazaromi@gmail.com</p>
					<p>Jl. Gotong Royong 1 No. 190</p>
					<p>Brebes</p>
				</div>
				<div class="col-md-4 mb-4 text-center">
					<h3 class="mb-4 text-xl font-weight-bold">Berita</h3>
					<?php if ($kategori->num_rows > 0) : ?>
						<ul class="list-unstyled text-light">
							<?php foreach ($kategori as $row) : ?>
								<li><a href="<?php echo '?page=berita&kategori=' . $row['id']; ?>" class="mb-3 text-base text-light"><?php echo $row['nama']; ?></a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
				<div class="col-md-4 mb-4 text-right">
					<h3 class="mb-4 text-xl font-weight-bold">Tautan</h3>
					<ul class="list-unstyled text-light">
						<li><a href="#home" class="mb-3 text-base text-light">Beranda</a></li>
						<li><a href="#about" class="mb-3 text-base text-light">Tentang Saya</a></li>
						<li><a href="#berita" class="mb-3 text-base text-light">Berita</a></li>
						<li><a href="#portfolio" class="mb-3 text-base text-light">Portfolio</a></li>
						<li><a href="#contact" class="mb-3 text-base text-light">Contact</a></li>
					</ul>
				</div>
			</div>
			<div class="border-top border-light pt-3">
				<p class="text-center text-xs font-medium text-light">
					Dibuat oleh
					<a href="https://github.com/bastiannazaromi" target="github" class="font-weight-bold new-text-primary" style="text-decoration: none;">Bastian Nazaromi</a>, menggunakan
					<a href="https://getbootstrap.com" target="bootstrap" class="font-weight-bold text-primary">Bootstrap 4</a>.
				</p>
			</div>
		</div>
	</footer>
	<!-- Footer End -->

	<!-- Back to Top Start -->
	<a href="#" class="rounded-circle mb-4 mr-4 text-center" id="to-top">
		<i class="text-white fas fa-arrow-up fa-2x"></i>
	</a>
	<!-- Back to Top End -->

	<script src="assets/bootstrap/js/jquery-3.6.4.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="assets/custom/script.js"></script>

</body>

</html>