      <nav class="pcoded-navbar">
          <div class="pcoded-inner-navbar main-menu">
            <!-- Label Nav -->
            <div class="pcoded-navigatio-lavel">Navigation</div>
            <!-- Navbar Item -->
<?php $main_menu = $this->db->get_where('menus', array('is_parent' => 0, 'is_active' => 1, 'role'=>$this->session->userdata('role'))); ?>
    <?php foreach ($main_menu->result() as $main) : ?>
      <ul class="pcoded-item pcoded-left-item">
        <li class="pcoded-hasmenu <?php if ($this->uri->segment(1) == $main->judul_menu) {echo "active pcoded-trigger";} ?>">
          <a href="javascript:void(0)">
            <span class="pcoded-micon"><i class="feather <?= $main->icon ?>"></i></span>
              <span class="pcoded-mtext"><?= $main->judul_menu; ?></span>
              <!-- <span class="pcoded-badge label label-warning">NEW</span> -->
          </a>
<?php $sub_menu1 = $this->db->get_where('menus', array('is_parent' => $main->id, 'is_active' => 1));
if ($sub_menu1->num_rows() > 0) { ?>
<?php foreach ($sub_menu1->result() as $sub1) : ?>
      <ul class="pcoded-submenu">
        <li class="">
          <a href="<?= base_url($sub1->link); ?>">
            <span class="pcoded-mtext"><?= $sub1->judul_menu; ?></span>
          </a>
        </li>
      </ul>
      <?php endforeach ?>
      <?php 
    } ?>
      </li>
    </ul>
    <?php endforeach ?>
          </div>
          <!-- end Maian Menu -->
        </nav>