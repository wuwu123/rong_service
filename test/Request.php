<?php

declare(strict_types=1);

namespace test;

use Dotenv\Dotenv;
use Lib\Config\Config;
use PHPUnit\Framework\TestCase;

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
