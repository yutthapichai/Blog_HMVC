<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
  //the database table
  public $table_name = '';

  //pramary key field
  public $primary_key = '';

  //Filter for pramary
  public $primaryFilter = 'intval';

  //Order by field, Defiault order for this model
  public $order_by = '';

  public function __construct()
  {
    parent::__construct();
  }

  public function find($ids = FALSE)
  {
    //set flag -if we are passing a single id then we should get a single record
    $single = $ids == FALSE || is_array($ids) ? FALSE : TRUE;

    if($ids !== FALSE )
    {
      //check if the ids is an array
      is_array($ids) || $ids = array($ids);

      //sanitize ids
      $filter = $this->primaryFilter;
      $ids = array_map($filter, $ids);

      // using active record where_in as are deling with array
      $this->db->where_in($this->primary_key, $ids);
    }

    //check order by if it was already set
    // wrong count($this->db->order_by($this->order_by)) || $this->db->order_by($this->order_by);
    if(!empty($this->order_by))
    {
      $this->db->order_by($this->order_by);
    }
    //return results
    $single = FALSE || $this->db->limit(1);
    $method = $single ? 'row_array' : 'result_array';
    return $this->db->get($this->table_name)->$method();
  }

  public function find_by($key, $val = FALSE, $orwhere = FALSE, $single = FALSE)
  {
    // LIMIT the result
    // check if keys are in array or not
    if(!is_array($key))
    {
      $this->db->where(htmlentities($key), htmlentities($val));
    }else{
      $key = array_map('htmlentities', $key);
      $where_method = $orwhere == TRUE ? 'or_where' : 'where'; // $orwhere is FALSE from parametor
      $this->db->$where_method($key);
    }

    //return results
    $single = FALSE || $this->db->limit(1);
    $method = $single ? 'row_array' : 'result_array';
    return $this->db->get($this->table_name)->$method();
  }

  public function get_assoc($ids = FALSE)
  {
    // GET records
    $result = $this->find($ids);
    //tuen result into an associative array
    if($ids != FALSE && !is_array($ids))
    {
      $result = array($result);
    }
    $data = $this->to_assoc($result);

    return $data;
  }

  public function to_assoc($result = array())
  {
    $data = $result;
    /*
    if(count($result) > 0)
    {
      foreach($result as $key => $row)
      {
        //$tmp = array_values(array_slice($row, 0 , 1));
        //$data[[$tmp[0]]] = $row;
        //$data[$key] = $row;
      }
    }
    */
    return $data;
  }

  public function save($data, $id=FALSE)
  {
    if($id == FALSE)
    {
      // insert data
      $this->Db->set($data)->insert($this->table_name);
    }else
    {
      // update the data
      $filter = $this->primaryFilter;
      $this->db->set($data)->where($this->primary_key, $filter($id))->update($this->table_name);
    }

    //return id
    $id == FALSE ? $this->db->insert_id() : $id;
  }

  public function delete($ids)
  {
    $filter = $this->primaryFilter;
    $ids = !is_array($ids) ? array($ids) : $ids;

    foreach($ids as $id)
    {
      $id = $filter($id);
      if($id)
      {
        $this->db->where($this->primary_key, $id)->limit(1)->delete($this->table_name);
      }
    }
  }

  public function delete_by($key, $value)
  {
    if(empty($key))
    {
      return FALSE;
    }
    $this->db->where(htmlentities($key), htmlentities($value))->delete($this->table_name);
  }
}
