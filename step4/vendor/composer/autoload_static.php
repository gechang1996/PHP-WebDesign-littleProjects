<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd0af191d210564a0ea2595e98d27895b
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Wumpus\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Wumpus\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib/Wumpus',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd0af191d210564a0ea2595e98d27895b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd0af191d210564a0ea2595e98d27895b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
