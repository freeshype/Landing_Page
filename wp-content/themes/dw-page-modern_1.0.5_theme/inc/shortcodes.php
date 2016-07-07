<?php
/*-----------------------------------------------------------------------------------*/
/* Google Maps
/*-----------------------------------------------------------------------------------*/
add_shortcode("googlemaps", "dw_page_google_maps_shortcode");
function dw_page_google_maps_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		"width" => '640',
		"height" => '480',
		"src" => ''
	), $atts));
	return '<div class="map"><iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'"></iframe></div>';
}

/*---------------------------------------------------------------------------*/
/* One Page Shortcode
/*---------------------------------------------------------------------------*/

add_shortcode('onepage', 'dw_page_shortcode_display');
function dw_page_shortcode_display(){
	extract(shortcode_atts(array(
			'type' => 'main',
		), $atts));
?>
<section id="<?php echo $id ?>" class="section <?php echo $classes ?>">
    <div class="container">
        <!-- Section title -->
        <div class="section-title">
            <h1><?php echo $title; ?></h1>
            <?php if( !empty($attr_title) ){ ?>
            <p><?php echo $attr_title;  ?></p>
            <?php } ?>
        </div>

        <div class="section-content row-fluid">
        </div>
    </div>
</section>
<?php
}

/*---------------------------------------------------------------------------*/
/* NEXT SECTION button
/*---------------------------------------------------------------------------*/

if( !function_exists('dw_page_next_section_button') ){
	function dw_page_next_section_button($atts){
		extract(shortcode_atts(array(
				'text'	=> __('next','dw-page')
			), $atts));
		$btn = '<a class="arrow-down img-circle" href="javascript:void(0)">'.$text.'</a>';
		return $btn;
	}
	add_shortcode('onepage_btn_next_section', 'dw_page_next_section_button');
}

/*---------------------------------------------------------------------------*/
/* GO TO SECTION button
/*---------------------------------------------------------------------------*/
if( !function_exists('dw_page_goto_section_button') ){
	function dw_page_goto_section_button($atts){
		extract(shortcode_atts(array(
				'text'	=>	__('View Our Works','dw-page'),
				'sectionID'	=>	'#',
				'class'	=>	'btn-primary btn-large btn-tpl-1'
			), $atts) );
		return '<a class="btn '.$class.'" href="javascript:void(0);" onclick="goToSectionID(\''.$sectionID.'\')">'.$text.'</a>';
	}
	add_shortcode('onepage_btn_goto_section', 'dw_page_goto_section_button');
}

