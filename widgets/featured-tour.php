<?php
// we can only use this Widget if the plugin is active
if (class_exists('WidgetImageField'))
    add_action('widgets_init', create_function('', "register_widget( 'Featured_Tour' );"));

class Featured_Tour extends WP_Widget {

    var $image_field = 'image';  // the image field ID

    function __construct() {
        $widget_ops = array(
            'classname' => 'Featured_Tour',
            'description' => __("Featured Tour")
        );
        parent::__construct('image_otm', __('Featured Tour'), $widget_ops);
    }

    function form($instance) {
        $image_id = esc_attr(isset($instance[$this->image_field]) ? $instance[$this->image_field] : 0 );
        $title = esc_attr(isset($instance['title']) ? $instance['title'] : '' );
        $content = esc_attr(isset($instance['content']) ? $instance['content'] : '' );
        $viewtour = esc_attr(isset($instance['viewtour']) ? $instance['viewtour'] : '' );

        $image = new WidgetImageField($this, $image_id);
        ?>
        <div>
            <label><?php _e('Image:'); ?></label>
            <?php echo $image->get_widget_field(); ?>
        </div>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('headline:'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('Content:'); ?>
                <textarea class="widefat" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo $content; ?></textarea>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('viewtour'); ?>"><?php _e('View Tour Link:'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('viewtour'); ?>" name="<?php echo $this->get_field_name('viewtour'); ?>" type="text" value="<?php echo $viewtour; ?>" />
            </label>
        </p>
        <?php
    }

    function widget($args, $instance) {
        extract($args);

        $title = $instance['title'];
		$content = esc_attr(isset($instance['content']) ? $instance['content'] : '' );
        $viewtour = esc_attr(isset($instance['viewtour']) ? $instance['viewtour'] : '' );

        $image = new WidgetImageField($this, $image_id);

//        if (empty($title)) {
//            $title = 'Lorem ipsum doloret sit amet consultiteur';
//        }
        if (empty($image_id)) {
            $url = get_template_directory_uri() . '/images/bg_homebn.png';
        } else {
            $url = $image->get_image_src('full');
        }
        ?>
        <div class="featured-tour">
            <img src="<?php echo $url; ?>">
            <div class="content">
                <div class="body"><?php echo $content; ?></div>
                <a class="btn" href="<?php echo $viewtour; ?>">View Tour</a>
            </div>
        </div>
        
        <?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
        $instance['viewtour'] = $new_instance['viewtour'];
        $instance[$this->image_field] = intval(strip_tags($new_instance[$this->image_field]));

        return $instance;
    }

}
