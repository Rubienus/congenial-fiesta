<?php
class User{
	private $DB_SERVER='172.16.0.214';
	private $DB_USERNAME='group14';
	private $DB_PASSWORD='123456';
	private $DB_DATABASE='group14';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_user($email,$password,$lastname,$firstname){

		$data = [
			[$lastname,$firstname,$email,$password,],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_users (user_lastname, user_firstname, user_email, user_password) VALUES (?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}

		return true;

	}

	public function update_user($lastname,$firstname, $id){
		
		$sql = "UPDATE tbl_users SET user_firstname=:user_firstname,user_lastname=:user_lastname WHERE user_id=:user_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':user_firstname'=>$firstname, ':user_lastname'=>$lastname,':user_id'=>$id));
		return true;
	}
	
	public function delete_user($id) {
		$sql = "DELETE FROM tbl_users WHERE user_id = :user_id";
		$q = $this->conn->prepare($sql);
		$q->execute([':user_id' => $id]);
		return $q->rowCount() > 0;
	}


	public function list_users(){
			 $sql="SELECT * FROM tbl_users";
			 $q = $this->conn->query($sql) or die("failed!");
			 while($r = $q->fetch(PDO::FETCH_ASSOC)){
			 $data[]=$r;
			 }
			 if(empty($data)){
				return false;
			 }else{
			 	return $data;	
			 }
	}

	function get_user_id($email){
		$sql="SELECT user_id FROM tbl_users WHERE user_email = :email";	
		$q = $this->conn->prepare($sql);
		$q->execute(['email' => $email]);
		$user_id = $q->fetchColumn();
		return $user_id;
	}
	
	function get_user_email($id){
		$sql="SELECT user_email FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_email = $q->fetchColumn();
		return $user_email;
	}
	function get_user_firstname($id){
		$sql="SELECT user_firstname FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_firstname = $q->fetchColumn();
		return $user_firstname;
	}
	function get_user_lastname($id){
		$sql="SELECT user_lastname FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_lastname = $q->fetchColumn();
		return $user_lastname;
	}
	function get_session(){
		if(isset($_SESSION['login']) && $_SESSION['login'] == true){
			return true;
		}else{
			return false;
		}
	}
	public function check_login($email, $password)
{
    $sql = "SELECT COUNT(*) FROM tbl_users WHERE user_email = :email AND user_password = :password";
    $q = $this->conn->prepare($sql);
    $q->execute([':email' => $email, ':password' => $password]);
    $number_of_rows = $q->fetchColumn();

    if ($number_of_rows == 1) {
        $_SESSION['login'] = true;
        $_SESSION['user_email'] = $email;
        return true;
    } else {
        return false;
    }
}


}
