<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-5 col-lg-12 col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- GANTI TAMPILAN GAMBARNYA -->
                        <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">kelompok 4</h1>
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
<br><br><br><br><br><br><br><br>


<div class="text-center">
<a href="<?= base_url('autentifikasi/home'); ?>" style="color:white">Home | </a>
<a href="<?= base_url('autentifikasi/about'); ?>" style="color:white">About us |</a>
<a href="<?= base_url('autentifikasi/contact'); ?>" style="color:white">Contact us | </a>
<a href="<?= base_url('autentifikasi/index'); ?>" style="color:white">Login</a>

    <br>


                                </div>