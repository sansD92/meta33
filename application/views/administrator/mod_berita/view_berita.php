            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Artikel</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_listnews'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Judul Artikel</th>
                        <th>Foto</th>
                        
                        <th>Tanggal</th>
                        <?php if($this->session->level=='admin') { ?>
                          <th>Kategori</th>
                          <!-- <th>Isi Opini</th> -->
                        <th>Penulis</th>
                        <th>Status</th>
                        <th>Berlanganan</th>
                        <?php } ?>
                        <th style='width:75px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    $tgl_posting = tgl_indo($row['tanggal']);
                    
                    if ($row['status']=='Y'){ $status = '<span style="color:green">Published</span>'; }else{ $status = '<span style="color:red">Unpublished</span>'; }
                    
                    if ($row['foto'] == ''){  $foto = $row['gambar']; }
                    if ($row['status_lang_news']=='Y'){ $status2 = '<span style="color:green">KUNCI</span>'; }else{ $status2 = '<span style="color:red">TIDAK</span>'; }
                    echo "<tr><td>$no</td>
                              <td>$row[judul]</td>
                              <td><img style='border:1px solid #cecece' width='80px' class='' src='".base_url()."asset/foto_berita/$foto'></td>
                              
                              <td>$tgl_posting</td>
                               ";

          if($this->session->level=='admin') {

            echo "
            <td>$row[nama_kategori]</td>
            
            <td>$row[nama_lengkap]</td>
                              <td>$status</td>
                               <td>$status2</td>
                               ";
                                }
              echo "
                              <td><center>
                               
                                 <a class='btn btn-warning btn-xs' title='Detail Data' href='".base_url()."administrator/detailsnews/$row[id_berita]'><span class='glyphicon glyphicon-zoom-in'></span></a>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_listnews/$row[id_berita]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_listnews/$row[id_berita]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>