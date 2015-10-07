
<?php
class User extends CI_Model {
	public $id;
	public $name;
	public $pass;
	public $hoten;
	public $level;
	
	public function verify($name,$pass){
		$q=new user();

		$this
			->db
			->where('name',$name)
			->where('pass',sha1($pass))
			->limit(1);
			
		$q = $this->db->get('user');

		if($q->row()>0){
			return $q;
		}
		return FALSE;
	}

}