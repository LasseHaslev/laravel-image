# lassehaslev/laravel-image
> Basic image handeling. Upload, Store in databse, get path, etc.

## Install
Run ```composer require lassehaslev/laravel-image```

Create your package and add the following line to ```providers``` in ```config/app.php``` 
```
LasseHaslev\LaravelImage\Providers\ServiceProvider::class,
```

## Usage
#### Run migrations
```bash
php artisan migrate
```

#### Config
```php
<?php
return [
    'owner'=>null, // Set to set a owner object f.eks. 'App\User' 
    'folder'=>'uploads/images', // Folder to upload to
    'routes'=>'/', // Route group name. To prevent setting routes set null
];
```

Its recomended that you overwrite ```images::index``` view.
To do this add the following to ```resources/views/vendor/images/index.blade.php```
```php
@extends( 'backend' )

@section( 'content' )

@include( 'images::elements.Upload' )
@include( 'images::elements.List' )

@endsection
```
You can also do the same for ```images::elements.Upload``` and ```images::elements.List```.

#### Api
```php
// Upload new image
$image = Image::upload( UploadedFile $file );

// Get relative path
echo $image->path;

// Get full path
echo $image->path();

// Get url
echo $image->url();

// Delete
$image->delete();

// Update/Change image content
$image->uploadImage( UploadedFile $file );
```

## Development
``` bash
# Install dependencies
composer install

# Install dependencies for automatic tests
yarn

# Run one time
npm run test

# Automaticly run test on changes
npm run dev
```
