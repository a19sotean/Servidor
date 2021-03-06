<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit51653a5630659e0a97154c089e65c1a0
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit51653a5630659e0a97154c089e65c1a0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit51653a5630659e0a97154c089e65c1a0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit51653a5630659e0a97154c089e65c1a0::$classMap;

        }, null, ClassLoader::class);
    }
}
