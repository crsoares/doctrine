<?php

namespace Mapper;

class User
{
    private $mapping = array(
        'id' => 'id',
        'firstName' => 'first_name',
        'lastName' => 'last_name',
        'gender' => 'gender',
        'namePrefix' => 'name_prefix'
    );
    
    public function getIdColumn() 
    {
        return 'id';
    }
    
    public function extract($user)
    {
        $data = array();
        
        foreach($this->mapping as $keyObject => $keyColumn) {
            //if($keyColumn != 'id') {
                /*
                 * funcao php call_user_func chama uma funcao do 
                 * usuario dada pelo primeiro parametro
                 */
                $data[$keyColumn] = call_user_func(
                            array($user, 'get' . ucfirst($keyObject))
                        );
            //}
        }
        return $data;
    }
    
    public function populate($data, $user)
    {
        /*
         * funcao php array_flip inverte as chaves 
         * com os valors
         */
        $mappingsFlipped = array_flip($this->mapping);
        
        foreach($data as $key => $value) {
            if(isset($mappingsFlipped[$key])) {
                /*
                 * funcao php call_user_func_array chama uma
                 * fancao definida pelo usuario com array de
                 * parametors
                 * 
                 * funcao php ucfirst converte para maiusculo
                 * o primeiro carateder de uma string
                 */
                call_user_func_array(
                            array($user, 'set' . ucfirst($mappingsFlipped[$key])),
                            array($value)
                        );
            }
        }
        return $user;
    }
    
}