<div class="container-fluid px-0">
    <div class="main-content-container container-fluid px-4">
        <div class="row">
            <div class="col-lg-12 mx-auto mt-4">
                <h5 class="text-uppercase mb-4">author profile</h5>
                <!-- Edit User Details Card -->
                <div class="card card-small edit-user-details mb-4">
                    <div class="card-header p-0">
                        <div class="col-lg-12 bg-warning" style="height: 230px;">
                            <div class="user-details__avatar mx-auto">
                                <img src="<?= base_url() ?>assets/images/avatars/0.jpg" class="mt-3" alt="User Avatar">
                            </div>
                            <?php foreach ($user_id as $row) { ?>
                                <h4 class="text-center text-white m-0 mt-2 text-uppercase"><?= $row->nama_user ?></h4>
                                <p class="text-center text-white m-0">UNIVERSITAS KUNINGAN</p>
                                <p class="text-center text-white m-0 mb-2">Author ID: <?= $row->nidn ?></p>
                            <?php } ?>
                        </div>
                        <div class="card-body p-0">
                            <div class="border-bottom clearfix d-flex">
                                <ul class="nav nav-tabs border-0 mt-auto mx-4 pt-2">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Dashboad</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Scopus</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Google</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Edit User Details Card -->
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <span>Sinta Rank</span>
                                    <hr>
                                    <div class="text-center">
                                        <h2 class="text-warning"><strong>24.933</strong></h2>
                                        <p style="font-size: 10px;">Nominal Rank (3rd)</p>
                                        <h2 class="text-info"><strong>15</strong></h2>
                                        <p style="font-size: 10px;">Affiliation (3rd)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <span class="mb-4">International Publication</span>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3 text-center">
                                            <p>Total Document</p>
                                            <h2 class="text-warning"><strong>2</strong></h2>
                                            <p style="font-size: 10px;">Docs</p>
                                            <a href="" class="btn btn-info"><i class="fas fa-sync"></i> Sync Scopus</a>
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <p>Total Citation</p>
                                            <h2 class="text-success"><strong>0</strong></h2>
                                            <p style="font-size: 10px;">Docs</p>
                                            <a href="" class="btn btn-warning"><i class="fas fa-globe"></i> Check Scopus</a>
                                        </div>
                                        <div class="col-md-2 d-flex flex-column m-auto" style="font-size: 10px;">
                                            <table>
                                                <tr>
                                                    <td>H-index</td>
                                                    <td>:</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>G-index</td>
                                                    <td>:</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>i10-index</td>
                                                    <td>:</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Cited Docs</td>
                                                    <td>:</td>
                                                    <td>0</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-3 text-right d-flex flex-column m-auto">
                                            <h4 class="text-warning mt-5">Scopus</h4>
                                            <p style="font-size: 11px;">Scopus ID <strong>#123456789</strong></p>
                                            <a href="" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Reset Scopus</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3 text-center">
                                            <p>Total Document</p>
                                            <h2 class="text-warning"><strong>2</strong></h2>
                                            <p style="font-size: 10px;">Docs</p>
                                            <a href="" class="btn btn-info"><i class="fas fa-sync"></i> Sync WoS Docs</a>
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <p>Total Citation</p>
                                            <h2 class="text-success"><strong>0</strong></h2>
                                            <p style="font-size: 10px;">Docs</p>
                                            <a href="" class="btn btn-warning"><i class="fas fa-globe"></i> Check WoS Docs</a>
                                        </div>
                                        <div class="col-md-2 d-flex flex-column m-auto" style="font-size: 10px;">
                                            <table>
                                                <tr>
                                                    <td>H-index</td>
                                                    <td>:</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>G-index</td>
                                                    <td>:</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>i10-index</td>
                                                    <td>:</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Cited Docs</td>
                                                    <td>:</td>
                                                    <td>0</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-3 text-right d-flex flex-column m-auto">
                                            <h6 class="text-warning mt-5 text-uppercase">Web OF Science</h6>
                                            <p style="font-size: 11px;">Wos ID <strong>#123456789</strong></p>
                                            <a href="" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Reset Scopus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8 col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <span class="mb-4">National Publication</span>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3 text-center">
                                            <p>Total Document</p>
                                            <h2 class="text-warning"><strong>10</strong></h2>
                                            <p style="font-size: 10px;">Docs</p>
                                            <a href="" class="btn btn-info"><i class="fas fa-sync"></i> Sync Garuda Doc</a>
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <p>Total Citation</p>
                                            <h2 class="text-success"><strong>0</strong></h2>
                                            <p style="font-size: 10px;">Docs</p>
                                            <a href="" class="btn btn-warning"><i class="fas fa-globe"></i> Check Garuda Doc</a>
                                        </div>
                                        <div class="col-md-2 d-flex flex-column m-auto" style="font-size: 10px;">
                                            <table>
                                                <tr>
                                                    <td>H-index</td>
                                                    <td>:</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>G-index</td>
                                                    <td>:</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>i10-index</td>
                                                    <td>:</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Cited Docs</td>
                                                    <td>:</td>
                                                    <td>0</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-3 text-right d-flex flex-column m-auto">
                                            <h4 class="text-warning mt-5 text-uppercase">Garuda</h4>
                                            <p style="font-size: 11px;">Garuda ID <strong>#123456789</strong></p>
                                            <a href="" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Reset Garuda</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8 col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <span class="mb-4">Other Publication</span>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3 text-center">
                                            <p>Total Document</p>
                                            <h2 class="text-warning"><strong>10</strong></h2>
                                            <p style="font-size: 10px;">Docs</p>
                                            <a href="" class="btn btn-info"><i class="fas fa-sync"></i> Sync GS Doc</a>
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <p>Total Citation</p>
                                            <h2 class="text-success"><strong>0</strong></h2>
                                            <p style="font-size: 10px;">Docs</p>
                                            <a href="" class="btn btn-warning"><i class="fas fa-globe"></i> Check GS Doc</a>
                                        </div>
                                        <div class="col-md-2 d-flex flex-column m-auto" style="font-size: 10px;">
                                            <table>
                                                <tr>
                                                    <td>H-index</td>
                                                    <td>:</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>G-index</td>
                                                    <td>:</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>i10-index</td>
                                                    <td>:</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Cited Docs</td>
                                                    <td>:</td>
                                                    <td>0</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-3 text-right d-flex flex-column m-auto">
                                            <h4 class="text-warning mt-5">Google</h4>
                                            <p style="font-size: 11px;">GS ID <strong>#123456789</strong></p>
                                            <a href="" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Reset GS</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>