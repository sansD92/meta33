            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Iklan Atas</h3>
                  <!-- <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_iklanatas'>Tambahkan Data</a> -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Judul</th>
                        <th>Link</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    $tgl_Posting = tgl_indo($row['tgl_posting']);
                    if ($row['status_iklan']=='Y'){ $status_iklan = '<span style="color:blue">Published</span>'; }else{ $status_iklan = '<span style="color:blue">Unpublished</span>'; }
                    echo "<tr><td>$no</td>
                              <td>$row[judul]</td>
                              <td><a target='_BLANK' href='$row[url]'>$row[url]</a></td>
                              <td><img src='".base_url()."asset/foto_iklanatas/$row[gambar]' width='100%'></td>
                              <td>$status_iklan</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_iklanatas/$row[id_iklanatas]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Edit Data' href='".base_url()."administrator/publish_iklanatas/$row[id_iklanatas]/$row[status_iklan]'><span class='glyphicon glyphicon-ok'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>