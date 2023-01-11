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
      <form action="<?= site_url('Kategori/Tambah_Kategori')?>" method="post">
        <div class="row">

        <div class="col <?= form_error('kode_subclass') ? '' : null ?>">
            <label for="kode_subclass"><span class="badge badge-outline-secondary text-sm"> Kode Subclass - Nama Subclass*</span> </label>
            <select name="kode_subclass" id="kode_subclass" class="form-control">
              <option value="">-Pilih-</option>
              <?php foreach ($rows as $key => $data) { ?>
                <option value="<?= $data->kode_subclass?> | <?= $data->nama_subclass?>"><?= $data->kode_subclass?>-<?= $data->nama_subclass?></option>
               <?php } ?>
            </select>
            <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('kode_subclass') ?></span></small>
          </div>

          <div class="col <?= form_error('nama_kategori') ? '' : null ?>">
            <label for="nama_kategori"><span class="badge badge-outline-secondary text-sm"> Nama Kategori*</span> </label>
            <input type="text" class="form-control" value="<?= set_value('nama_kategori') ?>" name="nama_kategori" id="nama_kategori" placeholder="Nama Master Class ...">
            <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('nama_kategori') ?></span></small>
          </div>

          <div class="col-md-2">
            <!-- <label for="kode_kategori"><span class="badge badge-outline-danger text-sm">Kode Kategori</span> </label> -->
            <input type="hidden" class="form-control" value="" name="kode_kategori" id="kode_kategori" readonly>
          </div>
        </div>

       
        <div class="row ml-auto mb-3 mr-5 mt-3">
          <button type="submit" name="add" class="btn btn-outline-secondary btn-sm ml-2"> <i class="fa fa-save"></i> Simpan</button>
          <button type="Reset" class="btn btn-outline-warning btn-sm ml-2"><i class="fa fa-undo"></i> Reset</button>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
</section>