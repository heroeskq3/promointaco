<style>
	.contenedorinputs {
    position: relative;
}
.test{
  list-style: none;
  display: block;
  padding-bottom: 2em;
}
.inputradio{   
    opacity: 0; /* Ocultamos el input verdadero con opacity: 0 */
    width: 20px;
    height: 20px;
    position: absolute;
    left: 0px;
}
.inputfalso{
    border: 2px solid #dedede;
    border-radius: 50%;
    display: inline-block;
    height: 20px;
    position: absolute;
    left: 0px;
    width: 21px;
    z-index: -1;
}
input[type="radio"]:checked + span:after {    
content: "✔"; /* el valor de la propiedad content también puede ser cualquier imagen, sólo tendríamos que pasarle la ruta de la imagen*/
    position: absolute;
    text-indent: 2px;
    top: -1px;
    left: 2px;
    color: red;
}
/* Para utilizarlo con un radiobutton > input[type="radio"]:checked + span:after */
</style>
<div class="contenedorinputs">   
  <div class="test"><input class="inputradio" type="radio" name="test"><span class="inputfalso"></span></div>
  <div class="test"><input class="inputradio" type="radio" name="test"><span class="inputfalso"></span></div>
  <div class="test"><input class="inputradio" type="radio" name="test"><span class="inputfalso"></span></div>
  <div class="test"><input class="inputradio" type="radio" name="test"><span class="inputfalso"></span></div>
</div>
<!-- para hacerlo con un radiobutton <input class="inputradio" type="radio"> -->