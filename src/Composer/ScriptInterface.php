<?php

declare(strict_types=1);

namespace Hirnsturm\DeployerTypo3Deployment\Composer;

use Composer\Script\Event;

/**
 * Interface ScriptInterface
 *
 * @author Steve Lenz <kontakt@steve-lenz.de>
 * @copyright Steve Lenz
 * @package Hirnsturm\DeployerTypo3Deployment\Composer
 */
interface ScriptInterface
{

    /**
     * @param Event $event
     */
    public static function postInstall(Event $event);

    /**
     * @param Event $event
     */
    public static function postUpdate(Event $event);


}