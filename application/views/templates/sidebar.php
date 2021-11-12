 <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('barang')?>">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-fw fa-boxes"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Koperasi Barang </div>
            </a>

            <!-- Divider -->
            <?php
            $role_id = $this->session->userdata('role_id');
            $querymenu ="SELECT `user_menu`.`id`,`menu`
                            FROM `user_menu` JOIN `user_access_menu` 
                             ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                            WHERE `user_access_menu`.`role_id`= $role_id 
                            ORDER BY `user_access_menu`.`menu_id` ASC ";
            $menu= $this->db->query($querymenu)-> result_array();
            ?>
            
            <!-- looping menu -->
            <?php foreach($menu as $m): ?>
            <div class="sidebar-heading">
            <?= $m['menu'];?>            
            </div>
            <!-- looping menu -->
            <?php
            $menuid = $m['id'];
            $querysubmenu = "SELECT *
                FROM `user_sub_menu` JOIN `user_menu`
                ON `user_sub_menu`. `menu_id` = `user_menu`.`id`
                WHERE `user_sub_menu`.`menu_id`= $menuid 
                AND `user_sub_menu`.`is_active`= 1
                
                ";
                $submenu = $this->db->query($querysubmenu)->result_array();
            ?>
            <?php foreach($submenu as $sm) :?>
                <?php if($title==$sm['title']): ?>
                <li class="nav-item active">
                     <?php  else : ?>
                     <li class="nav-item">
                    <?php endif ;?>
                <a class="nav-link" href="<?= base_url($sm['url'])?>">
                    <i class="<?= $sm['icon'];?>"></i>
                    <span><?=$sm['title'];?></span></a>
            </li>
             <?php endforeach; ?>
             <hr class="sidebar-divider">

            <?php endforeach; ?>
             <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout')?>">
                  <i class="far fa-fw fa-user"></i>
                    <span>Logout</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->