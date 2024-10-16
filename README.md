# Facebook Pixel Inserter

**Facebook Pixel Inserter** is a custom WordPress plugin that allows administrators to easily add their Facebook Pixel ID via an admin settings page. The plugin then automatically inserts the Facebook Pixel tracking code into the website's header, enabling Facebook analytics and ad tracking.

## Features

- Easy to use admin interface for entering and updating the Facebook Pixel ID.
- Automatically adds the Facebook Pixel script to your site's header.
- No coding required — all actions can be managed from the WordPress admin panel.
  
## Installation

1. Download the plugin as a ZIP file or clone this repository.
2. Log in to your WordPress dashboard.
3. Navigate to `Plugins > Add New` and click **Upload Plugin**.
4. Upload the `facebook-pixel-inserter.zip` file and click **Install Now**.
5. Once installed, click **Activate Plugin**.

## Usage

1. After activation, a new menu item called **FB Pixel Inserter** will appear in your WordPress admin sidebar.
2. Click on **FB Pixel Inserter**.
3. Enter your **Facebook Pixel ID** in the input field and click **Save Changes**.
4. The Facebook Pixel tracking code will now be automatically applied to your website’s header.
5. Use the [Facebook Pixel Helper Chrome Extension](https://chrome.google.com/webstore/detail/facebook-pixel-helper/fdgfkebogiimcoedlicjlajpkdmockpc) to verify that the pixel is working correctly.

## Frequently Asked Questions (FAQ)

### How do I get my Facebook Pixel ID?

1. Go to [Facebook Events Manager](https://www.facebook.com/events_manager2/list).
2. Click on **Pixels** under the **Data Sources** section.
3. Create a Pixel if you don’t have one, or click on an existing Pixel.
4. Your Pixel ID is a 15-digit number, which you can find in the **Pixel Details**.

### Where is the Pixel script injected?

The plugin automatically injects the Facebook Pixel code into the header of your WordPress site, before the closing `</head>` tag.

### Can I remove the Pixel code?

Yes! Simply go to the **FB Pixel Inserter** menu in the admin dashboard and remove the Facebook Pixel ID. The Pixel code will no longer be added to your site.

## Contributing

Feel free to submit any pull requests or open an issue if you find any bugs or have feature requests.

## License

This plugin is open-source and available under the [MIT License](https://opensource.org/licenses/MIT).
