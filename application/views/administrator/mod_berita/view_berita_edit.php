<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Artikel</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_listnews',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_berita]'>
                    <tr><th width='120px' scope='row'>Judul Artikel</th>    <td><input type='text' class='form-control' name='b' value='$rows[judul]' required></td></tr>
                    <tr><th scope='row'>Kategori</th>               <td><select name='a' class='form-control' required>";
                                                                            foreach ($record as $row){
                                                                                if ($rows['id_kategori'] == $row['id_kategori']){
                                                                                  echo "<option value='$row[id_kategori]' selected>$row[nama_kategori]</option>";
                                                                                }else{
                                                                                  echo "<option value='$row[id_kategori]'>$row[nama_kategori]</option>";
                                                                                }
                                                                            }
                    echo "</td></tr>
                    ";

          if($this->session->level=='admin') {

            echo " <tr><th scope='row'>Headline</th>               <td>"; if ($rows['headline']=='Y'){ echo "<input type='radio' name='e' value='Y' checked> Ya &nbsp; <input type='radio' name='e' value='N'> Tidak"; }else{ echo "<input type='radio' name='e' value='Y'> Ya &nbsp; <input type='radio' name='e' value='N' checked> Tidak"; } echo "</td></tr>
                     <tr><th scope='row'>Pilihan</th>               <td>"; if ($rows['pilihan']=='Y'){ echo "<input type='radio' name='pl' value='Y' checked> Ya &nbsp; <input type='radio' name='pl' value='N'> Tidak"; }else{ echo "<input type='radio' name='pl' value='Y'> Ya &nbsp; <input type='radio' name='pl' value='N' checked> Tidak"; } echo "</td></tr>
                      ";
                                }
              echo "
                    <tr><th scope='row'>Isi Artikel</th>             <td><textarea id='editor1' class='form-control' name='h' style='height:260px' required>$rows[isi_berita]</textarea></td></tr>
                    <tr><th scope='row'>Ganti Gambar(720x419)</th>                 <td><input type='file' class='form-control' name='k'>";
                                                                               if ($rows['gambar'] != ''){ echo "<i style='color:red'>Lihat Gambar Saat ini : </i><a target='_BLANK' href='".base_url()."asset/foto_berita/$rows[gambar]'>$rows[gambar]</a>"; } echo "</td></tr>
                     <tr><th width='120px' scope='row'>Caption Gambar</th>    <td><input type='text' class='form-control' name='ket' value='$rows[keterangan_gambar]' required></td></tr>
                    <tr><th scope='row'>Tag</th>                    <td><div class='checkbox-scroll2'>
					<input type='text' name='j' value='" . $rows['tag'] . "' class='form-control tags' data-role='tagsinput'/>
					";
                                                                            $_arrNilai = explode(',', $rows['tag']);
                                                                            foreach ($tag as $tag){
                                                                                $_ck = (array_search($tag['tag_seo'], $_arrNilai) === false)? '' : 'checked';
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
