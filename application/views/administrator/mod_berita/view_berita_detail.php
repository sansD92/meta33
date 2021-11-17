<section class='invoice'>
      <!-- title row -->
      <div class='row'>
        <div class='col-xs-12'>
          <h2 class='page-header'>
            <i class='fa fa-globe'></i> DETAIL ARTIKEL
            <small class='pull-right'></small>
          </h2>
          <?php

                    foreach ($news as $row){

                    echo "
           <a class='btn btn-success btn-sm' title='Edit Data' href='".base_url()."administrator/edit_listnews/$row[id_berita]/$row[status]'>Edit</a>
          <a class='btn btn-warning btn-sm' title='Delete Data' href='".base_url()."administrator/delete_listnews/$row[id_berita]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\">Hapus</a>
             ";

          if($this->session->level=='admin') {

            echo "
                                <a class='btn btn-primary btn-sm' title='Edit Data' href='".base_url()."administrator/publish_listnews/$row[id_berita]/$row[status]'>Publish</a>
                                ";
                                }
              echo "
        ";
                      $no++;
                    }
                  ?></div>
        <!-- /.col -->


<div class='col-xs-12 table-responsive'>
          <table class='table table-striped'>
          	<?php
                    $no = 1;
                    foreach ($news as $row){
                 $tgl_posting = tgl_indo($row['tanggal']);

                    if ($row['status']=='Y'){ $status = '<span style="color:blue">Published</span>'; }else{ $status = '<span style="color:blue">Unpublished</span>'; }
                    if ($row['status_lang_news']=='Y'){ $status2 = '<span style="color:red">KUNCI</span>'; }else{ $status2 = '<span style="color:red">TIDAK</span>'; }
                    if ($row['foto'] == ''){  $foto = $row['gambar']; }
                    echo "
<tr><th>Judul Artikel</th><td> $row[judul]</td></tr>
<tr><th>Kategori</th><td> $row[nama_kategori]</td></tr>
<tr><th>Tgl Posting</th><td> $tgl_posting</td></tr>
<tr><th>Status Published</th><td> $status</td></tr>
<tr><th>Headline</th><td> $row[headline]</td></tr>
<tr><th>Pilihan</th><td> $row[pilihan]</td></tr>
<tr><th>Tag Artikel</th><td> $row[tag]</td></tr>
<tr><th>Isi Artikel</th><td> $row[isi_berita]</td></tr>
<tr><th>Foto</th><td> <img style='border:1px solid #cecece' width='400px' class='' src='".base_url()."asset/foto_berita/$row[gambar]'></td></tr>
<tr><th>Caption Gambar</th><td> $row[keterangan_gambar]</td></tr>

 ";
                      $no++;
                    }
                  ?>
</table>
</div>
</div>
  </section>
