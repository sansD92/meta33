<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Novel</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_listcerbung',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_cerbung]'>
                    <tr><th width='120px' scope='row'>Judul Novel</th>    <td><input type='text' class='form-control' name='b' value='$rows[judul_cerbung]' required></td></tr>
                     <tr><th width='120px' scope='row'>Tokoh Utama</th>    <td><input type='text' class='form-control' name='e' value='$rows[nama_tokoh_cerbung]' required></td></tr>
                    <tr><th scope='row'>Genre</th>               <td><select name='a' class='form-control' required>";
                                                                           foreach ($record as $row){
                                                                                if ($rows['id_kategori_cerbung'] == $row['id_kategori_cerbung']){
                                                                                  echo "<option value='$row[id_kategori_cerbung]' selected>$row[nama_kategori_cerbung]</option>";
                                                                                }else{
                                                                                  echo "<option value='$row[id_kategori_cerbung]'>$row[nama_kategori_cerbung]</option>";
                                                                                }
                                                                            }
                    echo "</td></tr>
                   
                     ";

          if($this->session->level=='admin') {

            echo "
                    <tr><th scope='row'>Headline</th>               <td>"; if ($rows['headline_cerbung']=='Y'){ echo "<input type='radio' name='f' value='Y' checked> Ya &nbsp; <input type='radio' name='f' value='N'> Tidak"; }else{ echo "<input type='radio' name='f' value='Y'> Ya &nbsp; <input type='radio' name='f' value='N' checked> Tidak"; } echo "</td></tr>
                    ";
                                }
              echo "
                    <tr><th scope='row'>Pratinjau</th>             <td><textarea id='editor1' class='form-control' name='d' style='height:260px' required>$rows[pratinjau_cerbung]</textarea></td></tr>
                    <tr><th scope='row'>Ganti Gambar(720x419)</th>                 <td><input type='file' class='form-control' name='k'>";
                                                                               if ($rows['foto_cerbung'] != ''){ echo "<i style='color:red'>Lihat Gambar Saat ini : </i><a target='_BLANK' href='".base_url()."asset/foto_cerbung/$rows[foto_cerbung]'>$rows[foto_cerbung]</a>"; } echo "</td></tr>
                     <tr><th width='120px' scope='row'>Caption Gambar</th>    <td><input type='text' class='form-control' name='ket' value='$rows[ket_gambar_cerbung]' required></td></tr>
                    <tr><th scope='row'>Tag</th>                    <td><div class='checkbox-scroll2'>
					<input type='text' name='j' value='" . $rows['tag_cerbung'] . "' class='form-control tags' data-role='tagsinput'/>
					";
                                                                            $_arrNilai = explode(',', $rows['tag_cerbung']);
                                                                            foreach ($tag as $tag){
                                                                                $_ck = (array_search($tag['tag_seo_cerbung'], $_arrNilai) === false)? '' : 'checked';
                                                                                //echo "<span style='display:block;'><input type=checkbox value='$tag[tag_seo]' name=j[] $_ck> $tag[nama_tag] &nbsp; &nbsp; &nbsp; </span>";
                                                                            }
                    echo "</div></td></tr>
                  </tbody>
                  </table>
                </div>

              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();
