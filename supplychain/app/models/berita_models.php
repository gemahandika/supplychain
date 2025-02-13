<?php
include '../../../app/config/koneksi.php';
$sql = mysqli_query($koneksi, "SELECT * FROM tb_berita WHERE publish = 'yes' ORDER BY id_berita ASC") or die(mysqli_error($koneksi));
$result = array();
while ($data = mysqli_fetch_array($sql)) {
    $result[] = $data;
}
foreach ($result as $data) {

    $gambar1 = $data['poto_1'];
    $gambar2 = $data['poto_2'];

    // Cek apakah gambar ada atau tidak
    if ($gambar1 == null) {
        $img1 = 'No Photo';
    } else {
        $img1 = '<img src="../../../app/assets/as_dash/img/berita/' . $gambar1 . '" class="zoomable" style="width: 100%; height: 100%; border-radius: 0;">';
    }

    if ($gambar2 == null) {
        $img2 = 'No Photo';
    } else {
        $img2 = '<img src="../../../app/assets/as_dash/img/berita/' . $gambar2 . '" class="zoomable" style="width: 100%; height: 100%; border-radius: 0;">';
    }


    $judul = $data['judul'];
    $berita_utama = $data['berita_utama'];
    $date_berita = $data['tgl_buat'];
    $poto = $data['poto_1'];
    $id_berita = $data['id_berita'];
}
