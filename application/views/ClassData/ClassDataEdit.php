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
      <h3 class="card-title">Edit Data</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form action="<?= site_url('ClassData/Process')?>" method="post">
        <div class="row">

          <div class="col <?= form_error('nama_class') ? '' : null ?>">
            <label for="nama_class"><span class="badge badge-outline-secondary text-sm"> Nama Class*</span> </label>
            <input type="hidden" value="<?= $row->class_id ?>" name="class_id">
            <input type="text" class="form-control" value="<?= $row->nama_class ?>" name="nama_class" id="nama_class" placeholder="Nama Master Class ...">
            <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('nama_class') ?></span></small>
          </div>

          <div class="col-md-2 <?= form_error('kode_class') ? 'has-error' : null ?>">
            <!-- <label for="kode_class"><span class="badge badge-outline-danger text-sm">Kode Class</span> </label> -->
            <input type="hidden" class="form-control" value="<?= $row->kode_class?>" name="kode_class" id="kode_class" readonly>
            <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('kode_class') ?></span></small>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3  mt-3 <?= form_error('status') ? '' : null ?>">
          <label for="nama_class"><span class="badge badge-outline-secondary text-sm">Status*</span> </label>
             <!-- <?= $status = $this->input->post('status') ?  $this->input->post('status') : $row->status ?> -->
             <div class="form-check-inline">
              <input class="form-check-input" type="checkbox" value="Aktif" <?= $status == "Aktif" ? "checked" : null ?>  name="status" id="status">
              <label class="form-check-label" for="status">
              Aktif
              </label>
            </div>

            <div class="form-check-inline">
              <input class="form-check-input" type="checkbox" value="NonAktif" <?= $status == "NonAktif" ? "checked" : null ?> name="status" id="status">
              <label class="form-check-label" for="status">
              NonAktif
              </label>
            </div>
            <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('status') ?></span></small>
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