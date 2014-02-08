<?php

class City
{
  const TABLE_NAME = 'cities';

  protected
    $city_id,
    $name;

  public static function populateFromArray($data)
  {
    if(!$data)
    {
      return null;
    }
    else
    {
      $obj = new City();

      $obj->setId($data['city_id']);
      $obj->setName($data['name']);

      return $obj;
    }
  }

  public static function getCity($name)
  {
    if (!$name)
    {
      return null;
    }
    else
    {
      $sql = "SELECT * FROM ".self::TABLE_NAME." WHERE name'".$name."'";

      $result = ConnectionManager::getInstance()->getConnection()->query($sql);

      if($first = $result->fetchRow(MDB2_FETCHMODE_ASSOC))
      {
        return self::populateFromArray($first);
      }
      else
      {
        return null;
      }
    }
  }

  public static function getAll()
  {
    $con = ConnectionManager::getInstance()->getConnection();
    $result = $con->query('SELECT * FROM '.self::TABLE_NAME);
    $objects = $result->fetchAll(MDB2_FETCHMODE_ASSOC);

    foreach($objects as $num => $obj)
    {
      $list[$num] = self::populateFromArray($obj);
    }

    return $list;
  }

  //id
  public function getId()
  {
    return $this->city_id;
  }
  public function setId($x)
  {
    $this->city_id = $x;
  }

  //name
  public function getName()
  {
    return $this->name;
  }
  public function setName($x)
  {
    $this->name = $x;
  }
}
