<?php

class Connect_Us_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'Connect_Us_Widget', // Base ID
                'Connect Us Widget', // Name
                array('description' => 'Connect Us: Social')
        );
    }

    public function widget($args, $instance) {
        $title = $instance['title'];
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $linkedin = $instance['linkedin'];
        $google = $instance['google'];

        $pinterest = $instance['pinterest'];
        $skype = $instance['skype'];
        $youtube = $instance['youtube'];
        ?>
        <style type="text/css">
           
        </style>
        <aside class="widget widget_social">
            <div class="connect-us">
                <h3 class="widgettitle"><?php echo $title; ?></h3>
                <ul class="social-list">
                    <?php if( $facebook ) : ?>
                        <li><a href="<?php echo $facebook; ?>">facebook</a></li>
                    <?php endif; ?>
                    <?php if( $twitter ) : ?>
                    <li><a href="<?php echo $twitter; ?>">twitter</a></li>
                    <?php endif; ?>
                    
                    <?php if( $linkedin ) : ?>
                    <li><a href="<?php echo $linkedin; ?>">linkedin</a></li>
                    <?php endif; ?>
                    
                    <?php if( $google ) : ?>
                    <li><a href="<?php echo $google; ?>">google</a></li>
                    <?php endif; ?>
                    
                    <?php if( $pinterest ) : ?>
                    <li><a href="<?php echo $pinterest; ?>">pinterest</a></li>
                    <?php endif; ?>
                    
                    <?php if( $skype ) : ?>
                    <li><a href="<?php echo $skype; ?>">skype</a></li>
                    <?php endif; ?>

                    <?php if( $youtube ) : ?>
                    <li><a href="<?php echo $youtube; ?>">youtube</a></li>
                    <?php endif; ?>
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
        $instance['linkedin'] = strip_tags($new_instance['linkedin']);
        $instance['google'] = strip_tags($new_instance['google']);
        $instance['pinterest'] = strip_tags($new_instance['pinterest']);
        $instance['skype'] = strip_tags($new_instance['skype']);
        $instance['youtube'] = strip_tags($new_instance['youtube']);

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
        $linkedin = $instance['linkedin'];
        $google = $instance['google'];

        $pinterest = $instance['pinterest'];
        $skype = $instance['skype'];
        $youtube = $instance['youtube'];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
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
            <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('linkedin:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('google:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo esc_attr($google); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('pinterest:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('skype'); ?>"><?php _e('skype:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('skype'); ?>" name="<?php echo $this->get_field_name('skype'); ?>" type="text" value="<?php echo esc_attr($skype); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('youtube:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" />
        </p>

        
        <?php
    }

}

add_action('widgets_init', 'create_widget_connectus');
function create_widget_connectus() {
    register_widget("Connect_Us_Widget" );
}