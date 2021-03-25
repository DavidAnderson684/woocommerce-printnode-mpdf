=== WooCommerce Print Orders mPDF engine for PrintNode ===
Contributors: David Anderson
Requires at least: 4.5
Tested up to: 5.7
License: MIT
Requires PHP: 5.6

== Description ==

This plugin makes "WooCommerce Automatic Order Printing (PrintNode)" (https://www.simbahosting.co.uk/s3/product/woocommerce-printnode-automatic-order-printing/) to use mPDF to produce its PDF output, instead of the default DomPDF (at least version 1.4.0 of that plugin is required). It is thus useful for cases that DomPDF has problems with or does not handle, such as right-to-left (RTL) languages.

N.B. This only affects PDFs that the automatic order printing plugin produces internally. For PDFs that were supplied by a separate plugin, you will want to use their accompanying solution (e.g. https://github.com/wpovernight/woocommerce-pdf-ips-mpdf/releases).

PHP >= 5.6.0 is required (reflecting the versions supported by the mPDF library).

== Installation ==

1. Install and then activate this plugin via uploading it into WordPress's plugin installer (use the "Upload" tab). That is all. Once it is active, it is in use (you should be able to see this mentioned in the "Simple summary" section in the PrintNode settings).

== Changelog ==

= 1.0.5 - 2021/03/25 =

* TWEAK: De-activate composer 2.0 run-time platform check
* TWEAK: Update bundled dependencies to current versions

= 1.0.4 - 2021/01/27 =

* TWEAK: Update bundled dependencies to current versions

= 1.0.3 - 2020/10/30 =

* TWEAK: Include afragen/wp-dependency-installer to advise installing Github updater; exclude incorrectly bundled updater plugin
* TWEAK: Do not exclude FreeSans.ttf from build artifact
* TWEAK: Fix some Github build issues

= 1.0.0 - 2020/10/28 =

* RELEASE: First version

== License ==

Copyright 2020- David Anderson

MIT License:

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
