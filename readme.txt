=== Plugin Name ===
Contributors: digitalpixies
Donate link: http://digitalpixies.com/
Tags: login, security, authentication
Requires at least: 3.0.0
Tested up to: 3.9.0
Stable tag: 1.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Security Improvements to standard wordpress installs.

== Description ==

Enforce javascript during login as a means to minimize brute-force attackers from gaining your account passwords. More enhancements will be added in months to come.

* Enforce Javascript at login

== Installation ==

1. Upload `dpt-security` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Question ==

= I'm having problems logging in after plugin updates and/or WP upgrade =

A plugin or wordpress upgrade has introduced some incomplete javascript into the login page (which it shouldn't) and has caused this plugin's javascript to subsequently not execute. To gain back access to the website:
1) Delete the dpt-security plugin (that prevents it from loading)
2) Login
3) Disable or uninstall the plugins impacting this module before re-installing dpt-security plugin.

== Changelog ==

= 1.1 =
* Rotation of JS modulation value upon password failure

= 1.0 =
* Initial release

== Upgrade Notice ==

= 1.1 =
Improved verfication process
