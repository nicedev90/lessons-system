<?php 
	class Administrador extends Controller {
		private $admin;

		public function __construct() {
			$this->admin = $this->model('Admin');
		}

		public function index() {
			if (userLoggedIn() && $_SESSION['user_role'] == 'Administrador') {
				$this->view('administrador/index');
			} else {
				$this->view('pages/error');
			}
		}

		public function alumnos() {
			if (userLoggedIn() && $_SESSION['user_role'] == "Administrador") {
				$this->view('administrador/alumnos');
			} else {
				$this->view('pages/error');
			}
		}

		public function clases() {
			if (userLoggedIn() && $_SESSION['user_role'] == "Administrador") {
				$this->view('administrador/clases');
			} else {
				$this->view('pages/error');
			}
		}

		public function registerLesson() {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

				$form = [
					'alumno' => trim($_POST['alumno']),
					'clase' => trim($_POST['clase']),
					'error_alumno' => '',
					'error_clase' => ''
				];

				if (empty($form['alumno'])) {
					$form['error_alumno'] = 'Ingrese nombre de alumno.';
				}

				if (empty($form['clase'])) {
					$form['error_clase'] = 'Ingrese contraseña';
				}

				if (empty($form['error_alumno']) && empty($form['error_clase'])) {
					$this->admin->registerLesson($form['alumno'], $form['clase']);
					$msg = 'guardado con exito';
					// $data = ['error' => 'guardado exitosamente.'];
					// toast($data);
					$_SESSION['msg'] = $msg;
					redirect('administrador/index');
				} else {
					$data = ['error' => 'Error al guardar.'];
					$this->view('administrador/index', $data);
				}
			}
		}
		
	}
?>