<?php
session_name("berita_session");
session_start();
include '../../header_dash.php';
$date = date("Y-m-day");
$time = date("H:i");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_berita = $_POST['id_berita'];

    // Query ke database untuk mengambil data
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_berita WHERE id_berita = '$id_berita'") or die(mysqli_error($koneksi));
    $data = mysqli_fetch_array($sql);
}
?>

<!-- partial -->

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Form Berita</h4>
                            <form class="forms-sample" action="../../../app/controller/Berita_controller.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $data['id_berita'] ?>">
                                <div class="form-group">
                                    <label for="exampleInputName1">Judul Berita <span class="text-danger"><b>*</b></span></label>
                                    <input type="text" class="form-control" name="judul" id="exampleInputName1" value="<?= $data['judul'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Berita Utama</label>
                                    <textarea class="form-control" name="berita_utama" id="exampleTextarea1" rows="6"><?= htmlspecialchars($data['berita_utama'] ?? '') ?></textarea>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="exampleTextarea1">Berita Utama 1</label>
                                        <textarea class="form-control" name="berita_1" id="exampleTextarea1" rows="6"> <?= htmlspecialchars($data['berita_1'] ?? '') ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleTextarea2">Berita Utama 2</label>
                                        <textarea class="form-control" name="berita_2" id="exampleTextarea2" rows="6"><?= htmlspecialchars($data['berita_1'] ?? '') ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- Upload Photo 1 -->
                                    <div class="col-md-6">
                                        <label for="uploadFile1">Upload Photo 1:</label>
                                        <input type="file" class="form-control-file" name="file_1" id="uploadFile1" accept="image/*" onchange="previewImage(event, 'preview1', 'removeBtn1')">
                                        <div class="mt-3">
                                            <img id="preview1"
                                                src="<?= !empty($data['poto_1']) ? '../../../app/assets/as_dash/img/berita/' . $data['poto_1'] : '' ?>"
                                                alt="Preview Photo 1"
                                                style="max-width: 100%; height: auto; <?= !empty($data['poto_1']) ? '' : 'display: none;' ?>">
                                            <button type="button" class="btn btn-danger btn-sm mt-2" id="removeBtn1"
                                                style="<?= !empty($data['poto_1']) ? 'display: inline-block;' : 'display: none;' ?>"
                                                onclick="removeImage('uploadFile1', 'preview1', 'removeBtn1')">Hapus Foto</button>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="uploadFile2">Upload Photo 2:</label>
                                        <input type="file" class="form-control-file" name="file_2" id="uploadFile2" accept="image/*" onchange="previewImage(event, 'preview2', 'removeBtn2')">
                                        <div class="mt-3">
                                            <img id="preview2"
                                                src="<?= !empty($data['poto_2']) ? '../../../app/assets/as_dash/img/berita/' . $data['poto_2'] : '' ?>"
                                                alt="Preview Photo 2"
                                                style="max-width: 100%; height: auto; <?= !empty($data['poto_2']) ? '' : 'display: none;' ?>">
                                            <button type="button" class="btn btn-danger btn-sm mt-2" id="removeBtn2"
                                                style="<?= !empty($data['file_2']) ? 'display: inline-block;' : 'display: none;' ?>"
                                                onclick="removeImage('uploadFile2', 'preview2', 'removeBtn2')">Hapus Foto</button>
                                        </div>
                                    </div>

                                </div>

                                <input type="text" name="publish" value="<?= $data['publish'] ?>">

                                <button type="submit" name="edit_berita" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const uploadFiles = document.querySelectorAll('input[type="file"]'); // Pilih semua input file

    uploadFiles.forEach(uploadFile => {
        const fileName = document.getElementById('file-name' + uploadFile.id.slice(-1)); // Cari span berdasarkan ID input file

        uploadFile.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                fileName.textContent = this.files[0].name;
            } else {
                fileName.textContent = 'Belum ada file yang dipilih';
            }
        });
    });
</script>

<!-- Untuk menampilkan poto yang di upload di form -->
<script>
    // Function untuk menampilkan preview gambar yang diunggah
    function previewImage(event, previewId, removeBtnId) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(previewId).src = e.target.result;
                document.getElementById(previewId).style.display = 'block';
                document.getElementById(removeBtnId).style.display = 'inline-block';
            };
            reader.readAsDataURL(file);
        }
    }

    // Function untuk menghapus gambar
    function removeImage(inputId, previewId, removeBtnId) {
        document.getElementById(inputId).value = "";
        document.getElementById(previewId).src = "";
        document.getElementById(previewId).style.display = 'none';
        document.getElementById(removeBtnId).style.display = 'none';
    }
</script>

<?php include '../../footer_dash.php' ?>