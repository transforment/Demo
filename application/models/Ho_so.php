<?php
class Ho_so extends CI_Model {
	public $id;
	public $mshs;
	public $name;
	public $cmnd;
	public $date;
	public $status;	
	public $note;
	public function format($input){
        $test=explode('/', $input);
        return $test;
    }
	public function format_num($input){
        if($input<10)$test='0'.$input.'';
        	else $test=(string)$input;
        return $test;
    }
	public function array_trans($val){
		$data= array();
		$this->db->where('id', $val);
   		$q = $this->db->get('Ho_so')->row();
		$data= $q->noi_dung;
	
	    return $data;
	}

	public function lay_note($id){
      //  $query = $this->db->get('map');
      //  $test=array();
       // foreach($query->result_array() as $row){
          //  if( $row['node_id']==$id)
                $test=$this->format($id);
       // }
        return $test;
    }
    public function lay_ten_muc($p_id){
    $query = $this->db->get('Ho_so');
    $array = array();
    foreach($query->result_array() as $row){
    	if ($row['status']==$p_id)
        $array[] = $row['node_name']; 
        }
    return $array;
    }
    public function lay_id($p_id){
    $query = $this->db->get('Ho_so');
    $array = array();
    foreach($query->result_array() as $row)
        {
        if ($row['status']==$p_id)
           $array[] = $row['id']; 
        }
    return $array;
    }
	public function add_ho_so($data){
	$this->db->insert('Ho_so', $data); 
    }
    public function loc_mshs($id){
        $query = $this->db->get('Ho_so');
        $array=array();
        $low_key=strtolower($id);
      foreach($query->result_array() as $row){
        $low_search=strtolower($row['mshs']);
        $pos = strpos($low_search, $low_key);
        if (($pos === false)) {
  
            } else {
                $array[] = $row['id']; 
            }
        }

        return $array;
    }
}