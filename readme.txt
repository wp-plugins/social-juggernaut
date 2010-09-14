=== Social Juggernaut  ===
Contributors: screenwords15
Tags: social, media, icons
Version: 1.0
Requires at least: 2.0.2
Tested up to: 3.01
Stable tag: 1.0

Social Juggernaut was designed to place social media icons on your website.  The CSS is very easy to edit, so you can place them essentially anywhere.

== Description ==

The default setting for styling is 200px from the top and aligned against the right side of the browser window.  To change these settings, please open up 'plugins/social-juggernaut/socialjuggernaut.php', scroll down to function sj_insert_button() and make the necessary CSS edits.  

This plugin wasn't necessarily designed to insert icons into div tags.  Instead, it's designed to place icons in relation to browser edges.  If you are interested in inserting icons into specific div tags you will have to alter the add_action hook (currently set to insert into wp_footer) or edit how you see fit.  If you're stumped, please e-mail me at contact AT juggernautwebsites.com!

Paul Ruescher:<ul> 
<li>Twitter - @Paul_Ruescher</li>
<li>Website - www.juggernautwebsites.com</li>
<li>E-mail - contact AT juggernautwebsites.com</li></ul>

== Installation ==

Install the plugin like any other Wordpress plugin:<ul>
<li>Upload `plugin-name.php` to the `/wp-content/plugins/` directory</li>
<li>Activate the plugin through the 'Plugins' menu in WordPress</li></ul>


It is VERY important that you go into the admin page (Settings->Social Juggernaut) and setup the URLs for the icon you want.  If you don't want it to appear then LEAVE THE FIELD BLANK! You also must make sure you use the ABSOLUTE LINK.  Don't shorten the URL to facebook.com, use http://www.facebook.com.  The best thing to do is just navigate, in another tab, to the social media profile you want to link to, and copy and paste that URL.

*Important things to remember*<ul>
<li>If you don't want to the icon to appear, leave the URL field blank.</li>
<li>Make sure you use the full URL, don't be lazy and shorten it.</li></ul>


== Frequently Asked Questions ==

Q:  THE LINKS AREN'T WORKING!

A: Make sure in the admin page (Settings-> Social Juggernaut) that you have the full URL to your social media profile (i.e. facebook.com/page will not work, you need to make sure that the URL is http://www.facebook.com/page

Q: THE ICONS AREN'T APPEARING!

A-1: The plugin was designed so that the icon will not show up if there is no link set.  Make sure you go into the admin settings page for Social Juggernaut and set the links to each respective social media profile that you want to use.

A-2: Most likely whoever created your theme did not include the common Wordpress template tag 'wp_footer'.  This plugin hooks onto that tag so it is vital.  You can do one of three things: 1) insert it yourself - place the code <?php wp_footer(); ?> right before </body> in your HTML 2) beg your web designer to insert the <?php wp_footer(); ?> code for you 3) e-mail me and I can walk you through the process.

A-3: The link to the images I included in the plugin isn't working properly.  In the file socialjuggernaut.php there is a function, 'function sm_insert_button()' that inserts all the social media buttons.  Check to make sure that each image source (<img src"") link is working properly.  By default it should be "http://www.yoursite.com/wp-content/plugins/social-juggernaut/images/32px/.....png".  If the images are not in this location then they will not display.  If you found the file socialjuggernaut.php then the images folder should be visible.  If not, try re-installing the plugin.  Or contact me.

== Changelog ==

= 1.0 =
Original version!  Enjoy!  Updates will come soon in terms of adding more icons.  If you can't wait for me to get around to doing this then the icons are already uploaded into the plugin files, and if you have any experience with PHP you should be able to figure it out.