/*---------------------------------------------------------------------------*/
/* Blog shortcode
/*---------------------------------------------------------------------------*/
add_shortcode('onepage_blog', 'dw_page_shortcode_blog');
function dw_page_shortcode_blog($atts){
	extract(shortcode_atts( array(
			'number'	=>	-1,
			'col'		=>	4,
			'row'		=>	2,
			'cat'		=> ''
		), $atts) );
	$size = 'small';

	$blog_cat = '';
	if ($cat != '') {
	 	$blog_cat = '&category_name='.$cat;
	}

	if( is_mobile() || is_kindle() || is_samsung_galaxy_tab() || is_nexus() ){
		$col = 1; $row = 1;
		$size = 'medium';
	}

	$the_query = new WP_Query($blog_cat.'&posts_per_page='.$number );
	$ppp = $col * $row;
	$carouselID = sha1(microtime(true).mt_rand(10000,90000));

	if( $the_query->have_posts() ){
		$blog = '<div class="section-blog '.implode(' ', get_post_class() ).'">';
		$blog .= '<div class="row-fluid">
  			<div id="carousel-'.$carouselID.'" data-interval="5000" class="carousel slide">';

  		//Carousel inner
  		$blog .= '<div class="carousel-inner">';
	    $i = 0;
	    $span = 'span' . (12 / $col);

	    while( $the_query->have_posts() ): $the_query->the_post();

	    	if( $i % $ppp == 0 ){
	    		if( $i != 0 ){
	    			$blog .= '</ul></div>';
	    		}
			    //Carousel item
			    $blog .='<div class="item';

			    if( $i == 0 )
			    	$blog .= ' active';

			    $blog .= '"><ul class="thumbnails">';
	    	}

	    	$class = '';
	    	if( $i % $col == 0 ){
	    		$class .= ' first';
	    	}

	    	$blog_id = get_the_ID();

	    	$categories = get_the_category($blog_id);
	    	$get_categories = '';

	    	if ($categories) {
	    		foreach ($categories as $category) {
	    			$get_categories .= $category->cat_name.' ';
	    		}
    		}

		    $blog .= '<li class="'.$span.$class.' block">
	      		<div class="thumbnail">
		      		<div class="screenshot">
		      			<a href="#modal-'.$carouselID.'" class="show-popup" data-post="'.$blog_id.'" >'.get_the_post_thumbnail().'</a>';
		     	if( is_mobile() || is_tablet_but_ipad() ){
		     	$blog .= '<div class="carousel-nav">
						<a class="carousel-control left" href="#carousel-'.$carouselID.'" data-slide="prev">&lsaquo;</a>
						<a class="carousel-control right" href="#carousel-'.$carouselID.'" data-slide="next">&rsaquo;</a>
				    </div><!-- Carousel nav -->';
		     	}

		    $blog .= '</div>

		        <div class="caption">
		          	<h2 class="section-content-title">
		            	<a href="#modal-'.$carouselID.'" class="show-popup" data-post="'.$blog_id.'">'.get_the_title().'</a>
		            </h2>
		          	<p class="meta">'.$get_categories.'</p>
		        </div>
		      </div>';

		    if( is_mobile() || is_tablet_but_ipad()  ){
		    	$detail = array();

                $date = date('M d,Y', strtotime($post->post_date) );
                $author = get_userdata( $post->post_author );

                if( $author )
                    $detail[] = '<span class="first"><i class="icon-user"></i><strong>Author:</strong> ' . $author->user_login .'</span>';

                if( $date )
                    $detail[] = '<span><i class="icon-calendar"></i><strong>Date:</strong> '.$date .'</span>';

                $details = implode('', $detail);

		    	$projects .= '<div class="project-details hide"><div class="project-inner">
		    				<p class="project-data">'.$details.'</p>
		    				<p class="project-content">'.get_the_content().'</p>
		    				</div></div>';
		    }

		    $blog .= '</li>';
		    $i++;
	    endwhile;
	    if( ($i - 1) % $ppp != 0 || $col == 1){ $blog .= '</ul></div>'; }

	    $blog .= '</div>';//CLose carousel inner
  		// Carousel Nav
  		$blog .= '<div class="carousel-nav">
			<ul>
			</ul>
	    </div><!-- Carousel nav -->';

  		$blog .= '</div></div></div>';
  		return $blog;
	}
}

/*---------------------------------------------------------------------------*/
/* Onepage Shortcode for Client PostType
/*---------------------------------------------------------------------------*/
if( !function_exists('dw_page_shortcode_clients') ){
 function dw_page_shortcode_clients($atts){
  extract(shortcode_atts( array(
    'row' => 1,
    'col'  => 6,
    'display' => 'random'
   ), $atts) );
  $number = $row*$col;
  if( $display == "latest" ){
   $query = '';
  }else{
   $query = '&orderby=rand';
  }
  $the_query = new WP_Query( 'post_type=client&posts_per_page='.$number.$query );
  if($the_query->have_posts()) :
   $span = 'span' . 12 / $col;
  $clients = '<div class="clients"><div class="row-fluid">';
  $clients .= '<ul class="thumbnails">';
  $i = 0;
  while ( $the_query->have_posts() ) : $the_query->the_post();
      $style = '';
   if( $i % $col == 0  ) {
    $style = 'style="margin-left:0"';
   }
   $i++;
   $id = get_the_ID();
   $client_title = get_the_title($id);
   $client_url = get_post_meta($id, '_client_url', true);
   $client_logo = get_post_meta($id, '_client_logo', true);
   $clients .= '<li class="'.$span.' client" '.$style.'>
        <a class="thumbnail" href="'.$client_url.'">
          <img src="'.$client_logo.'" alt="'.$client_title.'">
        </a>
      </li>';
  endwhile;
  $clients .= '</ul></div></div>';

  return $clients;
  endif;
 }
 add_shortcode('onepage_clients', 'dw_page_shortcode_clients');
}

