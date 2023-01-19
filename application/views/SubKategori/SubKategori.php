<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><span>SubKategori Data</span></h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a class="text-info" href="<?= site_url('Dashboard') ?>"><span>Home</span></a></li>
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
        <div class="card-header" style="background-color:RGB(40, 178, 170);">
          <h3 class="card-title">SubKategori Data</h3>

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
              <a href="<?= site_url('SubKategori/Tambah_subkategori') ?>" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-plus-square"> Tambah Data</i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col" style="width:5%">#No</th>
                    <th scope="col" style="width: 15%;">kode Subkategori</th>
                    <th scope="col">Nama Subkategori</th>
                    <!-- <th scope="col">Nama Warna</th> -->
                    <th scope="col" style="width: 15%;">Merk</th>
                    <th scope="col">Type</th>
                    <th scope="col">satuan</th>
                    <th scope="col" style="width:5%">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($row as $key => $data) {?>
                         <tr>
                            <td><?= $no++?></td>
                            <td><?= $data->kode_subkategori ?></td>
                            <td><?= $data->nama_subkategori ?></td>
                            <!-- <td><?= $data->nama_warna ?></td> -->
                            <td><?= $data->merk ?></td>
                            <td><?= $data->tipe ?></td>
                            <td><?= $data->satuan ?></td>
                            <td>
                            <a href="<?= site_url('SubKategori/delete_subkategori/'.$data->id) ?>" id="btn-hapus" class="btn btn-xs btn-outline-danger"><i class="fa fa-trash"></i></a>
                            <a href="<?= site_url('SubKategori/edit_subkategori/'.$data->id) ?>"  class="btn btn-xs btn-outline-warning"><i class="fa fa-edit"></i></a>
                            </td>
                         </tr>
                         
                  <?php  } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

</section>