<?php 
	class Admin {
		private $db;

		public function __construct() {
			$this->db = new Database;
		}

		public function findStudent($alumno) {
			$this->db->query('SELECT * FROM students WHERE id = :alumno');
			$this->db->bind(':alumno', $alumno);
			$this->db->getSingle();

			if ($this->db->rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function registerLesson($alumno, $clase) {
			$this->db->query('INSERT INTO lessons (student_id, lesson_number) VALUES (:alumno, :clase)');
			$this->db->bind(':alumno', $alumno);
			$this->db->bind(':clase', $clase);
			$this->db->execute();
		}
	}
?>