<?php
namespace App\Doctrine;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver;
class DynamicConnection extends Connection
{
    public function __construct(array $params, Driver $driver, $config, $eventManager)
    {
        parent::__construct($params, $driver, $config, $eventManager);
    }
    public function changeDatabase(string $host,string $port,string $user,string $password,string $dbName)
    {
        $params = $this->getParams();
        if ($this->isConnected())
            $this->close();
        $params['url'] = "mysql://".$user.":".$password."@".$host.":".$port."/".$dbName;
        $params['host'] = $host;
        $params['port'] = $port;
        $params['dbname'] = $dbName;
        $params['user'] = $user;
        $params['password'] = $password;
        parent::__construct(
            $params,
            $this->_driver,
            $this->_config,
            $this->_eventManager
        );
    }
}