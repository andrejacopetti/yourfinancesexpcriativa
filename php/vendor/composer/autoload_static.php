<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc61bfa0e503a8e043a0da95341fd6026
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc61bfa0e503a8e043a0da95341fd6026::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc61bfa0e503a8e043a0da95341fd6026::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc61bfa0e503a8e043a0da95341fd6026::$classMap;

        }, null, ClassLoader::class);
    }
}