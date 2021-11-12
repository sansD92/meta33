            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">LIST NOVEL</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_listcerbung'>Tambah Cerbung Baru</a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Judul Novel</th>
                        <th>Foto</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Penulis</th>
                        <th>Status</th>
                        <th style='width:75px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    $tgl_posting = tgl_indo($row['tanggal']);
                    
                    if ($row['status_cerbung']=='Y'){ $status = '<span style="color:green">Published</span>'; }else{ $status = '<span style="color:red">Unpublished</span>'; }
                    if ($row['foto'] == ''){  $foto = $row['foto_cerbung']; }
                    echo "<tr><td>$no</td>
                              <td>$row[judul_cerbung]</td>
                              <td><img style='border:1px solid #cecece' width='80px' class='' src='".base_url()."asset/foto_cerbung/$foto'></td>
                              <td>$row[nama_kategori_cerbung]</td>
                              <td>$tgl_posting</td>
                              <td>$row[nama_lengkap]</td>
                              <td>$status</td>
                              <td><center>
                               ";

          if($this->session->level=='admin') {

            echo "
                                <a class='btn btn-primary btn-xs' title='Edit Data' href='".base_url()."administrator/publish_cerbung/$row[id_cerbung]/$row[status_cerbung]'><span class='glyphicon glyphicon-ok'></span></a>";
                                }
              echo "
                                 <a class='btn btn-warning btn-xs' title='Detail Data' href='".base_url()."administrator/detailscerbung/$row[id_cerbung]'><span class='glyphicon glyphicon-zoom-in'></span></a>
                                  <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_listcerbung/$row[id_cerbung]'><span class='glyphicon glyphicon-edit'></span></a>
                                  <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_cerbung/$row[id_cerbung]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>