<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd2e841509dbb63b9b1835129799c22ae
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\Model\\' => 10,
            'App\\ExtLibs\\' => 12,
            'App\\Core\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Model',
        ),
        'App\\ExtLibs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'App\\Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
    );

    public static $classMap = array (
        'AltoRouter' => __DIR__ . '/..' . '/altorouter/altorouter/AltoRouter.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd2e841509dbb63b9b1835129799c22ae::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd2e841509dbb63b9b1835129799c22ae::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd2e841509dbb63b9b1835129799c22ae::$classMap;

        }, null, ClassLoader::class);
    }
}