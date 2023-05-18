<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
    <style>
        div{
            margin-left: 20px;
            margin-top: 20px;
            text-align: center;
            height: 200px;
            width: 200px;
        }
        table{
           position: absolute;
        }
        #div{
            margin-left: 50px;
            margin-top: 50px; 
        }
    </style>
</head>
<body>
    <div class="p-3 text-dark-emphasis bg-dark subtle border border-dark subtle rounded-3 w-50">
        <!-- input principal para coger el codigo del pais -->
        <input type="text" id="codPais" placeholder="Codigo pais">

        <!-- primer boton que va a la funcion cambioBoton-->
        <button type="button" id="boton" class="btn btn-secondary"  onclick="cambioBoton()">Buscar</button>
        <button type="button" style="display:none" id="boton2" class="btn btn-secondary" onclick="buscarPais()">Confirmar</button>

        <!--Select donde aparecen todos los paises por nombre -->
        <br><br><select id="pais" onchange="selectCiudad()">
            <option selected>Selecciona un pais</option><?php
            $db=new PDO('mysql:host=localhost; dbname=world', "root", "");
            $consulta=$db->prepare("SELECT Name FROM country
            ORDER BY Name");
            $consulta->execute();
            while($resul=$consulta->fetch(PDO::FETCH_ASSOC)){ ?>
                <option><?=$resul['Name']?></option> <?php
            } ?>
    </div>
        <!--div con parrafo donde se cargan los resultados de la consulta para mostrarlo por pantalla -->   
        </select>
        <div id="div">
            <p id="p"></p>
        </div>
    
<script>

//funcion para cambiar del boton buscar al boton confirmar
function cambioBoton(){
    var pais=document.getElementById("codPais");
    if(pais.value != ""){
        document.getElementById("boton").style.display="none";
        document.getElementById("boton2").style.display="";
              
    }
}
//busca pais con el codigo introducido en el input con id codPais
function buscarPais(){
    document.getElementById("boton2").style.display="none";
    document.getElementById("boton").style.display="";
    var codExp=/^[A-Z]{3}$/;
    var codPais=document.getElementById("codPais").value;
    if(codExp.test(codPais)){
        const xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var res = xhttp.responseText;
                document.getElementById("p").innerHTML=res;
                div.appendChild(res);
                
            }
        };
            
        xhttp.open("GET", "pagina1.php?codPais="+ codPais, true);
        xhttp.send();   
    
    }else{
        alert("Formato de codigo incorrecto");
    }
  
}


//funcion donde aparecen las ciudades del pais seleccionado en el select con id ciudad
function selectCiudad(){
    var pais2valor=document.getElementById("pais").value;
    const xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var res = xhttp.responseText;
                document.getElementById("p").innerHTML=res;
                div.appendChild(res);
            }
        };
            
        xhttp.open("GET", "pagina2.php?pais2valor="+ pais2valor, true);
        xhttp.send();   
   
}
//funcion que muestra los datos de la ciudad seleccionada en el select de pagina 2
function datosCiudad(){
    var ciudad=document.getElementById("ciudad").value;
    const xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var res = xhttp.responseText;
                document.getElementById("p").innerHTML=res;
                div.appendChild(res);
            }
        };
            
        xhttp.open("GET", "pagina3.php?ciudad="+ ciudad, true);
        xhttp.send();   
}







</script>
</body>
</html>