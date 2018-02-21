
 <style>
 body{font-family: Arial, sans-serif}
 
.img-contenedor img {
    -webkit-transition:all .9s ease; /* Safari y Chrome */
    -moz-transition:all .9s ease; /* Firefox */
    -o-transition:all .9s ease; /* IE 9 */
    -ms-transition:all .9s ease; /* Opera */
    width:100%;
}

.img-contenedor:hover img {
    -webkit-transform:scale(1.25);
    -moz-transform:scale(1.25);
    -ms-transform:scale(1.25);
    -o-transform:scale(1.25);
    transform:scale(1.25);
}

.img-contenedor,.img-contenedor2,.img-contenedor3 {/*Ancho y altura son modificables al requerimiento de cada uno*/
    width:300px;
    height:180px;
    overflow:hidden;
}

/*Ejemplo 2*/
.img-contenedor2 img {
    -webkit-transition:all 1.9s ease; /* Safari y Chrome */
    -moz-transition:all 1.9s ease; /* Firefox */
    -o-transition:all 1.9s ease; /* IE 9 */
    -ms-transition:all 1.9s ease; /* Opera */
    width:100%;
}
.img-contenedor2:hover img {
    -webkit-transform:scale(1.5);
    -moz-transform:scale(1.5);
    -ms-transform:scale(1.5);
    -o-transform:scale(1.5);
    transform:scale(1.5);
}
/*Ejemplo 3*/
.img-contenedor3 img {
    -webkit-transition:all .9s ease; /* Safari y Chrome */
    -moz-transition:all .9s ease; /* Firefox */
    -o-transition:all .9s ease; /* IE 9 */
    -ms-transition:all .9s ease; /* Opera */
    width:100%;
}

.img-contenedor3:hover img {
    -webkit-transform:scale(0.25);
    -moz-transform:scale(0.25);
    -ms-transform:scale(0.25);
    -o-transform:scale(0.25);
    transform:scale(0.25);
}
 </style>

<h3>Ejemplo Base</h3>
<div class="img-contenedor">
    <img src="assets/img/surveys/Gold-Star.J10.2k-300x300.png" />
</div>

