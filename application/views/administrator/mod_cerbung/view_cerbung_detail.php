

<section class='invoice'>
      <!-- title row -->
      <div class='row'>
        <div class='col-xs-12'>
          <h2 class='page-header'>
            <i class='fa fa-globe'></i> DETAIL NOVEL 
            <small class='pull-right'></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class='row invoice-info'>
        <div class='col-sm-6 invoice-col'>
          <table width="100%" border="0" cellspacing="0" cellpadding="4">
            <?php 
                    $no = 1;
                    foreach ($cerbung as $row){
                 if($row['id_status_bab'] != '1'){ $reads = "disabled ; style ='pointer-events:none;text-decoration:none' "; $color = "red"; }else{ $reads = ""; $color = "#000"; }
                    echo "
              <tr>
                 <td>Judul Novel</td>
                  <td>:</td>
                  <td>$row[judul_cerbung]</td>
              </tr>
              <tr>
                  <td>Genre Novel</td>
                  <td>:</td>
                  <td>$row[nama_kategori_cerbung]</td>
              </tr>
              <tr>
                  <td>Penulis</td>
                  <td>:</td>
                  <td>$row[nama_lengkap]</td>
              </tr>
               <tr>
                  <td>Tokoh Utama</td>
                  <td>:</td>
                  <td>$row[nama_tokoh_cerbung]</td>
              </tr>
              
          </table>
        </div>
         <div class='col-sm-6 invoice-col'>
          <table width='100%' border='0' cellspacing='0' cellpadding='0'>
            
             
             
               <tr>
                  <td>Tanggal Posting</td>
                  <td >:</td>
                  <td >".tgl_indo($row['tanggal'])."</td>
              </tr>
               <tr>
                  <td>Status Novel</td>
                  <td >:</td>
                  <td >$row[nama_status_bab]  |
                   <a class='btn btn-danger btn-xs' title='Edit Data' href='".base_url()."administrator/publish_cerbung_selesai/$row[id_cerbung]/$row[id_status_bab]'><span class='glyphicon glyphicon-ok'></span></a>
                 </td>
              </tr>
             <tr>
                  <td>Caption Gambar</td>
                  <td>:</td>
                  <td>$row[ket_gambar_cerbung]</td>
              </tr>
            <tr>
                  <td>Cover Novel</td>
                  <td>:</td>
                  <td><img style='border:1px solid #cecece' width='100px' src='".base_url()."asset/foto_cerbung/$row[foto_cerbung]'></td>
              </tr>
            
                    </table>
        </div>
        <!-- /.col -->

        <!-- /.col -->
          
        <!-- /.col -->
      </div>
      <!-- /.row -->
<br>
<br>

 <h2 class='page-header'>
            <i class='fa fa-globe'></i> BAB NOVEL 
            <small class='pull-right'></small> 
            

              <a class='pull-right btn btn-primary btn-sm'  href='".base_url()."administrator/add_bab/$row[id_cerbung]' $reads>TAMBAH BAB</a>
          </h2>
           ";
                      $no++;
                    }
                  ?>

       <div class='row'>
        <div class='col-xs-12 table-responsive'>
          <table class='table table-striped'>
            <thead>

            <tr>
              <th>BAB</th>
              <th>JUDUL BAB</th>
              
              <th>Tanggal Posting</th>
              <?php if($this->session->level=='admin') { ?>
              <th>Isi BAB</th>
              <th>Langganan</th>
                  <?php } ?>
              <th>Status</th>
              <th >Action</th>
            </tr>
            </thead>
            <tbody>

                 <?php 
                    $no = 1;
                    foreach ($cerbungbab as $row){
                   $tgl_posting = tgl_indo($row['tanggal_posting_bab']);
                   if ($row['status_cerbung_bab']=='Y'){ $status = '<span style="color:green">Published</span>'; }else{ $status = '<span style="color:red">Unpublished</span>'; }

                    if ($row['status_lang_cerbung_bab']=='Y'){ $status2 = '<span style="color:green">KUNCI</span>'; }else{ $status2 = '<span style="color:red">TIDAK</span>'; }

                    echo "
            <tr>
              <td>$no</td>
              <td>$row[judul_cerbung_bab]</td>
              <td>$tgl_posting</td>
               ";

          if($this->session->level=='admin') {

            echo "
               <td>$row[isi_cerbung]</td>
              
              <td>$status2</td>
               ";
                                }
              echo "
              <td>$status</td>
              <td> 
                <a class='btn btn-warning btn-xs' title='Detail Data' href='".base_url()."administrator/detailscerbungbab/$row[id_cerbung_bab]'><span class='glyphicon glyphicon-zoom-in'></span></a>
               <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_cerbung_bab/$row[id_cerbung_bab]'><span class='glyphicon glyphicon-edit'></span></a>
               <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_cerbung_bab/$row[id_cerbung_bab]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
               </td>

            </tr>
        
";
                      $no++;
                    }
                  ?>

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
    </section>
  
  <script>
    $(document).ready(function()
    {
      $("#sp").click(width="25%">Nama</td>
                  <td width="5%">:</td>
                  <td width="70%"><?php echo $pinjaman->nama_cus ?></td>
              </tr>
              <tr>
                  <td>Nicus</td>
                  <td>:</tfunction()
      {
        $(this).attr("disabled", "disabled");
        return true;
      });
    });
  
  </script>
  
