<?php 
	class Usuarios extends Controller {
		private $usuario;

		public function __construct() {
			$this->usuario = $this->model('Usuario');
		}

		public function index() {
			if (userLoggedIn() && $_SESSION['user_role'] == 'Usuario') {
				$this->view('usuario/index');
			} else {
				$this->view('pages/error');
			}
		}
		
	}
?>