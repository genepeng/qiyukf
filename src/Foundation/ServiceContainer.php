<?php

/**
 * ServiceContainer.php
 *
 * @link      http://pimple.sensiolabs.org/
 */
namespace genepeng\qiyukf\Foundation;

use Doctrine\Common\Cache\FilesystemCache;
use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use genepeng\qiyukf\Api\File;
use genepeng\qiyukf\Api\Message;
use genepeng\qiyukf\Api\Staff;
use genepeng\qiyukf\Api\User;
use genepeng\qiyukf\Support\Collection;
use genepeng\qiyukf\Support\Log;
use Pimple\Container;
use GuzzleHttp\Client as HttpClient;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ServiceContainer.
 * @property \genepeng\qiyukf\api\Message                   $message
 */
class ServiceContainer extends Container
{
    /**
     * Application constructor.
     *
     * @param array $config
     */
    public function __construct($config)
    {
        parent::__construct();

        $this['config'] = function () use ($config) {
            return new Collection($config);
        };

        if ($this['config']['debug']) {
            error_reporting(E_ALL);
        }

        $this->registerService();
        $this->initializeLogger();
    }

    /**
     * Magic get access.
     *
     * @param string $id
     *
     * @return mixed
     */
    public function __get($id)
    {
        return $this->offsetGet($id);
    }

    /**
     * Magic set access.
     *
     * @param string $id
     * @param mixed  $value
     */
    public function __set($id, $value)
    {
        $this->offsetSet($id, $value);
    }

    /**
     * Register basic providers.
     */
    private function registerService()
    {
        $this['request'] = function () {
            return Request::createFromGlobals();
        };

        $this['cache'] = function () {
            return new FilesystemCache(sys_get_temp_dir());
        };

        $timeout = $this['config']->get('http_timeout', 5.0);
        $this['http_client'] = function () use ($timeout) {
            return new HttpClient(['timeout'  => $timeout]);
        };

        $this['message'] = function () {
            return new Message(
                $this['config']->app_key,
                $this['config']->app_secret,
                $this['http_client']
            );
        };

        $this['staff'] = function () {
            return new Staff(
                $this['config']->app_key,
                $this['config']->app_secret,
                $this['http_client']
            );
        };

        $this['user'] = function () {
            return new User(
                $this['config']->app_key,
                $this['config']->app_secret,
                $this['http_client']
            );
        };

        $this['file'] = function () {
            return new File(
                $this['config']->app_key,
                $this['config']->app_secret,
                $this['http_client']
            );
        };

        $this['daemon'] = function () {
            return new Daemon(
                $this['config']->app_key,
                $this['config']->app_secret,
                $this['request']
            );
        };
    }

    /**
     * Initialize logger.
     */
    private function initializeLogger()
    {
        if (Log::hasLogger()) {
            return;
        }

        $logger = new Logger('qiyukf');

        if (!$this['config']['debug'] || defined('PHPUNIT_RUNNING')) {
            $logger->pushHandler(new NullHandler());
        } elseif ($logFile = $this['config']->log_file) {
            $logger->pushHandler(new StreamHandler($logFile, $this['config']->get('log_level', Logger::ERROR)));
        }

        Log::setLogger($logger);
    }
}
