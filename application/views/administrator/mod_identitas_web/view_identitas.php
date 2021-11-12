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
                        <th>Kontak Kami</th>
                        <th>Syarat Ketentuan</th>
                        <th>FAQ</th>
                        <th>Pedoman Media Cyber</th>
                        
                        <th style='width:75px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                   
                    echo "<tr>
                              <td>$row[kontak_kami_db]</td>
                             <td>$row[syarat_db]</td>
                             <td>$row[faq_db]</td>
                             <td>$row[pedoman_db]</td>
                              
                              
                              <td><center>
                               
                                 <a class='btn btn-warning btn-xs' title='Detail Data' href='".base_url()."administrator/detailsidentitas/$row[id_identitas_web]'><span class='glyphicon glyphicon-zoom-in'></span></a>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_listnews/$row[id_berita]'><span class='glyphicon glyphicon-edit'></span></a>
                               
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>