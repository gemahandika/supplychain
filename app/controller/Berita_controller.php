<?php
require_once "../config/koneksi.php";
require_once "../assets/as_dash/sweetalert/dist/func_sweetAlert.php";

$allowed_extension = array('png', 'jpg', 'jpeg');

// Fungsi untuk meng-upload file
function uploadFile($fileInputName, $folderPath)
{
    global $allowed_extension;

    if (isset($_FILES[$fileInputName])) {
        $nama = $_FILES[$fileInputName]['name'];
        $dot = explode('.', $nama);
        $ekstensi = strtolower(end($dot));
        $ukuran = $_FILES[$fileInputName]['size'];
        $file_tmp = $_FILES[$fileInputName]['tmp_name'];
        $image = md5(uniqid($nama, true) . time()) . '.' . $ekstensi;

        // Validasi ekstensi dan ukuran file
        if (in_array($ekstensi, $allowed_extension) === true) {
            if ($ukuran < 15000000) {  // Ukuran maksimal 15MB
                move_uploaded_file($file_tmp, $folderPath . $image);
                return $image; // Kembalikan nama file yang di-upload
            } else {
                echo '<script>alert("Ukuran file terlalu besar!");</script>';
                return null;
            }
        } else {
            echo '<script>alert("File harus berupa PNG, JPG, atau JPEG!");</script>';
            return null;
        }
    }
    return null;
}

if (isset($_POST['add_berita'])) {
    $judul = trim(mysqli_real_escape_string($koneksi, $_POST['judul']));
    $berita_utama = trim(mysqli_real_escape_string($koneksi, $_POST['berita_utama']));
    $berita_1 = trim(mysqli_real_escape_string($koneksi, $_POST['berita_1']));
    $berita_2 = trim(mysqli_real_escape_string($koneksi, $_POST['berita_2']));
    $add_date = trim(mysqli_real_escape_string($koneksi, $_POST['add_date']));
    $publish = trim(mysqli_real_escape_string($koneksi, $_POST['publish']));

    // Meng-upload kedua file gambar
    $poto_1 = uploadFile('file_1', '../assets/as_dash/img/berita/');
    $poto_2 = uploadFile('file_2', '../assets/as_dash/img/berita/');

    if ($poto_1 && $poto_2) {
        // Masukkan data ke tabel
        $query = "INSERT INTO tb_berita (judul, berita_utama, berita_1, berita_2, poto_1, poto_2, tgl_buat, publish) 
                  VALUES('$judul', '$berita_utama', '$berita_1', '$berita_2', '$poto_1', '$poto_2', '$add_date', '$publish')";
        mysqli_query($koneksi, $query);
        showSweetAlert('success', 'Sukses', 'Berita berhasil ditambahkan', '#3085d6', '../../public_dash/views/berita/index.php');
    } else {
        echo '<script>alert("Terjadi kesalahan dalam meng-upload gambar!");</script>';
    }
} else if (isset($_POST['edit_berita'])) {
    $id = trim(mysqli_real_escape_string($koneksi, $_POST['id']));
    $judul = trim(mysqli_real_escape_string($koneksi, $_POST['judul']));
    $berita_utama = trim(mysqli_real_escape_string($koneksi, $_POST['berita_utama']));
    $berita_1 = trim(mysqli_real_escape_string($koneksi, $_POST['berita_1']));
    $berita_2 = trim(mysqli_real_escape_string($koneksi, $_POST['berita_2']));
    // $update_date = trim(mysqli_real_escape_string($koneksi, $_POST['update_date']));
    $publish = trim(mysqli_real_escape_string($koneksi, $_POST['publish']));

    $query = "SELECT poto_1, poto_2 FROM tb_berita WHERE id_berita='$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    // Gunakan fungsi uploadFile() yang sudah diperbaiki
    $poto_1 = uploadFile('file_1', '../assets/as_dash/img/berita/', $data['poto_1']);
    $poto_2 = uploadFile('file_2', '../assets/as_dash/img/berita/', $data['poto_2']);

    $query = "UPDATE tb_berita SET 
                judul='$judul', 
                berita_utama='$berita_utama', 
                berita_1='$berita_1', 
                berita_2='$berita_2', 
                poto_1='$poto_1', 
                poto_2='$poto_2', 
                publish='$publish' 
            WHERE id_berita='$id'";

    if (mysqli_query($koneksi, $query)) {
        showSweetAlert('success', 'Sukses', 'Berita berhasil diperbarui', '#3085d6', '../../public_dash/views/berita/index.php');
    } else {
        echo '<script>alert("Terjadi kesalahan saat mengupdate berita!");</script>';
    }
} else if (isset($_POST['publish_berita'])) {
    $id = trim(mysqli_real_escape_string($koneksi, $_POST['id_berita']));
    $publish = trim(mysqli_real_escape_string($koneksi, $_POST['publish']));

    $query = "UPDATE tb_berita SET publish='$publish' WHERE id_berita='$id'";

    if (mysqli_query($koneksi, $query)) {
        showSweetAlert('success', 'Sukses', 'Berita berhasil dipublish', '#3085d6', '../../public_dash/views/berita/index.php');
    } else {
        echo '<script>alert("Terjadi kesalahan saat mengupdate berita!");</script>';
    }
}
