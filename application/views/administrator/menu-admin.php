        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
            <?php $usr = $this->model_app->view_where('users', array('id_users'=> $this->session->id_users))->row_array();
                  if (trim($usr['foto'])==''){ $foto = 'blank.png'; }else{ $foto = $usr['foto']; } ?>
            <img src="<?php echo base_url(); ?>/asset/foto_user/<?php echo $foto; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <?php echo "<p>$usr[nama_lengkap]</p>"; ?>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU <span class='uppercase'><?php echo $this->session->level; ?></span></li>
            <li><a href="<?php echo base_url(); ?>administrator/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

            <li class="treeview">
                <?php
            $cek=$this->model_app->umenu_akses("manajemenuser",$this->session->id_session);
            if($cek==1 OR $this->session->level=='admin'){
            echo "
              <a href='#'><i class='glyphicon glyphicon-pencil'></i> <span>MASTER</span><i class='fa fa-angle-left pull-right'></i></a>";
               }
            ?>
              <ul class='treeview-menu'>
              <?php
                
             $cek=$this->model_app->umenu_akses("",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "<li><a href='".base_url()."administrator/kategoriberita'><i class='fa fa-circle-o'></i> Kategori Artikel</a></li>";
                }

             

                  $cek=$this->model_app->umenu_akses("manajemenuser",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "<li><a href='".base_url()."administrator/manajemenuser'><i class='fa fa-circle-o'></i> Manajemen User</a></li>";
                }
               
              ?>
              </ul>
            </li>

           <li><a href="<?php echo base_url(); ?>administrator/listnews"><i class="glyphicon glyphicon-pencil"></i> <span>Artikel</span></a></li>
             
           





           <!--  <li class="treeview">
               <?php
                $cek=$this->model_app->umenu_akses("",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
             echo "<a href='#'><i class='fa fa-users'></i> <span>Modul Users</span><i class='fa fa-angle-left pull-right'></i></a>";
               }
                ?>
              <ul class="treeview-menu">
              <?php
                $cek=$this->model_app->umenu_akses("manajemenuser",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "<li><a href='".base_url()."administrator/manajemenuser'><i class='fa fa-circle-o'></i> Manajemen User</a></li>";
                }


              $cek=$this->model_app->umenu_akses("iklanatas",$this->session->id_session);
              if($cek==1 OR $this->session->level=='admin'){
                echo "<li><a href='".base_url()."administrator/iklanatas'><i class='fa fa-circle-o'></i> Iklan </a></li>";
              }
              ?>
              </ul>
            </li> -->

            <li><a href="<?php echo base_url(); ?>administrator/edit_manajemenprofile/<?php echo $this->session->id_users; ?>"><i class="fa fa-edit"></i> <span>Edit Profile</span></a></li>
            <li><a href="<?php echo base_url(); ?>administrator/logout"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
          </ul>
        </section>
