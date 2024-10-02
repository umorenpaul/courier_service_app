<h1>Project Title: Courier Application Web</h1>
<p>This project is a web application that create avenue for individual to track their courier services using the track number. The application consists of frontend for user interaction and the admin panel for posting of waybill items and updating the process of the waybill for owners to track their waybills. This is recommendable for any waybill company that might want to keep track of thier waybill activities for seamless operation.
</p>

<h2>Table of Contents</h2>
<ul>
<li>Requirements</li>
<li>Installation</li>
<li>Configuration</li>
<li>Usage</li>
<li>Directory Structure</li>
<li>Features</li>
<li>Technologies Used</li>
<li>Contributing</li>
<li>License</li>
</ul>
<strong>Requirements</strong>
<ul>
<li> PHP 5.5 or higher</li>
<li>MySQL 5.6 or higher</li>
<li>Apache/Nginx web server</li>
<li>Composer (optional)</li>
</ul>
<strong>Installation</strong>
<ol>
<li>Clone the repository:</li><br>
git clone https://github.com/umorenpaul/courier_service_app.git
<li> Create a new MySQL database for the application</li>
  the database name is courier.sql
<li>Navigate to the Database Directory to import the database</li><br>
  cd admin-panel/db
</ol>
<strong>Configuration</strong>
<p>The courier application does not need any configuration, just clone it, setup the database and the apache server to run the application </p>
<strong>Usage</strong>
<p> The application is a typical web application, once you have uploaded it to your either online or your local system, just enter the address on your browser</p>
<p>
  To access the admin panel, the username is paul@gmail.com, the pssword is 12345
</p>
<strong>Directory Structure</strong>
<pre>  
|   about.php
|   contact.php
|   footer.php
|   icons.php
|   index.php
|   nav.php
|   process.php
|   process_contact.php
|   README.md
|   service.php
|   sign_in.php
|   track_no.php
|   unsuccessful_page.php
|   w3layouts-License.txt
|   work.php
+---admin-panel
|   |   .htaccess
|   |   admin_header.php
|   |   delete.php
|   |   filterDeliverState.php
|   |   filterState.php
|   |   full_sql.php
|   |   gen_track_no.php
|   |   index.php
|   |   insert.php
|   |   join.php
|   |   list_shipments.php
|   |   post_shipment.php
|   |   select.php
|   |   tcal.js
|   |   update.php
|   |   update_shipment_display.php
|   |   update_track_no.php
|   |
|   +---ajax
|   |       ajax.js
|   |       select.php
|   |
|   +---assets
|   |   +---css
|   |   |       main-style.css
|   |   |       style.css
|   |   |
|   |   +---font-awesome
|   |   |   +---css
|   |   |   |       font-awesome.css
|   |   |   |       font-awesome.min.css
|   |   |   |
|   |   |   \---fonts
|   |   |           fontawesome-webfont.svg
|   |   |           fontawesome-webfont.woff
|   |   |           FontAwesome.otf
|   |   |
|   |   +---fonts
|   |   |       glyphicons-halflings-regular.svg
|   |   |       glyphicons-halflings-regular.woff
|   |   |
|   |   +---img
|   |   |       logo.png
|   |   |       user.jpg
|   |   |
|   |   \---plugins
|   |       +---bootstrap
|   |       |       bootstrap.css
|   |       |
|   |       +---dataTables
|   |       |       dataTables.bootstrap.css
|   |       |
|   |       +---morris
|   |       |       morris-0.4.3.min.css
|   |       |
|   |       +---pace
|   |       |       pace-theme-big-counter.css
|   |       |
|   |       +---social-buttons
|   |       |       social-buttons.css
|   |       |
|   |       \---timeline
|   |               timeline.css
|   |
|   +---class
|   |       .htaccess
|   |       mysql_crud.php
|   |
|   +---db
|   |       courier.sql
|   |
|   \---include-admin
|           PostShipmentAction.php
|           UpdateShipmentAction.php
|
+---css
|       bootstrap.min.css
|       colorfulTab.min.css
|       font-awesome.min.css
|       icons.css
|       jQuery.lightninBox.css
|       style.css
|       typo.css
|
+---includes
|       post_message.php
|
+---js
|       .htaccess
|       bgfader.js
|       bootstrap.min.js
|       colorfulTab.min.js
|       contact_me.js
|       index.js
|       jqBootstrapValidation.js
|       jQuery.lightninBox.js
|       jquery.min.js
|       SmoothScroll.min.js
|       top.js
|
+---src
|       FormHandler.php
|       index.php
|       ReCaptchaValidator.php
|
\---vendor
    |   autoload.php
    |
    +---composer
    |       autoload_classmap.php
    |       autoload_namespaces.php
    |       autoload_psr4.php
    |       autoload_real.php
    |       autoload_static.php
    |       ClassLoader.php
    |       installed.json
    |       LICENSE
    |
    +---FormGuide
    |   \---PHPFormValidator
    |       |   .gitignore
    |       |   composer.json
    |       |   LICENSE
    |       |   phpunit.xml
    |       |   README.md
    |       |
    |       +---src
    |       |       FieldValidator.php
    |       |       FieldValidatorCollection.php
    |       |       FormValidator.php
    |       |       ValidatorMap.php
    |       |       Validators.php
    |       |       ValidatorsList.php
    |       |
    |       \---tests
    +---gregwar
    |   \---captcha
    |       |   .gitignore
    |       |   .travis.yml
    |       |   autoload.php
    |       |   CaptchaBuilder.php
    |       |   CaptchaBuilderInterface.php
    |       |   composer.json
    |       |   ImageFileHandler.php
    |       |   LICENSE
    |       |   PhraseBuilder.php
    |       |   PhraseBuilderInterface.php
    |       |   README.md
    |       |
    |       +---demo
    |       |       demo.php
    |       |       fingerprint.php
    |       |       index.php
    |       |       ocr.php
    |       |       output.php
    |       |
    |       \---Font
    |               captcha0.ttf
    |               captcha1.ttf
    |               captcha2.ttf
    |               captcha3.ttf
    |               captcha4.ttf
    |               captcha5.ttf
    |
    \---phpmailer
        \---phpmailer
            |   class.phpmailer.php
            |   class.phpmaileroauth.php
            |   class.phpmaileroauthgoogle.php
            |   class.pop3.php
            |   class.smtp.php
            |   composer.json
            |   composer.lock
            |   get_oauth_token.php
            |   LICENSE
            |   PHPMailerAutoload.php
            |   VERSION
            |
            +---.github
            |       ISSUE_TEMPLATE.md
            |       PULL_REQUEST_TEMPLATE.md
            |
            +---examples
            +---extras
            |       EasyPeasyICS.php
            |       htmlfilter.php
            |       ntlm_sasl_client.php
            |       README.md
            |
            \---language
  </pre>    
<strong>Technologies Used</strong>
<ul>
<li>PHP</li>
<li>MySQL</li>
<li>AJAX</li>
</ul>
