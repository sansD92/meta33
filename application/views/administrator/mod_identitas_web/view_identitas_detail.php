<section class='invoice'>
      <!-- title row -->
      <div class='row'>
        <div class='col-xs-12'>
          <h2 class='page-header'>
            <i class='fa fa-globe'></i> DETAIL ARTIKEL 
            <small class='pull-right'></small>
          </h2>
          <?php 
                    
                    foreach ($identitas as $row){
                
                    echo "
           <a class='btn btn-success btn-sm' title='Edit Data' href='".base_url()."administrator/edit_identitas_web/$row[id_identitas_web]'>Edit</a>
         
             ";

         

            echo "
        ";
                      $no++;
                    }
                  ?></div>
        <!-- /.col -->
     

<div class='col-xs-12 table-responsive'>
          <table class='table table-striped'>
          	<?php 
                    $no = 1;
                    foreach ($identitas as $row){
                
                    echo "
<tr><th>Kontak Kami</th><td> $row[kontak_kami_db]</td></tr>
<tr><th>Syarat Ketentuan</th><td> $row[syarat_db]</td></tr>
<tr><th>FAQ</th><td> $row[faq_db]</td></tr>
<tr><th>Pedoman Media Cyber</th><td> $row[pedoman_db]</td></tr>


 ";
                      $no++;
                    }
                  ?>
</table>
</div>
</div>
  </section>