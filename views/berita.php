<?php
if (isset($_GET['kategori'])) {
	$idKategori = $_GET['kategori'];

	$sql = "SELECT * FROM kategori WHERE id='$idKategori'";
	$dataKategori = $conn->query($sql);

	$dataKategori = mysqli_fetch_assoc($dataKategori);

	$sql = "SELECT berita.*, SUBSTRING(`isi`, 1, 80) as isiBerita, kategori.nama FROM berita INNER JOIN kategori ON kategori.id = berita.idKategori WHERE berita.idKategori = '$idKategori' ORDER BY berita.createdAt DESC";
	$berita = $conn->query($sql);
} else {
	$id = $_GET['id'];

	$sql = "SELECT berita.*, SUBSTRING(`isi`, 1, 80) as isiBerita, kategori.nama FROM berita INNER JOIN kategori ON kategori.id = berita.idKategori WHERE berita.id = '$id'";
	$berita = $conn->query($sql);

	$berita = mysqli_fetch_assoc($berita);
}

?>

<!-- Bertia Section Start -->
<section id="berita" class="new-bg-secondary pt-5 pb-5">
	<div class="container mt-5 mb-5">
		<div class="row">
			<div class="col-lg-12">
				<div class="text-center">
					<h2 class="mb-4 new-text-primary font-weight-bold">Berita <?php echo (isset($_GET['kategori'])) ? $dataKategori['nama'] : ''; ?></h2>
					<p class="new-text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa, distinctio provident. Deleniti, a!</p>
				</div>
			</div>
		</div>

		<div class="row">
			<?php if (isset($_GET['kategori'])) : ?>
				<?php if ($berita->num_rows > 0) : ?>
					<?php foreach ($berita as $row) : ?>
						<div class="col-lg-4">
							<div class="mb-5 overflow-hidden rounded-top bg-white shadow-lg">
								<?php if ($row['gambar'] != null) : ?>
									<img src="<?php echo 'http://localhost/pertemuan-10/uploads/' . $row['gambar']; ?>" alt="<?php echo $row['judul']; ?>" style="width: 100%; height: 200px;">
								<?php else : ?>
									<img src="<?php echo 'https://source.unsplash.com/360x200?' . $row['nama']; ?>" alt="<?php echo $row['judul']; ?>" class="w-100">
								<?php endif; ?>
								<div class="py-4 px-4">
									<h3 class="mb-3">
										<a href="#" class="text-dark"><?php echo $row['judul']; ?></a>
									</h3>
									<p class="mb-4 new-text-secondary text-justify"><?php echo $row['isiBerita'] . ' ....'; ?></p>
									<a href="<?php echo '?page=berita&id=' . $row['id']; ?>" class="btn new-btn-primary btn-sm rounded-pill">Baca Selengkapnya</a>

									<div class="row mt-3">
										<div class="col-lg-8">
											<p class="text-muted text-warning" style="font-size: 12px;"><i class="far fa-clock"></i> <?php echo date('d M Y - H:i:s', strtotime($row['createdAt'])); ?></p>
										</div>
										<div class="col-lg-4">
											<p class="text-muted text-warning" style="font-size: 12px;"><i class="fa fa-pencil-alt"></i> <?php echo $row['nama']; ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			<?php else : ?>
				<div class="col-lg-12">
					<div class="card">
						<?php if ($berita['gambar'] != null) : ?>
							<img src="<?php echo 'http://localhost/pertemuan-10/uploads/' . $berita['gambar']; ?>" alt="<?php echo $berita['judul']; ?>" class="img-thumbnail">
						<?php else : ?>
							<img src="<?php echo 'https://source.unsplash.com/720x480?' . $berita['nama']; ?>" alt="<?php echo $berita['judul']; ?>" class="w-100">
						<?php endif; ?>

						<div class="card-body">
							<h5 class="card-title"><?php echo $berita['judul']; ?></h5>
							<p class="card-text text-justify"><?php echo $berita['isi']; ?></p>
							<div class="row mt-3">
								<div class="col-lg-8">
									<p class="text-muted text-warning" style="font-size: 12px;"><i class="far fa-clock"></i> <?php echo date('d M Y - H:i:s', strtotime($berita['createdAt'])); ?></p>
								</div>
								<div class="col-lg-4 text-right">
									<p class="text-muted text-warning" style="font-size: 12px;"><i class="fa fa-pencil-alt"></i> <?php echo $berita['nama']; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<!-- Bertia Section End -->