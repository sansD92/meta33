<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Novel Baru ".$this->session->disabled." </h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_listcerbung',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='120px' scope='row'>Judul Novel</th>    <td><input type='text' class='form-control' name='b' required></td></tr>
                     <tr><th width='120px' scope='row'>Tokoh Utama</th>    <td><input type='text' class='form-control' name='e' required></td></tr>
                    <tr><th scope='row'>Genre</th>               <td><select name='a' class='form-control' required>
                                                                            <option value='' selected>- Pilih Kategori -</option>";
                                                                            foreach ($record as $row){
                                                                                echo "<option value='$row[id_kategori_cerbung]'>$row[nama_kategori_cerbung]</option>";
                                                                            }
                    echo "</td></tr>
                    

                    ";

          if($this->session->level=='admin') {

            echo " <tr><th scope='row'>Headline</th>               <td><input type='radio' name='f' value='Y'> Ya &nbsp; <input type='radio' name='f' value='N' checked> Tidak</td></tr>";
                                }
              echo "
                    <tr><th scope='row'>Pratinjau</th>    
                             <td><textarea id='editor1' class='form-control' name='d' style='height:260px' required></textarea></td></tr>
                    <tr><th scope='row'>Gambar(720x419)</th>                 <td><input type='file' class='form-control' name='k'></td></tr>
                    <tr><th width='120px' scope='row'>Caption Gambar</th>    <td><input type='text' class='form-control' name='ket' required></td></tr>
                    <tr><th scope='row'>Tag</th>                    <td><div class='checkbox-scroll2'>
					<input type='text' id='j' name='j' class='form-control tags' value='' data-role='tagsinput' />
					";
                                                                            foreach ($tag as $tag){
                                                                                //echo "<span style='display:block;'><input type=checkbox value='$tag[tag_seo]' name=j[]> $tag[nama_tag] &nbsp; &nbsp; &nbsp; </span>";
                                                                            }
                    echo "</div></td></tr>
                  </tbody>
                  </table>
                </div>

              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();

			?>