/*-----------------------------------------------------------------------------------*/
/* DW ONEPAGE Testimonials List Shortcode
/*-----------------------------------------------------------------------------------*/
add_shortcode( "onepage_testimonials", "dw_page_list_testimonials_shortcode" );
function dw_page_list_testimonials_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		"row" => '1',
		"col" => '2',
		"display"	=>	"random"
	), $atts));
	$number = $row * $col;
	if( $display == "latest" ){
		$query = '';
	}else{
		$query = '&orderby=rand';
	}
	$the_query = new WP_Query( 'post_type=testimonial&posts_per_page='.$number.$query);

	if($the_query->have_posts()) :

		$testimonials = '<div class="testimonials">';
		$span = 12 / $col;
		$span = 'span'.$span;
		$i = 0;
		while ( $the_query->have_posts() ) : $the_query->the_post();
			$class = '';
			if( $i % $col == 0 ){
	    		$class .= ' first';
	    	}

			$id = get_the_ID();
			$data = get_post_meta($id);
			$avatar 	= !empty($data['_testimonial_avatar'][0]) ? $data['_testimonial_avatar'][0] : '' ;
			$content 	= !empty($data['_testimonial_content'][0]) ? $data['_testimonial_content'][0] : '' ;
			$name 		= !empty($data['_testimonial_name'][0]) ? $data['_testimonial_name'][0] .', ' : '' ;
			$website 	= !empty($data['_testimonial_website'][0]) ? $data['_testimonial_website'][0] : '' ;
			$company 	= !empty($data['_testimonial_company'][0]) ? $data['_testimonial_company'][0] : '' ;
			$job 	= !empty($data['_testimonial_job'][0]) ? $data['_testimonial_job'][0].', ' : '' ;

			$testimonials .= '
		<div class="'.$span.$class.' testimonial thumbnail">
      <a href="'.$website.'">
			 <img class="media-object" src="'.$avatar.'" alt="">
      </a>
			<blockquote>
				  <p>'.$content.'</p>
				  <small>'.$name.$job.' <cite><a href="'.$website.'">'.$company.'</a></cite></small>
			</blockquote>
		</div>';
			$i++;
		endwhile;
		$testimonials .= '</div>';

		return $testimonials;
	endif;

}

