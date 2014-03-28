<?php
/*
Plugin Name: Wordpress Security by DigitialPixies
Plugin URI: http://wordpress.digitalpixies.com/dpt-security
Description: Security Improvements to standard wordpress installs
Version: 1.0.0
Author: Robert Huie
Author URI: http://DigitalPixies.com
License: GPLv2
*/

if(!class_exists("dpt_security_php")) {
	class dpt_security_php {
		public static $data = null;
		public static function RegisterHooks() {
            wp_enqueue_script('jquery');
			add_action('login_head', 'dpt_security_php::ReformatFormJS');
			add_filter('wp_authenticate_user', 'dpt_security_php::AuthenticateUser');
		}
		public static function Initialize() {
			session_start();
			if(!isset($_SESSION[__CLASS__]))
				$_SESSION[__CLASS__]=array(
					"modulator_name"=>md5(uniqid())
					, "modulation_value"=>uniqid());
			dpt_security_php::$data=&$_SESSION[__CLASS__];
		}
		public static function ReformatFormJS() {
			dpt_security_php::Initialize();
			$data = &dpt_security_php::$data;
			print <<<EOF
<script type="text/javascript">
	(function($) {
		$(document).ready(function() {
			$("#loginform").append('<input type="hidden" name="{$data["modulator_name"]}" value="{$data["modulation_value"]}" />');
		});
	})(jQuery);
</script>
EOF;
		}
		public static function AuthenticateUser($username, $password) {
			dpt_security_php::Initialize();
			if($_REQUEST[dpt_security_php::$data["modulator_name"]]==dpt_security_php::$data["modulation_value"])
				return $username;
			$error = new WP_Error();
			$error->add('no_javascript', "Javascript needs to be enabled.");
			return $error;
		}
	}
}

dpt_security_php::RegisterHooks();

