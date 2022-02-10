            <div class="content-wrapper">
                <section class="content-header">
                    <h1 class="fontPoppins">
                        <?php echo strtoupper($title); ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
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
                        <?php echo form_open_multipart("admin/truck/create") ?>
                        <div class="box-header with-border">

                            <div class="box-tools pull-right">
                                <div style="padding-top:10px">
                                    <a href="<?php echo site_url('admin/truck') ?>" class="btn btn-warning btn-flat" title="kembali ke halaman sebelumnya">kembali</a>
                                    <button type="submit" class="btn btn-primary btn-flat" title="Tambah data"> tambah</button>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <?php echo csrf(); ?>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Nama Truk <span style="color:red">*</span></b></label>
                                        <input type="text" class="form-control" placeholder="Nama Truk" name="truck_name" required="required">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for=""><b style="color: black">Nomor STNK <span style="color:red">*</span></b></label>
                                        <input type="text" class="form-control" placeholder="Nomor STNK" name="truck_stnk" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Merek Truk <span style="color:red">*</span></b></label>
                                        <input type="text" class="form-control" placeholder="Merek Truk" name="truck_brand" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Nomor Plat <span style="color:red">*</span></b></label>
                                        <input type="text" class="form-control" placeholder="Nomor Plat" name="truck_plate" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Tahun Keluar <span style="color:red">*</span></b></label>
                                        <input type="number" class="form-control" placeholder="Tahun Keluar" name="truck_year" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Warna Body <span style="color:red">*</span></b></label>
                                        <input type="text" class="form-control" placeholder="Warna Body" name="truck_color" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Gambar Informasi</b></label>
                                        <input type="file" class="form-control" placeholder="Gambar Informasi" name="truck_image" accept=".png, .jpeg, .jpg">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Deskripsi</b></label>
                                        <textarea cols="80" id="editor" name="truck_desc" rows="10" style="resize:none;max-width:700px;"></textarea>
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