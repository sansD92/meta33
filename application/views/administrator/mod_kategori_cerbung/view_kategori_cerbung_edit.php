<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Kategori Cerbung</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_kategoricerbung',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_kategori_cerbung]'>
                    <tr><th width='120px' scope='row'>Nama Kategori</th>    <td><input type='text' class='form-control' name='a' value='$rows[nama_kategori_cerbung]' required></td></tr>
                  
                    <tr><th scope='row'>Status</th>                          <td>"; if ($rows['aktif']=='Y'){ echo "<input type='radio' name='b' value='Y' checked> Ya &nbsp; <input type='radio' name='b' value='N'> Tidak"; }else{ echo "<input type='radio' name='b' value='Y' checked> Ya &nbsp; <input type='radio' name='b' value='N' > Tidak"; } echo "</td></tr>
                   
                  </tbody>
                  </table>
                </div>

              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();
