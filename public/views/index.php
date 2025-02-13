<?php
include("../../app/Config/koneksi.php");
session_name("berita_session");
session_start();

// Pengecekan Level Akses
if (in_array("super_admin", $_SESSION['admin_akses'])) {
    header("location:dashboard/home.php");
    exit();
} elseif (in_array("admin", $_SESSION['admin_akses'])) {
    // Jika memiliki akses "admin", arahkan ke halaman tertentu untuk admin
    header("location:dashboard/home.php");
    exit();
} elseif (in_array("ga", $_SESSION['admin_akses'])) {
    // Jika memiliki akses "user", arahkan ke halaman tertentu untuk user
    header("location:dashboard/home.php");
    exit();
} elseif (in_array("pickup", $_SESSION['admin_akses'])) {
    // Jika memiliki akses "user", arahkan ke halaman tertentu untuk user
    header("location:pickup/index.php");
    exit();
} elseif (in_array("user", $_SESSION['admin_akses'])) {
    // Jika memiliki akses "user", arahkan ke halaman tertentu untuk user
    header("location:dashboard/home.php");
    exit();
} else {
    // Jika tidak memiliki akses yang sesuai, lakukan tindakan lain (misalnya, arahkan ke halaman kesalahan)
    header("location:login/login.php");
    exit();
}
