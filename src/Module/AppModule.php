<?php
namespace Polidog\Todo\Module;

use BEAR\Package\AbstractAppModule;
use BEAR\Package\PackageModule;
use josegonzalez\Dotenv\Loader;
use Ray\AuraSqlModule\AuraSqlModule;

class AppModule extends AbstractAppModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure() : void
    {
        $env = dirname(__DIR__) . '/.env';
        if (file_exists($env)) {
            (new Loader($env))->parse()->putenv(true);
        }

        // Database
        $dbConfig = 'sqlite:' . dirname(dirname(__DIR__)). '/var/db/todo.sqlite3';
        $this->install(new AuraSqlModule($dbConfig));
        $this->install(new PackageModule);
    }
}
