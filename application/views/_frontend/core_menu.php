    <body class="fontInter">
        <header id="header" class="fixed-top ">
            <div class="container-fluid d-flex align-items-center">
                <h5 class="logo mr-auto" style="color:white;font-size:20px"><a href="<?php echo base_url(); ?>" class="scrollto"><img src="<?php echo base_url() ?>assets/core-images/<?php echo $setting[0]->setting_logo; ?>"> <?php echo $setting[0]->setting_appname; ?></a> </h5>


                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li><a class="btn btn-signin" href="<?php echo site_url('auth') ?>">SIGN-IN</a></li>
                    </ul>
                </nav><!-- .nav-menu -->

            </div>
        </header><!-- End Header -->