<?php

class DemoWidget extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'demowidget',
            __('demo plugin', 'demo-widget'),
            array( 'description' => __( 'Our widget description', 'demo-widget' )),
        );
    }

    public function form($instance) {
        $title = isset($instance['title']) ? $instance['title'] : __('Demo plugin', 'demo-plugin');
        $latitude = isset($instance['latitude']) ? $instance['latitude'] : 23.4;
        $email = isset($instance['email']) ? $instance['email'] :  __('demo@gmail.com', 'demo-plugin');
        $Profession = isset($instance['profession']) ? $instance['profession'] :  __('Engineer', 'demo-plugin');
    ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')) ?>"><?php _e( 'Title', 'demowidget' ) ?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title')) ?>" name="<?php echo esc_attr($this->get_field_name('title')) ?>" value="<?php echo esc_attr($title) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('latitude')) ?>"><?php _e('latitude', 'demowidget') ?></label>
            <input class="widefat" type="number" id="<?php echo esc_attr($this->get_field_id('latitude')) ?>" name="<?php echo esc_attr($this->get_field_name('latitude')) ?>" value="<?php echo esc_attr($latitude) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')) ?>"><?php _e('Email', 'demowidget') ?></label>
            <input class="widefat" type="email" id="<?php echo esc_attr($this->get_field_id('email')) ?>" name="<?php echo esc_attr($this->get_field_name('email')) ?>" value="<?php echo esc_attr($email) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('profession')) ?>"><?php _e('Profession', 'demowidget') ?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('profession')) ?>" name="<?php echo esc_attr($this->get_field_name('profession')) ?>" value="<?php echo esc_attr($Profession) ?>">
        </p>
        <?php
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (isset($instance['title']) && $instance['title'] != '') {
            echo $args['before_title'];
                echo apply_filters('widget_title', $instance['title']); // for display the title
            echo $args['after_title'];
        ?>
            <div class="demowidget">
                <p>Latitude : <?php echo isset($instance['latitude']) ? $instance['latitude'] : 'Noting Found' ?></p>
                <p>Email : <?php echo isset($instance['email']) ? $instance['email'] : 'Nothing Found' ?></p>
                <p>Profession : <?php echo isset($instance['profession']) ? $instance['profession'] : 'Nothing Found' ?></p>
            </div>
<?php
        }
        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance){
    
        $instance = $new_instance;
        $instance['title']    =  sanitize_text_field($instance['title']);
        $instance['profession']    =  sanitize_text_field($instance['profession']);

        $email = $new_instance['email'];
        if (!is_email($email)) {
            $instance['email'] = $old_instance['email'];
        }
        $latitude = $new_instance['latitude'];
        if (!is_numeric($latitude)) {
            $instance['latitude'] = $old_instance['latitude'];
        }
        return $instance;
    }

}
