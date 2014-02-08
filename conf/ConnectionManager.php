<?php

class ConnectionManager
{
  protected static $instance = null;
  protected $connection = null;

  protected function __construct()
  {
    $dsn = array(
      'phptype'  => 'mysql',
      'username' => 'root',
      'password' => 'root',
      'hostspec' => 'localhost',
      'database' => 'examen',
    );

    $this->connection = MDB2::connect($dsn);
  }

  public static function getInstance()
  {
    if (is_null(self::$instance))
    {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function getConnection()
  {
    return $this->connection;
  }
}

