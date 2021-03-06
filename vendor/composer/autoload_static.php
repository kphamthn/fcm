<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit97ea2b1936fb6d70bed4a7d75dfdf008
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPOnCouch\\Exceptions\\' => 22,
            'PHPOnCouch\\Adapter\\' => 19,
            'PHPOnCouch\\' => 11,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPOnCouch\\Exceptions\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-on-couch/php-on-couch/src/Exceptions',
        ),
        'PHPOnCouch\\Adapter\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-on-couch/php-on-couch/src/Adapter',
        ),
        'PHPOnCouch\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-on-couch/php-on-couch/src',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit97ea2b1936fb6d70bed4a7d75dfdf008::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit97ea2b1936fb6d70bed4a7d75dfdf008::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
