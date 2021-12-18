<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Homemodel extends CI_Model {
	function __construct() {
       	$this->db = $this->load->database('default', TRUE);
		
		error_reporting(0);
    }


    function checkDuplicate($uname)
	{
		$this->db->select('*')->from('list_events')->where('name', $uname);
		$query = $this->db->get();
	   	$num = $query->num_rows();
		if($num>0){
		return $num;
		}else{
		return 0;
		}
	}
    function insert($data)
	{
		if($this->db->insert('list_events', $data))
		{
			return  $this->db->insert_id();
		}
		else
		{
			return false;
		}
	}


	public function allevents() {

		$this->db->select('*');
		$this->db->from('list_events');
    
		$query = $this->db->get();
		//echo $this->db->last_query();
        return $query->result();
    }

   public function del($id) {

   $this->db->delete('list_events', array('id' => $id)); 
  


    }


    public function update($data,$id) {   
		
		$this->db->where('id', $id);
		$this->db->update('list_events', $data);   		
		return true;
		}



	public function getdat() {

		$this->db->select('*');
		$this->db->from('list_events');
    
		$query = $this->db->get();
		
        return $query->result();
    }



}

    ?>