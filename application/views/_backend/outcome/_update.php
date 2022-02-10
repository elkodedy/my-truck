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
                        <?php echo form_open_multipart("admin/outcome/update") ?>
                        <div class="box-header with-border">

                            <div class="box-tools pull-right">
                                <div style="padding-top:10px">
                                    <a href="<?php echo site_url('admin/outcome') ?>" class="btn btn-warning btn-flat" title="kembali ke halaman sebelumnya">kembali</a>
                                    <button type="submit" class="btn btn-warning btn-flat" title="Update data"> update</button>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <?php echo csrf(); ?>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Supir <span style="color:red">*</span></b></label>
                                        <input type="text" class="form-control" placeholder="Supir" name="driver_id" required="required" value="<?php echo $this->session->userdata('user_fullname'); ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Truk <span style="color:red">*</span></b></label>
                                        <select class="form-control select2" name="truck_id" required style="width:100%">
                                            <option value="">-Pilih Truk-</option>
                                            <?php
                                            foreach ($truck as $nw) {
                                                if ($outcome[0]->truck_id == $nw->truck_id) {
                                                    echo '<option value="' . $nw->truck_id . '" selected>' . $nw->truck_name . '</option>';
                                                } else {
                                                    echo '<option value="' . $nw->truck_id . '">' . $nw->truck_name . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Jenis Pengeluaran <span style="color:red">*</span></b></label>
                                        <select class="form-control select2" name="outcome_category_id" required style="width:100%">
                                            <option value="">-Pilih Jenis Pengeluaran-</option>
                                            <?php
                                            foreach ($outcome_category as $nw) {
                                                if ($outcome[0]->outcome_category_id == $nw->outcome_category_id) {
                                                    echo '<option value="' . $nw->outcome_category_id . '" selected>' . $nw->outcome_category_name . '</option>';
                                                } else {
                                                    echo '<option value="' . $nw->outcome_category_id . '">' . $nw->outcome_category_name . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Pengeluaran <span style="color:red">*</span></b></label>
                                        <input type="hidden" class="form-control" name="outcome_id" required="required" value="<?php echo $outcome[0]->outcome_id; ?>">
                                        <input type="text" class="form-control" placeholder="Pengeluaran" name="outcome_name" required="required" value="<?php echo $outcome[0]->outcome_name; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Jumlah <span style="color:red">*</span></b></label>
                                        <input type="text" class="form-control" placeholder="Jumlah" name="outcome_count" required="required" value="<?php echo $outcome[0]->outcome_count; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Harga Satuan <span style="color:red">*</span></b></label>
                                        <input type="number" class="form-control" placeholder="Harga Satuan" name="outcome_amount" required="required" value="<?php echo $outcome[0]->outcome_amount; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Total Harga <span style="color:red">*</span></b></label>
                                        <input type="number" class="form-control" placeholder="Total Harga" name="outcome_price" required="required" value="<?php echo $outcome[0]->outcome_price; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Tanggal <span style="color:red">*</span></b></label>
                                        <input type="date" class="form-control" placeholder="Tanggal" name="outcome_date" required="required" value="<?php echo $outcome[0]->outcome_date; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Deskripsi</b></label>
                                        <textarea cols="80" id="editor" name="outcome_desc" rows="10" style="resize:none;max-width:700px;"><?php echo $outcome[0]->outcome_desc; ?></textarea>
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