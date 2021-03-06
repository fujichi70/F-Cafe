<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf798cbc0c5cb79cbe20560c37fc6c869
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf798cbc0c5cb79cbe20560c37fc6c869::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf798cbc0c5cb79cbe20560c37fc6c869::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf798cbc0c5cb79cbe20560c37fc6c869::$classMap;

        }, null, ClassLoader::class);
    }
}
