<?php
namespace Polidog\Todo\Resource\App;


use BEAR\Resource\ResourceObject;
use Ray\AuraSqlModule\AuraSqlInject;

class Todos extends ResourceObject
{
    use AuraSqlInject;

    public function onGet($status = null)
    {

      error_log("[". date('Y-m-d H:i:s') . dirname(__DIR__). " src/Form/Todos.php\n" , 3, "/Applications/MAMP/htdocs/Polidog.Todo/log/debug.log");



        if (!empty($status)) {
            $this->body = $this->pdo->fetchAll("SELECT * FROM todo WHERE status = :status",[
                'status' => $status
            ]);
        } else {
            $this->body = $this->pdo->fetchAll("SELECT * FROM todo");
        }
        return $this;
    }
}
