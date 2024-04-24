<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd751713988987e9331980363e24189ce
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Views\\' => 6,
        ),
        'R' => 
        array (
            'Routing\\' => 8,
            'Response\\' => 9,
        ),
        'H' => 
        array (
            'Helpers\\' => 8,
        ),
        'E' => 
        array (
            'Exceptions\\' => 11,
        ),
        'D' => 
        array (
            'Database\\' => 9,
        ),
        'C' => 
        array (
            'Commands\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Views\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Views',
        ),
        'Routing\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Routing',
        ),
        'Response\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Response',
        ),
        'Helpers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Helpers',
        ),
        'Exceptions\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Exceptions',
        ),
        'Database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Database',
        ),
        'Commands\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Commands',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd751713988987e9331980363e24189ce::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd751713988987e9331980363e24189ce::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd751713988987e9331980363e24189ce::$classMap;

        }, null, ClassLoader::class);
    }
}
