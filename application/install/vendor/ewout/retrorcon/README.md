[![Latest Stable Version](https://poser.pugx.org/ewout/retrorcon/v/stable)](https://packagist.org/packages/ewout/retrorcon)
[![License](https://poser.pugx.org/ewout/retrorcon/license)](https://packagist.org/packages/ewout/retrorcon)

# retrorcon-php
This PHP library is used to get information such as users online, refreshing users' look and doing housekeeping activity such as e.g. sending room alerts by communicating with emulators adhering to the [RetroRCON](https://github.com/emansom/retrorcon) standard.

The project requires PHP 7.2 or higher and uses composer's autoloader following the PSR-4 standard.

## How to use it
1. [Install](https://grpc.io/docs/quickstart/php.html#install-the-grpc-php-extension) and [configure](https://grpc.io/docs/quickstart/php.html#update-phpini) the PHP gRPC extension
2. [Install](https://grpc.io/docs/quickstart/php.html#1-c-implementation-for-better-performance) and [configure](https://grpc.io/docs/quickstart/php.html#1-c-implementation-for-better-performance) the PHP Protobuf extension
3. [Install](https://getcomposer.org/doc/00-intro.md) and [learn](https://getcomposer.org/doc/01-basic-usage.md) how to use [composer](https://getcomposer.org/)
3. Add [the composer package](https://packagist.org/packages/ewout/retrorcon) to your project by running `composer require ewout/retrorcon`
2. Make sure to include [composer's autoloader](https://getcomposer.org/doc/01-basic-usage.md#autoloading)
3. Look at the snippet below on how to use the library

## Usage
```php
<?php
// Include the Composer autoloader
include 'vendor/autoload.php';

// Shortcut for the FQN
use RetroRCON\RemoteConnection;

// Create new RCON instance
$rcon = new RemoteConnection(
    [
        'host' => '127.0.0.1',
        'port' => 12309
    ]
);

// Get online user count
$onlineCount = $rcon->getOnlineCount();

// Is user 'Ewout' online?
$isOnline = $rcon->isUserOnline("Ewout");

// Supports user ID too
$userId = 1;
$isOnline = $rcon->isUserOnline($userId);

// Refresh user figure if online (only meant to be used when figure/motto changed)
if ($isOnline) {
    $rcon->refreshLook($userId);
}
```