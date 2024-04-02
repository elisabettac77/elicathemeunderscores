[![Build Status](https://travis-ci.org/Automattic/_s.svg?branch=master)](https://travis-ci.org/Automattic/_s)

requires https://github.com/elisabettac77/elicautilities plugin

Simplified the codebase to make use of less templates and removed post formats that are now redundant, added correct code for portfolio and services shortcodes, leveraged theme columns variable in archive.php and added in archive.php a check to use the correct card template in the grid based on post-type (so that only ONE archive.php is needed and not three). Maintained portfolio.php and services.php to work as single.php so that a portfolio item or service can be accessed from its single page.

meanwhile reworked the plugin list from this:

- ClassicSEO (rankmath fork per la SEO)
- Code Snippet DM (code syntax highlighter per condividere snippet di codice nei post del blog)
- CookieYES (GDPR compliance)
- DataBase for WPForms (per immagazzinare i messaggi ricevuti tramite WPForms Lite)
- Hive Support (supporto clienti via ticket)
- Newsletter, SMTP, Email marketing and Subscribe forms by Brevo (e-mail marketing & SMPT)
- Popup Anything - A Marketing Popup (plugin per popup)
- PDF Builder for WPForms (per allegare documenti pdf compilati coi dati del form alle conferme di WPForms)
- Shield Security (plugin di sicurezza)
- Switch to CkassicPress (plugin per la migrazione tra WP e CP e viceversa e il rollback di versione per ClassicPress)
- UpdraftsPlus (backup e ripristino di file e database)
- WP-Optmize (otttimizzazione)
- WP Code Lite (inserimento di snippet di codice in header e footer)
- WPForms Lite (Form di contatto, paid forms)
- WP Statistics (statistiche)

to this:

- CookieYES (GDPR compliance)
- WPForms Lite (Form di contatto, paid forms)
- DataBase for WPForms (per immagazzinare i messaggi ricevuti tramite WPForms Lite)
- PDF Builder for WPForms (per allegare documenti pdf compilati coi dati del form alle conferme di WPForms)
- Shield Security (plugin di sicurezza)
- UpdraftsPlus (backup e ripristino di file e database)
- WP-Optmize (otttimizzazione)

**I need to write custom code for a customer area providing the user a way to post/read/answer support tickets, and upload/download files - bonus points accessing their purchase and payment history that is stored in WPForms**

- CPT for tickets and CPT for ticket responses (the ticket responses should be a modified version of the comments CPT) - tickets are only viewable/replyable by site owner and user who posted them
- file management (the users should have permission to access media library, a custom folder or have a remote storage accessible from the dashboard like Google Drive) files uploaded and for download should be listed in the profile page
**- Payment history retrieved from WPForms data?**
**- PDF invoices retrieved from WPForms data?**

Tickets CPT needs both TAGS and CATEGORIES for queues and categorization of topics and a custom taxonomy called PRIORITY that only allows 3 terms (high, medium, low) so that tickets can be correctly prioritized by the AGENT that is a custom user role that has access to ALL TICKETS to manage and reply to them. AGENT user role should not be the same of SITE ADMIN for security measures.
agent should see in his profile all the ticket queues. it should have complete access to view user profiles (see all the files exchanged for example or the purchase history for commercial queries)
user should see in his profile the post a ticket window, a list of files for download, uploaded files, and his own tickets.

# about STYLES

To define theme styles I will need to create a figma file with all the elements that need styling so that I can then translate that into the SCSS targeting the correct classes.
this should come after writing the customer area and ticketing system because that also needs styling.

_s
===

Hi. I'm a starter theme called `_s`, or `underscores`, if you like. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme. Here are some of the other more interesting things you'll find here:

* A modern workflow with a pre-made command-line interface to turn your project into a more pleasant experience.
* A just right amount of lean, well-commented, modern, HTML5 templates.
* A custom header implementation in `inc/custom-header.php`. Just add the code snippet found in the comments of `inc/custom-header.php` to your `header.php` template.
* Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
* Some small tweaks in `inc/template-functions.php` that can improve your theming experience.
* A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
* 2 sample layouts in `sass/layouts/` made using CSS Grid for a sidebar on either side of your content. Just uncomment the layout of your choice in `sass/style.scss`.
Note: `.no-sidebar` styles are automatically loaded.
* Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.
* Full support for `WooCommerce plugin` integration with hooks in `inc/woocommerce.php`, styling override woocommerce.css with product gallery features (zoom, swipe, lightbox) enabled.
* Licensed under GPLv2 or later. :) Use it to make something cool.

Installation
---------------

### Requirements

`_s` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)

### Quick Start

Clone or download this repository, change its name to something else (like, say, `megatherium-is-awesome`), and then you'll need to do a six-step find and replace on the name in all the templates.

1. Search for `'_s'` (inside single quotations) to capture the text domain and replace with: `'megatherium-is-awesome'`.
2. Search for `_s_` to capture all the functions names and replace with: `megatherium_is_awesome_`.
3. Search for `Text Domain: _s` in `style.css` and replace with: `Text Domain: megatherium-is-awesome`.
4. Search for <code>&nbsp;_s</code> (with a space before it) to capture DocBlocks and replace with: <code>&nbsp;Megatherium_is_Awesome</code>.
5. Search for `_s-` to capture prefixed handles and replace with: `megatherium-is-awesome-`.
6. Search for `_S_` (in uppercase) to capture constants and replace with: `MEGATHERIUM_IS_AWESOME_`.

Then, update the stylesheet header in `style.css`, the links in `footer.php` with your own information and rename `_s.pot` from `languages` folder to use the theme's slug. Next, update or delete this readme.

### Setup

To start using all the tools that come with `_s`  you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

### Available CLI commands

`_s` comes packed with CLI commands tailored for WordPress theme development :

- `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `composer lint:php` : checks all PHP files for syntax errors.
- `composer make-pot` : generates a .pot file in the `languages/` directory.
- `npm run compile:css` : compiles SASS files to css.
- `npm run compile:rtl` : generates an RTL stylesheet.
- `npm run watch` : watches all SASS files and recompiles them to css when they change.
- `npm run lint:scss` : checks all SASS files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
- `npm run lint:js` : checks all JavaScript files against [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
