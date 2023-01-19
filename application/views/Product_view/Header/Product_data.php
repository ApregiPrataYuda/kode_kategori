<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><span class="badge badge-secondary">Header Product Data</span></h3>
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
          <h3 class="card-title">Header Product Data</h3>

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
              <a href="<?= site_url('Productdata/Tambahproductheader') ?>" class="btn btn-outline-info btn-sm"> <i class="fa fa-plus-square"> Tambah Data</i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col" style="width:5%">#No</th>
                    <th scope="col" style="width:5%;">kode Product</th>
                    <th scope="col" style="width:50%">Nama Product</th>
                    <th scope="col" style="width:50%">Berat Product</th>
                    <th scope="col" style="width:50%">Kategori Product</th>
                    <th scope="col" style="width:5%">Price Total Product</th>
                    <th scope="col" style="width:5%">Qty Total Product</th>
                    <th scope="col" style="width:5%">Image Product</th>
                    <th scope="col" style="width:5%">Deskripsi Product</th>
                    <th scope="col" style="width:5%">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $no=1;  foreach ($row as $key => $value) { ?>
                        <tr>
                            <td><?= $no++?></td>
                            <td><?=$value->kode_header?></td>
                            <td><?=$value->nama_header?></td>
                            <td><?=$value->berat_satuan?></td>
                            <td><?=$value->nama_subkategori?></td>
                            <td><?=  indo_currency($value->price_total) ?></td>
                            <td><?=$value->total_qty?></td>
                            <td> <?php if ($value->image != null) { ?>
                             <img  src="<?=base_url('assets/image/'.$value->image)?>" class="js-amplify" style="width:130px">
                             <?php } ?></td>
                            <td><?= (str_word_count($value->description_header) > 5 ? substr($value->description_header,0,5)."[.....]" : $value->description_header)?>
                            <a id="set_dtl" class="btn btn-default btn-xs ml-3" data-description_header="<?=$value->description_header?>"  data-toggle="modal" data-target="#modal-detail" ><i class="fa fa-eye">Detail</i> </a>
                            </td>
                            <td>
                                <a href="<?= site_url('Productdata/edit/'.$value->kode_header)?>" class="btn btn-sm btn-outline-warning btn-xs"><i class="fa fa-edit"></i></a>
                                <a href="<?= site_url('Productdata/delete/'.$value->kode_header)?>" id="btn-hapus" class="btn btn-sm btn-outline-danger btn-xs"><i class="fa fa-trash"></i></a>
                                <a href="<?= site_url('Productdata/detailproduct/'.$value->kode_header)?>" class="btn btn-sm btn-outline-success btn-xs"><i class="fa fa-eye">Detail</i></a>
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

<div class="modal fade" id="modal-detail">
          <div class="modal-dialog modal-lg modal-info">
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="modal-title">Detail Deskripsi Product</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body table-responsive">
              <table class="table table-bordered no-margin">
                   <tbody>
                   <tr>
                           <th>Deskripsi Product</th>
                   </tr>
                   <tr>
                   <td><span id="description_header"></span></td>
                   </tr>
                   </tbody>
                 </table>

                    </div>
                    </div>
                    </div>
                    </div>


                    
          <script>
          $(document).ready(function() {
                  $(document).on('click', '#set_dtl', function() {
                  var description_header = $(this).data('description_header');
                  $( '#description_header').text(description_header);
                                
                  })
          }) 
          </script>

