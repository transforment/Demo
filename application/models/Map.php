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
    public function lay_ten_muc()
    {
    $query = $this->db->get('map');
    $array = array();

    foreach($query->result_array() as $row)
        {
    	if ($row['p_id']==1)
        $array[] = $row['node_name']; 
        }

    return $array;
    }
    public function lay_id()
    {
    $query = $this->db->get('map');
    $array = array();

    foreach($query->result_array() as $row)
        {
        if ($row['p_id']==1)
       
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

      foreach($query->result_array() as $row){
        $pos = strpos($row['node_name'], $id);
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

      foreach($query->result_array() as $row){
        $pos = strpos($row['node_name'], $id);
        if (($pos === false)||($row['p_id']==0)) {
  
            } else {
                $array[] = $row['node_id']; 
            }
        }

        return $array;
    }
    


     /*   public function lay_chi_tiet($id){
        $query = $this->db->get('map');

        foreach($query->result_array() as $row){
            if( ($row['p_id']==$id)&& 
                 ($row['node_name']=='chi_tiet')) {
                $test=$this->format($row['note']);

            }
        }

        return $test;
    }*/
    public function is_match($ten){
        $query = $this->db->get('map');
    foreach($query->result_array() as $row)
        {
            if($row['node_name']==$ten) return TRUE;

        }

    return FALSE;
    }


}