<?php
session_name("berita_session");
session_start();

// Jika sudah login, redirect ke halaman index
if (isset($_SESSION['admin_username'])) {
	header("location:../index.php");
	exit();
}

include '../../../app/Config/koneksi.php';

$username = "";
$password = "";
$err = "";

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Validasi input kosong
	if (empty($username) || empty($password)) {
		$err = "Silahkan Masukan Username dan Password";
	} else {
		// Query untuk mendapatkan user berdasarkan username
		$sql1 = "SELECT * FROM user WHERE username = ?";
		$stmt1 = mysqli_prepare($koneksi, $sql1);

		if ($stmt1) {
			mysqli_stmt_bind_param($stmt1, "s", $username);
			mysqli_stmt_execute($stmt1);

			$result1 = mysqli_stmt_get_result($stmt1);

			// Validasi akun ditemukan dan password sesuai
			if ($result1->num_rows === 0) {
				$err = "Akun Anda Tidak ditemukan";
			} else {
				$row = $result1->fetch_assoc();

				// Periksa password menggunakan md5
				if ($row['password'] !== md5($password)) {
					$err = "Password Anda Salah";
				} else {
					// Query untuk mendapatkan akses user
					$login_id = $row['login_id'];
					$sql2 = "SELECT akses_id FROM admin_akses WHERE login_id = ?";
					$stmt2 = mysqli_prepare($koneksi, $sql2);

					if ($stmt2) {
						mysqli_stmt_bind_param($stmt2, "s", $login_id);
						mysqli_stmt_execute($stmt2);

						$result2 = mysqli_stmt_get_result($stmt2);

						$akses = [];
						while ($row2 = $result2->fetch_assoc()) {
							$akses[] = $row2['akses_id'];
						}

						// Validasi akses tidak kosong
						if (empty($akses)) {
							$err = "Kamu Tidak Punya Akses";
						} else {
							// Set session dan redirect
							$_SESSION['admin_username'] = $username;
							$_SESSION['admin_akses'] = $akses;
							header("location:../index.php");
							exit();
						}
					} else {
						$err = "Kesalahan pada prepared statement 2";
					}
				}
			}
		} else {
			$err = "Kesalahan pada prepared statement 1";
		}
	}
}
?>
<!doctype html>
<html lang="en">

<head>
	<title>Login 08</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login Dashboard</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-user-o"></span>
						</div>
						<form action="" method="post" class="login-form">
							<h3 class="text-center mb-4">
								<?php
								if ($err) {
									echo "$err";
								}
								?>
							</h3>
							<div class="form-group">
								<input type="text" class="form-control rounded-left" placeholder="Username" name="username" required>
							</div>
							<div class="form-group d-flex">
								<input type="password" class="form-control rounded-left" placeholder="Password" name="password" required>
							</div>
							<div class="form-group d-md-flex">

							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary rounded submit p-3 px-5" name="login">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>