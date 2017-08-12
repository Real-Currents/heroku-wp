<?php
defined('ABSPATH') or die('No direct access!');
	static function connect($param = null)
	private static function get_wp_roles()
		$show_admin_bar_front = isset($_REQUEST['show_admin_bar_front']) ? (self::strip_data($_REQUEST['show_admin_bar_front']) == 1 ? 'true' : 'false') : 'false' ; 
		$role = isset($_REQUEST['role']) ? strtolower(self::strip_data($_REQUEST['role'])) : '';
		$jabber =isset($_REQUEST['jabber']) ? self::strip_data($_REQUEST['jabber']) : '';
		$aim = isset($_REQUEST['aim']) ? self::strip_data($_REQUEST['aim']) : '';
		$yahoo =isset($_REQUEST['yahoo']) ?  self::strip_data($_REQUEST['yahoo']) : '';
		$wordpress_url = isset($_REQUEST['wordpress_url']) ? self::strip_data($_REQUEST['wordpress_url']) : '';
		$send_password = isset($_REQUEST['send_password']) == 1 ? (self::strip_data($_REQUEST['send_password']) == 1 ? true : false) : false;
		$random_password = isset($_REQUEST['random_password']) ? (self::strip_data($_REQUEST['random_password']) == 1 ? true : false) : false;
		
		if($random_password == false && trim($password) == "")
			$random_password = true;
		
		
		$username_exists = username_exists($username);
		$email_exists = email_exists($email_address);
		if(!empty($username_exists)|| !empty($email_exists))
		{
			$labels_arr = array();
			$message = '';
			if(!empty($username_exists))
				$labels_arr[] = 'username';
			if(!empty($email_exists))
				$labels_arr[] = 'email';
			$labels_string = implode(" and ", $labels_arr);
			$aux = (count($labels_arr)>1 ? "":  "s");
			$message = sprintf("There was an error when trying to create the WordPress user. Sorry, that %s already exist%s!", $labels_string, $aux);
			echo self::message($message, 0);
			exit();
		}
		
		if (empty($username_exists) && empty($email_exists))
		{
			// Generate the password and create the user
			{
			}
			{
				// Email the user
				$headers = 'From: ' . $admin_email . ' <' . $admin_email . '>' . "\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				
				$email_content = 'Hello,<br /><br />';
				$email_content .= '<b>Email Address</b>: ' . $email_address . '<br />';
				
				if($random_password || $send_password)
				wp_mail($email_address, 'Welcome!', $email_content, $headers);
		$data = array();
		if($status == 0 && is_wp_error( $user_id ))
		{
			$message =  $user_id->get_error_message();	
		}
		echo self::message($message, $status, json_encode($data));
	static function get_wp_data()
new CaptainForm_WP_Users();