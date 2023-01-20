<?php if ($this->session->has_userdata('gagal')) { ?> 
<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
 <?=strip_tags(str_replace('</p>','',$this->session->flashdata('gagal')));?>.
</div>
<?php } ?>