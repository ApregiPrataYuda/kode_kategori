<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><span> Detail Data</span></h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-info" href="<?= site_url('Dashboard') ?>"><span>
                                Kembali</span></a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">
    <div id="flash" data-flash="<?= $this->session->flashdata('pesan') ?>">
        <div id="flasherr" data-flasherr="<?= $this->session->flashdata('error') ?>">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Data</h3>
                    <span class="badge badge-secondary ml-4">-Kode Header Product: <?= $this->uri->segment(3)  ?></span>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= site_url('Productdata') ?>" class="btn btn-outline-secondary btn-sm"><i
                                    class="fa fa-chevron-circle-left" aria-hidden="true"> Kembali ke Header</i></a>

                            <a href="<?= site_url('Productdata/Tambah_detail_product/' . $this->uri->segment(3)) ?>"
                                class="btn btn-outline-info btn-sm"> <i class="fa fa-plus-square"> Tambah Data
                                    Detail</i></a>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:5%">#No</th>
                                        <th>Kode Product</th>
                                        <th>Nama Product</th>
                                        <th>Kondisi Product</th>
                                        <th>Warna Product</th>
                                        <th>Type Product</th>
                                        <th>Qty Product</th>
                                        <th>Harga satuan Product</th>
                                        <th>Harga total Product</th>
                                        <th>Keterangan</th>
                                        <th style="width:5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;  foreach ($row as $key => $value) { ?>
                                       <tr>
                                        <td><?= $no++?></td>
                                        <td><?= $value->kode_product?></td>
                                        <td><?= $value->nama_product?></td>
                                        <td><?= $value->kondisi?></td>
                                        <td><?= $value->warna?></td>
                                        <td><?= $value->type_product?></td>
                                        <td><?= $value->qty?></td>
                                        <td><?= indo_currency($value->price_satuan)?></td>
                                        <td><?= indo_currency($value->total_price)?></td>
                                        <td><?= $value->description?></td>
                                        <td>
                                            <a href="<?= site_url('Productdata/editdetails/'.$value->detail_id) ?>" class="btn btn-xs btn-warning"> <i class="fa fa-edit"></i></a>
                                            <a href="<?= site_url('Productdata/deletedetails/'.$value->detail_id . '/' . $value->kode_header)?>" id="btn-hapus" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i></a>
                                        </td>
                                       </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.
                        <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
                    </p>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
</section>