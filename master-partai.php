<?php

session_start();

if (!isset($_SESSION['username']) && (!isset($_SESSION['password']))) {

    header('location:login.php');
}

$_SESSION['nav'] = "master-data";
$_SESSION['nav-page'] = "master-partai";

require_once('header.php');

require_once('navbar.php');

require_once('sidebar.php');

require_once('koneksi.php');


$ParamNamaPartai = isset($_GET['cari_nama_partai']) ? $_GET['cari_nama_partai'] : '';
$ParamKodePartai = isset($_GET['cari_kode_partai']) ? $_GET['cari_kode_partai'] : '';
$ParamTahunPartai = isset($_GET['cari_tahun_partai']) ? $_GET['cari_tahun_partai'] : '';
$ParamStatus = isset($_GET['cari_status']) ? $_GET['cari_status'] : '';

?>

<main id="main" class="main">

	<div class="pagetitle">
		<h1>Dashboard Master Partai</h1>
	</div>

	<hr/>

	<section class="section">
	<div class="row">
		<div class="col-lg-12">

		<div class="card">
			<div class="card-body">

						<div class="d-flex justify-content-between align-items-center">
							<div class="col-sm-6 mb-6 mb-sm-0">
								<h5 class="card-title">Master Partai</h5>
							</div>
						</div>

						<hr />

						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col"> <a class="btn btn-outline-secondary" href="master-partai.php"><i
												class="bi bi-arrow-clockwise"></i></a></th>
									<form>
										<th scope="col"><input type="text" class="form-control"
												placeholder="Nama Partai..." aria-describedby="button-addon2"
												name="cari_nama_partai" value="<?= $ParamNamaPartai ?>"></th>

										<th scope="col"><input type="text" class="form-control"
												placeholder="Kode Partai..." aria-describedby="button-addon2"
												name="cari_kode_partai" value="<?= $ParamKodePartai ?>"></th>

										<th scope="col"><input type="text" class="form-control"
												placeholder="Tahun Partai..." aria-describedby="button-addon2"
												name="cari_tahun_partai" value="<?= $ParamTahunPartai ?>"></th>
									
										<th scope="col">
											<select type="text" class="form-select" aria-describedby="button-addon2"
												name="cari_status" value="<?= $ParamStatus ?>" onchange="this.form.submit()"> 
												<option value='' <?php if ($ParamStatus == '') { echo 'selected';}  else {echo '';}?>>-- Pilih Status --</option>
												<option value ='1' <?php if ($ParamStatus == '1') { echo 'selected';}  else {echo '';}?>>Aktif</option>
												<option value ='0' <?php if ($ParamStatus == '0') { echo 'selected';}  else {echo '';}?>>Non Aktif</option>
											</select>
										</th>

										<button type="submit" style="display: none;"></button>
									</form>

									<th scope="col"></th>
								</tr>

								<tr>
									<th scope="col">No</th>
									<th scope="col">Nama Partai</th>
									<th scope="col">Kode Partai</th>
									<th scope="col">Tahun Partai</th>
									<th scope="col">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php

								$page = (isset($_GET['page'])) ? $_GET['page'] : 1;

								$limit = 10; // Jumlah data per halamannya
								
								// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
								$limit_start = ($page - 1) * $limit;

								$No = $limit_start + 1;


								$q = "SELECT nama_partai, kode_partai, tahun_partai, status FROM db_master_partai 
									WHERE (nama_partai LIKE '%$ParamNamaPartai%'  OR '' = '$ParamNamaPartai') 
									AND (kode_partai LIKE '%$ParamKodePartai%'  OR '' = '$ParamKodePartai')
									AND (tahun_partai LIKE '%$ParamTahunPartai%'  OR '' = '$ParamTahunPartai')
									AND (status LIKE '%$ParamStatus%'  OR '' = '$ParamStatus')
									ORDER BY id ASC LIMIT $limit_start, $limit";
								$sql = mysqli_query($conn, $q);

								$q2 = "SELECT COUNT(1) AS cnt FROM db_master_partai 
									WHERE (nama_partai LIKE '%$ParamNamaPartai%'  OR '' = '$ParamNamaPartai') 
									AND (kode_partai LIKE '%$ParamKodePartai%'  OR '' = '$ParamKodePartai')
									AND (tahun_partai LIKE '%$ParamTahunPartai%'  OR '' = '$ParamTahunPartai')
									AND (status LIKE '%$ParamStatus%'  OR '' = '$ParamStatus')";
								$sql2 = mysqli_query($conn, $q2);
								$row2 = mysqli_fetch_assoc($sql2);
								$total_data = $row2['cnt'];

								if ( $total_data > 0 ) {
									while ($row = mysqli_fetch_assoc($sql)) {

										//$Id = $row['id'];
										$NamaPartai = $row['nama_partai'];
										$KodePartai = $row['kode_partai'];
										$TahunPartai = $row['tahun_partai'];
										$Status = $row['status'];
										$vStatus = "Tidak Aktif";
										if ($Status == "1") {
											$vStatus = "Aktif";
										}

										echo "
											<tr>
												<td>$No</td>
												<td>$NamaPartai</td>
												<td>$KodePartai</td>
												<td>$TahunPartai</td>
												<td>$vStatus</td>
											</tr>
											";

										$No++;
									}
								} else {
									?>
										<tr>
											<td colspan="12">
												<div class="alert alert-danger" role="alert" style="text-align: center;font-weight: bold;">Data Tidak Ditemukan !</div>
											</td>
										</tr>

                                	<?php
								}
								?>
							</tbody>
						</table>

						<!-- <button type="button" class="btn btn-outline-success"><i class="bi bi-file-earmark-excel-fill"></i> Export Excel</button> -->

						<!-- <hr/> -->

						<div style="font-weight: bold;color:red">Total Data :
							<?= $total_data ?>
						</div>

						<nav aria-label="Page navigation example" style="padding-top: 15px;">
							<ul class="pagination">
								<!-- LINK FIRST AND PREV -->
								<?php

								if ($page == 1) { // Jika page adalah page ke 1, maka disable link PREV
									echo "<li class='page-item disbled'><a class='page-link' href='#'>First</a></li>";
									echo "<li class='page-item disbled'><a class='page-link' href='#'>&laquo;</a></li>";
								} else { // Jika page bukan page ke 1
									$link_prev = ($page > 1) ? $page - 1 : 1;
									echo "<li class='page-item'><a class='page-link' href='master-partai.php?page=1&cari_nama_partai=$ParamNamaPartai&cari_kode_partai=$ParamKodePartai&cari_tahun_partai=$ParamTahunPartai&cari_status=$ParamStatus'>First</a></li>";
									echo "<li class='page-item'><a class='page-link' href='master-partai.php?page=$link_prev&cari_nama_partai=$ParamNamaPartai&cari_kode_partai=$ParamKodePartai&cari_tahun_partai=$ParamTahunPartai&cari_status=$ParamStatus'>&laquo;</a></li>";
								}

								$q = "SELECT COUNT(1) AS cnt FROM db_master_partai 
									WHERE (nama_partai LIKE '%$ParamNamaPartai%'  OR '' = '$ParamNamaPartai') 
									AND (kode_partai LIKE '%$ParamKodePartai%'  OR '' = '$ParamKodePartai')
									AND (tahun_partai LIKE '%$ParamTahunPartai%'  OR '' = '$ParamTahunPartai')
									AND (status LIKE '%$ParamStatus%'  OR '' = '$ParamStatus')";
								$sql = mysqli_query($conn, $q);
								$row = mysqli_fetch_assoc($sql);
								$jumlah = $row['cnt'];

								$jumlah_page = ceil($jumlah / $limit); // Hitung jumlah halamannya
								$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
								$start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1; // Untuk awal link number
								$end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
								
								for ($i = $start_number; $i <= $end_number; $i++) {

									$link_active = ($page == $i) ? ' class="page-item active"' : '';

									echo "<li$link_active><a class='page-link' href='master-partai.php?page=$i&cari_nama_partai=$ParamNamaPartai&cari_kode_partai=$ParamKodePartai&cari_tahun_partai=$ParamTahunPartai&cari_status=$ParamStatus'>$i</a></li>";
								}

								// LINK NEXT AND LAST
								
								// Jika page sama dengan jumlah page, maka disable link NEXT nya
								// Artinya page tersebut adalah page terakhir 
								if ($page == $jumlah_page) { // Jika page terakhir
									echo "<li class='page-item disbled'><a class='page-link' href='#'>&raquo;</a></li>";
									echo "<li class='page-item disbled'><a class='page-link' href='#'>Last</a></li>";
								} else { // Jika Bukan page terakhir
									$link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;

									echo "<li class='page-item'><a class='page-link' href='master-partai.php?page=$link_next&cari_nama_partai=$ParamNamaPartai&cari_kode_partai=$ParamKodePartai&cari_tahun_partai=$ParamTahunPartai&cari_status=$ParamStatus'>&raquo;</a></li>";
									echo "<li class='page-item'><a class='page-link' href='master-partai.php?page=$jumlah_page&cari_nama_partai=$ParamNamaPartai&cari_kode_partai=$ParamKodePartai&cari_tahun_partai=$ParamTahunPartai&cari_status=$ParamStatus'>Last</a></li>";
								}

								?>
							</ul>
						</nav>

					</div>
				</div>

			</div>
		</div>
	</section>

</main>

<?php

require_once('footer.php');

mysqli_close($conn);

?>