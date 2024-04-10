<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfeaf7293a863daa12f7ac64c47b028bf
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitfeaf7293a863daa12f7ac64c47b028bf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfeaf7293a863daa12f7ac64c47b028bf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfeaf7293a863daa12f7ac64c47b028bf::$classMap;

        }, null, ClassLoader::class);
    }
}