const ruleta = document.querySelector('#ruleta');

ruleta.addEventListener('click', girar);
giros = 0;
function girar(){
  if (giros < 1) {
    let rand = Math.random() * 7200;
    calcular(rand);
    giros++;
    var sonido = document.querySelector('#audio');
    sonido.setAttribute('src', 'sonido/ruleta.mp3');
    document.querySelector('.contador').innerHTML = 'TURNOS: ' + giros; 
  }else{
    Swal.fire({
      icon: 'success',
      title: 'VUELVA PRONTO EL JUEGO TERMINO',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'ACEPTAR',
      allowOutsideClick: false
    }).then((result)=>{

      if (result.value == true) {
        giros = 0;

   $('#ruleta').css('pointer-events','none');

     //window.location.href = "https://www.littlerome.mx/";
/*
         document.querySelector('.elije').innerHTML = 'TU CORTESIA ES: ';
         document.querySelector('.contador').innerHTML = 'TURNOS: ' + giros;   */     
      }
    })
  }


function premio(premios){
/*
  document.querySelector('.elije').innerHTML = 'TU CORTESIA ES: ' + premios;*/
document.getElementById("demo").innerHTML =  'TU CORTESIA ES:<br/>' + premios;

}


 function calcular(rand) {

  valor = rand / 360;
  valor = (valor - parseInt(valor.toString().split(".")[0]))* 360;
  ruleta.style.transform = "rotate("+rand+"deg)";

  setTimeout(() => {
  switch (true) {
    case valor > 0 && valor <= 45:
     premio("DESCUENTO DE 5%");
     break;
     case valor > 45 && valor <= 90:
     premio("DESCUENTO DE 10%");
     break;
     case valor > 90 && valor <= 135:
     premio("GRATIS EN LA COMPRA DE 1 PIZZA A ELEGIR: PIZZA BOMS, PAN CON AJO O ESPAGUETI"); 
     break; 

     case valor > 135 && valor <= 149:
     premio("GRACIAS POR PARTICIPAR");
     break;
     case valor > 149 && valor <= 180:
     premio("PIZZA 1 ING GRATIS EN LA COMPRA DE OTRA PIZZA");
     break;
     case valor > 135 && valor <= 180:
     premio("GRACIAS POR PARTICIPAR");
     break;
     case valor > 180 && valor <= 225:
     premio("GRATIS EN LA COMPRA DE 1 PIZZA A ELEGIR: PIZZA BOMS, PAN CON AJO O ESPAGUETI");
     break; 
     case valor > 225 && valor <= 270:
     premio("DESCUENTO DE 10%");
     break;
     case valor > 270 && valor <= 315:
     premio("DESCUENTO DE 5%");
     break;
     case valor > 315 && valor <= 360:
     premio("DESCUENTO DE 15%"); 
     break;
  }

 }, 5000);

}
}