/*---------------------------------------------------------------------------*/
/* Project shortcode
/*---------------------------------------------------------------------------*/
add_shortcode('onepage_projects', 'dw_page_shortcode_projects');
function dw_page_shortcode_projects($atts){
	extract(shortcode_atts( array(
			'number'	=>	-1,
			'col'		=>	4,
			'row'		=>	2,
			'cat'		=> ''
		), $atts) );
	$size = 'small';
	echo $pro_cat;

	$pro_cat = '';
	if ($cat != '') {
	 	$pro_cat = '&project-category='.$cat;
	}

	if( is_mobile() || is_kindle() || is_samsung_galaxy_tab() || is_nexus() ){
		$col = 1; $row = 1;
		$size = 'medium';
	}

	$the_query = new WP_Query( 'post_type=project'.$pro_cat.'&posts_per_page='.$number );
	$ppp = $col * $row;
	$carouselID = sha1(microtime(true).mt_rand(10000,90000));
	if( $the_query->have_posts() ){
		$projects = '<div class="portfolio '.implode(' ', get_post_class() ).'">';
		$projects .= '<div class="row-fluid">
  			<div id="carousel-'.$carouselID.'" data-interval="5000" class="carousel slide">';

  		//Carousel inner
  		$projects .= '<div class="carousel-inner">';
	    $i = 0;
	    $span = 'span' . (12 / $col);
	    while( $the_query->have_posts() ): $the_query->the_post();

	    	if( $i % $ppp == 0 ){
	    		if( $i != 0 ){
	    			$projects .= '</ul></div>';
	    		}
			    //Carousel item
			    $projects .='<div class="item';

			    if( $i == 0 )
			    	$projects .= ' active';

			    $projects .= '"><ul class="thumbnails">';
	    	}

	    	$class = '';
	    	if( $i % $col == 0 ){
	    		$class .= ' first';
	    	}

	    	$project_id = get_the_ID();
			$thumbnail = get_post_meta($project_id, '_project_thumbnail_'.$size, true);
			if( !$thumbnail ){
				$thumbnail = get_post_meta($project_id, '_project_thumbnail_small', true);
			}

		    $projects .= '<li class="'.$span.$class.' block">
		      <div class="thumbnail">
		      	<div class="screenshot">
		      		<a href="#modal-'.$carouselID.'" class="show-popup" data-post="'.$project_id.'" ><img src="'.$thumbnail.'" alt="'.get_post_meta($project_id, '_project_skill', true).'"></a>';
		     if( is_mobile() || is_tablet_but_ipad() ){
		     	$projects .= '<div class="carousel-nav">
						<a class="carousel-control left" href="#carousel-'.$carouselID.'" data-slide="prev">&lsaquo;</a>
						<a class="carousel-control right" href="#carousel-'.$carouselID.'" data-slide="next">&rsaquo;</a>
				    </div><!-- Carousel nav -->';
		     }

		    $projects .= '</div>

		        <div class="caption">
		          <h2 class="section-content-title">
		            <a href="#modal-'.$carouselID.'" class="show-popup" data-post="'.$project_id.'">'.get_the_title().'</a>
		          </h2>
		          <p class="meta">'.get_post_meta($project_id, '_project_skill', true).'</p>
		        </div>
		      </div>';

		    if( is_mobile() || is_tablet_but_ipad()  ){
		    	$client = get_post_meta($project_id, '_project_client', true);
                $skill = get_post_meta($project_id, '_project_skill', true);
                $url = get_post_meta($project_id, '_project_url', true);
                $date = get_the_date('M d,Y');

                $detail = array();

                if( $client )
                    $detail[] = '<span class="first"><i class="icon-user"></i><strong>Client:</strong> ' . $client .'</span>';
                if( $date )
                    $detail[] = '<span><i class="icon-calendar"></i><strong>Date:</strong> '.$date .'</span>';
                if( $skill )
                    $detail[] = '<span class="first"><i class="icon-certificate"></i><strong>Skill:</strong> ' . $skill .'</span>';
                if( $url )
                    $detail[] = '<span><i class="icon-share"></i><a href="'.$url.'" target="_blank">Launch Project</a>' .'</span>';

                $details = implode('', $detail);

		    	$projects .= '<div class="project-details hide"><div class="project-inner">
		    				<p class="project-data">'.$details.'</p>
		    				<p class="project-content">'.get_the_content().'</p>
		    				</div></div>';
		    }

		    $projects .= '</li>';
		    $i++;
	    endwhile;
	    if( ($i - 1) % $ppp != 0 || $col == 1){ $projects .= '</ul></div>'; }


	    $projects .= '</div>';//CLose carousel inner
  		// Carousel Nav
  		$projects .= '<div class="carousel-nav">
			<ul>
			</ul>
	    </div><!-- Carousel nav -->';

  		$projects .= '</div></div></div>';
  		return $projects;
	}
}

