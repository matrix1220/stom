<?
class datebase {
	public $conn;
	public $query;
	function __construct($host,$user,$pass,$db) {
		$this->conn=mysqli_connect($host,$user,$pass);
		mysqli_select_db($this->conn,$db);
	}
	function query($q) {
		$temp=$this->query=mysqli_query($this->conn,$q);
		if(!$temp) throw new Exception(mysqli_error($this->conn)."\n".$q);
		return $temp;
	}
	function read() {
		$query=$this->query;
		while ($row=mysqli_fetch_array($query,MYSQL_ASSOC)) {
			yield $row;
		}
	}
	function value($v) {
		return "'".str_replace(["\\",'"',"'"],['\\\\','\"',"\'"],$v)."'";
	}
	function firstread() {
		$temp=$this->read();
		$temp->rewind();
		if($temp->valid()) {
			return $temp->current();
		} else {
			return null;
		}
	}
}
class Stom {
	private $db;
	public $type;
	public $id;
	public $name;
	function __construct() {
		$this->type=false;
		$this->db=new datebase('localhost','root','shivaki72','stomatologiya');
	}
	function login($login,$pass) {
		$this->db->query("SELECT * FROM users WHERE login=".$this->db->value($login));
		$temp=$this->db->firstread();
		if(md5($temp['password'])==$pass) {
			$this->type=intval($temp['type']);
			$this->id=$temp['id'];
			$this->name=$temp['fullname'];
		} else {
			$this->db->query("SELECT * FROM doctors WHERE login=".$this->db->value($login));
			$temp=$this->db->firstread();
			if(md5($temp['password'])==$pass) {
				$this->type=2;
				$this->id=$temp['id'];
				$this->name=$temp['fullname'];
			}
		}
		return $this->type;
	}
	function listt($filters) {
		if($this->type===2) {$filters['doctor']=$this->id;}
		$query='';
		if(isset($filters['doctor'])) {
			$query.='doctor='.$filters['doctor'];
		}
		if(isset($filters['client'])) {
			if(!empty($query)) $query.=' AND ';
			$query.='client='.$filters['client'];
		}
		if(isset($filters['day']) and is_int($filters['day'][0]) and is_int($filters['day'][1])) {
			if(!empty($query)) $query.=' AND ';
			$query.="`time`>".$filters['day'][0]." AND `time`<".($filters['day'][1]+3600*24);
		}
		if(!empty($query)) $query=' WHERE '.$query;
		$query='SELECT * FROM list'.$query;
		//echo $query;
		$this->db->query($query);
		foreach ($this->db->read() as $value) {
			yield $value;
		}
	}
	function viewList($id) {
		$query='id='.$id;
		if($this->type==2) $query.=' AND doctor='.$this->id;
		$query='SELECT * FROM list WHERE '.$query;
		$this->db->query($query);
		$temp=$this->db->read();
		$temp->rewind();
		if($temp->valid()) {
			$temp=$temp->current();
			$temp1=[
				'id'=>$temp['id'],
				'money'=>$temp['money'],
				'description'=>$temp['description'],
				'clientId'=>$temp['client'],
				'doctorId'=>$temp['doctor'],
				'status'=>$temp['status']
				];
			if(substr($temp['status'],0,1)=='2') {
				$temp1['from']=$this->doctor(substr($temp['status'],1));
				$temp1['from']=$temp1['from']['fullname'];
			} else {
				$temp1['from']=$this->user(substr($temp['status'],1));
				$temp1['from']=$temp1['from']['fullname'];
			}
			$temp1['doctor']=$this->doctor($temp['doctor']);
			$temp1['doctor']=$temp1['doctor']['fullname'];
			$temp1['client']=$this->client($temp['client']);
			$temp1['client']=$temp1['client']['fullname'];
			$temp1['date']=date('d-m-Y',$temp['time']);
			return $temp1;
		} else return false;
	}
	function editList($id,$money,$client,$doctor,$desc) {
		$this->db->query('SELECT * FROM list WHERE id='.$id);
		$temp=$this->db->read();
		$temp->rewind();
		if(!$temp->valid()) return false;
		$temp=$temp->current();
		if($this->type!==1 and $this->type.$this->id!=$temp['status']) return false;
		if($this->type==2) $doctor=$this->id;
		$this->db->query("UPDATE list SET client=".$client.",doctor=".$doctor.",`money`=".$money.",`time`=".$temp['time'].",`status`=".$this->type.$this->id.",`description`=".$this->db->value($desc)." WHERE id=".$temp['id']);
		return $temp;
	}
	function deleteList($id) {
		$this->db->query('SELECT * FROM list WHERE id='.$id);
		$temp=$this->db->read();
		$temp->rewind();
		if(!$temp->valid()) return false;
		$temp=$temp->current();
		if($this->type!==1 and $this->type.$this->id!=$temp['status']) return false;
		return $this->db->query("DELETE FROM list WHERE id=".$id);
	}
	function user($id) {
		if($this->type===false) return false;
		$this->db->query("SELECT * FROM users WHERE id=".$this->db->value($id));
		$temp=$this->db->read();
		$temp->rewind();
		if($temp->valid()) {
			$temp=$temp->current();
			return $temp;
		}
	}
	function doctor($id) {
		if($this->type===false) return false;
		$this->db->query("SELECT * FROM doctors WHERE id=".$this->db->value($id));
		$temp=$this->db->read();
		$temp->rewind();
		if($temp->valid()) {
			$temp=$temp->current();
			if($this->type!=0) {
				unset($temp['login']);
				unset($temp['password']);
			}
			return $temp;
		}
	}
	function client($id) {
		if($this->type===false) return false;
		$this->db->query("SELECT * FROM clients WHERE id=".$this->db->value($id));
		$temp=$this->db->read();
		$temp->rewind();
		if($temp->valid()) return $temp->current();
	}
	function searchClient($q) {
		if($this->type===false) break;
		$query='SELECT * FROM clients';
		if(!empty($q)) $query.=' WHERE fullname REGEXP '.$this->db->value($q);
		$this->db->query($query);
		foreach ($this->db->read() as $value) {
			yield $value;
		}
	}
	function searchDoctor($q) {
		if($this->type===false) break;
		$query='SELECT * FROM doctors';
		if(!empty($q)) $query.=' WHERE fullname REGEXP '.$this->db->value($q);
		$this->db->query($query);
		foreach ($this->db->read() as $value) {
			yield $value;
		}
	}
	function newClient($name,$birth='',$address='') {
		if($this->type!==1) return false;
		$this->db->query('SELECT id FROM clients ORDER BY id DESC');
		$temp=$this->db->read();
		$temp->rewind();
		if($temp->valid()) {$temp=$temp->current();$temp=$temp['id']+1;} else {$temp=0;}
		$this->db->query("INSERT INTO clients (id,fullname,birth,address) VALUES (".$temp.",".$this->db->value($name).",".$this->db->value($birth).",".$this->db->value($address).")");
		return $temp;
	}
	function newDoctor($name,$login,$password) {
		if($this->type!==0) return false;
		$this->db->query('SELECT id FROM doctors ORDER BY id DESC');
		$temp=$this->db->read();
		$temp->rewind();
		if($temp->valid()) {$temp=$temp->current();$temp=$temp['id']+1;} else {$temp=0;}
		$this->db->query("INSERT INTO doctors (id,fullname,login,password) VALUES (".$temp.",".$this->db->value($name).",".$this->db->value($login).",".$this->db->value($password).")");
		return $temp;
	}
	function newList($money,$client,$doctor,$desc='') {
		if($this->type==0) return false;
		if($this->type==2) $doctor=$this->id;
		$this->db->query('SELECT id FROM list ORDER BY id DESC');
		$temp=$this->db->read();
		$temp->rewind();
		if($temp->valid()) {$temp=$temp->current();$temp=$temp['id']+1;} else {$temp=0;}
		$this->db->query("INSERT INTO list (id,client,doctor,`money`,`time`,`status`,`description`) VALUES (".$temp.",".$client.",".$doctor.",".$money.",".time().",".$this->type.$this->id.",".$this->db->value($desc).")");
		return $temp;
	}
	function editClient($id,$name,$birth='',$address='') {
		if($this->type!==1) return false;
		$this->db->query("UPDATE clients SET fullname=".$this->db->value($name).",birth=".$this->db->value($birth).",address=".$this->db->value($address)." WHERE id=".$id);
	}
	function editDoctor($id,$name,$login,$password) {
		if($this->type!==0) return false;
		$this->db->query("UPDATE doctors SET fullname=".$this->db->value($name).",login=".$this->db->value($login).",password=".$this->db->value($password)." WHERE id=".$id);
	}
	function deleteClient($id) {
		if($this->type!==1) return false;
		$this->db->query("DELETE FROM clients WHERE id=".$id);
	}
	function deleteDoctor($id) {
		if($this->type!==0) return false;
		$this->db->query("DELETE FROM doctors WHERE id=".$id);
	}
}
class cookie {
	public $get;
	function set($name,$value=null) {
		setcookie($name,$value,time()+3600*24,'/');
		$this->get[$name]=$value;
	}
	function __construct() {
		$this->get=$_COOKIE;
	}
}
?>