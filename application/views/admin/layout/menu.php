<?php
$CI = &get_instance();
$menuModel = $this->menuModel;
$menu2 = explode(",", $menu);
?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html">PEPADU NTB </a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="#"><i class="fa fa-home fa-fw"></i> Pelayanan Terpadu Kanwil Kemenag NTB</a></li>
    </ul>

    <ul class="nav navbar-right navbar-top-links">

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <?= $nama; ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ubah Password</a>
                </li>
                <li class="divider"></li>
                <li><a href="<?= base_url(); ?>index.php/login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <h4>Selamat Datang</h4>
                    <?php echo $nama; ?>

                    <!-- /input-group -->
                </li>
                <!--
                <li>
                    <a href="<?= base_url(); ?>" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard </a>
                </li> -->

                <?php
                $data = $CI->menuModel->getMenuInduk();
                if ($data) {
                    foreach ($data as $key => $value) {
                        if ($menuModel->cekSub($value->id_menu)) {
                            echo ' <li>
                                <a href="' . base_url() . $value->link . '"><i class="fa ' . $value->icon . ' fa-fw"></i> ' . $value->nama_menu . '<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">';
                            $data2 = $CI->menuModel->getMenuSub($value->id_menu);
                            if ($data2) {
                                foreach ($data2 as $key2 => $value2) {
                                    if ($menuModel->cekSub($value2->id_menu)) {
                                        echo '<li>
                                        <a href="' . base_url() . $value2->link . '">' . $value2->nama_menu . ' <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">';
                                        $data3 = $CI->menuModel->getMenuSub($value2->id_menu);
                                        if ($data3) {
                                            foreach ($data3 as $key3 => $value3) {
                                                echo '<li>
                                                    <a href="' . base_url() . $value3->link . '">' . $value3->nama_menu . '</a>
                                                </li>';
                                            }
                                        }
                                        echo '</ul>
                                            </li>';
                                    } else {
                                        echo '<li>
                                            <a href="' . base_url() . $value2->link . '">' . $value2->nama_menu . '</a>
                                        </li>';
                                    }
                                }
                            }
                            echo '</ul>                                
                            </li>';
                        } else {
                            echo ' <li>
                    <a href="' . base_url() . $value->link . '" ><i class="fa ' . $value->icon . ' fa-fw"></i> ' . $value->nama_menu . ' </a>
                </li>';
                        }
                    }
                }


                ?>


                <li>
                    <a href="#" id="mn_logout"><i class="fa fa-sign-out fa-fw"></i> Keluar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>