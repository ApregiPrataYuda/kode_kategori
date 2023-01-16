<section class="content-header ml-4">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
        <!-- <h3><span class="badge badge-secondary">Master Class Form Tambah</span></h3> -->
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a class="text-secondary" href="<?= site_url('') ?>"><span class="badge badge-outline-secondary">Kembali</span></a></li>
          <!-- <li class="breadcrumb-item"><span class="badge badge-secondary">Master Class Form</span></a></li> -->
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content col-md-12">
  <!-- general form elements disabled -->
  <div class="card card-secondary">
    <div class="card-header" style="background-color:RGB(40, 178, 170);">
      <h3 class="card-title">Tambah Data</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

  <form action="" method="post">
      <table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th scope="col" style="width:150px;">Kode Class</th>
      <th scope="col">Name Class</th>
      <th scope="col" style="width:5px">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php  for($i=1; $i<=$banyak_data;$i++): ?>
   <tr>
    <div class="col-md-10 form-group">
            <td><input type="text" class="form-control" value="<?= $kodeClass ?>" name="data[<?php echo $i ?>][kode_class]" id="kode_class" placeholder="kode class ..."></td>
            <td><input type="text" class="form-control" value="<?= set_value('nama_class') ?>" name="data[<?php echo $i ?>][nama_class]" id="nama_class" placeholder="Nama class ..."></td>
            <td>
            <div class="col <?= form_error('status') ? '' : null ?>">
             <div class="form-check-inline">
              <input class="form-check-input" type="checkbox" name="data[<?php echo $i ?>][status]" value="Aktif" id="status" checked>
              <label class="form-check-label" for="status">
              Aktif
              </label>
            </div>

            <div class="form-check-inline">
              <input class="form-check-input" type="checkbox" name="data[<?php echo $i ?>][status]" value="NonAktif" id="status">
              <label class="form-check-label" for="status">
              NonAktif
              </label>
            </div>
          </div></td>
        </div>
        </tr>
        <?php endfor ?>
    </table>
    </div>

    <div class="row ml-auto mb-3 mr-3">
          <button type="submit" name="add" class="btn btn-outline-secondary btn-sm ml-2"> <i class="fa fa-save"></i> Simpan</button>
          <button type="Reset" class="btn btn-outline-warning btn-sm ml-2"><i class="fa fa-undo"></i> Reset</button>
        </div>
    <!-- /.card-body -->
  </div>
</section>
