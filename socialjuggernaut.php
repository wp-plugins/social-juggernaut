<?php
/*
Plugin Name: Social Juggernaut
Plugin URI: http://www.juggernautwebsites.com/social_juggernaut/
Description: Inserts social media icons of your choice with respective links
Version: 1.1.1
Author: Paul Ruescher
Author URI: http://www.juggernautwebsites.com/
License: GPL2

*/

// Hook for adding admin menus
add_action('admin_menu', 'sj_add_pages');

// action function for above hook
function sj_add_pages() {
    // Add a new submenu under Settings:
    add_options_page(__('Social Juggernaut',''), __('Social Juggernaut',''), 'manage_options', 'socialjuggernaut', 'sj_settings_page');
}

// jw_settings_page() displays the page content for the Test settings submenu
function sj_settings_page() { ?>
    <h2>Social Juggernaut</h2>

	<?php 
    //must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }

    // variables for the field and option names 
    $opt_name = 'social_juggernaut';
    $hidden_field_name = 'mt_submit_hidden';
    $data_field_name = array(
    	"facebook" => "facebook",
    	"twitter" => "twitter",
    	"posterous" => "posterous",    	
    	"linkedin" => "linkedin",
    	"rss" => "rss",
    	"youtube" => "youtube", 
    	"google" => "google"  	
    );
	
	add_option($opt_name, $data_field_name);

    // Read in existing option value from database
    $opt_val = get_option( $opt_name );    

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $opt_val["facebook"] = $_POST[ $data_field_name["facebook"] ];
        $opt_val["twitter"] = $_POST[ $data_field_name["twitter"] ];
        $opt_val["posterous"] = $_POST[ $data_field_name["posterous"] ];
        $opt_val["linkedin"] = $_POST[ $data_field_name["linkedin"] ];                
        $opt_val["rss"] = $_POST[ $data_field_name["rss"] ]; 
        $opt_val["youtube"] = $_POST[ $data_field_name["youtube"] ]; 
        $opt_val["google"] = $_POST[ $data_field_name["google"] ];                           
        
        // Save the posted value in the database
        update_option( $opt_name, $opt_val  );
      

        // Put an settings updated message on the screen

?>
<div class="updated"><p><strong><?php _e('settings saved.', 'menu-test' ); ?></strong></p></div>
<?php

    }

    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( 'URL Information', 'menu-test' ) . "</h2>";

    // settings form
    
    ?>

<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<p><?php _e("Facebook:", 'menu-test' ); ?> 
<input type="text" name="<?php echo $data_field_name["facebook"]; ?>" value="<?php echo $opt_val["facebook"]; ?>" size="50">
</p><hr />
<p><?php _e("Twitter:", 'menu-test' ); ?> 
<input type="text" name="<?php echo $data_field_name["twitter"]; ?>" value="<?php echo $opt_val["twitter"]; ?>" size="50">
</p><hr />
<p><?php _e("YouTube:", 'menu-test' ); ?> 
<input type="text" name="<?php echo $data_field_name["youtube"]; ?>" value="<?php echo $opt_val["youtube"]; ?>" size="50">
</p><hr />
<p><?php _e("Google:", 'menu-test' ); ?> 
<input type="text" name="<?php echo $data_field_name["google"]; ?>" value="<?php echo $opt_val["google"]; ?>" size="50">
</p><hr />
<p><?php _e("Posterous:", 'menu-test' ); ?> 
<input type="text" name="<?php echo $data_field_name["posterous"]; ?>" value="<?php echo $opt_val["posterous"]; ?>" size="50">
</p><hr />
<p><?php _e("LinkedIn:", 'menu-test' ); ?> 
<input type="text" name="<?php echo $data_field_name["linkedin"]; ?>" value="<?php echo $opt_val["linkedin"]; ?>" size="50">
</p><hr />
<p><?php _e("RSS:", 'menu-test' ); ?> 
<input type="text" name="<?php echo $data_field_name["rss"]; ?>" value="<?php echo $opt_val["rss"]; ?>" size="50">
</p><hr />


<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>

</form>
</div> 
<?php
}

function  sj_insert_button() {
	$options = get_option('social_juggernaut');
	echo "<style type=\"text/css\"> #socialmedia {
	position:fixed;
	top:200px;
	right:0;
	width:34px;
}
.icon {
	height:32px;
	width:32px;
	margin:2px 0 2px 0;
	
}</style>";
	echo "<div id='socialmedia'>";
	if(!empty($options["facebook"])) {
		echo "<a href='" . $options["facebook"] . "'><img class='icon' src='";?><?php echo bloginfo('url'); ?><?php echo "/wp-content/plugins/social-juggernaut/images/32px/facebook.png'/></a>";
	}
	if(!empty($options["twitter"])) {
		echo "<a href='" . $options["twitter"] . "'><img class='icon' src='";?><?php echo bloginfo('url'); ?><?php echo "/wp-content/plugins/social-juggernaut/images/32px/twitter.png'/></a>";
	}
	if(!empty($options["youtube"])) {
		echo "<a href='" . $options["youtube"] . "'><img class='icon' src='";?><?php echo bloginfo('url'); ?><?php echo "/wp-content/plugins/social-juggernaut/images/32px/youtube.png'/></a>";
	}
	if(!empty($options["google"])) {
		echo "<a href='" . $options["google"] . "'><img class='icon' src='";?><?php echo bloginfo('url'); ?><?php echo "/wp-content/plugins/social-juggernaut/images/32px/google.png'/></a>";
	}			
	if(!empty($options["posterous"])) {
		echo "<a href='" . $options["posterous"] . "'><img class='icon' src='";?><?php echo bloginfo('url'); ?><?php echo "/wp-content/plugins/social-juggernaut/images/32px/posterous.png'/></a>";
	}
	if(!empty($options["linkedin"])) {
		echo "<a href='" . $options["linkedin"] . "'><img class='icon' src='";?><?php echo bloginfo('url'); ?><?php echo "/wp-content/plugins/social-juggernaut/images/32px/linkedin.png'/></a>";
	}	
	if(!empty($options["rss"])) {
		echo "<a href='" . $options["rss"] . "'><img class='icon' src='";?><?php echo bloginfo('url'); ?><?php echo "/wp-content/plugins/social-juggernaut/images/32px/rss.png'/></a>";
	}	
			
}

add_action('wp_footer', 'sj_insert_button');

?>