# Accessor

This library provides an access to protected/private, also static, methods/properties of an object/class.

## Installation

```console
composer require piotrpress/accessor
```

## Usage

### Example class

```php
class Example {
    private $privateProperty = 'privateProperty';
    protected $protectedProperty = 'protectedProperty';
    static private $staticPrivateProperty = 'staticPrivateProperty';
    static protected $staticProtectedProperty = 'staticProtectedProperty';
    
    private function privateMethod( $arg1, $arg2 ) { echo $arg1 . $arg2; }
    protected function protectedMethod( $arg1, $arg2 ) { echo $arg1 . $arg2; }
    static private function staticPrivateMethod( $arg1, $arg2 ) { echo $arg1 . $arg2; }
    static protected function staticProtectedMethod( $arg1, $arg2 ) { echo $arg1 . $arg2; }
}
```

### Including library

```php
require __DIR__ . '/vendor/autoload.php';

use PiotrPress\Accessor;
```

### Calling methods

```php
$accessor = new Accessor( new Example() );

$accessor->privateMethod( 'arg1', 'arg2' );
$accessor->protectedMethod( 'arg1', 'arg2' );
```

### Calling static methods

```php
$accessor = new Accessor( 'Example' );

$accessor->staticPrivateMethod( 'arg1', 'arg2' );
$accessor->staticProtectedMethod( 'arg1', 'arg2' );
```

### Getting properties

```php
$accessor = new Accessor( new Example() );

echo $accessor->privateProperty;
echo $accessor->protectedProperty;
```

### Getting static properties

```php
$accessor = new Accessor( 'Example' );

echo $accessor->staticPrivateProperty;
echo $accessor->staticProtectedProperty;
```

### Setting properties

```php
$accessor = new Accessor( new Example() );

$accessor->privateProperty = 'newPrivateProperty';
$accessor->protectedProperty = 'newProtectedProperty';
```

### Setting static properties

```php
$accessor = new Accessor( 'Example' );

$accessor->staticPrivateProperty = 'newStaticPrivateProperty';
$accessor->staticProtectedProperty = 'newStaticProtectedProperty';
```

## License

GPL3.0