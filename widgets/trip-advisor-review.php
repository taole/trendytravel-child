<?php

class Tripadvisor_Review_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'Tripadvisor_Review_Widget', // Base ID
                'Tripadvisor_Review_Widget Us Widget', // Name
                array('description' => 'Tripadvisor Review Widget')
        );
    }

    public function widget($args, $instance) {
        $title = $instance['title'];
        $tripcode = $instance['tripcode'];
        ?>
        <?php if( $tripcode ) : ?>
            <div class="tripcode"><?php echo $tripcode; ?>"></div>
        <?php else: ?>
            <div class="tripcode">
                <div id="TA_cdswritereviewlg67" class="TA_cdswritereviewlg">
                    <ul id="nPjqexKkQ" class="TA_links oTZh29O">
                        <li id="XJTJ3iVgek" class="TIa5xoHnts">
                            <a target="_blank" href="https://www.tripadvisor.com/"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/medium-logo-12097-2.png" alt="TripAdvisor"/></a>
                        </li>
                    </ul>
                </div>
                <script src="https://www.jscache.com/wejs?wtype=cdswritereviewlg&amp;uniq=67&amp;locationId=10514184&amp;lang=en_US&amp;lang=en_US&amp;display_version=2"></script>
            </div>
        <?php endif; ?>
        <?php
    }


    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['tripcode'] = strip_tags($new_instance['tripcode']);

        return $instance;
    }

    public function form($instance) {
        if (empty($instance['title'])) {
            $title = '';
        } else {
            $title = $instance['title'];
        }

        $tripcode = $instance['tripcode'];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('tripcode'); ?>"><?php _e('Embeded code:'); ?></label> 
            <textarea class="widefat" id="<?php echo $this->get_field_id('tripcode'); ?>" name="<?php echo $this->get_field_name('tripcode'); ?>"><?php echo $tripcode; ?></textarea>
            </label>
        </p>
        
        <?php
    }

}

add_action('widgets_init', 'review_widget');
function review_widget() {
    register_widget("Tripadvisor_Review_Widget" );
}