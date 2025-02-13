<?php
session_name("berita_session");
session_start();
include '../../header_dash.php';
$date = date("Y-m-day");
$time = date("H:i");
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

<!-- partial -->

<div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="container mb-4" style="border-bottom: 2px solid black;">
                    <h4 class="card-title">Data Kegiatan Asperindo</h4>
                </div>
                <button type="submit" class="btn btn-info btn-sm text-white mr-2 mt-4" data-bs-toggle="modal" data-bs-target="#publishModal<?= $data['id_berita'] ?>">
                    <i class="bi bi-plus"></i> Create Kegiatan </button>
                <div class="table-responsive pt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="width: 50%;">
                            <thead>
                                <tr class="table-info text-center">
                                    <th style="width: 5%; font-size: 12px;">NO</th>
                                    <th style="width: 15%; font-size: 12px;">JUDUL BERITA</th>
                                    <!-- <th style="width: 30%; font-size: 12px;">BERITA UTAMA </th>
                                    <th style="width: 30%; font-size: 12px;">BERITA UTAMA I</th>
                                    <th style="width: 30%; font-size: 12px;">BERITA UTAMA II</th> -->
                                    <th style="width: 10%; font-size: 12px;">PHOTO I</th>
                                    <th style="width: 10%; font-size: 12px;">PHOTO II</th>
                                    <th style="width: 10%; font-size: 12px;">TANGGAL BUAT</th>
                                    <th style="width: 10%; font-size: 12px;">PUBLISH</th>
                                    <th style="width: 10%; font-size: 12px;">ACTION</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 0;
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_berita ORDER BY id_berita DESC") or die(mysqli_error($koneksi));
                            $result = array();
                            while ($data = mysqli_fetch_array($sql)) {
                                $result[] = $data;
                            }
                            foreach ($result as $data) {
                                $no++;
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
                            ?>
                                <tbody>
                                    <tr>
                                        <td class="text-center" style="font-size: 12px;"><?= $no ?></td>
                                        <td style="font-size: 12px;"><?= $data['judul'] ?></td>
                                        <!-- <td class="text-wrap" style="font-size: 12px;"><?= $data['berita_utama'] ?> </td>
                                        <td class="text-wrap" style="font-size: 12px;"><?= $data['berita_1'] ?> </td>
                                        <td class="text-wrap" style="font-size: 12px;"><?= $data['berita_2'] ?> </td> -->
                                        <td class="text-center" style="font-size: 12px;">
                                            <!-- Menampilkan gambar 1 -->
                                            <?= $img1 != 'No Photo' ? $img1 : '<span>No Photo</span>' ?>
                                        </td>
                                        <td class="text-center">
                                            <!-- Menampilkan gambar 2 -->
                                            <?= $img2 != 'No Photo' ? $img2 : '<span>No Photo</span>' ?>
                                        </td>
                                        <td class="text-center" style="font-size: 12px;"><?= $data['tgl_buat'] ?></td>
                                        <td class="text-center" style="font-size: 12px;"><?= $data['publish'] ?></td>
                                        <td class="text-center" style="font-size: 12px;">
                                            <a href="#" class="btn btn-sm btn-primary" onclick="sendPost(<?= $data['id_berita'] ?>)">Edit</a>
                                            <button type="submit" class="btn btn-info btn-sm text-white mr-2" data-bs-toggle="modal" data-bs-target="#publishModal<?= $data['id_berita'] ?>">
                                                <i class="bi bi-lock"></i> Publish </button>
                                            <button type="submit" class="btn btn-danger btn-sm text-white mr-2" data-bs-toggle="modal" data-bs-target="#unpublishModal<?= $data['id_berita'] ?>">
                                                <i class="bi bi-lock"></i>UnPublish </button>
                                        </td>
                                    </tr>
                                </tbody>

                                <div class="modal fade" id="publishModal<?= $data['id_berita'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog"> <!-- Menjadikan modal lebih lebar -->
                                        <form action="../../../app/controller/Berita_controller.php" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header btn btn-info text-white btn-sm">
                                                    <h6 class="modal-title fs-5" id="exampleModalLabel">PUBLISH BERITA</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="report-it">
                                                        <input type="hidden" name="id_berita" value="<?= $data['id_berita'] ?>">
                                                        <input type="hidden" name="publish" value="yes">
                                                        <div class="row">
                                                            <h5>Apakah Anda Ingin Publish Berita Ini ? </h5>
                                                        </div>
                                                        <!-- <div class="row mt-4">
                                                            <label for="sistem" class="form-label text-dark">Silahkan Pilih apakah ingin dijadikan berita Utama:</label>
                                                            <select class="form-control bg-light border border-dark p-2 shadow-sm" id="sistem" name="sistem" required>
                                                                <option value="NO">NO</option>
                                                                <option value="YES">YES</option>
                                                            </select>
                                                        </div> -->

                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" name="publish_berita" class="btn btn-info" value="Submit">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="modal fade" id="unpublishModal<?= $data['id_berita'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog"> <!-- Menjadikan modal lebih lebar -->
                                        <form action="../../../app/controller/Berita_controller.php" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header btn btn-danger text-white btn-sm">
                                                    <h6 class="modal-title fs-5" id="exampleModalLabel">UNPUBLISH BERITA</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="report-it">
                                                        <input type="hidden" name="id_berita" value="<?= $data['id_berita'] ?>">
                                                        <input type="hidden" name="publish" value="no">
                                                        <div class="row">
                                                            <h5>Apakah Anda Ingin UnPublish Berita Ini ? </h5>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" name="publish_berita" class="btn btn-danger" value="Submit">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Untuk menampilkan poto yang di upload di form -->
<script>
    // Function untuk menampilkan preview gambar
    function previewImage(event, previewId, removeBtnId) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById(previewId);
                const removeBtn = document.getElementById(removeBtnId);
                preview.src = e.target.result; // Set src untuk elemen img
                preview.style.display = 'block'; // Tampilkan elemen img
                removeBtn.style.display = 'inline-block'; // Tampilkan tombol hapus
            };
            reader.readAsDataURL(file); // Baca file sebagai DataURL
        }
    }

    // Function untuk menghapus gambar
    function removeImage(inputId, previewId, removeBtnId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const removeBtn = document.getElementById(removeBtnId);

        // Reset input file
        input.value = "";
        // Sembunyikan gambar dan tombol hapus
        preview.src = "";
        preview.style.display = 'none';
        removeBtn.style.display = 'none';
    }
</script>

<!-- untuk ngirim id_berita ke menu edit -->
<script>
    function sendPost(id_berita) {
        // Buat form secara dinamis
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'edit.php';

        // Tambahkan input hidden untuk mengirim id_berita
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'id_berita';
        input.value = id_berita;
        form.appendChild(input);

        // Tambahkan form ke body dan submit
        document.body.appendChild(form);
        form.submit();
    }
</script>
<?php
include '../../footer_dash.php';
?>