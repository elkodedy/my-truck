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
                        <?php echo form_open_multipart("admin/asset/update") ?>
                        <div class="box-header with-border">

                            <div class="box-tools pull-right">
                                <div style="padding-top:10px">
                                    <a href="<?php echo site_url('admin/asset') ?>" class="btn btn-warning btn-flat" title="kembali ke halaman sebelumnya">kembali</a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <?php echo csrf(); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""><b style="color: black">Nama Asset <span style="color:red">*</span></b></label>
                                        <input type="hidden" class="form-control" name="asset_id" required="required" value="<?php echo $asset[0]->asset_id; ?>">
                                        <input type="text" class="form-control" placeholder="Nama Asset" name="asset_name" required="required" value="<?php echo $asset[0]->asset_name; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Jumlah <span style="color:red">*</span></b></label>
                                        <input type="text" class="form-control" placeholder="Jumlah" name="asset_count" required="required" value="<?php echo $asset[0]->asset_count; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Harga Satuan <span style="color:red">*</span></b></label>
                                        <input type="text" class="form-control" placeholder="Harga Satuan" name="asset_amount" required="required" value="<?php echo $asset[0]->asset_amount; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Total Harga <span style="color:red">*</span></b></label>
                                        <input type="text" class="form-control" placeholder="Total Harga" name="asset_price" required="required" value="<?php echo $asset[0]->asset_price; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Deskripsi</b></label>
                                        <textarea class="form-control" name="asset_desc" rows="10" style><?php echo $asset[0]->asset_desc; ?></textarea>
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