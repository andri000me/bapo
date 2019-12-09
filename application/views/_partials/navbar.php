<header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navigation">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand">
                        <a href="<?= base_url() ?>"><h1><span>e-SAP</span> Universitas YARSI</h1></a>
                    </div>
                </div>

                <div class="navbar-collapse collapse">
                    <div class="menu">
                        <ul class="nav nav-tabs" role="tablist">
                            <!-- GUEST -->
                            <?php if (!isset($_SESSION['is_logged']) || (isset($_SESSION['is_logged']) && !$_SESSION['is_logged'])) { ?>
                                <?php foreach ($menu as $parent => $parent_params): ?>

                                    <?php if (empty($parent_params['children'])): ?>

                                        <?php $active = ($ctrler == $parent || $current_uri == $parent_params['url']); ?>
                                        <li role="presentation">
                                            <a class="<?php echo $active == true ? 'active' : '' ?>" href='<?php echo $parent_params['url']; ?>'>
                                                <?php echo $parent_params['name']; ?>
                                            </a>
                                        </li>

                                    <?php else: ?>

                                        <?php $parent_active = ($ctrler == $parent); ?>
                                        <li role="presentation" class='dropdown'>
                                            <a data-toggle='dropdown' class='dropdown-toggle <?php ($parent_active) ? "active" : "" ?>' href='#'>
                                                <?php echo $parent_params['name']; ?> <span class='caret'></span>
                                            </a>
                                            <ul role='menu' class='dropdown-menu'>
                                                <?php foreach ($parent_params['children'] as $name => $url): ?>
                                                    <li><a href='<?php echo $url; ?>'><?php echo $name; ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>

                                    <?php endif; ?>

                                <?php endforeach; ?>
                            <?php } else { ?>

                                <li role="presentation">
                                    <a class="<?php echo ($ctrler == 'data_universitas' || $current_uri == 'data_universitas') == true ? 'active' : '' ?>" href='<?= base_url() ?>data_universitas'>
                                        Data Universitas
                                    </a>
                                </li>

                                <?php if ($_SESSION['status'] === 'Tata Usaha') { ?>
                                    <li role="presentation">
                                        <a class="<?php echo ($ctrler == 'data_pengguna' || $current_uri == 'data_pengguna') == true ? 'active' : '' ?>" href='<?= base_url() ?>data_pengguna'>
                                            Data Pengguna
                                        </a>
                                    </li>
                                <?php } ?>

                                <li role="presentation">
                                    <a class="<?php echo ($ctrler == 'data_perkuliahan' || $current_uri == 'data_perkuliahan') == true ? 'active' : '' ?>" href='<?= base_url() ?>data_perkuliahan'>
                                        Data Perkuliahan
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a class="<?php echo ($ctrler == 'data_laporan' || $current_uri == 'data_laporan') == true ? 'active' : '' ?>" href='<?= base_url() ?>data_laporan'>
                                        Laporan
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href='<?= base_url() ?>signout'>
                                        Keluar
                                    </a>
                                </li>

                            <?php } ?>
                        </ul>
                        <?php // $this->load->view('_partials/language_switcher'); ?>
                    </div>
                </div>

            </div>
        </div>
    </nav>
</header>