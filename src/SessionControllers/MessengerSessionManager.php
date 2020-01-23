<?php

namespace Shapoapps\MultibotDriver\SessionControllers;

use Illuminate\Support\Manager;
use Shapoapps\MultibotDriver\SessionHandlers\NullMessengerSessionHandler;
use Shapoapps\MultibotDriver\SessionHandlers\FileMessengerSessionHandler;
use Shapoapps\MultibotDriver\SessionHandlers\DatabaseMessengerSessionHandler;
use Shapoapps\MultibotDriver\SessionHandlers\CacheBasedMessengerSessionHandler;
use Shapoapps\MultibotDriver\SessionControllers\MessengerStore;



class MessengerSessionManager extends Manager
{

    protected function callCustomCreator($driver)
    {
        return $this->buildSession(parent::callCustomCreator($driver));
    }


    protected function createArrayDriver()
    {
        return $this->buildSession(new NullMessengerSessionHandler);
    }


    protected function createFileDriver()
    {
        return $this->createNativeDriver();
    }


    protected function createNativeDriver()
    {
        $lifetime = $this->app['config']['shapoapps.shapoapps_multibot.lifetime'];

        return $this->buildSession(new FileMessengerSessionHandler(
            $this->app['files'], $this->app['config']['shapoapps.shapoapps_multibot.files'], $lifetime
        ));
    }


    protected function createDatabaseDriver()
    {
        $table = $this->app['config']['shapoapps.shapoapps_multibot.table'];

        $lifetime = $this->app['config']['shapoapps.shapoapps_multibot.lifetime'];

        return $this->buildSession(new DatabaseMessengerSessionHandler(
            $this->getDatabaseConnection(), $table, $lifetime, $this->app
        ));
    }


    protected function getDatabaseConnection()
    {
        $connection = $this->app['config']['shapoapps.shapoapps_multibot.connection'];

        return $this->app['db']->connection($connection);
    }


    protected function createApcDriver()
    {
        return $this->createCacheBased('apc');
    }


    protected function createMemcachedDriver()
    {
        return $this->createCacheBased('memcached');
    }


    protected function createRedisDriver()
    {
        $handler = $this->createCacheHandler('redis');

        $handler->getCache()->getStore()->setConnection(
            $this->app['config']['shapoapps.shapoapps_multibot.connection']
        );

        return $this->buildSession($handler);
    }


    protected function createDynamodbDriver()
    {
        return $this->createCacheBased('dynamodb');
    }


    protected function createCacheBased($driver)
    {
        return $this->buildSession($this->createCacheHandler($driver));
    }


    protected function createCacheHandler($driver)
    {
        $store = $this->app['config']->get('shapoapps.shapoapps_multibot.store') ?: $driver;

        return new CacheBasedMessengerSessionHandler(
            clone $this->app['cache']->store($store),
            $this->app['config']['shapoapps.shapoapps_multibot.lifetime']
        );
    }


    protected function buildSession($handler)
    {
        return $this->app['config']['shapoapps.shapoapps_multibot.encrypt']
                ? $this->buildEncryptedSession($handler)
                : new MessengerStore($handler);
    }


    protected function buildEncryptedSession($handler)
    {
        return new EncryptedMessengerStore($handler, $this->app['encrypter']);
    }


    public function getSessionConfig()
    {
        return $this->app['config']['shapoapps.shapoapps_multibot'];
    }


    public function getDefaultDriver()
    {
        return $this->app['config']['shapoapps.shapoapps_multibot.driver'];
    }


    public function setDefaultDriver($name)
    {
        $this->app['config']['shapoapps.shapoapps_multibot.driver'] = $name;
    }

}

