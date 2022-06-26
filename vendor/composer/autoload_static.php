<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit83ca6622d589b78eefa68e5d90123c75
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Leofranca47\\AbstractRepositoryEloquent\\' => 39,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Leofranca47\\AbstractRepositoryEloquent\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit83ca6622d589b78eefa68e5d90123c75::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit83ca6622d589b78eefa68e5d90123c75::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit83ca6622d589b78eefa68e5d90123c75::$classMap;

        }, null, ClassLoader::class);
    }
}
