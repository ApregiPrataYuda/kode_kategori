<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><span class="badge badge-secondary">Master Kategori Data</span></h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a class="text-info" href="<?= site_url('Dashboard') ?>"><span class="badge badge-secondary"> Home</span></a></li>
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
          <h3 class="card-title">Master Kategori Data</h3>

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
              <a href="<?= site_url('Kategori/Tambah_Kategori') ?>" class="btn btn-outline-info btn-sm"> <i class="fa fa-plus-square"> Tambah Data</i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col" style="width:5%">#No</th>
                    <th scope="col" style="width:5%;">kode Kategori</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col" style="width:5%">Action</th>
                  </tr>
                </thead>
                <tbody>

                <?php $no=1; foreach ($row as $key => $data) { ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?= $data->kode_kategori?></td>
                        <td><?= $data->nama_kategori?></td>
                        <td>
                        <a href="" class="btn btn-xs btn-outline-danger"><i class="fa fa-trash"></i></a>
                      <a href="" class="btn btn-xs btn-outline-warning"><i class="fa fa-edit"></i></a>
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
          <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

</section>