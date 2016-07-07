<?php

/*-----------------------------------------------------------------------------------*/
/* Add default options after activation */
/*-----------------------------------------------------------------------------------*/
if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php?page=siteoptions" ) {
	//Call action that sets
	add_action('admin_head','ac_option_setup');
}

function ac_option_setup(){

	//Update EMPTY options
	$tt_array = array();
	add_option('ac_options',$tt_array);

	$template = get_option('tt_template');
	$saved_options = get_option('ac_options');

	foreach($template as $option) {
		if($option['type'] != 'heading'){
			$id = $option['id'];
			$std = $option['std'];
			$db_option = get_option($id);
			if(empty($db_option)){
				if(is_array($option['type'])) {
					foreach($option['type'] as $child){
						$c_id = $child['id'];
						$c_std = $child['std'];
						update_option($c_id,$c_std);
						$tt_array[$c_id] = $c_std;
					}
				} else {
					update_option($id,$std);
					$tt_array[$id] = $std;
				}
			}
			else { //So just store the old values over again.
				$tt_array[$id] = $db_option;
			}
		}
	}
	update_option('ac_options',$tt_array);
}

?>
