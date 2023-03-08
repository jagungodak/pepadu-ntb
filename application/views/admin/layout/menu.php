<!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">PEPADU NTB</a>
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
                            <i class="fa fa-user fa-fw"></i> <?=$nama;?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ubah Password</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?=base_url();?>index.php/login/logout" ><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="index.html" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Modul Kepegawaian<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="flot.html">Data PAK</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>                           
                           
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Modul PHU<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    
                                    <li>
                                        <a href="#">Data Peserta Umrah</a>
                                    </li>
                                    <li>
                                        <a href="#">Pelimpahan Porsi Haji <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="flot.html">Data Ajuan Pelimpahan</a>
                                            </li>
                                            <li>
                                                <a href="morris.html">Laporan</a>
                                            </li>
                                            
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-th-list fa-fw"></i> Modul PTSP<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    
                                    <li>
                                        <a href="#">Data Peserta Umrah</a>
                                    </li>
                                    <li>
                                        <a href="#">Pelimpahan Porsi Haji <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="flot.html">Data Ajuan Pelimpahan</a>
                                            </li>
                                            <li>
                                                <a href="morris.html">Laporan</a>
                                            </li>
                                            
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-gear fa-fw"></i> Sistem<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="blank.html">Data Pengguna</a>
                                    </li>
                                    <li>
                                        <a href="login.html">Menu</a>
                                    </li>
                                    <li>
                                        <a href="login.html">Hak Akses</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                             <li>
                                <a href="#" id="mn_logout"><i class="fa fa-sign-out fa-fw"></i> Keluar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>