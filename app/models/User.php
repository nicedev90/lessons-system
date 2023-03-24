<?php 
	class User {
		private $db;

		public function __construct() {
			$this->db = new Database;
		}

		public function login($email, $password) {
			$this->db->query('SELECT * FROM users u INNER JOIN role r ON u.role_id = r.id WHERE u.email = :email');
			$this->db->bind(':email', $email);

			$userData = $this->db->getSingle();
			$userPass = $userData->password;

			if ($password == $userPass) {
				return $userData;
			} else {
				return false;
			}
		}

		public function findUserByEmail($email) {
			$this->db->query('SELECT * FROM users WHERE email = :email');
			$this->db->bind(':email', $email);
			$this->db->getSingle();

			if ($this->db->rows() > 0) {
				return true;
			} else {
				return false;
			}
		}


	}
?>