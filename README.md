# Laravel-Settings
Laravel ^5.7.x Persistent Settings (Database + Cache)  

## How to Install
Require this package with composer ([Packagist](https://packagist.org/packages/tungltdev/laravel-settings)) using the following command then run 

	composer require tungltdev/laravel-settings

Publish the config and migration files now (Attention: This command will not work if you don't follow previous instruction):

    $ php artisan vendor:publish --provider="Tungltdev\LaravelSettings\SettingsServiceProvider"
    
Change `config/settings.php` according to your needs. If you change `db_table`, don't forget to change the table's name
in the migration file as well.
    
Create the `settings` table. 

    $ php artisan migrate
    

## How to Use it?

Set a value

    Settings::set('key', 'value');
    or
    settingset('key', 'value');
    
Get a value

    $value = Settings::get('key');
    or
    $value = settings('key');
    
Get a value with Default Value.

    $value = Settings::get('key', 'Default Value');
    or
    $value = settings('key', 'Default Value');
    
> Note: If key is not found (null) in cache or settings table, it will return default value

Get a value via an helper
    
    $value = settings('key');
    $value = settings('key', 'default value');
    
Forget a value

    Settings::forget('key');

Forget all values

    Settings::flush();
    
## Fallback to Laravel Config

How to activate?

    // Change your config/settings.php
    'fallback'   => true
    
Example

    /* 
     * If the value with key => mail.host is not found in cache or DB of Larave Settings
     * it will return same value as config::get('mail.host');
     */     
    Settings::get('mail.host');

> Note: It will work if default value in laravel setting is not set
