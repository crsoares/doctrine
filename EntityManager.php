<?php

include_once "../Repository/User.php";
include_once "../Repository/Post.php";
include_once "../Mapper/User.php";

use Repository\User as UserRepository;
use Repository\Post as PostRepository;
use Mapper\User as UserMapper;

class EntityManager
{
    private $host;
    private $db;
    private $user;
    private $pwd;
    private $connection;
    private $userRepository;
    private $postRepository;
    private $identityMap;
    
    public function __construct($host, $db, $user, $pwd)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pwd = $pwd;
        
        $this->connection = new \PDO("mysql:host={$this->host};dbname={$db}", $this->user, $this->pwd);
        
        $this->userRepository = null;
        $this->identityMap = array('users' => array());
    }
    
    public function query($stmt)
    {
        //echo $stmt . "<br />";
        return $this->connection->query($stmt);
    }
    
    public function saveUser($user)
    {
        $userMapper = new UserMapper();
        $data = $userMapper->extract($user);
        
        $userId = call_user_func(
                    array($user, 'get' . ucfirst($userMapper->getIdColumn()))
                );
        //echo $data['id'];die;
        if(array_key_exists($userId, $this->identityMap['users'])) {
            $setString = '';
            foreach($data as $key => $value) {
                    $setString .= $key . "='$value',";
            }
            
            return $this->query(
                        "UPDATE users SET " . substr($setString, 0, -1) .
                        " WHERE " . $userMapper->getIdColumn() . "=" . $userId
                    );
        }else {
            $columnString = implode(", ", array_keys($data));
        
            $valuesString = implode("', '", array_map("mysql_real_escape_string", $data));

            return $this->query(
                        "INSERT INTO users ({$columnString}) VALUES('$valuesString')"
                    );
        }
    }
    
    public function getUserRepository()
    {
        if(!is_null($this->userRepository)) {
            return $this->userRepository;
        }else {
            $this->userRepository = new UserRepository($this);
            return $this->userRepository;
        }
    }
    
    public function getPostRepository()
    {
        if(!is_null($this->postRepository)) {
            return $this->postRepository;
        } else {
            $this->postRepository = new PostRepository($this);
            return $this->postRepository;
        }
    }
    
    public function registerUserEntity($id, $user)
    {
        $this->identityMap['users'][$id] = $user;
        return $user;
    }
}