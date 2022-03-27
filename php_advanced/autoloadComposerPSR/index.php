<?php

/**
 * Many developers writing object-oriented applications create one PHP source
 * file per class definition. One of the biggest annoyances is having to write
 * a long list of needed includes at the beginning of each script
 * (one for each class).
 * The spl_autoload_register() function registers any number of autoloaders,
 * enabling for classes and interfaces to be automatically loaded if they are
 * currently not defined. By registering autoloaders, PHP is given a last
 * chance to load the class or interface before it fails with an error.
 */

// in other words after we use a class which is not included in the file PHP can call a function
// which will try to find the file for the class on our behalf
// this function is spl_autoload_register:

// in the spl_autoload_register is important to set the correct path to the classes on your project
// we assume that the classes here are set in an app directory

 /**
  spl_autoload_register(function ($class) {

    $pathToClass = __DIR__ . '/' . lcfirst(str_replace('\\', '/',
        $class)) . '.php';

    if (file_exists($pathToClass)) {
        require $pathToClass;
    }
});
  */

// what our custom spl_autoload_register function does:

// we set a namespace

/** use App\PaymentGateway\Paddle\Transaction; */

// we initiate an object of the Transaction class defined in the above namespace

/** $transaction = new Transaction(); */

// what will happen is that PHP will look for the class in the above namespace
// it won't find it there as there is no require for the namespace, so it will go to the spl_autoload_register
// the $class will be set to the namespace - App\PaymentGateway\Paddle\Transaction
// and thus, the $pathToClass will be - '../app/PaymentGateway/Paddle/Transaction.php' after our parsing
// Finally, we require this $pathToClass if the file in this path exists

// we do not need to set a manual autoloading function for our projects
// we can use Composer (dependency manager), which can install packages, autoload classes and etc.
// by default composer is available in SiteGround, but we can download it and use its binary through SSH:
// https://getcomposer.org/download/

// to install package we must navigate to the folder of our project -> composer require vendor/package
// composer will install the package and its dependencies
// we will use uuid package for this example
// composer require ramsey/uuid

// after composer install we have:
// composer.json - conf file
// composer.lock - all of the dependencies, lock your project to the versions set in the file
// vendor - all of the source code
// autoload.php - loads all of the classes for the dependencies

// we are going to require the autoload.php to use the uuid class

require __DIR__ . '/' . 'vendor/autoload.php';

$id = new Ramsey\Uuid\UuidFactory();

echo $id->uuid4(); //generates random id
echo "<br />";

// however, we still need to set our own app directory in the autoload configuration of the composer
// so that the composer can autoload our classes for us
// we go to composer.json and add the following below require:

/**
"require": {
"ramsey/uuid": "^4.2"
},
"autoload": {
"psr-4": {
"App\\": "app/"
}
}
 */

// then we execute composer dump-autoload
// and now the classes in the app directory will be autoloaded

use App\Animal;

$dog = new Animal();

$dog->roar();

// finally we should exclude the vendor folder from GitHub repository

// a brief note for coding standards -
// https://www.php-fig.org/psr/psr-1/ - basic coding standard
// https://www.php-fig.org/psr/psr-12/ - Extended Coding Style
// we do not need to memorise all of it - there are plugins in IDE which can help us adhere to those standards:
// in PHPStorm - Preferences -> Editor -> Code Style -> PHP -> Set Style -> PSR1 / PSR12
// we can set by default and for a project
// there are other code styles you may use - WordPress, Symfony and etc.
// after setting the code style you may format your code per that style via option + command + L for Mac

