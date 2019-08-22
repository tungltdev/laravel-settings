# Laravel-Settings
Laravel ^5.7.x Persistent Settings (Database + Cache)  

## How to Install
Require this package with composer ([Packagist](https://packagist.org/packages/tungltdev/laravel-settings)) using the following command then run 

	composer require tungltdev/laravel-settings

After updating composer, Register the ServiceProvider to the `providers` array in `config/app.php`

    Tungltdev\LaravelSettings\SettingsServiceProvider::class,
    
Add an alias for the facade to `aliases` array in  your `config/app.php`

    'Settings'  => Tungltdev\LaravelSettings\Facades\Settings::class,

Publish the config and migration files now (Attention: This command will not work if you don't follow previous instruction):

    $ php artisan vendor:publish --provider="Tungltdev\LaravelSettings\SettingsServiceProvider" --force
    
Change `config/settings.php` according to your needs. If you change `db_table`, don't forget to change the table's name
in the migration file as well.
    
Create the `settings` table. 

    $ php artisan migrate
    

## How to Use it?

Set a value

    Settings::set('key', 'value');
    
Get a value

    $value = Settings::get('key');
    
Get a value with Default Value.

    $value = Settings::get('key', 'Default Value');
    
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
