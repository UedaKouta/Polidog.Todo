<?php
namespace Polidog\Todo\Module;


use Madapaja\TwigModule\TwigErrorPageModule;
use Madapaja\TwigModule\TwigModule;
use Ray\Di\AbstractModule;

class HtmlModule extends AbstractModule
{
    protected function configure()
    {
        // $this->install(new TwigModule());
        //
        // $appDir = dirname(dirname(__DIR__));
        // $paths = [$appDir . '/var/twig/'];
        // $this->bind()->annotatedWith(TwigPaths::class)->toInstance($paths);

        error_log("[". date('Y-m-d H:i:s') . dirname(__DIR__). " src/Form/HTMLModule.php\n" , 3, "/Applications/MAMP/htdocs/Polidog.Todo/log/debug.log");

        $this->install(new TwigModule);
 $this->install(new TwigErrorPageModule);
    }

}
