<?php

declare(strict_types=1);

namespace RongTest;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use RongLib\Config\Config;

/**
 * @internal
 * @coversNothing
 */
class Request extends TestCase
{
    public function getConfig()
    {
        Dotenv::createImmutable(__DIR__ . '/../')->safeLoad();
        return new Config(getenv('APP_KEY'), getenv('APP_SECRET'));
    }
}
