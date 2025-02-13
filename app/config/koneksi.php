<?php
// koneksi local
// $koneksi = mysqli_connect('localhost', 'root', '', 'db_berita');
// if (mysqli_connect_errno()) {
//     echo mysqli_connect_error();
// }

// koneksi public
$koneksi = mysqli_connect('localhost', 'supr3895_root', ',YfZ_RpZ#k1m', 'supr3895_db_berita');
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}
