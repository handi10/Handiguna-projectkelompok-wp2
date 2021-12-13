<div class="container">

    

<div style="padding-top:50px;padding-left:750px; font-size:20px" >
<a href="<?= base_url('autentifikasi/home'); ?>" style="color:white">Home | </a>
<a href="<?= base_url('autentifikasi/about'); ?>" style="color:white">About us |</a>
<a href="<?= base_url('autentifikasi/contact'); ?>" style="color:white">Contact us |</a>
<a href="<?= base_url('autentifikasi/index'); ?>" style="color:white">Login</a>
    <br></div>
    <div class="row justify-content-center">


        
                                <div class="text-center" style="padding-top:100px">
                                    <h1 class="h4 text-gray-900 mb-4" style="font-size:45px ; font-family:font-family">Welcome to English Language Class (ELC) Academy</h1>

                                </div>

                                <?= $this->session->flashdata('message'); ?>

</div>
