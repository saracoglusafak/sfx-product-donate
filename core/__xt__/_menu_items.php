<?php

add_filter('nav_menu_meta_box_object', function ($object) {
    add_meta_box('sfxplugin-menu-metabox', __('SFX Plugin'), 'sfxplugin_menu_meta_box', 'nav-menus', 'side', 'default');
    return $object;
}, 10, 1);



function sfxplugin_menu_meta_box()
{
    global $nav_menu_selected_id;

    $walker = new Walker_Nav_Menu_Checklist();

    $current_tab = 'all';
    $authors = get_users(array('orderby' => 'nicename', 'order' => 'ASC', 'who' => 'authors'));
    $admins = array();

    if (isset($_REQUEST['authorarchive-tab']) && 'admins' == $_REQUEST['authorarchive-tab']) {
        $current_tab = 'admins';
    } elseif (isset($_REQUEST['authorarchive-tab']) && 'all' == $_REQUEST['authorarchive-tab']) {
        $current_tab = 'all';
    }

    /* set values to required item properties */
    foreach ($authors as &$author) {
        $author->classes = array();
        $author->type = sfxdonate_plugin_id;
        $author->object_id = $author->ID;
        $author->title = $author->nickname . ' - ' . implode(', ', $author->roles);
        $author->object = sfxdonate_plugin_id;
        $author->url = get_author_posts_url($author->ID);
        $author->attr_title = $author->displayname;

        if ($author->has_cap('edit_users')) {
            $admins[] = $author;
        }
    }

    $removed_args = array('action', 'sfxpluginlink-tab', 'edit-menu-item', 'menu-item', 'page-tab', '_wpnonce');
?>
    <div id="authorarchive" class="categorydiv">
        <ul id="authorarchive-tabs" class="authorarchive-tabs add-menu-item-tabs">
            <li <?php echo ('all' == $current_tab ? ' class="tabs"' : ''); ?>>
                <a class="nav-tab-link" data-type="tabs-panel-authorarchive-all" href="<?php if ($nav_menu_selected_id) echo esc_url(add_query_arg('authorarchive-tab', 'all', remove_query_arg($removed_args))); ?>#tabs-panel-authorarchive-all">
                    <?php _e('View All'); ?>
                </a>
            </li><!-- /.tabs -->

            <li <?php echo ('admins' == $current_tab ? ' class="tabs"' : ''); ?>>
                <a class="nav-tab-link" data-type="tabs-panel-authorarchive-admins" href="<?php if ($nav_menu_selected_id) echo esc_url(add_query_arg('authorarchive-tab', 'admins', remove_query_arg($removed_args))); ?>#tabs-panel-authorarchive-admins">
                    <?php _e('Admins'); ?>
                </a>
            </li><!-- /.tabs -->

        </ul>

        <div id="tabs-panel-authorarchive-all" class="tabs-panel tabs-panel-view-all <?php echo ('all' == $current_tab ? 'tabs-panel-active' : 'tabs-panel-inactive'); ?>">
            <ul id="authorarchive-checklist-all" class="categorychecklist form-no-clear">
                <?php
                echo walk_nav_menu_tree(array_map('wp_setup_nav_menu_item', $authors), 0, (object) array('walker' => $walker));
                ?>
            </ul>
        </div><!-- /.tabs-panel -->

        <div id="tabs-panel-authorarchive-admins" class="tabs-panel tabs-panel-view-admins <?php echo ('admins' == $current_tab ? 'tabs-panel-active' : 'tabs-panel-inactive'); ?>">
            <ul id="authorarchive-checklist-admins" class="categorychecklist form-no-clear">
                <?php
                echo walk_nav_menu_tree(array_map('wp_setup_nav_menu_item', $admins), 0, (object) array('walker' => $walker));
                ?>
            </ul>
        </div><!-- /.tabs-panel -->

        <p class="button-controls wp-clearfix">
            <span class="list-controls">
                <a href="<?php echo esc_url(add_query_arg(array('authorarchive-tab' => 'all', 'selectall' => 1,), remove_query_arg($removed_args))); ?>#authorarchive" class="select-all"><?php _e('Select All'); ?></a>
            </span>
            <span class="add-to-menu">
                <input type="submit" <?php wp_nav_menu_disabled_check($nav_menu_selected_id); ?> class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e('Add to Menu'); ?>" name="add-authorarchive-menu-item" id="submit-authorarchive" />
                <span class="spinner"></span>
            </span>
        </p>

    </div><!-- /.categorydiv -->
<?php
}
