<?php

	class Database
	{
		public $host = "localhost";
		public $username = "root";
		public $password = "";
		public $db_name = "hrsolutions";

		public $link;
		public $error;

		public function __construct()
		{
			$this->connect();
		}
		private function connect()
		{
			$this->link = new mysqli("$this->host","$this->username","$this->password","$this->db_name");
			if(!$this->link)
			{
				$this->error = "Connection Error ".$this->link->connect_error;
				return false;
			}
		}
		public function select($query)
		{
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
			
			return $result;
			
		}

		public function update($query)
		{
			$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if($update_row)
			{
				header('location:index.php?msg='.urldecode("Record Updated"));
				exit();
			}
			else
			{
				die("ERROR : ".$this->link->error);
			}
		}

		public function delete($query)
		{
			$delete_college = $this->link->query($query) or die($this->link->error.__LINE__);
			if($delete_college)
			{
				header("location:index.php?msg=".urldecode('Record Deleted'));
				exit();
			}
			else
			{
				die("ERROR : ".$this->link->error);
			}
		}
	}

?>