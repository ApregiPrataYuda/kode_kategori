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
      <th scope="col">Nik</th>
      <th scope="col">Names</th>
      <th scope="col">Address</th>
      <th scope="col">Class</th>
    </tr>
  </thead>
  <tbody>
  <?php  for($i=1; $i<=$banyak_data;$i++): ?>
   <tr>
    <div class="col-md-10 form-group">
            <td><input name="data[<?php echo $i ?>][nik]"  class="form-control" required /></td>
            <td><input name="data[<?php echo $i ?>][names]" class="form-control" required /></td>
            <td><textarea name="data[<?php echo $i ?>][address]" id="" cols="10" rows="3" class="form-control" required ></textarea></td>
            <td>
                <select name="data[<?php echo $i ?>][kode_class]" id="kode_class" class="form-control">
                     <option value="kode_class">Pilih</option>
                     <?php foreach ($row as $key => $value) { ?>
                        <option><?=$value->nama_class?></option>
                    <?php }?>
                </select>
            </td>
        </div>
        </tr>
        <?php endfor ?>
  </table>
    </div>
     <div class="row ml-auto mb-3 mr-5 mt-3">
          <button type="submit" class="btn btn-outline-secondary btn-sm ml-2"> <i class="fa fa-save"></i> Simpan</button>
        </div>
      </form>
    <!-- /.card-body -->
  </div>
</section>

