<div class="content-wrapper">
    <section class="content-header">
        <h1 class="fontPoppins">
            <?php echo strtoupper($title); ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> BERANDA</a></li>
            <?php
            if ($this->uri->segment(3)) {
                echo '<li class="active"><a href="' . site_url('admin/' . $this->uri->segment(2)) . '">' . strtoupper($title) . '</a></li>';
                echo '<li class="active">' . strtoupper($this->uri->segment(3)) . '</li>';
            } else {
                echo '<li class="active">' . strtoupper($title) . '</li>';
            }
            ?>

        </ol>
    </section>

    <section class="content">
        <div class="box">
            <?php echo form_open_multipart("admin/truck") ?>
            <div class="box-header with-border">

                <div class="box-tools pull-right">
                    <div style="padding-top:10px">
                        <a href="<?php echo site_url('admin/truck') ?>" class="btn btn-warning btn-flat" title="kembali ke halaman sebelumnya">kembali</a>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <?php echo csrf(); ?>
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for=""><b style="color: black">Nama Truk <span style="color:red">*</span></b></label>
                            <input readonly type="text" class="form-control" placeholder="Nama Truk" name="truck_name" required="required" value="<?php echo $truck[0]->truck_name; ?>">
                            <input readonly type="hidden" class="form-control" name="truck_image_old" required="required" value="<?php echo $truck[0]->truck_image; ?>">
                            <input readonly type="hidden" class="form-control" name="truck_id" required="required" value="<?php echo $truck[0]->truck_id; ?>">
                        </div>

                        <div class="form-group">
                            <label for=""><b style="color: black">Nomor STNK <span style="color:red">*</span></b></label>
                            <input readonly type="text" class="form-control" placeholder="Nomor STNK" name="truck_stnk" required="required" value="<?php echo $truck[0]->truck_stnk; ?>">
                        </div>

                        <div class="form-group">
                            <label for=""><b style="color: black">Merek Truk <span style="color:red">*</span></b></label>
                            <input readonly type="text" class="form-control" placeholder="Merek Truk" name="truck_brand" required="required" value="<?php echo $truck[0]->truck_brand; ?>">
                        </div>

                        <div class="form-group">
                            <label for=""><b style="color: black">Nomor Plat <span style="color:red">*</span></b></label>
                            <input readonly type="text" class="form-control" placeholder="Nomor Plat" name="truck_plate" required="required" value="<?php echo $truck[0]->truck_plate; ?>">
                        </div>

                        <div class="form-group">
                            <label for=""><b style="color: black">Tahun Keluar <span style="color:red">*</span></b></label>
                            <input readonly type="number" class="form-control" placeholder="Tahun Keluar" name="truck_year" required="required" value="<?php echo $truck[0]->truck_year; ?>">
                        </div>

                        <div class="form-group">
                            <label for=""><b style="color: black">Warna Body <span style="color:red">*</span></b></label>
                            <input readonly type="text" class="form-control" placeholder="Warna Body" name="truck_color" required="required" value="<?php echo $truck[0]->truck_color; ?>">
                        </div>

                        <div class="form-group">
                            <label for=""><b style="color: black">Gambar</b></label><br>
                            <span class="text-red">file sebelumnya: </span><a href="<?php echo base_url(); ?>upload/truck/<?php echo $truck[0]->truck_image; ?>"><?php echo $truck[0]->truck_image; ?></a>
                            <input readonly type="file" class="form-control" placeholder="Gambar" name="truck_image" accept=".png, .jpeg, .jpg">
                        </div>

                        <div class="form-group">
                            <label for=""><b style="color: black">Deskripsi</b></label>
                            <textarea readonly class="form-control" name="truck_desc" rows="10"><?php echo $truck[0]->truck_desc; ?></textarea>
                        </div>


                    </div>
                </div>
            </div>
            <div class="box-footer">
                <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
            </div>
            <?php echo form_close(); ?>

        </div>
    </section>
</div>