/*---------------------------------------------------------------------------*/
/* Team Shortcode for OnePage
/*---------------------------------------------------------------------------*/
// Add extra profile information
add_action( 'personal_options_update', 'dw_page_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'dw_page_save_extra_profile_fields' );
function dw_page_save_extra_profile_fields( $user_id ) {
	if ( !current_user_can( 'edit_user', $user_id ) ) return false;
	update_user_meta( $user_id, 'job', $_POST['job'] );
	update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
	update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
	update_user_meta( $user_id, 'google_plus', $_POST['google_plus'] );
	update_user_meta( $user_id, 'youtube', $_POST['youtube'] );
	update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
	update_user_meta( $user_id, 'avatar_link', $_POST['avatar_link'] );
}

add_action( 'show_user_profile', 'dw_page_extra_profile_fields' );
add_action( 'edit_user_profile', 'dw_page_extra_profile_fields' );
function dw_page_extra_profile_fields( $user ) { ?>
<h3>Extra profile information</h3>
<table class="form-table">
	<tr>
		<th><label for="job">Job Title</label></th>
		<td>
			<input type="text" name="job" id="job" value="<?php echo esc_attr( get_the_author_meta( 'job', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description">Please enter your Job title.</span>
		</td>
	</tr>
	<tr>
		<th><label for="facebook">Facebook</label></th>
		<td>
			<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description">Please enter your Facebook username.</span>
		</td>
	</tr>
	<tr>
		<th><label for="twitter">Twitter</label></th>
		<td>
			<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description">Please enter your Twitter username.</span>
		</td>
	</tr>
	<tr>
		<th><label for="google_plus">Google plus</label></th>
		<td>
			<input type="text" name="google_plus" id="google_plus" value="<?php echo esc_attr( get_the_author_meta( 'google_plus', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description">Please enter your Google plus username.</span>
		</td>
	</tr>
	<tr>
		<th><label for="youtube">Youtube</label></th>
		<td>
			<input type="text" name="youtube" id="youtube" value="<?php echo esc_attr( get_the_author_meta( 'youtube', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description">Please enter your Youtube username.</span>
		</td>
	</tr>
	<tr>
		<th><label for="linkedin">Linkedin</label></th>
		<td>
			<input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description">Please enter your Linkedin username.</span>
		</td>
	</tr>
	<tr>
		<th><label for="avatar_link">Avatar link</label></th>
		<td>
			<input type="text" name="avatar_link" id="avatar_link" value="<?php echo esc_attr( get_the_author_meta( 'avatar_link', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description">Please enter your Avatar image link.</span>
		</td>
	</tr>
</table>
<?php }


if( !function_exists('dw_page_team') ){
	function dw_page_team($atts){
	    extract(shortcode_atts(array(
	          'col' => 4,
              'include' => '',
              'exclude' => ''
	        ), $atts));

      if ($include != 0) {
        $include = explode(',', $include);
      } else {
        $include = 0;
      }

      $exclude = explode(',', $exclude);

      if ($col == 1) {
        $classCol = " oneCol";
      }

	    $span = 'span' . (12 / $col);
	    $content = '';
	    $users = get_users( array(
        'include' => $include,
        'exclude' => $exclude
      ));

	    if( !empty($users) ):
	    $team = '<div class="team">';
	    $team .= '<ul class="thumbnails'.$classCol.'" >';

	    $i = 0;
	    foreach ($users as $user) {
	    	$class = '';
	    	if( $i % $col == 0 ){
	    		$class .= 'first ';
	    	}

        $user_facebook = get_user_meta($user->ID, 'facebook', true);

        $user_twitter = get_user_meta($user->ID, 'twitter', true);

        $user_googe_plus = get_user_meta($user->ID, 'google_plus', true);

        $user_youtube = get_user_meta($user->ID, 'youtube', true);

        $user_linkedin = get_user_meta($user->ID, 'linkedin', true);

        if ($user->user_url != '') {
          $userUrl = $user->user_url;
        } else {
          $userUrl = '#';
        }


        $team .= '<li class="'.$span.' personal '.$class.'">
        <div class="thumbnail">';
        $avatar = get_the_author_meta('avatar_link', $user->ID);
        $avatar = !empty($avatar) ? $avatar : DW_PAGE_URI.'inc/assets/img/team-1.jpg';
        $team .= '<a href="'.$userUrl.'"><img src="'.$avatar.'" alt=""></a>';
        $team .='<div class="caption">
                <h3 class="section-content-title"><a href="'.$userUrl.'">'.$user->display_name.'</a></h3>

                <p class="meta">'.get_the_author_meta('job', $user->ID).'</p>

                <p>'.get_user_meta($user->ID, 'description', true).'</p>

                <ul class="list-inline social-inline">';
        if( $user_facebook ){
            $team .= '<li class="social facebook"><a href="'.$user_facebook.'">
            	<i class="fa fa-facebook"></i></a></li>';
        }

        if( $user_twitter ){
            $team .= '<li class="social twitter"><a href="'.$user_twitter.'"><i class="fa fa-twitter"></i></a></li>';
        }

        if( $user_googe_plus ){
            $team .= '<li class="social google_plus"><a href="'.$user_googe_plus.'/"><i class="fa fa-google-plus"></i></a></li>';
        }

        if( $user_youtube ){
            $team .= '<li class="social youtube"><a href="'.$user_youtube.'/"><i class="fa fa-youtube"></i></a></li>';
        }

        if( $user_linkedin ){
            $team .= '<li class="social linkedin"><a href="'.$user_linkedin.'/"><i class="fa fa-linkedin"></i></a></li>';
        }


        $team .= '</ul>
              </div>
            </div>
        </li>';

        $i++;
	    }

	    //Hiring
	    if( get_option('dw_page-hire-enable') == 'enable' ){
	    	$class = '';
	    	if( $i % $col == 0 ){
	    		$class .= 'first ';
	    	}

        $team .= '<li class="'.$span.' personal hiring '.$class.'">
            <div class="thumbnail">
              <a href="javascript:void(0);" onclick="goToSectionID(\'#'.get_option('dw_page-hire-contact').'\')"><img src="'.get_stylesheet_directory_uri().'/img/hiring.png" alt=""></a>
              <div class="caption">
                <h3 class="section-content-title">
                    <a href="javascript:void(0);" onclick="goToSectionID(\'#'.get_option('dw_page-hire-contact').'\')">'.get_option('dw_page-hire-title',__('We are hiring','dw-page') ).'</a>
                </h3>
                <p class="meta">'.get_option('dw_page-hire-job', __('Team member','dw-page') ).'</p>

                <p>'.get_option('dw_page-hire-desc', '').'</p>
              </div>
            </div>
          </li>';
        $i++;
	    }

	    $team .= '</ul></div>';
	    return $team;
	    endif;
	}
	add_shortcode('onepage_ourteam', 'dw_page_team');
}

/*---------------------------------------------------------------------------*/
/* TinyMCE custom for shortcode
/*---------------------------------------------------------------------------*/
function dw_page_addbuttons() {
	global $pagenow;
	global $wp_query;

   // Don't bother doing this stuff if the current user lacks permissions
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
     return;

	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "dw_page_editor_add_tinymce_plugin");
		add_filter('mce_buttons', 'dw_page_editor_register_button');
	}
}

