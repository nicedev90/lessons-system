<!-- header -->
<?php require APPROOT . '/views/administrador/partials/header.php'; ?>

	<!-- main wrapper -->
	<div class="flex flex-col min-h-screen max-w-6xl mx-auto">

		<!-- navbar section -->
		<?php require APPROOT . '/views/administrador/partials/navbar.php'; ?>

		<!-- content wrapper -->
		<div class="flex w-full ">

			<div class="flex flex-col w-1/2 space-y-3">

				<div class="flex justify-around  p-4 text-dark bg-primary">
					<p>Ultima clase realizada:</p>
					<p> clase 2 PHP variables - alumno: Wilson</p>
				</div>

				<div class="flex justify-around p-4 text-dark text-sm bg-neutralLight">
					<p>Total de horas de clase esta semana:</p>
					<p> 19 Hrsn</p>
				</div>

				<?php showAlert(); ?>

				<button id="btn-clase" class="p-3 w-44 bg-cta shadow rounded-xl">
					Agregar Nuevo Clase
				</button>
				<div id="form-clase" class="<?php !empty($data['error']) ? 'hidden' : ''; ?> relative hidden p-3 bg-primary mx-10">
					<form action="<?php echo URLROOT; ?>/administrador/registerLesson" id="custom-form" class="w-96 mx-auto p-4 space-y-4 rounded-lg text-dark" method="post">
						<?php if(!empty($data['error'])) {
							echo $data['error'];
						} ?>
						<div class="flex flex-col" id="form-group">
							<label for="alumno"> Alumno : </label>
							<select name="alumno" id="alumno">
								<option value="1">Wilson Muñoz</option>
								<option value="2">Cesar Martin</option>

							</select>
							<!-- <input type="text" class="p-2 rounded-lg" name="alumno" id="alumno" placeholder="Escriba su alumno"> -->
						</div>
						<div class="flex flex-col" id="form-group">
							<label for="clase n"> Clase n : </label>
							<input type="text" class="p-2 rounded-lg" name="clase" id="clase" placeholder="Escriba su clase n">
						</div>

						<div class="flex flex-col" id="form-group">
							<label for="inicio"> Inicio : </label>
							<input type="text" class="p-2 rounded-lg" name="inicio" id="inicio" placeholder="Escriba su inicio">
						</div>

						<div class="flex flex-col" id="form-group">
							<label for="final"> Final : </label>
							<input type="text" class="p-2 rounded-lg" name="final" id="final" placeholder="Escriba su final">
						</div>
						<button type="submit" id="register" class="bg-cta w-full p-2 hover:bg-neutral font-bold text-xl rounded-lg">registrar</button>
					</form>
				</div>


			</div>

			<div class="flex flex-col items-center w-1/2 space-y-3">
				<button id="btn-alumno" class="p-3 w-44 bg-dark shadow rounded-xl">
					Agregar Nueva Alumno
				</button>
				<div id="form-student" class="relative hidden p-3 bg-primary mx-10">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis debitis repellendus nesciunt voluptas numquam autem at nemo perspiciatis necessitatibus. Aperiam illum reiciendis dolorum. Eveniet esse quibusdam similique cupiditate, ea repudiandae.
				</div>
			</div>


		</div>
		
	</div>

  <!-- footer -->
	<?php require APPROOT . '/views/administrador/partials/footer.php'; ?>
