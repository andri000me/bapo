<!--
$controller_action -> you can find in application/core/MY_Controller.php
$menu -> this is list of menu, you can find in application/core/MY_Controller.php


-->
<ul class="sidebar-menu">

<!--    <li class="header">MAIN NAVIGATION</li>-->

    <?php foreach ($menu as $key => $value): ?>
        <?php if (empty($page_auth[$value['url']]) || $this->ion_auth->in_group($page_auth[$value['url']])) { ?>
            <?php if (empty($value['children'])) { ?>

                <!-- Level One -->
                <?php $active = ($controller_action == $value['url']); ?>
                <li class='<?php if ($active) echo 'active'; ?>'>
                    <a href='<?php echo $value['url']; ?>'>
                        <i class='<?php echo $value['icon']; ?>'></i> <?php echo $value['name']; ?>
                    </a>
                </li>

            <?php } else { ?>

                <?php
                $menusChild2 = []; // for child level 2 & 3
                foreach ($value['children'] AS $k => $v) {
                    if (!empty($v['children'])) {
                        foreach (array_values(array_column($v['children'], 'url')) AS $v2) {
                            $menusChild2[] = $v2;
                        }
                    } else {
                        $menusChild2[] = $v['url'];
                    }
                }
                ?>

                <?php $parent_active = (in_array($controller_action, $menusChild2)) ?>
                <li class='treeview <?php if ($parent_active) echo 'active'; ?>'>
                    <a href='#'>
                        <i class='<?php echo $value['icon']; ?>'></i> <span><?php echo $value['name']; ?></span> <span class="pull-right-container"></i><i class='fa fa-angle-left pull-right'></i></span>
                    </a>
                    <ul class='treeview-menu'>
                        <?php foreach ($value['children'] as $key_2 => $value_2) { ?>
                            <?php if (!empty($value_2['children']) && is_array($value_2['children'])) { ?>

                                <!-- Level Three -->
                                <?php $menusChild3 = array_column($value_2['children'], 'url'); ?>
                                <?php $parent_2_active = (in_array($controller_action, $menusChild3)) ?>

                                <li class='treeview <?php if ($parent_2_active) echo 'active'; ?>'>
                                    <a href='#'>
                                        <i class='<?php echo $value_2['icon']; ?>'></i>
                                        <span><?php echo $value_2['name']; ?></span>
                                        <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span>
                                    </a>
                                    <ul class='treeview-menu'>
                                        <?php foreach ($value_2['children'] as $key_3 => $value_3) { ?>
                                            <?php // TODO: if (empty($page_auth[$value_3]) || $this->ion_auth->in_group($page_auth[$value_3]) ) { ?>
                                            <?php if (empty($page_auth[$value_3['url']])) { ?>
                                                <?php $child_3_active = ($controller_action == $value_3['url']); ?>
                                                <li <?php if ($child_3_active) echo 'class="active"'; ?>>
                                                    <a href='<?php echo $value_3['url']; ?>'><i class='<?php echo $value_3['icon'] ?>'></i> <?php echo $value_3['name']; ?></a>
                                                </li>
                                            <?php } ?>
                                        <?php } ?>
                                    </ul>
                                </li>

                            <?php } else { ?>

                                <!-- Level Two -->
                                <?php // TODO: if ( empty($page_auth[$value_2]) || $this->ion_auth->in_group($page_auth[$value_2]) ) { ?>
                                <?php if (empty($page_auth[$value['url']])) { ?>
                                    <?php $child_2_active = ($controller_action == $value_2['url']); ?>
                                    <li <?php if ($child_2_active) echo 'class="active"'; ?>>
                                        <a href='<?php echo $value_2['url']; ?>'><i class='<?= $value_2['icon'] ?>'></i> <?php echo $value_2['name']; ?></a>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
        <?php } ?>
    <?php endforeach; ?>

    <?php if (!empty($useful_links)): ?>
        <li class="header">Data Master</li>
        <?php foreach ($useful_links as $link): ?>
            <?php if ($this->ion_auth->in_group($link['auth'])): ?>
                <li>
                    <a href="<?php echo starts_with($link['url'], 'http') ? $link['url'] : base_url($link['url']); ?>" target='<?php echo $link['target']; ?>'>
                        <i class="fa fa-circle-o <?php echo $link['color']; ?>"></i> <?php echo $link['name']; ?>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

</ul>
