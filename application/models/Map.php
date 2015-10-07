<?php
class Map extends CI_Model {

	public $node_id;
	public $node_name;
	public $p_id;
	public $note;
    public function format($input){
        $test=explode('/', $input);
        return $test;
    }
    public function lay_ten_muc($p_id){
    $query = $this->db->get('map');
    $array = array();
    foreach($query->result_array() as $row){
    	if ($row['p_id']==$p_id)
        $array[] = $row['node_name']; 
        }
    return $array;
    }
    public function lay_id($p_id){
    $query = $this->db->get('map');
    $array = array();
    foreach($query->result_array() as $row)
        {
        if ($row['p_id']==$p_id)
           $array[] = $row['node_id']; 
        }
    return $array;
    }
    public function lay_note($id){
        $query = $this->db->get('map');
        $test=array();
        foreach($query->result_array() as $row){
            if( $row['node_id']==$id)
                $test=$this->format($row['note']);
        }
        return $test;
    }
    public function loc_ten($id){
        $query = $this->db->get('map');
        $array=array();
        $low_key=strtolower($id);
      foreach($query->result_array() as $row){
        $low_search=strtolower($row['node_name']);
        $pos = strpos($low_search, $low_key);
        if (($pos === false)||($row['p_id']==0)) {
  
            } else {
                $array[] = $row['node_name']; 
            }
        }

        return $array;
    }
    public function loc_id($id){
        $query = $this->db->get('map');
        $array=array();
        $low_key=strtolower($id);
      foreach($query->result_array() as $row){
        $low_search=strtolower($row['node_name']);
        $pos = strpos($low_search, $low_key);
        if (($pos === false)||($row['p_id']==0)) {
  
            } else {
                $array[] = $row['node_id']; 
            }
        }

        return $array;
    }
    public function loc_ten_left($data){
        $query = $this->db->get('map');
        $array=array();
        foreach($query->result_array() as $row){
            $pos2 = strpos($row['node_name'], strtolower($data[2]));
            $pos1 = strpos($row['node_name'], strtolower($data[1]));
            $pos  = strpos($row['node_name'], $data[0]);
            $pos3 = strpos($row['node_name'],strtolower( $data[3]));
            $pos4 = strpos($row['node_name'], strtolower($data[4]));
            $pos5 = strpos($row['node_name'], strtolower($data[5]));
                if (($pos === false)&&($pos1 === false)&&
                    ($pos2 === false)&&($pos3 === false)&&
                    ($pos4 === false)&&($pos5 === false)&&
                    ($row['p_id']==1)) {
                    $array[] = $row['node_name'];
                } else {
                }
        }
        return $array;
    }
    public function loc_id_left($data){
    $query = $this->db->get('map');
    $array=array();
    foreach($query->result_array() as $row){
        $pos2 = strpos($row['node_name'], strtolower($data[2]));
        $pos1 = strpos($row['node_name'], strtolower($data[1]));
        $pos  = strpos($row['node_name'], $data[0]);
        $pos3 = strpos($row['node_name'], strtolower($data[3]));
        $pos4 = strpos($row['node_name'], strtolower($data[4]));
        $pos5 = strpos($row['node_name'], strtolower($data[5]));
        if (($pos === false)&&($pos1 === false)&&
            ($pos2 === false)&&($pos3 === false)&&
            ($pos4 === false)&&($pos5 === false)&&
            ($row['p_id']==1)) {
            $array[] = $row['node_id'];
        } else {
            }
        }
        return $array;
    }

    

    public function is_match($ten){
        $query = $this->db->get('map');
    foreach($query->result_array() as $row)
        {
            if($row['node_name']==$ten) return TRUE;

        }

    return FALSE;
    }




}