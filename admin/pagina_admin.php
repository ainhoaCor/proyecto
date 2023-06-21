<?php
 session_start(); 
 ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Index Admin</title>
  <link rel="stylesheet" href="style_admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>

<body>
  <input type="checkbox" id="check">
  <label for="check">
    <i class="fas fa-bars" id="btn"></i>
    <i class="fas fa-times" id="cancel"></i>
  </label>
  <div class="sidebar">
    <header>ADMIN</header>
    <ul>
      <li><a href="#" onclick="consultar('consultarStock.php?')"><i class="fas fa-qrcode"></i>Stock</a></li>
      <li><a href="#" onclick="consultar('consultarClientes.php?')"><i class="fas fa-link"></i>Clientes</a></li>
      <li><a href="#" onclick="funcOptions()"><i class="fas fa-stream"></i>Reservas</a></li>
      <li><a href="#" onclick="funcOptions2()"><i class="fas fa-calendar-week"></i>Eventos</a></li>
      <li><a href="#" onclick="consultar('consultarPedidos.php?')"><i class="fas fa-sliders-h"></i>Pedidos</a></li>
      <li><a href="../index.html"></i>Volver</a></li>

    </ul>

  </div>

  <section>
    <!-- div para los diferentes selects -->
    <div id="divSelect" style="display:none">
      <select id="select" onchange="">
        <option id=option1>Selecciona una opcion</option>
        <option id=option2></option>
        <option id=option3></option>
        <option id=option4></option>
      </select>
    </div>

    <!-- Select que muestra los telefonos -->
    <div id="divPhone" style="display:none;">
      <select id="phone" onchange="obtenerFechas()">
        <option selected>Selecciona un numero</option>
        <?php
        $db = new PDO('mysql:host=localhost; dbname=am', "root", "");
        $consulta = $db->prepare("SELECT Phone FROM bookings");
        $consulta->execute();
        while ($resul = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
          <option><?= $resul['Phone'] ?></option>
        <?php
        }
        ?>
      </select>
    </div>

    <!-- div donde se muestra la fechas -->
    <div id="divDates" style="display:none;">
      <select id="dates">
        <option>Selecciona hora</option>
        <option id=date></option>
      </select>
      <button type="button" onclick="eliminarReserva()">Aceptar<button>

    </div>


    <!-- div para imprimir el resultado -->
    <div id="divResult"></div>


    <script>
      // funcion donde se muestra el select con distintos options
      function funcOptions() {
        document.getElementById('divDates').style.display = "none";
        document.getElementById('divPhone').style.display = "none";
        document.getElementById('divResult').style.display = "none";
        var select = document.getElementById('select');
        select.setAttribute("onChange", "optionChange()");
        var option1 = document.getElementById('option1');
        var option2 = document.getElementById('option2');
        option2.textContent = 'Consultar';
        var option3 = document.getElementById('option3');
        option3.textContent = 'Modificar';
        var option4 = document.getElementById('option4');
        option4.textContent = 'Eliminar';
        document.getElementById("divSelect").style.display = "block";
      }

      // agrega un valor al option para las reservas
      function optionChange() {
        var select = document.getElementById('select');
        var selectOption = select.value;
        if (selectOption === 'Consultar') {
          consultar('consultarReservas.php?');
        } else if (selectOption === 'Modificar') {
          modificarReserva();
        } else if (selectOption === 'Eliminar') {
          document.getElementById("divSelect").style.display = "none";
          var div1 = document.getElementById("divPhone").style.display = "block";


        }
      }
      // agregar valor a los option para eventos
      function funcOptions2() {
        document.getElementById('divDates').style.display = "none";
        document.getElementById('divPhone').style.display = "none";
        document.getElementById('divResult').style.display = "none";
        var select = document.getElementById('select');
        select.setAttribute("onChange", "optionChange2()");
        var option1 = document.getElementById('option1');
        var option2 = document.getElementById('option2');
        option2.textContent = 'Consultar';
        var option3 = document.getElementById('option3');
        option3.textContent = 'Añadir';
        var option4 = document.getElementById('option4');
        option4.style.display = "none";
        document.getElementById("divSelect").style.display = "block";
      }
      // agrega un valor al option para los eventos
      function optionChange2() {
        var select = document.getElementById('select');
        var selectOption = select.value;
        if (selectOption === 'Consultar') {
          consultar('consultarEventos.php?');
        } else if (selectOption === 'Añadir') {
          añadirEvento();


        }
      }

      function consultar(pagina) {
        document.getElementById("divDates").style.display = "none";
        document.getElementById("divPhone").style.display = "none";
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var res = xhttp.responseText;
            document.getElementById("divResult").innerHTML = res;
            document.getElementById("divResult").style.display = "block";

          }
        };

        xhttp.open("GET", pagina, true);
        xhttp.send();
      }


      function modificarReserva() {
        // document.getElementById("divSelect").style.display="none";
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var res = xhttp.responseText;
            document.getElementById("divResult").innerHTML = res;
            document.getElementById("divResult").style.display = "block";


          }
        };

        xhttp.open("GET", 'modificarReserva.php?', true);
        xhttp.send();

      }

      function obtenerFechas() {
        document.getElementById("divSelect").style.display = "none";
        var phones = document.getElementById("divPhone").style.display = "block";
        var phone = document.getElementById("phone").value;
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var res = xhttp.responseText;
            var divDates = document.getElementById("divDates").style.display = "block";
            var dates = document.getElementById("dates");
            var date = document.getElementById("date").innerHTML = res;

            $Sdate = $_SESSION['date'] = $_REQUEST[res];

          }
        };

        xhttp.open("GET", 'obtenerFechas.php?phone=' + phone, true);
        xhttp.send();

      }

      function eliminarReserva() {
        document.getElementById("divSelect").style.display = "none";
        document.getElementById("divResult").style.display = "block";
        var date = document.getElementById("date").value;
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var res = xhttp.responseText;
            document.getElementById("divResult").innerHTML = res;

          }
        };

        xhttp.open("GET", 'eliminarReserva.php?date=' + date, true);
        xhttp.send();

      }

      function añadirEvento() {
        document.getElementById("divSelect").style.display = "none";
        document.getElementById("divResult").style.display = "block";
        var date = document.getElementById("date").value;
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var res = xhttp.responseText;
            document.getElementById("divResult").innerHTML = res;

          }
        };

        xhttp.open("GET", 'añadirEvento.php?', true);
        xhttp.send();

      }
    </script>

  </section>
</body>

</html>