<?php
class Yeu_cau extends CI_Model {
	public $id;
	public $noi_dung;

    public function array_trans($val){
        $data= array();
        $this->db->where('id', $val);
        $q = $this->db->get('yeu_cau')->row();
        $data= $q->noi_dung;
    
        return $data;
    }

    public function is_match($ten){
        $query = $this->db->get('yeu_cau');
    foreach($query->result_array() as $row)
        {
            if($row['noi_dung']==$ten)return TRUE;

        }

    return FALSE;
    }

    public function add_edit($noi_dung,
        &$list_chi_tiet,$id_node){
if($noi_dung=='')return ;
        $array=array(
        
                'noi_dung'=>$noi_dung,
    
                        );

            $this->db->insert('yeu_cau',$array);
            
            $this->db->select_max('id');
            $query = $this->db->get('yeu_cau')->result_array();
    
            $list_chi_tiet=$query[0]['id'];


        }

    public function edit_edit($noi_dung,
        &$list_chi_tiet,$id_node){
if($noi_dung=='')return ;
            $this->db->where('noi_dung', $noi_dung);
            $node_map = $this->db->get('yeu_cau')->row();

            $list_chi_tiet=$node_map->id;
 
        }

}