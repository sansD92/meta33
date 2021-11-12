<div class="col-md-12">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">TAMBAH BAB NOVEL</h3>
                </div>
              <div class="box-body"><?php echo form_open_multipart('administrator/simpan_cerbung_bab', array('id' => 'myform')); ?>
              <div class="col-md-12">
                  <table class="table table-condensed table-bordered">
                  <tbody>
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="id_cerbung" value="<?php echo $cerbung->id_cerbung;?>"/>
                    <tr><th width="120px" scope="row">Judul</th>    <td><input type="text" class="form-control" name="b" required></td></tr>
                    
                    <tr><th scope="row">ISI</th>             <td><textarea id="editor1" class="form-control" name="c" style="height:260px" required></textarea></td></tr>
                   
                  </tbody>
                  </table>
                </div>

              <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-info">Tambahkan</button>
                    <a href="index.php"><button type="button" class="btn btn-default pull-right">Cancel</button></a>
                    <?php echo form_close() ?>
                  </div>
            </div></div></div>

              
<script>
    jQuery(document).ready(function () {
        jQuery('#submit_button').click(function () {
            jQuery('#submit_button').attr('disabled','disabled');

       document.getElementById("myform").submit();
      return true;
           });
    });
</script>