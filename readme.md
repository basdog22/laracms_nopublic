## Lara cms - The Laravel Powered CMS

This is a cms built on laravel framework. This is still in development so please don't use it on production servers.

## Installation

Edit app/config/database.php and set desired database and credentials. Your user should have the rights to create database
Edit app/config/app.php and set desired domain
Edit app/config/cms.php and set installation hash and admin_email.


If for example the cms is installed on www.example.com
Just run www.example.com/?hash=[YOUR_HASH_HERE]
Assuming the db credentials are ok and you have the rights to create a db, the cms will create the db, will populate it and create a user based on your email

You can login to the backend at:
www.example.com/backend/dashboard
with:

Username: [YOUR_EMAIL_FROM_CONFIG_CMS_PHP]

Password: [GENERATED FROM YOUR EMAIL AND EMAILED AT YOUR EMAIL]


## Information
The CMS features:

    * Grid layout manager
    * SEO for all your content types without the need to do anything extra
    * Search engine on backend for all registered content types
    * Menus management
    * Addons
    * Themes
    * Users
    * Multilingual Content for all registered content types
    * Auto locking of the admin area for protection from prying eyes
    * Rearrangeable Widgets on dashboard from addons


Soon more info...



