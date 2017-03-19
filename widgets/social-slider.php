<?php

class Social_slider_homepage extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'Social_slider_homepage', // Base ID
                'Social slider homepage', // Name
                array('description' => 'Social Slider Homepage')
        );
    }

    public function widget($args, $instance) {
        $title = $instance['title'];
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $google = $instance['google'];
        $email = $instance['email'];
        $tripAdvisor = $instance['tripAdvisor'];
        $class = $instance['class'];
        ?>
        <style type="text/css">
           
        </style>
        <aside class="widget widget_social <?php if( $class ) { echo $class; }  ?>">
            <div class="connect-us home-slider">
                <h3 class="widgettitle"><?php echo $title; ?></h3>
                <ul class="social-list">
                    <?php if( $facebook ) : ?>
                        <li class="facebook"><a href="<?php echo $facebook; ?>">facebook</a></li>
                    <?php endif; ?>
                    <?php if( $twitter ) : ?>
                    <li class="twitter"><a href="<?php echo $twitter; ?>">twitter</a></li>
                    <?php endif; ?>
                    
                    <?php if( $google ) : ?>
                    <li class="google"><a href="<?php echo $google; ?>">google</a></li>
                    <?php endif; ?>

                    <?php if( $email ) : ?>
                    <li class="email"><a href="<?php echo $email; ?>">email</a></li>
                    <?php endif; ?>

                    <?php //if( $tripAdvisor ) : ?>
                    <li class="tripAdvisor-2"><a href="<?php echo $tripAdvisor; ?>">tripAdvisor</a></li>
                    <?php //endif; ?>
                </ul>
            </div>
        </aside>
        <?php
    }


    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['facebook'] = strip_tags($new_instance['facebook']);
        $instance['twitter'] = strip_tags($new_instance['twitter']);
        $instance['google'] = strip_tags($new_instance['google']);
        $instance['email'] = strip_tags($new_instance['email']);
        $instance['tripAdvisor'] = strip_tags($new_instance['tripAdvisor']);
        $instance['class'] = strip_tags($new_instance['class']);

        return $instance;
    }

    public function form($instance) {
        if (empty($instance['title'])) {
            $title = '';
        } else {
            $title = $instance['title'];
        }

        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $google = $instance['google'];
        $email = $instance['email'];
        $tripAdvisor = $instance['tripAdvisor'];
        $class = $instance['class'];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('class'); ?>"><?php _e('Widget Class:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('class'); ?>" name="<?php echo $this->get_field_name('class'); ?>" type="text" value="<?php echo esc_attr($class); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('facebook:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('twitter:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('google:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo esc_attr($google); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('tripAdvisor'); ?>"><?php _e('tripAdvisor:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('tripAdvisor'); ?>" name="<?php echo $this->get_field_name('tripAdvisor'); ?>" type="text" value="<?php echo esc_attr($tripAdvisor); ?>" />
        </p>

        
        <?php
    }

}

add_action('widgets_init', 'create_widget_social_homepage');
function create_widget_social_homepage() {
    register_widget("Social_slider_homepage" );
}