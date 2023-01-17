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
     
       

        <table class="table table-bordered">
  <thead class="thead-light">
    <tr>
                    <th scope="col" style="width: 200px;">Nama Product</th>
                    <th scope="col" style="width: 200px;">Price Product</th>
                    <th scope="col" style="width: 260px;">Kategori Product</th>
                    <th scope="col" style="width: 200px;">Image Product</th>
                    <th scope="col">Deskripsi Product</th>
    </tr>
  </thead>
  <tbody>
  <?php echo form_open_multipart('Product/Tambah_product');?>
    <tr>
        

        <td>
        <div class="input-group mb-3 <?= form_error('nama_product') ? '' : null ?>">
           <input type="text" name="nama_product" class="form-control" placeholder="Nama Product...">
          <small class="text-danger" value="<?= set_value('nama_product') ?>" style="font-style: italic "><span class="badge badge-danger"><?= form_error('nama_product') ?></span></small>
        </div>
        <input type="text" name="kode_product" class="form-control" placeholder="Kode Product...">
        </div>
        </td>


        <td>
        <div class="input-group mb-3 <?= form_error('price') ? '' : null ?>">
                  <input type="number" name="price" value="<?= set_value('price') ?>" class="form-control" placeholder="price Product...">
                  <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('price') ?></span></small>
        </div>
        </td>

        <td>
        <div class="form-group <?= form_error('kode_subkategori') ? '' : null ?>">
                        <select class="form-control" name="kode_subkategori" id="kode_subkategori">
                        <option value="">-Pilih-</option>
                         <?php foreach ($rows as $key => $data) { ?>
                           <option value="<?=$data->kode_subkategori?> | <?=$data->nama_subkategori?>"><?=$data->kode_subkategori?> - <?=$data->nama_subkategori?></option>
                         <?php } ?>
                        </select>
                        <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('kode_subkategori') ?></span></small>
         </div>
        </td>

        <td>
        <div class="form-group  <?= form_error('image') ? 'has-error' : null ?>">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <div class="holder">
              <span class="badge badge-secondary">Preview Image</span><br>
                <img id="imgPreview" style="width:150px" class="img-fluid img-thumbnail" src="#" alt="add image" />
            </div>
          <!-- <input type="file" class="form-control" name="image" id="image"  accept="image/png, image/jpeg, image/jpg, image/gif"> -->
          <div class="custom-file">
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
        </td>


        <td>
        <div class="input-group mb-3 <?= form_error('description') ? '' : null ?>">
                  <textarea name="description" id="description" cols="10" rows="4" class="form-control"><?= set_value('description')?></textarea>
        </div>
        <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('description') ?></span></small>
        </td>

    </tr>
  </tbody>
  </table>

          
    
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