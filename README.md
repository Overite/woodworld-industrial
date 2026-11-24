# Woodworld Industrial Services website

PHP 7.4+ site with Bootstrap 5.3 and a Three.js 3D bookcase in the hero.

## Run it locally

    cd woodworld-industrial
    php -S localhost:8000

Needs an internet connection: Bootstrap, Three.js and fonts load from CDNs.

## Before you publish

Edit `includes/config.php`:

1. Set `to_email` to the inbox that should receive contact form messages. The form does not send until this is set.
2. Set `from_email` to an address on your own domain.
3. Check `proprietor`, `hours` and `site_url` (the address the site will live at, with a trailing slash).

## Photos

- About section: add your own photo at `assets/img/workshop.jpg`. Until then a free Unsplash stock photo is shown, with credit.
- Gallery: add `assets/img/gallery-1.jpg`, `gallery-2.jpg` and so on. A "Recent pieces" section appears automatically.

## Upload

Upload the whole folder to your host (for example `public_html/demo/3`). Keep `index.php`, `includes/` and `assets/` together.
