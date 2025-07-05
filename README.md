# Botble Age Check Plugin

A simple **18+ Age Verification** plugin for [Botble CMS](https://botble.com/) websites.  
Shows a popup asking users to confirm their age before accessing the site content.  
Redirects users who deny access to a custom "Access Denied" page.

---

## Features

- Popup age verification on first visit  
- Session-based age confirmation  
- Redirect to "Access Denied" page if under 18  
- Customizable messages and button texts via theme options  
- Customizable popup colors and overlay  
- Prevents page scrolling while popup is active  
- Easy to install and integrate with Botble CMS  

---

## Installation

1. Clone or download this repository into your Botble `platform/plugins/age-check` directory.
2. Run `php artisan plugin:activate age-check` to activate the plugin.
3. Configure messages and colors via **Appearance > Theme Options > Age Check**.
4. Test the popup by visiting your site in an incognito window or after clearing session.

---

## Usage

- When a user visits your site for the first time, the age check popup will appear.
- Clicking **Yes** confirms the user is over 18 and allows access.
- Clicking **No** redirects to an access denied page.
- The popup respects session status to avoid repeated prompts.

---

## Configuration Screenshots

### Age Check Popup

![Age Check Popup](https://raw.githubusercontent.com/Mohit-Hasan/age-check-botble/refs/heads/main/assets/screenshoot_popup.png)

### Theme Options Settings

![Theme Options](https://raw.githubusercontent.com/Mohit-Hasan/age-check-botble/refs/heads/main/assets/screenshoot_config.png)

---

## Customization

You can customize the following options in Theme Options:

- Enable or disable age check  
- Popup message text  
- Confirm and deny button texts  
- Popup background and text colors  
- Overlay background color  
- Access denied page title and message  

---

## License

MIT License — feel free to use and modify.

---

## Contribution

Pull requests and issues are welcome!  
Please follow coding standards and test thoroughly before submitting.

---

## Contact

Created by [Mohit-Hasan] - [hello@mohithasan.com]  
GitHub: [https://github.com/Mohit-Hasan/age-check-botble](https://github.com/yourusername/age-check-botble)

---
## Acknowledgments

This README was generated with the assistance of ChatGPT by OpenAI.

