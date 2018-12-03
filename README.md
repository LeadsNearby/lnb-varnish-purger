# lnb-varnish-purger

**Version:** 1.0.2 <br/>
**Tested up to:** 4.9.8

This Wordpress Plugin syncs with WP Rocket to clear the Varnish Cache on HTTPS sites when the Rocket Cache is cleared.  It also clears the Varnish Cache when the WP Rocket Sitemap Preload function is run.

It also includes a copy of varnish-http-purge to cover Varnish clearing when pages or posts are updated.

** Initial Upload.  Only purges the Varnish Cache when all Rocket Cache is cleared. **

## Changelog ##

** Version 1.0.1 <br />
Added varnish-http-purge to clear cache when posts or pages are updated.  