<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><span class="badge badge-secondary">Master Class Data</span></h3>
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
          <h3 class="card-title">Master Class Data</h3>

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
              <a href="<?= site_url('ClassData/Tambah_ClassData') ?>" class="btn btn-outline-info btn-sm"> <i class="fa fa-plus-square"> Tambah Data</i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col" style="width:5%">#No</th>
                    <th scope="col" style="width:5%;">kode Class</th>
                    <th scope="col">Nama Class</th>
                    <th scope="col" style="width:5%">Status aktif</th>
                    <th scope="col" style="width:5%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($row as $key => $data) { ?>
                    <tr>
                      <td><?=$no++?>.</td>
                      <td><?=$data->kode_class?></td>
                      <td><?=$data->nama_class?></td>
                     
                      <td><?php if ($data->status == "Aktif"){
                             echo '<h6><span class="badge badge-light text-warning text-sm">Aktif</span></h6>';
                      }elseif ($data->status == "NonAktif") {
                        echo '<h6><span class="badge badge-light text-danger text-sm">NonAktif</span></h6>';
                      } ?>
                      <a id="set_dtl" class="btn btn-default btn-xs" data-kode_class="<?=$data->kode_class?>" data-nama_class="<?=$data->nama_class?>"  data-status="<?=$data->status?>" data-toggle="modal" data-target="#modal-detail" ><i class="fa fa-eye">Detail</i> </a>
                       </td> 
                  
                      <td>
                        <a href="<?=site_url('ClassData/delete/'. $data->class_id)?>" class="btn btn-xs btn-outline-danger"><i class="fa fa-trash"></i></a>
                        <a href="<?=site_url('ClassData/edits/'. $data->class_id)?>" class="btn btn-xs btn-outline-secondary"><i class="fa fa-edit"></i></a>
                      </td>
                    </tr>
                   <?php   } ?>
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
          <div class="modal-dialog modal-sm modal-info">
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="modal-title">Edit</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body table-responsive">
              <table class="table table-bordered no-margin">
                   <tbody>
                   <tr>
                           <th>Kode Class</th>
                           <td><span id="kode_class"></span></td>
                   </tr>

                   <tr>
                           <th>Nama Class</th>
                           <td><span id="nama_class"></span></td>
                   </tr>

                   <tr>
                           <th>Status Sekarang</th>
                           <td><span id="status"></span></td>
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
                       var status = $(this).data('status');
                       var nama_class = $(this).data('nama_class');
                       var kode_class = $(this).data('kode_class');
                       $( '#status').text(status);
                       $( '#nama_class').text(nama_class);
                       $( '#kode_class').text(kode_class);
        })
 }) 
</script>
