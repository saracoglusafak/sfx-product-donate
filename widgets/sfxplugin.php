<?php

add_action('widgets_init', function () {
    register_widget('sfxplugin_widget');
});


class sfxplugin_widget extends WP_Widget
{

    function __construct()
    {

        parent::__construct(
            // widget ID
            'sfxplugin_widget',
            // widget name
            __('SFX PLUGIN', ' sfxplugin'),
            // widget description
            array('description' => __('SFX Plugin', sfxdonate_plugin_id),)
        );
    }

    public function widget($args, $instance)
    {
        // print_r($instance);

        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget'];
        //if title is present
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];
        //output
        echo __('SFX PLUGIN', sfxdonate_plugin_id);
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        if (isset($instance['test']))
            $test = $instance['test'];
        else
            $test = __('Test', sfxdonate_plugin_id);


        if (isset($instance['title']))
            $title = $instance['title'];
        else
            $title = __('Default Title', sfxdonate_plugin_id);
?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('test'); ?>"><?php _e('Test:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('test'); ?>" name="<?php echo $this->get_field_name('test'); ?>" type="text" value="<?php echo esc_attr($test); ?>" />
        </p>
<?php
    }
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['test'] = (!empty($new_instance['test'])) ? strip_tags($new_instance['test']) : '';
        return $instance;
    }
}
