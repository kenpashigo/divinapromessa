<?php	
	
	class Connection {

		public function DBConnect(){  	
			$link = mysqli_connect(DB_HOSTNAME_ON, DB_USERNAME_ON, DB_PASSWORD_ON, DB_DATABASE_ON) or die(mysqli_error($link));
			mysqli_set_charset($link, DB_CHARSET) or die(mysqli_error($link));
			return $link;	    
		}

		public function DBClose($link){
			mysqli_close($link) or die(mysqli_error($link));	
		}

		public function DBQuery($query) {						
			return mysqli_query($this->DBConnect(), $query);			
		}
	}
?>