function dw_page_editor_register_button($buttons) {
   array_push($buttons, 'dw_page_projects', 'dw_page_testimonial','dw_page_client', 'dw_page_team', 'dw_page_blog' );
   return $buttons;
}

// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
function dw_page_editor_add_tinymce_plugin($plugin_array) {
   $plugin_array['dw_page_shortcode'] = DW_PAGE_URI .'inc/assets/admin/js/dw-page-shortcode.js';
   return $plugin_array;
}

// init process for button control
add_action('init', 'dw_page_addbuttons');


/*---------------------------------------------------------------------------*/
/* Add buttons to the html editer
/*---------------------------------------------------------------------------*/
function appthemes_add_quicktags() {
    if (wp_script_is('quicktags')){
?>
    <script type="text/javascript">
    // introduction block
    var introducing_block = '';
    introducing_block += '\n<div class="span4 block">';
        introducing_block += '\n\t<div class="section-img">\n\t\t<img src="'+dw_page_script.page_uri+'/img/development.png" alt="">\n\t</div>';
        introducing_block += '\n\t<h2 class="section-content-title">Introducing block title</h2>';
        introducing_block += '\n\t<div class="content">\n\tBuspendisse in lorem ipsum ut magna pharera aliquet non sodales lorem ipsum belit. Donec sed odio rera magna pharera aliquet. Nulla uitae elit libero, a pharetra augue.\n\t</div>';
    introducing_block += '\n</div>\n';

    QTags.addButton( 'introducing_block', 'ib', introducing_block, '', 'ib', 'Introducing block', 1 );

    // Helo unit
    var helo_uinit = '';
    helo_uinit += '\n<div class="header">';
		helo_uinit += '\n\t<div class="hero-unit">';
			helo_uinit += '\n\t\t<h1>Simplicity Isn\'t Simple.</h1>';
			helo_uinit += '\n\t\t<p>Design is a word that\'s come to mean so much that it\'s also word that has come to mean nothing.</p>';
			helo_uinit += '\n\t\t<p><a class="btn btn-primary btn-large btn-tpl-1" href="http://www.designwall.com/">View Our Works</a></p>';
			helo_uinit += '\n\t\t<p><a class="arrow-down img-circle" href="#">arrow down</a></p>';
		helo_uinit += '\n\t</div>';
	helo_uinit += '\n</div>';

	QTags.addButton( 'helo_uinit', 'hu', helo_uinit, '', 'hu', 'Hero unit', 1 );
    </script>
<?php
    }
}
add_action( 'admin_print_footer_scripts', 'appthemes_add_quicktags' );
