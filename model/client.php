<?php

class Client 
{
  const TABLE_NAME = 'clients';

  protected
    $client_id,
    $city_id,
    $email,
    $nombre,
    $dni,
    $genero,
    $vip,
    $observaciones;

  public static function populateFromArray($data)
  {
    if(!$data)
    {
      return null;
    }
    else
    {
      $obj = new Client();

      if(isset($data['client_id']))
      {
        $obj->setId($data['client_id']);
      }

      if(isset($data['vip']) && $data['vip'])
      {
        $obj->setVip(1);
      }
      else
      {
        $obj->setVip(0);
      }

      $obj->setCityId($data['city_id']);
      $obj->setEmail($data['email']);
      $obj->setNombre($data['nombre']);
      $obj->setDni($data['dni']);
      $obj->setGenero($data['genero']);
      $obj->setObservaciones($data['observaciones']);

      return $obj;
    }
  }

  public static function getClient($email)
  {
     if (!$email)
     {
        return null;
     }
     else
     {
        $sql = "SELECT * FROM ".self::TABLE_NAME." WHERE email='".$email."'";
  
        $result = ConnectionManager::getInstance()->getConnection()->query($sql);
        $first = $result->fetchRow(MDB2_FETCHMODE_ASSOC);
 
        if($first)
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

    if($objects)
    {
      foreach($objects as $num => $obj)
      {
        $list[$num] = self::populateFromArray($obj);
      }

      return $list;
    }
    else
    {
      return 0;
    }
  }

  public function addClient()
  {
    if(self::getClient($this->getEmail()))
    {
      return null;
    }
    else
    {
      $query = 'INSERT INTO '.self::TABLE_NAME.' (city_id, email, nombre, dni, genero, vip, observaciones) VALUES (?, ?, ?, ?, ?, ?, ?)';
      $con = ConnectionManager::getInstance()->getConnection();
      $stmt = $con->prepare($query, array('integer', 'text', 'text', 'text', 'text', 'integer', 'text'), MDB2_PREPARE_MANIP);

      return $stmt->execute(array($this->getCityId(),
                                  $this->getEmail(),
                                  $this->getNombre(),
                                  $this->getDni(),
                                  $this->getGenero(),
                                  $this->getVip(),
                                  $this->getObservaciones(),
                                  ));
    }
  }

  //id
  public function getId()
  {
    return $this->client_id;
  }
  public function setId($x)
  {
    $this->client_id = $x;
  }

  //city_id
  public function getCityId()
  {
    return $this->city_id;
  }
  public function setCityId($x)
  {
    $this->city_id = $x;
  }
  //email
  public function getEmail()
  {
    return $this->email;
  }
  public function setEmail($x)
  {
    $this->email = $x;
  }

  //nombre
  public function getNombre()
  {
    return $this->nombre;
  }
  public function setNombre($x)
  {
    $this->nombre = $x;
  }

  //dni
  public function getDni()
  {
    return $this->dni;
  }
  public function setDni($x)
  {
    $this->dni = $x;
  }

  //genero
  public function getGenero()
  {
    return $this->genero;
  }
  public function setGenero($x)
  {
    $this->genero = $x;
  }

  //vip
  public function getVip()
  {
    return $this->vip;
  }
  public function setVip($x)
  {
    $this->vip = $x;
  }

  //observaciones
  public function getObservaciones()
  {
    return $this->observaciones;
  }
  public function setObservaciones($x)
  {
    $this->observaciones = $x;
  }

}
