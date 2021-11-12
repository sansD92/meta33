<section class='invoice'>
      <!-- title row -->
      <div class='row'>
        <div class='col-xs-12'>
          <h2 class='page-header'>
            <i class='fa fa-globe'></i> DETAIL BAB 
            <small class='pull-right'></small>
          </h2>
          <?php 
                    
                    foreach ($cerbung_bab as $row){
                
                    echo "
           <a class='btn btn-success btn-sm' title='Edit Data' href='".base_url()."administrator/edit_cerbung_bab/$row[id_cerbung_bab]/'>Edit</a>
          
             ";

          if($this->session->level=='admin') {

            echo "
                                <a class='btn btn-primary btn-sm' title='Edit Data' href='".base_url()."administrator/publish_bab_cerbung/$row[id_cerbung_bab]/$row[status_cerbung_bab]'>Publish</a>
                                 <a class='btn btn-danger btn-sm' title='Edit Data' href='".base_url()."administrator/publish_lang_bab_cerbung/$row[id_cerbung_bab]/$row[status_lang_cerbung_bab]'>Langganan</a>";
                                }
              echo "
        ";
                      $no++;
                    }
                  ?>
                  </div>
        <!-- /.col -->
     

<div class='col-xs-12 table-responsive'>
          <table class='table table-striped'>
          	<?php 
                    $no = 1;
                    foreach ($cerbung_bab as $row){
                $tgl_posting = tgl_indo($row['tanggal_posting_bab']);
                 if ($row['status_cerbung_bab']=='Y'){ $status = '<span style="color:green">Published</span>'; }else{ $status = '<span style="color:red">Unpublished</span>'; }

                    if ($row['status_lang_cerbung_bab']=='Y'){ $status2 = '<span style="color:green">KUNCI</span>'; }else{ $status2 = '<span style="color:red">TIDAK</span>'; }

                    echo "
<tr><th>Judul Bab</th><td> $row[judul_cerbung_bab]</td></tr>
<tr><th>Tanggal Posting</th><td> $tgl_posting</td></tr>
<tr><th>Status Publish</th><td> $status</td></tr>
 ";

          if($this->session->level=='admin') {

            echo "
<tr><th>Status Langganan</th><td> $status2</td></tr>
 ";
                                }
              echo "
<tr><th>Isi Bab</th><td> $row[isi_cerbung]</td></tr>


 ";
                      $no++;
                    }
                  ?>
</table>
</div>
</div>
  </section>