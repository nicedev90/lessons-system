window.addEventListener('DOMContentLoaded', () => {

const btnAlumno = document.querySelector('#btn-alumno')
	btnAlumno.addEventListener('click', addStudent)

const btnClase = document.querySelector('#btn-clase')
	btnClase.addEventListener('click', addLesson)

})

const msg = document.querySelector('#msg')
if (msg) {
	setTimeout(() => {
		msg.remove()
	}, 3000)
	// console.log(msg.id)
} 

// setInterval(function(){ 
// 	console.log("Oooo Yeaaa!");
// }, 2000);


const formStudent = document.querySelector('#form-student')
const addStudent = () => {
	formStudent.classList.toggle('hidden')
}

const formClase = document.querySelector('#form-clase')
const addLesson = () => {
	formClase.classList.toggle('hidden')
}