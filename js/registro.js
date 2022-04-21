function ShowSelected(){
  var tipo = document.getElementById("tipoUsuario").value;
  document.getElementById('imgTipo').src = "../assets/"+tipo+".png";
  if(tipo == "alumno"){ // alumno
    setAlumno("block");
    setVisitante("none");
  }else if(tipo == "docente"){ // docente
    setAlumno("none");
    setVisitante("none");
  }else if(tipo == "visitante"){ // visitante
    setAlumno("none");
    setVisitante("block");
  }
}
function setAlumno(disp){ // Alumnos
  document.getElementById('no_control').style.display = disp;
  document.getElementById('lblnc').style.display = disp;
  document.getElementById('carreras').style.display = disp;
  document.getElementById('semestres').style.display = disp;
}
function setVisitante(disp){ // Visitantes
  document.getElementById('institucion').style.display = disp;
  document.getElementById('lblin').style.display = disp;
  document.getElementById('fecha').style.display = disp;
  document.getElementById('lblfe').style.display = disp;
}