<?php
echo '<script>console.log("person def")</script>';
class Person{
	public $name;
	public $type;
	public $requests;


	public function __construct($name, $type, $requests){
		$this->name=$name;
		$this->type=$type;
		$this->requests=$requests;
	}
}

echo '<script>console.log("Accountig def")</script>';
class Accounting{
	private $accounts = array("prv"=> new Person("prv","prv",array()), bsm => new Person("bsn","bsn",array()));
	private $logon = array();

	public function __construct(){
		foreach ($accounts as $account) {
			$logon[$account->name]="1234";
		}

	}

	public function login($name, $pwd)
	{
		if(in_array($name, $logon,true)){
			if($logon[$name]==$pwd){
				$person=$accounts[$name];
				return $person;
			}
		}
	}
}
//##############################################################
echo '<script>console.log("init Accounting")</script>';
$accounting=new Accounting();

echo '<script>console.log("is login Requested")</script>';
echo '<script>console.log('+ var_dump($_POST)+')</script>';
if(isset($_POST['login'])){
	$name=$_POST['name'];
	$pwd=$_POST['pwd'];
	$person= $accounting->login($name,$name);
	echo json_encode('person'=>$person);
}

?>