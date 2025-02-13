<?php
include '../../header.php';
$query = "SELECT * FROM tb_berita WHERE publish = 'yes' AND status = 'NASIONAL' ORDER BY id_berita DESC"; // Sesuaikan dengan struktur tabel Anda
$result = mysqli_query($koneksi, $query);
?>
<main class="main">
    <section id="recent-posts" class="recent-posts section mt-4">
        <div class="container section-title" data-aos="fade-up">
            <h2></h2>
            <p>Berita Nasional</p>
        </div>

        <div class="container">
            <div class="row gy-5">
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <div class="col-xl-4 col-md-6">
                        <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">
                            <div class="post-img position-relative overflow-hidden">
                                <img src="../../../app/assets/as_dash/img/berita/<?= $row['poto_1'] ?>" class="img-fluid fixed-img" alt="">
                                <span class="post-date"><?= date('d M Y', strtotime($row['tgl_buat'])) ?></span>
                            </div>
                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title"><?= htmlspecialchars($row['judul']) ?></h3>
                                <hr>
                                <a href="berita.php?id=<?= $row['id_berita'] ?>" class="readmore stretched-link">
                                    <span>Baca Selengkapnya</span><i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div><!-- End post item -->
                <?php endwhile; ?>
            </div>
        </div>

        <style>
            .fixed-img {
                width: 100%;
                /* Mengisi lebar container */
                height: 250px;
                /* Tinggi tetap untuk semua gambar */
                object-fit: cover;
                /* Memotong gambar agar sesuai tanpa merusak proporsi */
                border-radius: 10px;
                /* Opsional: Memberikan sudut melengkung */
            }
        </style>


    </section><!-- /Recent Posts Section -->
</main>
<?php
include '../../footer.php';
?>