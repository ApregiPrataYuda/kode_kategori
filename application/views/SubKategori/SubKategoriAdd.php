<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><span> SubKategori Form Tambah</span></h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a class="text-secondary" href=""><span>Kembali ke  Class Data</span></a></li>
          <li class="breadcrumb-item"><span> SubKategori Form</span></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content  col-md-12">

  <!-- general form elements disabled -->
  <div class="card card-secondary">
    <div class="card-header" style="background-color:RGB(40, 178, 170);">
      <h3 class="card-title">Tambah Data</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <form action="<?= site_url('SubKategori/Tambah_subkategori') ?>" method="post">
        <div class="row">

          <div class="col-md-3 <?= form_error('kode_kategori') ? '' : null ?>">
            <label for="kode_kategori"><span> kode kategori - Nama kategori*</span> </label>
            <select name="kode_kategori" id="kode_kategori" class="form-control">
            <option value="">-pilih-</option>
              <?php foreach ($rowskat as $key => $data) { ?>
                <option value="<?= $data->kode_kategori?> | <?= $data->nama_kategori?>"><?= $data->kode_kategori?> - <?= $data->nama_kategori?></option>
              <?php } ?>
            </select>
            <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('kode_kategori') ?></span></small>
          </div>


          <div class="col-md-3 <?= form_error('kode_warna') ? '' : null ?>">
            <label for="kode_warna"><span> kode Warna - Nama Warna*</span> </label>
            <select name="kode_warna" id="kode_warna" class="form-control">
              <option value="">-pilih-</option>
              <?php foreach ($rows as $key => $data) { ?>
                   <option value="<?= $data->kode_warna?> | <?= $data->nama_warna?>"><?= $data->kode_warna?> - <?= $data->nama_warna?></option>
              <?php } ?>
            </select>
            <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('kode_warna') ?></span></small>
          </div>



          <div class="col-md-3 <?= form_error('merk') ? '' : null ?>">
            <label for="merk"><span>Nama merk*</span> </label>
            <input type="text" class="form-control" value="<?= set_value("merk") ?>" name="merk" id="merk" placeholder="merk ...">
            <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('merk') ?></span></small>
          </div>

          <div class="col-md-3 <?= form_error('tipe') ? '' : null ?>">
            <label for="tipe"><span>Nama Type*</span> </label>
            <input type="text" class="form-control" value="<?= set_value("tipe") ?>" name="tipe" id="tipe" placeholder="type ...">
            <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('tipe') ?></span></small>
          </div>



          <div class="col-md-4 mt-2<?= form_error('satuan') ? '' : null ?>">
            <label for="satuan"><span>Satuan*</span> </label>
            <input type="text" class="form-control" value="<?= set_value("satuan") ?>" name="satuan" id="satuan" placeholder=" Satuan pack/dus/etc...">
            <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('satuan') ?></span></small>
          </div>

          

          <div class="col-md-6 mt-2<?= form_error('nama_subkategori') ? '' : null ?>">
            <label for="nama_subkategori"><span>Nama subKategori*</span> </label>
            <input type="text" class="form-control" value="<?= set_value("nama_subkategori") ?>" name="nama_subkategori" id="nama_subkategori" placeholder="Nama subKategori ...">
            <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('nama_subkategori') ?></span></small>
          </div>

        </div>

        <div class="row ml-auto mb-3 mr-5 mt-3">
          <button type="submit" name="add" class="btn btn-outline-secondary btn-sm ml-2"> <i class="fa fa-save"></i> Tambah</button>
          <button type="Reset" class="btn btn-outline-warning btn-sm ml-2"><i class="fa fa-undo"></i> Reset</button>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
</section>