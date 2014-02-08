<?php

class MenuOption
{
  const TABLE_NAME = 'menu_option';

  protected
    $menu_option_id,
    $name,
    $url;

  public static function populateFromArray($data)
  {
    if(!$data)
    {
      return null;
    }
    else
    {
      $obj = new MenuOption();

      $obj->setId($data['menu_option_id']);
      $obj->setName($data['name']);
      $obj->setUrl($data['url']);

      return $obj;
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
    return $this->menu_option_id;
  }
  public function setId($x)
  {
    $this->menu_option_id = $x;
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

  //url
  public function getUrl()
  {
    return $this->url;
  }
  public function setUrl($x)
  {
    $this->url = $x;
  }
}

