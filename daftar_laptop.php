<?php
session_start();
include('koneksi.php');
?>

<?php
if (isset($_POST["tambah_hp"])) {
	$nama      = $_POST["nama"];
	$harga     = $_POST["harga"];
	$ram       = $_POST["ram"];
	$memori    = $_POST["memori"];
	$processor = $_POST["processor"];
	$berat    = $_POST["berat"];

	$harga_angka = $ram_angka = $memori_angka = $processor_angka = $berat_angka = 0;

	if ($harga < 1000000) {
		$harga_angka = 5;
	} elseif ($harga >= 1000000 && $harga <= 3000000) {
		$harga_angka = 4;
	} elseif ($harga > 3000000 && $harga <= 5000000) {
		$harga_angka = 3;
	} elseif ($harga > 5000000 && $harga <= 10000000) {
		$harga_angka = 2;
	} elseif ($harga > 10000000) {
		$harga_angka = 1;
	}


	if ($ram < 16) {
		$ram_angka = $ram;
	} elseif ($ram == 16) {
		$ram_angka = 5;
	}


	if ($memori == 64) {
		$memori_angka = 1;
	} elseif ($memori == 128) {
		$memori_angka = 2;
	} elseif ($memori == 231) {
		$memori_angka = 3;
	} elseif ($memori == 512) {
		$memori_angka = 4;
	} elseif ($memori == 1000) {
		$memori_angka = 5;
	}


	if ($processor == "Intel") {
		$processor_angka = 1;
	} elseif ($processor == "Amd") {
		$processor_angka = 3;
	}

	if ($berat < 1) {
		$berat_angka = 1;
	} elseif ($berat >= 1 && $berat <= 2) {
		$berat_angka = 3;
	} elseif ($berat > 2) {
		$berat_angka = 5;
	}

	$sql = "INSERT INTO `data_laptop` (`id_hp`, `nama_laptop`, `harga_laptop`, `ram_laptop`, `memori_laptop`, `processor_laptop`, `berat_laptop`, `harga_angka`, `ram_angka`, `memori_angka`, `processor_angka`, `berat_angka`) 
				VALUES (NULL, :nama_laptop, :harga_laptop, :ram_laptop, :memori_laptop, :processor_laptop, :berat_laptop, :harga_angka, :ram_angka, :memori_angka, :processor_angka, :berat_angka)";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':nama_laptop', $nama);
	$stmt->bindValue(':harga_laptop', $harga);
	$stmt->bindValue(':ram_laptop', $ram);
	$stmt->bindValue(':memori_laptop', $memori);
	$stmt->bindValue(':processor_laptop', $processor);
	$stmt->bindValue(':berat_laptop', $berat);
	$stmt->bindValue(':harga_angka', $harga_angka);
	$stmt->bindValue(':ram_angka', $ram_angka);
	$stmt->bindValue(':memori_angka', $memori_angka);
	$stmt->bindValue(':processor_angka', $processor_angka);
	$stmt->bindValue(':berat_angka', $berat_angka);
	$stmt->execute();
}

