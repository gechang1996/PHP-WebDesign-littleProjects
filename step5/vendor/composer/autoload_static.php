<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit245f3aefa74b5f01930911dd381e9657
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Guessing\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Guessing\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib/Guessing',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit245f3aefa74b5f01930911dd381e9657::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit245f3aefa74b5f01930911dd381e9657::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
