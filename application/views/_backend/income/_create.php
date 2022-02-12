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
                        <?php echo form_open_multipart("admin/income/create") ?>
                        <div class="box-header with-border">

                            <div class="box-tools pull-right">
                                <div style="padding-top:10px">
                                    <a href="<?php echo site_url('admin/income') ?>" class="btn btn-warning btn-flat" title="kembali ke halaman sebelumnya">kembali</a>
                                    <button type="submit" class="btn btn-primary btn-flat" title="Tambah data"> tambah</button>
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
                                            foreach ($truck as $row) {
                                                echo '<option value="' . $row->truck_id . '">' . $row->truck_name . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Jenis Pemasukkan <span style="color:red">*</span></b></label>
                                        <select class="form-control select2" name="income_category_id" required style="width:100%" onchange="selectIncome(this.value)">
                                            <option value="">-Pilih Jenis Pemasukkan-</option>
                                            <?php
                                            foreach ($income_category as $row) {
                                                echo '<option value="' . $row->income_category_id . '">' . $row->income_category_name . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group" id="income_name" style="display: none;">
                                        <label for=""><b style="color: black">Pemasukkan <span style="color:red">*</span></b><small style="color:grey"> silahkan mengisi jenis pengeluaran secara manual</small></label>
                                        <input type="text" class="form-control" placeholder="Pemasukkan" name="income_name">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Jumlah <span style="color:red">*</span></b></label>
                                        <input type="text" class="form-control" placeholder="Jumlah" name="income_count" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Harga Satuan <span style="color:red">*</span></b></label>
                                        <input type="number" class="form-control" placeholder="Harga Satuan" name="income_amount" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Total Harga <span style="color:red">*</span></b></label>
                                        <input type="number" class="form-control" placeholder="Total Harga" name="income_price" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Tanggal <span style="color:red">*</span></b></label>
                                        <input type="date" class="form-control" placeholder="Tanggal" name="income_date" required="required" value="<?php echo date('Y-m-d'); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Deskripsi</b></label>
                                        <textarea class="form-control" name="income_desc" rows="10"></textarea>
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