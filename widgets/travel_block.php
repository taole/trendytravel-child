<?php
// we can only use this Widget if the plugin is active
if (class_exists('WidgetImageField'))
    add_action('widgets_init', create_function('', "register_widget( 'Travel_Block' );"));

class Travel_Block extends WP_Widget {

    var $image_field = 'image';  // the image field ID

    function __construct() {
        $widget_ops = array(
            'classname' => 'Travel_Block',
            'description' => __("Travel Block: Image - title - readmore")
        );
        parent::__construct('Travel_Block', __('Travel Block: Image - title - readmore'), $widget_ops);
    }

    public function widget($args, $instance) {
        extract($args);
        //var_dump($instance);
        $title = $instance['title'];
        $featured_text = $instance['featured_text'];
        $readmore_text = $instance['readmore_text'];
        $readmore_link = $instance['readmore_link'];
        $image_id = $instance[$this->image_field];

        $image = new WidgetImageField($this, $image_id);
        $url = $image->get_image_src('full');
        ?>
        <?php if( $url ): ?>
        <div class="column dt-sc-one-fourth  space">
            <img class="aligncenter size-full" src="<?php echo $url ?>">
            <div class="featured-tour-content">
                <div class="text">
                    <?php if ($featured_text) : ?>
                    <h3 class="featured-text"><?php echo $featured_text; ?></h3>
                    <?php endif; ?>
                    <?php if ($title) : ?>
                    <h2 class="featured-title"><?php echo $title; ?></h2>
                    <?php endif; ?>
                    <?php if ($readmore_text && $readmore_link ) : ?>
                    <a class="" href="<?php echo $readmore_link; ?>"><?php echo $readmore_text; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php else: ?>
            <div class="column dt-sc-one-column  space first"><a href="<?php echo $readmore_link; ?>" target="_blank" class="dt-sc-button   medium" style="background-color:#1e73be;border-color:#1e73be;"><?php echo $readmore_text; ?></a></div>
        <?php endif; ?>
        <?php
    }


    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance[$this->image_field] = intval(strip_tags($new_instance[$this->image_field]));
        $instance['title'] = $new_instance['title'];
        $instance['featured_text'] = strip_tags($new_instance['featured_text']);
        $instance['readmore_text'] = strip_tags($new_instance['readmore_text']);
        $instance['readmore_link'] = strip_tags($new_instance['readmore_link']);

        return $instance;
    }

    public function form($instance) {
        if (empty($instance['title'])) {
            $title = '';
        } else {
            $title = esc_html($instance['title']);
        }
        $image_id = esc_attr(isset($instance[$this->image_field]) ? $instance[$this->image_field] : 0 );
        $featured_text = $instance['featured_text'];
        $readmore_text = $instance['readmore_text'];
        $readmore_link = $instance['readmore_link'];

        $image = new WidgetImageField($this, $image_id);
        ?>
        <div>
            <label><?php _e('Image:'); ?></label>
            <?php echo $image->get_widget_field(); ?>
        </div>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Header Text:'); ?></label> 
            <textarea class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>"><?php echo $title; ?></textarea>
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('featured_text'); ?>"><?php _e('Featured Text:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('featured_text'); ?>" name="<?php echo $this->get_field_name('featured_text'); ?>" type="text" value="<?php echo esc_attr($featured_text); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('readmore_text'); ?>"><?php _e('Readmore Text:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('readmore_text'); ?>" name="<?php echo $this->get_field_name('readmore_text'); ?>" type="text" value="<?php echo esc_attr($readmore_text); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('readmore_link'); ?>"><?php _e('Readmore Link:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('readmore_link'); ?>" name="<?php echo $this->get_field_name('readmore_link'); ?>" type="text" value="<?php echo esc_attr($readmore_link); ?>" />
        </p>

        <?php
    }

}