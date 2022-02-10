<style>
    .bg-warning {
        background-color: #ffed8d;
    }

    .bg-warning:hover {
        color: black;
    }

    .bg-success {
        background-color: #b8ff9b;
    }

    .bg-success:hover {
        color: black;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="fontPoppins">
            <?php echo strtoupper($this->uri->segment(2)); ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
        </ol>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?php
                if ($this->session->flashdata('alert')) {
                    echo $this->session->flashdata('alert');
                    unset($_SESSION['alert']);
                }
                ?>

                <div class="row">
                    <!-- ./col -->
                    <?php if ($this->session->userdata('user_group') == 1 or $this->session->userdata('user_group') == 2) { ?>
                        <div class="col-lg-12 col-xs-12">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <p>Total Keuangan</p>
                                    <h3><?php echo indonesiaCurrency($total_income); ?></h3><br>
                                    <b>Rincian :</b>
                                    <table class="table table-responsive">
                                        <?php foreach ($income_list as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo ($value['truck_name']); ?></td>
                                                <td width="70%">: <b><?php echo indonesiaCurrency($value['income']); ?></b></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                    <i style="font-size: 20px; font-family: 'Times New Roman', Times, serif;">~ <?php echo $quotes ?> ~</i>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <a href="<?php echo site_url('admin/dashboard'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $widget[0]->total_truck; ?></h3>
                                    <p>Total Truk</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-bus"></i>
                                </div>
                                <a href="<?php echo site_url('admin/truck'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $widget[0]->total_asset; ?></h3>
                                    <p>Total Asset</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-gears"></i>
                                </div>
                                <a href="<?php echo site_url('admin/asset'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php } elseif ($this->session->userdata('user_group') == 3) { ?>
                        <div class="col-lg-12 col-xs-12">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <p style="font-size: 40px;"><b>Selamat Datang <?php echo $this->session->userdata('user_fullname') ?></b></p>
                                    <i style="font-size: 25px; font-family: 'Times New Roman', Times, serif;">~ <?php echo $quotes ?> ~</i>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <a href="<?php echo site_url('admin/dashboard'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="box-footer">
                <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
            </div>
        </div>
    </section>
</div>