<?php
include '../../header.php';
?>
<main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">SUPPLY CHAIN MANAGEMENT</h1>
                    <span data-aos="fade-up" data-aos-delay="100">
                        Koordinasi yang sistematis dan strategis dari fungsi bisnis dalam suatu perusahaan dan lintas bisnis dalam
                        supply chain untuk keperluan meningkatkan kinerja jangka panjang dari perusahaan dan supply chain secara keseluruhan.
                        "Council of Logistics"
                    </span>
                    <div class="d-flex flex-column flex-md-row mt-4" data-aos="fade-up" data-aos-delay="200">
                        <a href="#about" class="btn-get-started">News <i class="bi bi-arrow-right"></i></a>
                        <a href="https://www.youtube.com/watch?v=op4o6g2Lwow&t=5s" class="glightbox btn-watch-video d-flex align-items-center justify-content-center ms-0 ms-md-4 mt-4 mt-md-0"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <img src="../../../app/assets/as_land/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->
    <section id="about" class="about section">
        <div class="container" data-aos="fade-up">
            <div class="row gx-0">
                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h3>Berita Terhangat</h3>
                        <h2><?= $data['judul']; ?></h2>
                        <p id="berita-utama"><?= $berita_utama ?></p>


                        <div class="text-center text-lg-start">
                            <form action="../berita/berita.php" method="post">
                                <input type="hidden" name="id" value="<?= $id_berita ?>">
                                <button type="submit" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>Read More</span>
                                    <i class="bi bi-arrow-right"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="../../../app/assets/as_dash/img/berita/<?= $poto ?>" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="values" class="values section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Kegiatan</h2>
            <p>ASPERINDO<br></p>
        </div>
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <img src="../../../app/assets/as_land/img/values-1.png" class="img-fluid" alt="">
                        <h3>Ad cupiditate sed est odio</h3>
                        <p>Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card">
                        <img src="../../../app/assets/as_land/img/values-2.png" class="img-fluid" alt="">
                        <h3>Voluptatem voluptatum alias</h3>
                        <p>Repudiandae amet nihil natus in distinctio suscipit id. Doloremque ducimus ea sit non.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card">
                        <img src="../../../app/assets/as_land/img/values-3.png" class="img-fluid" alt="">
                        <h3>Fugit cupiditate alias nobis.</h3>
                        <p>Quam rem vitae est autem molestias explicabo debitis sint. Vero aliquid quidem commodi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<script>
    function truncateText(element, maxLines) {
        const lineHeight = parseInt(window.getComputedStyle(element).lineHeight);
        const maxHeight = maxLines * lineHeight;

        if (element.scrollHeight > maxHeight) {
            element.style.maxHeight = maxHeight + 'px';
            element.style.overflow = 'hidden';

            // Tambahkan ellipsis (lebih rumit untuk multi-baris)
            const lastSpace = element.textContent.lastIndexOf(' ', element.textContent.length - 1);
            if (lastSpace > 0) {
                element.textContent = element.textContent.substring(0, lastSpace) + '...';
            }
        }
    }

    // Panggil fungsi setelah konten dimuat
    window.addEventListener('DOMContentLoaded', () => {
        const paragraphs = document.querySelectorAll('p'); // Pilih semua elemen <p>
        paragraphs.forEach(p => {
            truncateText(p, 3); // Batasi menjadi 3 baris (sesuaikan)
        });
    });
</script>
<?php
include '../../footer.php';
?>