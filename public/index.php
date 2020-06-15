<?php
//error_log("[". date('Y-m-d H:i:s') . dirname(__DIR__). "にてゲット\n" , 3, "/var/app/current/log/debug.log");

require dirname(__DIR__) . '/autoload.php';
exit((require dirname(__DIR__) . '/bootstrap.php')(PHP_SAPI === 'cli-server' ? 'html-app' : 'prod-html-app'));
