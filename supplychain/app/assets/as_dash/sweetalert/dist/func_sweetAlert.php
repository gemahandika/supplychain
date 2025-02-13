<!-- SweetAlert CSS -->
<link rel="stylesheet" href="../assets/as_dash/sweetalert/dist/sweetalert2.min.css">

<!-- SweetAlert JS -->
<script src="../assets/as_dash/sweetalert/dist/sweetalert2.all.min.js"></script>
<?php
$pesan = "Mohon maaf! Data sudah ada.";
$pesan_ok = "Data Berhasil di Tambah.";
$pesan_update = "Data Berhasil di Update.";
$pesan_destroy = "Data Berhasil di Destroy.";
$tujuan = "../../public_dash/views/asset/index.php";
$tujuan_maintenance = "../../public_dash/views/maintenance/add_maintenance.php";
$destroy = "../../public_dash/views/asset/destroy.php";
$tujuan_3 = "../../public_dash/views/data_anggota/index_nonaktif.php";
function showSweetAlert($icon, $title, $text, $confirmButtonColor, $tujuan)
{
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: '$icon',
                title: '$title',
                text: '$text',
                confirmButtonColor: '$confirmButtonColor',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = '$tujuan';
                }
            });
        });
    </script>";
}
