<div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Navigation</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="index">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                                        <span class="pcoded-mtext">Master Data</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                       <?php if ($_SESSION['role'] === 'operator'): ?>
                                            <li class="">
                                                <a href="operator">
                                                    <span class="pcoded-mtext">Operator Check</span>
                                                </a>
                                            </li>
                                       <?php endif ?>
                                        <?php if ($_SESSION['role'] === 'verifikator'): ?>
                                            <li class="">
                                            <a href="verifikator">
                                                <span class="pcoded-mtext">Verifikasi Check</span>
                                            </a>
                                        </li>
                                        <?php endif ?>
                                        <?php if ($_SESSION['role'] === 'admin'): ?>
                                            <li class="">
                                                <a href="admin-verifikator">
                                                    <span class="pcoded-mtext">Peserta Terverifikasi</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="peserta-lolos">
                                                    <span class="pcoded-mtext">Peserta Lolos</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="peserta-tidak-lolos">
                                                    <span class="pcoded-mtext">Peserta Tidak Lolos</span>
                                                </a>
                                            </li>
                                        <?php endif ?>
                                    </ul>
                                </li>
                                <?php if ($_SESSION['role'] === 'admin'): ?>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu active pcoded-trigger">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="feather icon-upload"></i></span>
                                            <span class="pcoded-mtext">Uploads</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="uploads/alur-ppdb">
                                                    <span class="pcoded-mtext">Alur PPDB</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="uploads/brosur-ppdb">
                                                    <span class="pcoded-mtext">Brosur PPDB</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                <?php endif ?>
                            <div class="pcoded-navigatio-lavel">More</div>
                            <div class="pcoded-item pcoded-left-item">
                               <?php if ($_SESSION['role'] === 'admin'): ?>
                                    <li class="">
                                    <a href="#" data-toggle="modal" data-target="#tambahAdminModal">
                                        <span class="pcoded-micon"><i class="feather icon-user-plus"></i></span>
                                        <span class="pcoded-mtext">Tambah Admin</span>
                                    </a>
                                </li>
                               <?php endif ?>
                                <li class="">
                                    <a href="#" data-toggle="modal" data-target="#settingsModal">
                                        <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                                        <span class="pcoded-mtext">Akun Setting</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#" data-toggle="modal" data-target="#profileModal">
                                        <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                                        <span class="pcoded-mtext">Profile</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="logout">
                                        <span class="pcoded-micon"><i class="feather icon-log-out"></i></span>
                                        <span class="pcoded-mtext">Logout</span>
                                    </a>
                                </li>
                            </div>
                        </div>
                    </nav>