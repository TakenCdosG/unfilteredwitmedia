===Mailbag===

Contributors: arrayhq, okaythemes, mindctrl
Donate link: https://array.is
Tags: mailchimp, campaign monitor, email, forms, subscribe, shortcode
License: GPLv2 or later
Requires at least: 3.2.0
Tested up to: 4.1.1
Stable tag: 1.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Mailbag lets you quickly and easily add MailChimp or Campaign Monitor email forms to your posts or pages with a shortcode.

==Description==

**Dead Simple Email Subscriptions**

Mailbag integrates both MailChimp and Campaign Monitor API's to provide you with email subscription forms you can easily drop into your posts or pages. Simply add your API key, choose a list to subscribe users to, and add a shortcode to your page.

Mailbag ships with minimal front-end styles that can be disabled if you'd rather inherit styles from your theme. Customize the form easily with unique CSS selectors.

==Screenshots==

1. MailChimp settings tab. Enter your API keys and select a subscription list.
2. Campaign Monitor settings tab. Enter your API keys and select a subscription list.
3. General settings tab. Enable or disable form styles.
4. Usage tab. Find out where to find your API keys and how to use Mailbag.
5. Add a MailChimp subscription form to your post or page with the [mailbag_mailchimp] shortcode.
6. Add a Campaign Monitor subscription form to your post or page with the [mailbag_campaign_monitor] shortcode.
7. You can disable styling for the forms, if you'd rather inherit styles from your current theme. This is a theme with the Mailbag styles disabled.
8. This is an example of Mailbag in use with Transmit WordPress theme, with styles enabled.

==Changelog==

= v1.4 - Mar 17th, 2015 =
* Fixed form action value for proper validation.

= v1.3 - Mar 12th, 2015 =
* Fixed undefined variable notice.

= v1.2 - Mar 9th, 2015 =
* Added AJAX response for MailChimp email subscriptions.

= v1.1 - Apr 7th, 2014 =
* Updated Settings page styles to match the latest release of WordPress.

= v1.0 - Dec 4nd, 2013 =
* Original Release.

==Installation==

This plugin can be installed directly from your site.

1. Log in and navigate to Plugins -> Add New.
2. Type "Mailbag" into the Search input and click the "Search Widgets" button.
3. Locate Mailbag (by okaythemes) in the list of search results and click "Install Now".
4. Click the "Activate Plugin" link at the bottom of the install screen.
5. Navigate to Settings -> Mailbag Settings to modify the plugin's settings.

It can also be installed manually.

1. Download the Mailbag plugin from WordPress.org.
2. Unzip the package and move to your plugins directory.
3. Log into WordPress and navigate to the "Plugins" screen.
4. Locate Mailbag in the list and click the "Activate" link.
5. Navigate to Settings -> Mailbag Settings to modify the plugin's settings.

== Frequently Asked Questions ==

= How do I use this plugin? =

* After activating Mailbag, visit Settings -> Mailbag Settings to add your API keys for MailChimp or Campaign Monitor. Enter your API keys and click Save Changes.
* Once your API keys are saved, you will be able to choose a list to add subscribers to. Choose a list from the Email Lists drop down and click Save Changes again.
* You can now add email forms to posts or pages by adding a shortcode to your post content. For MailChimp, use the shortcode [mailbag_mailchimp] For Campaign Monitor, use the shortcode [mailbag_campaign_monitor]. See the plugin screenshots for examples of implementation.

= Can I customize the forms? =

Mailbag ships with a clean and simple default style, which you can optionally disable in the Settings tab. Use these CSS classes to customize the email forms to your liking.

.mailbag-wrap { /* Wraps entire form */ }

.mailbag-wrap label { /* Label styles */ }

.mailbag-wrap input[type="text"] { /* Name and email input styles */ }

.mailbag-wrap input[type="submit"] { /* Submit button styles */ }


==Upgrade Notice==

= 1.0 =
Initial release.