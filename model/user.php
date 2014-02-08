<?php

class User
{
  const TABLE_NAME = 'users';

  protected
    $user_id,
    $email,
    $username,
    $password;

  public static function populateFromArray($data)
  {
    if(!$data)
    {
      return null;
    }
    else
    {
      $obj = new User();

      $obj->setId($data['user_id']);
      $obj->setEmail($data['email']);
      $obj->setUsername($data['username']);
      $obj->setPassword($data['password']);

      return $obj;
    }
  }


  public static function validUser($username, $password)
  {
    if (!$username || !$password)
    {
      return null;
    }
    else
    {
      $sql = "SELECT * FROM ".self::TABLE_NAME." WHERE username='".$username."' AND password='".$password."'";
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

  public static function getUser($username)
  {
    if (!$username)
    {
      return null;
    }
    else
    {
      $sql = "SELECT * FROM ".self::TABLE_NAME." WHERE username='".$username."'";

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
    $users = $result->fetchAll(MDB2_FETCHMODE_ASSOC);

    foreach($users as $numero => $user)
    {
      $user_list[$numero] = self::populateFromArray($user);
    }

    return $user_list;
  }

  public function addUser()
  {
    if(self::getUser($this->getUsername()))
    {
      return null;
    }
    else
    {
      $query = 'INSERT INTO '.self::TABLE_NAME.' (email, username, password) VALUES (?, ?, ?)';
      $con = ConnectionManager::getInstance()->getConnection();
      $stmt = $con->prepare($query, array(text, text, text), MDB2_PREPARE_MANIP);

      return $stmt->execute(array($this->getEmail(),
                                  $this->getUsername(),
                                  $this->getPassword(),
                                  ));
    }
  }



  //id
  public function getId()
  {
    return $this->user_id;
  }
  public function setId($x)
  {
    $this->user_id = $x;
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

  //username
  public function getUsername()
  {
    return $this->username;
  }
  public function setUsername($x)
  {
    $this->username = $x;
  }

  //password
  public function getPassword()
  {
    return $this->password;
  }
  public function setPassword($x)
  {
    $this->password = $x;
  }
}
