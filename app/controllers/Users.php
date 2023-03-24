<?php 
	class Users extends Controller {
		public function __construct() {
			$this->model = $this->model('User');
		}

		public function index() {
			if (isset($_SESSION['user_role'])) {
				$userView = strtolower($_SESSION['user_role']);
				$this->view($userView . '/index');
			} else {
				$this->view('pages/login');
			}			
		}

		public function error() {
			if (!isset($_SESSION['user_role'])) {
				$this->view('pages/error');
			} else {
				$userView = strtolower($_SESSION['user_role']);
				$this->view($userView . '/index');
			}
		}

		public function login() {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

				$form = [
					'email' => trim($_POST['email']),
					'pass' => trim($_POST['password']),
					'email_err' => '',
					'pass_err' => ''
				];

				if (empty($form['email'])) {
					$form['email_err'] = 'Ingrese un email válido.';
				}

				if (empty($form['pass'])) {
					$form['pass_err'] = 'Ingrese la contraseña.';
				}

				if ($this->model->findUserByEmail($form['email'])) {
					$form['email_err'] = '';
				} else {
					$form['email_err'] = 'Usuario no registrado.';
				}

				if (empty($form['email_err']) && empty($form['pass_err'])) {
					$userLoggedIn = $this->model->login($form['email'], $form['pass']);

					if ($userLoggedIn) {
						$userActive = $userLoggedIn->status;

						if ($userActive == 'Activo') {
							$this->createSession($userLoggedIn);
						} else {
							$data = ['error' => 'El usuario no esta activo.'];
							$this->view('pages/login', $data);
						}
					} else {
						$data = ['error' => 'La contraseña es incorrecta.'];
						$this->view('pages/login', $data);
					}
				} else {
					$data = ['error' => 'Usuario no registrado.'];
					$this->view('pages/login', $data);
				}
			} else {
				// show login form if is not used $_POST
				$this->view('pages/login');
			}
		}

		public function createSession($user) {
			$_SESSION['user_role'] = $user->role;
			$_SESSION['user_name'] = $user->first_name;
			$_SESSION['user_email'] = $user->email;

			if ($user->role == "Administrador") {
				redirect('administrador/index');
			}

			if ($user->role == "Usuario") {
				redirect('usuarios/index');
			}
		}

		public function logout() {
			unset($_SESSION['user_role']);
			unset($_SESSION['user_name']);
			unset($_SESSION['user_email']);

			session_destroy();
			redirect('users/login');
		}
	}
?>