if (isset($_POST["hapus_hp"])) {
	$id_hapus_hp = $_POST['id_hapus_hp'];
	$sql_delete = "DELETE FROM `data_laptop` WHERE `id_hp` = :id_hapus_hp";
	$stmt_delete = $db->prepare($sql_delete);
	$stmt_delete->bindValue(':id_hapus_hp', $id_hapus_hp);
	$stmt_delete->execute();
	$query_reorder_id = mysqli_query($selectdb, "ALTER TABLE data_laptop AUTO_INCREMENT = 1");
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Sistem Pendukung Keputusan Pemilihan Smartphone</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="assets/css/materialize.css" media="screen,projection" />
	<link rel="stylesheet" href="assets/css/table.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!--Import jQuery before materialize.js-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/materialize.js"></script>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

	<!-- Data Table -->
	<link rel="stylesheet" type="text/css" href="assets/dataTable/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="assets/dataTable/jquery.dataTables.min.js"></script>

</head>

<body>
	<div class="navbar-fixed">
		<nav>
			<div class="container">

				<div class="nav-wrapper">
					<ul class="left" style="margin-left: -52px;">
						<li><a href="index.php">HOME</a></li>
						<li><a href="rekomendasi.php">REKOMENDASI</a></li>
						<li><a class="active" href="daftar_laptop.php">DAFTAR SMARTPHONE</a></li>
					</ul>
				</div>

			</div>
		</nav>
	</div>
	<!-- Body Start -->

	<!-- Daftar hp Start -->
	<div style="background-color: #efefef">
		<div class="container">
			<div class="section-card" style="padding: 40px 0px 20px 0px;">
				<ul>
					<li>
						<div class="row">
							<div class="card">
								<div class="card-content">
									<center>
										<h4 style="margin-bottom: 0px; margin-top: -8px;">Daftar Smartphone</h4>
									</center>
									<table id="table_id" class="hover dataTablesCustom" style="width:100%">
										<thead style="border-top: 1px solid #d0d0d0;">
											<tr>
												<th>
													<center>No </center>
												</th>
												<th>
													<center>Nama Laptop</center>
												</th>
												<th>
													<center>Harga Laptop</center>
												</th>
												<th>
													<center>RAM Laptop</center>
												</th>
												<th>
													<center>Memori Laptop</center>
												</th>
												<th>
													<center>Processor Laptop</center>
												</th>
												<th>
													<center>berat Laptop</center>
												</th>
												<th>
													<center>Hapus</center>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$query = mysqli_query($selectdb, "SELECT * FROM data_laptop");
											$no = 1;
											while ($data = mysqli_fetch_array($query)) {
											?>
												<tr>
													<td>
														<center><?php echo $no; ?></center>
													</td>
													<td>
														<center><?php echo $data['nama_laptop'] ?></center>
													</td>
													<td>
														<center><?php echo "Rp. ", $data['harga_laptop'] ?></center>
													</td>
													<td>
														<center><?php echo $data['ram_laptop'], " GB" ?></center>
													</td>
													<td>
														<center><?php echo $data['memori_laptop'], " GB" ?></center>
													</td>
													<td>
														<center><?php echo $data['processor_laptop'] ?></center>
													</td>
													<td>
														<center><?php echo $data['berat_laptop'], " KG" ?></center>
													</td>
													<td>
														<center>
															<form method="POST">
																<input type="hidden" name="id_hapus_hp" value="<?php echo $data['id_hp'] ?>">
																<button type="submit" name="hapus_hp" style="height: 32px; width: 32px;" class="btn-floating btn-small waves-effect waves-light red"><i style="line-height: 32px;" class="material-icons">remove</i></button>
															</form>
														</center>
													</td>
												</tr>
											<?php
												$no++;
											}
											?>
										</tbody>
									</table>
								</div>

							</div>
							<a href="#tambah" class="btn-floating btn-large waves-effect waves-light teal btn-float-custom"><i class="material-icons">add</i></a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Daftar hp End -->

	<!-- Daftar hp Start -->
	<div style="background-color: #efefef">
		<div class="container">
			<div class="section-card" style="padding: 1px 20% 24px 20%;">
				<ul>
					<li>
						<div class="row">
							<div class="card">
								<div class="card-content" style="padding-top: 10px;">
									<center>
										<h5 style="margin-bottom: 10px;">Analisa Smartphone</h5>
									</center>
									<table class="responsive-table">

										<thead style="border-top: 1px solid #d0d0d0;">
											<tr>
												<th>
													<center>Alternatif</center>
												</th>
												<th>
													<center>C1 (Cost)</center>
												</th>
												<th>
													<center>C2 (Benefit)</center>
												</th>
												<th>
													<center>C3 (Benefit)</center>
												</th>
												<th>
													<center>C4 (Benefit)</center>
												</th>
												<th>
													<center>C5 (Benefit)</center>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$query = mysqli_query($selectdb, "SELECT * FROM data_laptop");
											$no = 1;
											while ($data = mysqli_fetch_array($query)) {
											?>
												<tr>
													<td>
														<center><?php echo "A", $no ?></center>
													</td>
													<td>
														<center><?php echo $data['harga_angka'] ?></center>
													</td>
													<td>
														<center><?php echo $data['ram_angka'] ?></center>
													</td>
													<td>
														<center><?php echo $data['memori_angka'] ?></center>
													</td>
													<td>
														<center><?php echo $data['processor_angka'] ?></center>
													</td>
													<td>
														<center><?php echo $data['berat_angka'] ?></center>
													</td>
												</tr>
											<?php
												$no++;
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Daftar hp End -->

	<!-- Modal Start -->
	<div id="tambah" class="modal" style="width: 40%; height: 100%;">
		<div class="modal-content">
			<div class="col s6">
				<div class="card-content">
					<div class="row">
						<center>
							<h5 style="margin-top:-8px;">Masukan Smartphone</h5>
						</center>
						<form method="POST" action="">
							<div class="row">
								<div class="col s12">

									<div class="col s6" style="margin-top: 10px;">
										<b>Nama</b>
									</div>
									<div class="col s6">
										<input style="height: 2rem;" name="nama" type="text" required>
									</div>

									<div class="col s6" style="margin-top: 10px;">
										<b>Harga</b>
									</div>
									<div class="col s6">
										<input style="height: 2rem;" name="harga" type="number" required>
									</div>

									<div class="col s6" style="margin-top: 10px;">
										<b>RAM</b>
									</div>
									<div class="col s6">
										<select style="display: block; margin-bottom: 4px;" required name="ram">
											<!-- <option value = "" disabled selected>Kriteria RAM</option>  -->
											<option value="4">4 Gb</option>
											<option value="6">6 Gb</option>
											<option value="8">8 Gb</option>
											<option value="12">12 Gb</option>
											<option value="16">16 Gb</option>
										</select>
									</div>

									<div class="col s6" style="margin-top: 10px;">
										<b>Memori</b>
									</div>
									<div class="col s6">
										<select style="display: block; margin-bottom: 4px;" required name="memori">
											<!-- <option value = "" disabled selected>Kriteria Penyimpanan</option> -->
											<option value="64">64 Gb</option>
											<option value="128">128 Gb</option>
											<option value="231">231 Gb</option>
											<option value="512">512 Gb</option>
											<option value="1000">1000 Gb</option>
										</select>
									</div>

									<div class="col s6" style="margin-top: 10px;">
										<b>Processor</b>
									</div>
									<div class="col s6">
										<select style="display: block; margin-bottom: 4px;" required name="processor">
											<option value="Intel">Intel</option>
											<option value="Amd">Amd</option>
										</select>
									</div>

									<div class="col s6" style="margin-top: 10px;">
										<b>berat</b>
									</div>
									<div class="col s6">
										<select style="display: block; margin-bottom: 4px;" required name="berat">
											<!-- <option value = "" disabled selected>Kriteria berat</option> -->
											<option value="1">
												< 1 Kg</option>
											<option value="1-2">1 - 2 Kg</option>
											<option value=">2">>2 Kg</option>
										</select>
									</div>

								</div>
							</div>
							<center><button name="tambah_hp" type="submit" class="waves-effect waves-light btn teal" style="margin-top: 0px;">Tambah</button></center>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div style="height: 0px; " class="modal-footer">
			<a style="margin-top: -30px;" class="modal-action modal-close waves-effect waves-green btn-flat">Tutup</a>
		</div>
	</div>
	<!-- Modal End -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('.parallax').parallax();
			$('.modal').modal();
			$('#table_id').DataTable({
				"paging": false
			});
		});
	</script>
</body>

</html>