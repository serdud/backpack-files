# Backpack Files
## Installation

You can install the package via composer:

```bash
composer require serdud/backpack-files
```

Publish all assets with:
```bash
php artisan vendor:publish --provider="Serdud\BackpackFiles\BackpackFilesServiceProvider"
```  
and then run  
```php artisan migrate```

Put into the sidebar_content.blade.php  
```<li class="nav-item"><a class="nav-link" href="{{ backpack_url(config('backpack.files.route')) }}"><i class="nav-icon la la-photo-video"></i> Files</a></li>```


## Credits

- [Sergey Dudin](https://github.com/serdud)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
