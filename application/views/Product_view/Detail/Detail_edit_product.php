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
      <h3 class="card-title">Edit Data Detail</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form action="<?= site_url('Productdata/processdetail')?>" method="post">
        <div class="row">

              <div class="form-group col-md-4  <?= form_error('nama_product') ? 'has-error' : null ?>">
                <label for="nama_product"><span> Nama*</span> </label>
                <input type="hidden" name="detail_id" value="<?= $row->detail_id ?>">
                <input type="text" class="form-control" name="nama_product" value="<?= $row->nama_product ?>" id="nama_product" placeholder="Nama Product...">
                <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('nama_product') ?></span></small>
                </div>


                <div class="form-group col-md-4  <?= form_error('kondisi') ? 'has-error' : null ?>">
                <label for="kondisi"><span> Kondisi*</span> </label>
                 <select name="kondisi" id="kondisi" class="form-control">
                    <?= $kondisi = $this->input->post('kondisi') ?  $this->input->post('kondisi') : $row->kondisi?>
                    <option value="New" <?= $kondisi == 'New' ? 'selected' : null ?>>New</option><?= $row->nama_product ?>
                    <option value="Second" <?= $kondisi == 'Second' ? 'selected' : null ?>>Second</option>
                    <option value="Other" <?= $kondisi == 'Other' ? 'selected' : null ?>>Other</option>
                 </select>
                <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('kondisi') ?></span></small>
                </div>

                <div class="form-group col-md-4  <?= form_error('type_product') ? 'has-error' : null ?>">
                <label for="type_product"><span> Type*</span> </label>
                <input type="text" class="form-control" name="type_product" value="<?= $row->type_product ?>" id="type_product" placeholder="type Product...">
                <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('type_product') ?></span></small>
                </div>


                <div class="form-group col-md-4  <?= form_error('warna') ? 'has-error' : null ?>">
                <label for="warna"><span> Colors*</span> </label>
                 <select name="warna" id="warna" class="form-control">
                   <?= $warna = $this->input->post('warna') ? $this->input->post('warna') :  $row->warna?>
                    <option value="Red" <?= $warna == 'Red'  ? 'selected' : null ?>>Red</option>
                    <option value="Blue" <?= $warna == 'Blue'  ? 'selected' : null ?>>Blue</option>
                 </select>
                <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('warna') ?></span></small>
                </div>

                <div class="form-group col-md-4  <?= form_error('qty') ? 'has-error' : null ?>">
                <label for="qty"><span> Qty*</span> </label>
                <input type="number" class="form-control" name="qty" value="<?= $row->qty ?>" id="qty" placeholder="qty Product...">
                <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('qty') ?></span></small>
                </div>


                <div class="form-group col-md-4  <?= form_error('price_satuan') ? 'has-error' : null ?>">
                <label for="price_satuan"><span> Price satuan*</span> </label>
                <input type="number" class="form-control" name="price_satuan" value="<?= $row->price_satuan ?>" id="price_satuan" placeholder="price satuan Product...">
                <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('price_satuan') ?></span></small>
                </div>


        </div>

        <div class="row">
        <div class="form-group col-md-12  <?= form_error('description') ? 'has-error' : null ?>">
                <label for="description"><span> Description Product*</span> </label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Description Product..." ><?= $row->description ?></textarea>
                <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('description') ?></span></small>
                </div>
        </div>

        <div class="row">
        <div class="form-group col-md-4  <?= form_error('kode_header') ? 'has-error' : null ?>">
                <!-- <label for="kode_header"><span> Kode Header Product*</span> </label> -->
                <input type="hidden" class="form-control" name="kode_header" value="<?= $row->kode_header ?>" id="kode_header" placeholder="Kode Header..." readonly>
                <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('kode_header') ?></span></small>
                </div>
        </div>
        <div class="row ml-auto mb-3 mr-5 mt-3">
          <button type="submit" class="btn btn-outline-secondary btn-sm ml-2"> <i class="fa fa-save"></i> Simpan</button>
          <button type="Reset" class="btn btn-outline-warning btn-sm ml-2"><i class="fa fa-undo"></i> Reset</button>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
</section>
