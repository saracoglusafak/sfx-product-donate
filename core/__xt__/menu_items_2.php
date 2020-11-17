<?php


class Sfxplugin_Custom_Nav
{
    public function add_nav_menu_meta_boxes()
    {
        add_meta_box(
            'wl_login_nav_link',
            __('Sfxplugin', sfxdonate_plugin_id),
            array($this, 'nav_menu_link'),
            'nav-menus',
            'side',
            'low'
        );
    }

    public function nav_menu_link()
    { ?>
        <div id="posttype-wl-login" class="posttypediv">
            <div id="tabs-panel-wishlist-login" class="tabs-panel tabs-panel-active">
                
                <ul id="wishlist-login-checklist" class="categorychecklist form-no-clear sfxplugin-tabs">
                    <li>
                        <label class="menu-item-title">
                            <input type="checkbox" class="menu-item-checkbox" name="menu-item[-1][menu-item-object-id]" value="-1"> <?= __('Sfxplugin', sfxdonate_plugin_id) ?>
                        </label>
                        <input type="hidden" class="menu-item-type" name="menu-item[-1][menu-item-type]" value="custom">
                        <input type="hidden" class="menu-item-title" name="menu-item[-1][menu-item-title]" value="<?= __('Sfxplugin', sfxdonate_plugin_id) ?>">
                        <!-- 
                        <input type="hidden" class="menu-item-url" name="menu-item[-1][menu-item-url]" value="<?php bloginfo('wpurl'); ?>/wp-login.php">
                         -->
                        <input type="hidden" class="menu-item-url" name="menu-item[-1][menu-item-url]" value="#xt">

                        <input type="hidden" class="menu-item-classes" name="menu-item[-1][menu-item-classes]" value="wl-login-pop">
                    </li>
                </ul>
            </div>
            <p class="button-controls">

                <span class="list-controls hide-if-no-js">
                    <input type="checkbox" id="sfxplugin-tab" class="select-all" />
                    <label for="sfxplugin-tab">Tümünü seç</label>
                </span>


                <span class="add-to-menu">
                    <input type="submit" class="button-secondary submit-add-to-menu right" value="Add to Menu" name="add-post-type-menu-item" id="submit-posttype-wl-login">
                    <span class="spinner"></span>
                </span>
            </p>
        </div>
<?php }
}


$custom_nav = new Sfxplugin_Custom_Nav;
add_action('admin_init', array($custom_nav, 'add_nav_menu_meta_boxes'));
