<?php
include '../../header.php';


if (isset($_POST['id'])) {
    $id_berita = $_POST['id'];

    // Sanitasi input (penting untuk keamanan)
    $id_berita = mysqli_real_escape_string($koneksi, $id_berita); // Ganti $koneksi dengan variabel koneksi database Anda

    // Gunakan $id_berita untuk mengambil data dari database atau melakukan operasi lainnya.
    // Contoh:
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_berita WHERE id_berita = '$id_berita'");
    $data_berita = mysqli_fetch_assoc($sql);
}
?>
<main class="main">
    <div class="page-title mt-4">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Berita</h1>
                        <!-- <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p> -->
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="list_berita.php">List Berita</a></li>
                    <li class="current">Details Berita</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">

            <div class="col-lg-12">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container">

                        <article class="article">

                            <div class="post-img">
                                <img src="../../../app/assets/as_dash/img/berita/<?= $data_berita['poto_1']; ?>" alt="" class="img-fluid">
                            </div>

                            <h2 class="title"><?= $data_berita['judul']; ?></h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01"><?= $data_berita['tgl_buat']; ?></time></a></li>
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                                <p style="white-space: pre-line;">
                                    <?= $data_berita['berita_utama']; ?>
                                </p>
                                <img src="../../../app/assets/as_dash/img/berita/<?= $data_berita['poto_2'] ?>" class="img-fluid" alt="">

                                <p style="white-space: pre-line;">
                                    <?= $data_berita['berita_1']; ?>
                                </p>
                                <p style="white-space: pre-line;">
                                    <?= $data_berita['berita_2']; ?>
                                </p>
                            </div><!-- End post content -->

                            <div class="meta-bottom">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="#">Supplychain</a></li>
                                </ul>
                            </div><!-- End meta bottom -->

                        </article>

                    </div>
                </section><!-- /Blog Details Section -->

            </div>
        </div>
    </div>
</main>
<?php
include '../../footer.php';
?>