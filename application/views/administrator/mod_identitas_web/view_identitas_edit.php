<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit BAB Novel</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_identitas_web',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_identitas_web]'>
                  
                    <tr><th scope='row'>Kontak Kami</th><td><textarea id='editor1' class='form-control' name='a' style='height:260px' required>$rows[kontak_kami_db]</textarea></td></tr>
                    <tr><th scope='row'>Syarat Ketentuan</th><td><textarea id='editor2' class='form-control' name='b' style='height:260px' required>$rows[syarat_db]</textarea></td></tr>
                    <tr><th scope='row'>FAQ</th><td><textarea id='editor3' class='form-control' name='c' style='height:260px' required>$rows[faq_db]</textarea></td></tr>
                    <tr><th scope='row'>Pedoman Media Cyber</th><td><textarea id='editor4' class='form-control' name='d' style='height:260px' required>$rows[pedoman_db]</textarea></td></tr>
                  </tbody>
                  </table>
                </div>

              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();
