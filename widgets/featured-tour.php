<?php

class Featured_tour_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'Featured_tour_Widget', // Base ID
                'Featured tour Widget', // Name
                array('description' => 'Featured tour Widget')
        );
    }

    public function widget($args, $instance) {
        extract($args);
        //var_dump($instance);
        $title = $instance['title'];
        $featured_text = $instance['featured_text'];
        $readmore_text = $instance['readmore_text'];
        $readmore_link = $instance['readmore_link'];
        ?>
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
        <?php
    }


    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

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

        $featured_text = $instance['featured_text'];
        $readmore_text = $instance['readmore_text'];
        $readmore_link = $instance['readmore_link'];
        ?>
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

add_action('widgets_init', 'create_widget_featured');
function create_widget_featured() {
    register_widget("Featured_tour_Widget" );
}