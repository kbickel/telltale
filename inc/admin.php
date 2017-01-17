<?php
/*
* Custom functions
*/

// Add the dashboard widget
function add_telltale_dashboard_widget() {

	wp_add_dashboard_widget(
                 'telltale_dashboard_widget',         // Widget slug.
                 'Telltale - Theme Info',             // Title.
                 'telltale_dashboard_widget' // Display function.
        );	
}
add_action( 'wp_dashboard_setup', 'add_telltale_dashboard_widget' );

// Dashboard widget contents
function telltale_dashboard_widget() { ?>
	<ul>
		<li><a href="http://telltalewp.com/documentation/" target="_blank">Documentation</a> - How to &amp; FAQs</li>
		<li><a href="http://telltalewp.com/request-a-feature/" target="_blank">Request a Feature</a> - If there is a feature that you would like to see incorporated into this theme, please submit a request.</li>
	</ul>
<?php }