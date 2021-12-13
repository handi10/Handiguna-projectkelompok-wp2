<div class="container">

<div style="padding-top:50px;padding-left:750px; font-size:20px" >
<a href="<?= base_url('autentifikasi/home'); ?>" style="color:white">Home | </a>
<a href="<?= base_url('autentifikasi/about'); ?>" style="color:white">About us |</a>
<a href="<?= base_url('autentifikasi/contact'); ?>" style="color:white">Contact us |</a>
<a href="<?= base_url('autentifikasi/index'); ?>" style="color:white">Login</a>
    <br></div>
    <div class="row justify-content-center">

        <div class="col-xl-12 col-lg-12 col-md-12">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- GANTI TAMPILAN GAMBARNYA -->
                        <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                        <div class="col-lg-12">
                            <div class="p-5">
                                    <h1 class="h4 text-gray-900 mb-4"><b>VISI</b><br>

Menjadi pusat pelatihan unggulan Bahasa Inggris berbasis akademik terdepan di Indonesia
<br><br>
<b>MISI</b>
<br><br>
<ol>
    <li>Menciptakan suasana belajar bahasa Inggris akademik yang nyaman dan menyenangkan.</li>
    <li>Menyelenggarakan proses belajar mengajar yang efektif dan efisien sesuai kebutuhan pembelajaran pada khususnya dan masyarakat pada umumnya.</li>
    <li>Menyelenggarakan jalinan kerjasama dengan lembaga lainnya guna memberikan layanan kepada masyarakat.</li>
</ol>
<br><b>TUJUAN</b><br>
<ol>
    <li>Menyelenggarakan pembelajaran kompetensi Bahasa Inggris akademik dan umum</li>
    <li>Menyelenggarakan tes setara TOEFL dan IELTS kepada masyarakat luas.</li>
    <li>Menyelenggarakan layanan penterjemahan baik dari Bahasa Indonesia ke Inggris maupun sebaliknya.</li></h1>
                                </div>

                                <?= $this->session->flashdata('message'); ?>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

