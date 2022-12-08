
var tipoMeliante = document.getElementById('tipoMeliante');
var turmaMeliante = document.getElementById('turmaMeliante');

tipoMeliante.addEventListener('change',habilitaTurma)

turmaMeliante.disabled = true;

function habilitaTurma(){
  if(tipoMeliante.value != 0){
    turmaMeliante.disabled = true;
}else{
    turmaMeliante.disabled = false;
}}