<?php
$sidebar_menu = $this->aViewData['sidebar_menu'];
$current_uri = $this->aViewData['current_uri'];
$page_auth = $this->aViewData['role'];
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <?php foreach ($sidebar_menu as $parent => $parent_params): ?>

                <?php if (empty($page_auth[$parent_params['url']])) { ?>

                    <!-- Level One -->
                    <?php if (empty($parent_params['children'])) { ?>
                        <?php $active = ($current_uri == $parent_params['url']); ?>
                        <li class='<?php if ($active) echo 'active'; ?>'>
                            <a href='<?php echo $parent_params['url']; ?>'>
                                <i class='<?php echo $parent_params['icon']; ?>'></i> <?php echo $parent_params['name']; ?>
                            </a>
                        </li>
                    <?php } else { ?>


                        <?php $parent_active = (in_array($current_uri, array_column($parent_params['children'], 'url'))) ?>
                        <li class='treeview <?php if ($parent_active) echo 'active'; ?>'>
                            <a href='#'>
                                <i class='<?php echo $parent_params['icon']; ?>'></i> <span><?php echo $parent_params['name']; ?></span> <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span>
                            </a>
                            <ul class='treeview-menu'>
                                <?php foreach ($parent_params['children'] as $name => $url) { ?>
                                    <?php if (isset($url['children'])) { ?>

                                        <!-- Level Three -->
                                        <?php $parent_active2 = (in_array($current_uri, array_column($url['children'], 'url'))) ?>
                                        <li class='treeview <?php if ($parent_active2) echo 'active'; ?>'>
                                            <a href='#'>
                                                <i class='<?php echo $url['icon']; ?>'></i> <span><?php echo $url['name']; ?></span> <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span>
                                            </a>
                                            <ul class='treeview-menu'>
                                                <?php foreach ($url['children'] as $name2 => $url2) { ?>
                                                    <?php if (empty($page_auth[$url2['url']])) { ?>
                                                        <?php $child_active2 = ($current_uri == $url2['url']); ?>
                                                        <li <?php if ($child_active2) echo 'class="active"'; ?>>
                                                            <a href='<?php echo $url2['url']; ?>'><i class='<?php echo $url2['icon'] ?>'></i> <?php echo $url2['name']; ?></a>
                                                        </li>
                                                    <?php } ?>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } else { ?>
                                        <!-- Level Two -->
                                        <?php if (empty($page_auth[$url['url']])) { ?>
                                            <?php $child_active = ($current_uri == $url['url']); ?>
                                            <li <?php if ($child_active) echo 'class="active"'; ?>>
                                                <a href='<?php echo $url['url']; ?>'><i class='<?php echo $url['icon'] ?>'></i> <?php echo $url['name']; ?></a>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </li>

                    <?php } ?>
                <?php } ?>

            <?php endforeach; ?>

            <?php /*if (!empty($useful_links)): ?>
                <li class="header">USEFUL LINKS</li>
                <?php foreach ($useful_links as $link): ?>
                    <?php if ($this->ion_auth->in_group($link['auth'])): ?>
                        <li>
                            <a href="<?php echo starts_with($link['url'], 'http') ? $link['url'] : base_url($link['url']); ?>" target='<?php echo $link['target']; ?>'>
                                <i class="fa fa-circle-o <?php echo $link['color']; ?>"></i> <?php echo $link['name']; ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif;*/ ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
