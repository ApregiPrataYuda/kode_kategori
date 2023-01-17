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
    <?php echo form_open_multipart('Productdata/Tambahproductheader');?>
      <div class="row">
                <div class="form-group col-md-4  <?= form_error('nama_header') ? 'has-error' : null ?>">
                <label for="nama_header"><span> Nama*</span> </label>
                <input type="text" class="form-control" name="nama_header" value="<?= set_value('nama_header') ?>" id="nama_header" placeholder="Nama Product Header...">
                <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('nama_header') ?></span></small>
                </div>

                <div class="form-group col-md-3  <?= form_error('berat_satuan') ? 'has-error' : null ?>">
                <label for="berat_satuan"><span> Berat Satuan*</span> </label>
                <select name="berat_satuan" id="berat_satuan" class="form-control">
                <option value="">-Select-</option>
                <option value="0.5 MG">0.5 MG</option>
                <option value="5 MG">5 MG</option>
                <option value="1 KG">1 KG</option>
                <option value="2 KG">2 KG</option>
                <option value="3 KG">3 KG</option>
                <option value="4 KG">4 KG</option>
                <option value="5 KG">5 KG</option>
                <option value="6 KG">6 KG</option>
                </select>
                <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('berat_satuan') ?></span></small>
                </div>

                <div class="form-group col-md-3  <?= form_error('kode_subkategori') ? 'has-error' : null ?>">
                <label for="kode_subkategori"><span> Kategori*</span> </label>
                <select name="kode_subkategori" id="kode_subkategori" class="form-control">
                    <option value="">-Pilih-</option>
                    <?php foreach ($rows as $key => $data) { ?>
                           <option value="<?=$data->kode_subkategori?> | <?=$data->nama_subkategori?>"><?=$data->kode_subkategori?> - <?=$data->nama_subkategori?></option>
                         <?php } ?>
                        </select>
                </select>
                <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('kode_subkategori') ?></span></small>
                </div>

                <div class="form-group col-md-2  <?= form_error('kode_header') ? 'has-error' : null ?>">
                <!-- <label for="kode_header"><span> Kode Header*</span> </label> -->
                <input type="hidden" class="form-control" name="kode_header"  id="kode_header">
                <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('kode_header') ?></span></small>
                </div>
        </div>

        
        <div class="form-group col-md-5  <?= form_error('image') ? 'has-error' : null ?>">
          <label for="image"><span> Image*</span> </label>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <div class="holder col-md-4 mb-1">
              <span class="badge badge-secondary">Preview Image</span><br>
                <img id="imgPreview" class="img-fluid img-thumbnail" src="#" alt="add image" />
            </div>
          <!-- <input type="file" class="form-control" name="image" id="image"  accept="image/png, image/jpeg, image/jpg, image/gif"> -->
          <div class="custom-file ml-1 col-md-12">
            <input type="file" name="image" class="custom-file-input" id="image"  id="customFile" accept="image/png, image/jpeg, image/jpg, image/gif">
            <label class="custom-file-label" for="customFile">Pilih file</label>
          </div>
          <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('image') ?></span></small>
        </div>

        <script>
            $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script>


        <div class="form-group col-md-12 <?= form_error('description_header') ? 'has-error' : null ?>">
          <label for="description_header"><span> Description*</span> </label>
         <textarea name="description_header" class="form-control" id="description_header" cols="30" rows="10"></textarea>
          <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('description_header') ?></span></small>
        </div>



     <div class="row ml-auto mb-3 mr-5 mt-3">
          <button type="submit" name="add" class="btn btn-outline-secondary btn-sm ml-2"> <i class="fa fa-save"></i> Simpan</button>
          <button type="Reset" class="btn btn-outline-warning btn-sm ml-2"><i class="fa fa-undo"></i> Reset</button>
        </div>
        <?php form_close()?>
    </div>
    <!-- /.card-body -->
  </div>
</section>



<script>
            $(document).ready(() => {
                $("#image").change(function () {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $("#imgPreview")
                              .attr("src", event.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            });
        </script>