<?php

declare(strict_types=1);

namespace Hirnsturm\DeployerTypo3Deployment\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Script\Event;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Class Scripts
 *
 * @author Steve Lenz <kontakt@steve-lenz.de>
 * @copyright Steve Lenz
 * @package Hirnsturm\DeployerTypo3Deployment\Composer
 */
class Script implements ScriptInterface
{

    /**
     * @var Event
     */
    protected static $event;

    /**
     * @var array
     */
    protected static $extra;
    /**
     * @var Composer
     */
    protected static $composer;

    /**
     * @var IOInterface
     */
    protected static $io;

    /**
     * @var Filesystem
     */
    protected static $fs;

    /**
     * @var string
     */
    protected static $rootDir = '';

    /**
     * @var string
     */
    protected static $distDir = '';

    /**
     * @param Event $event
     */
    protected static function init(Event $event)
    {
        /** @var Event event */
        static::$event = $event;
        /** @var Composer composer */
        static::$composer = $event->getComposer();
        /** @var array extra */
        static::$extra = static::$composer->getPackage()->getExtra();
        /** @var IOInterface io */
        static::$io = $event->getIO();
        /** @var Filesystem fs */
        static::$fs = new Filesystem();

        static::$distDir = dirname(dirname(__DIR__)) . '/src/Deployer/dist';
        static::$rootDir = dirname(static::$composer->getConfig()->get('vendor-dir'));
    }

    /**
     * @param Event $event
     */
    public static function postInstall(Event $event)
    {
        static::init($event);
        static::install();
    }

    /**
     * @param Event $event
     */
    public static function postUpdate(Event $event)
    {
        static::init($event);
        static::update();
    }

    /**
     *
     */
    protected static function install()
    {

    }

    /**
     *
     */
    protected static function update()
    {

    }

    /**
     * @param string $target Target filename with path
     * @param string $source Source filename with path
     */
    private static function copyIfNotExists($target, $source)
    {
        if (false === static::$fs->exists($target)) {
            static::$fs->copy(
                $source,
                $target
            );
        }
    }

}
