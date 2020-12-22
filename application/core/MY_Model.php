<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	public function debug($var): void{
        echo "<h4>DEBUG :</h4>";
        echo "<pre>";
        print_r($var);
        echo "</pre>";        
    }

    public function add($table,$data)
    {
        return $this->db->insert($table, $data);
    }

    public function modif($table, $id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($table, $data);
    }

    public function del($table, $id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($table);
    }

    /*public function __get($attr){
        $method = 'get'.ucFirst($attr);
        return $this->$method();
    }

    public function __set($attr, $value){
        $method = 'set'.ucFirst($attr);
        echo "methode =".$method;
        return $this->$method($value);
    }*/
}