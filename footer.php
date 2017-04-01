            <!-- footer starts here -->
            <?php global $dt_allowed_html_tags; ?>
            <footer id="footer">
                <div class="subcribe-form">
                    <div class="container">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Top Sidebar") ) : endif; ?>
                    </div>
                </div>
				<?php if(dt_theme_option('general', 'show-footer')): ?>
                    <div class="footer-widgets-wrapper type2">
                        <div class="container"><?php dt_theme_show_footer_widgetarea(dt_theme_option('general','footer-columns')); ?></div>
                    </div>
                <?php endif; ?>
                
                <?php if(dt_theme_option('general','bottom-content') != '' && dt_theme_option('general', 'show-footer-bottom')): ?>
                    <div class="footer-row2">
                        <div class="container">
                            <?php echo wp_kses(do_shortcode(stripslashes(dt_theme_option('general','bottom-content'))), $dt_allowed_html_tags); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="footer-widgets-wrapper mobile-footer mobile-footer-portrait">
                    <div class="container">
                        <div class="column">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer bottom mobile Sidebar") ) : endif; ?>
                        </div>
                    </div>
                </div>

                <div class="footer-widgets-wrapper mobile-footer mobile-footer-postlandscape">
                    <div class="container">
                        <div class="column">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer bottom mobile Sidebar Landscape") ) : endif; ?>
                        </div>
                    </div>
                </div>
				
                <div class="copyright type2">
                	<div class="container"><?php
						if(dt_theme_option('general','community-status') != ''): ?>
                            <div class="foot-site-status">
                            	<?php echo wp_kses(do_shortcode(stripslashes(dt_theme_option('general','community-status'))), $dt_allowed_html_tags); ?>
                            </div><?php
						endif; ?>
                        <?php if(dt_theme_option('general','show-copyrighttext') == "on"): ?>
                            <div class="copyright-content">
                                <p><?php echo wp_kses(stripslashes(dt_theme_option('general','copyright-text')), $dt_allowed_html_tags); ?></p>
                            </div>
                        <?php endif; ?>    
                    </div>
                </div>
            </footer>

            <!-- modal  -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <?php 
                                $template_uri = get_template_directory_uri();
                                $url = dt_theme_option('general', 'logo-url');
                                $url = !empty( $url ) ? $url : $template_uri."/images/logo.png";
    
                                $retina_url = dt_theme_option('general','retina-logo-url');
                                $retina_url = !empty($retina_url) ? $retina_url : $template_uri."/images/logo@2x.png";
    
                                $width = dt_theme_option('general','retina-logo-width');
                                $width = !empty($width) ? $width."px;" : "234px";
    
                                $height = dt_theme_option('general','retina-logo-height');
                                $height = !empty($height) ? $height."px;" : "88px";
                            ?>
                            <a class="logo-form" href="<?php echo home_url();?>" title="<?php bloginfo('title'); ?>">
                                <img class="normal_logo" src="<?php echo esc_url($url);?>" alt="<?php bloginfo('title'); ?>" title"<?php bloginfo('title'); ?>" />
                                <img class="logo-form retina_logo" src="<?php echo esc_url($retina_url);?>" alt="<?php bloginfo('title'); ?>" title="<?php bloginfo('title'); ?>" style="width:<?php echo esc_attr($width);?>; height:<?php echo esc_attr($height);?>;"/>
                            </a>
                            <?php echo do_shortcode("[woocommerce_my_account]"); ?>
                        </div>
                        <div class="modal-message modal-message-ok" style="display:none">
                            <div class="content-message">
                                <h5>THANK YOU FOR REGISTERING</h5>
                                <p>Please check your email inbox (or spam folder) to confirm your account</p>
                            </div>
                            
                        </div>
                        <div class="modal-message modal-message-erorr" style="display:none">
                            <div class="content-message">
                               
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer ends here -->
            <style type="text/css">
                .tab-content {
                    display: none;
                }
                .tab-1 {
                 display: block;   
                }

                .tabs-menu .current a {
                    color: #2e7da3;
                }
                .modal-message{ background: #1d6e6b; font-weight: bold; color: #195055; text-align: center;}
                .modal-message-ok h5{ padding: 12px 0 11px; font-size: 24px; margin-bottom: 0;line-height: 1 }
                .modal-message-ok p{ padding: 0 0 13px 0;font-size: 12px; line-height: 1 }
                
                @media only screen and (min-width: 768px) {
                    .modal-message .content-message {margin-left: 39%;}
                    .modal-message{ background: #1d6e6b; font-weight: bold; margin: 0 0 0 -44px; color: #195055; text-align: left;}
                }
                .modal-message-erorr{ padding: 20px 0  }
                .woocommerce-error, .woocommerce-info { visibility: hidden; display: none; }
            </style>
		</div>
    </div>
<?php if(dt_theme_option('integration', 'enable-body-code') != '') echo '<script type="text/javascript">'.wp_kses(stripslashes(dt_theme_option('integration', 'body-code')), $dt_allowed_html_tags).'</script>';
wp_footer(); ?>
<?php $verify = $_SESSION["verify_email"];
    if ($verify) { ?>
    <script type="text/javascript">
        jQuery( "#myModal" ).modal('show');
            jQuery( ".modal-message-ok" ).show();
            // sessionStorage.removeItem('PHPSESSID');
            setCookie(name, "PHPSESSID", null , null , null, 1);
             // document.cookie = "PHPSESSID"
    </script>
<?php  } ?>

<script type="text/javascript">
    function setCookie(key, value, expireDays, expireHours, expireMinutes, expireSeconds) {
        var expireDate = new Date();
        if (expireDays) {
            expireDate.setDate(expireDate.getDate() + expireDays);
        }
        if (expireHours) {
            expireDate.setHours(expireDate.getHours() + expireHours);
        }
        if (expireMinutes) {
            expireDate.setMinutes(expireDate.getMinutes() + expireMinutes);
        }
        if (expireSeconds) {
            expireDate.setSeconds(expireDate.getSeconds() + expireSeconds);
        }
        document.cookie = key +"="+ escape(value) +
            ";domain="+ window.location.hostname +
            ";path=/"+
            ";expires="+expireDate.toUTCString();
    }

    var checkRegistterError = jQuery( "ul" ).hasClass( "woocommerce-error" );
    var checkRegistterOk = jQuery( "ul" ).hasClass( "woocommerce-info" );
    console.log(checkRegistterOk);
    if( checkRegistterOk ){
            jQuery( "#myModal" ).modal('show');
            jQuery( ".modal-message-ok" ).show();
            // sessionStorage.removeItem('PHPSESSID');
            setCookie(name, "PHPSESSID", null , null , null, 1);
             // document.cookie = "PHPSESSID"
        }
    if( checkRegistterError ){
            jQuery( "#myModal" ).modal('show');
            jQuery( ".modal-message-erorr" ).show();
            // jQuery( ".modal-message-erorr ul li" ).text();
            var erorr = jQuery( ".woocommerce-error li" ).text();
            jQuery( ".modal-message-erorr .content-message" ).text(erorr);
            // sessionStorage.removeItem('PHPSESSID');
            jQuery( ".modal-message-ok" ).hide();

            setCookie(name, "PHPSESSID", null , null , null, 1);

    }
    // if( checkRegistterError || checkRegistterOk ){}
</script>
</body>
</html>