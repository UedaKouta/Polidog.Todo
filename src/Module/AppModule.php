<?php
namespace Polidog\Todo\Module;

use BEAR\Package\AbstractAppModule;
use BEAR\Package\PackageModule;
use BEAR\Sunday\Module\Constant\NamedModule;
use josegonzalez\Dotenv\Loader as Dotenv;
use Koriym\Now\NowModule;
use Koriym\QueryLocator\QueryLocatorModule;
use Polidog\Todo\Form\TodoForm;
use Ray\AuraSqlModule\AuraSqlModule;
use Ray\Di\AbstractModule;
use Ray\WebFormModule\AuraInputModule;
use Ray\WebFormModule\FormInterface;

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

        // Form
        $this->install(new AuraInputModule());

        $this->bind(TodoForm::class);
        $this->bind(FormInterface::class)->annotatedWith('todo_form')->to(TodoForm::class);

        $this->install(new PackageModule);
    }
}
