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
      <li><a href="#" onclick="funcOptions()"><i class="fas fa-qrcode"></i>Stock</a></li>
      <li><a href="#"><i class="fas fa-link"></i>Clientes</a></li>
      <li><a href="#"><i class="fas fa-calendar-week"></i>Eventos</a></li>
      <li><a href="#"><i class="fas fa-stream"></i>Pedidos proveedor</a></li>
      <li><a href="#"><i class="fas fa-sliders-h"></i>Pedidos clientes</a></li>
      <li><a href="#"><i class="fas fa-sliders-h"></i>Services</a></li>
      <li><a href="#"><i class="far fa-envelope"></i>Contact</a></li>
    </ul>
  </div>

  <section>
    <!-- div para los diferentes selects -->
    <div id="div1" style="display:none">
      <select id="select" onchange="">
        <option id=option1>Selecciona una opcion</option>
        <option id=option2></option>
        <option id=option3></option>
        <option id=option4></option>
      </select>
    </div>

    <!-- div para imprimir el resultado -->
    <div id="divResult">


    </div>

    <script>
      //funcion donde se muestra el select con distintos options
      function funcOptions() {
        var select = document.getElementById('select');
        select.setAttribute("onChange","optionChange()");
        var option1 = document.getElementById('option1');
        var option2 = document.getElementById('option2');
        option2.textContent = 'Consultar';
        var option3 = document.getElementById('option3');
        option3.textContent = 'Añadir';
        var option4 = document.getElementById('option4');
        option4.textContent = 'Eliminar';
        var div1 = document.getElementById("div1").style.display = "block";
      }

        function optionChange() {
          var select = document.getElementById('select');
          var selectOption = select.value;
          // console.log(select.value);
          if (selectOption === 'Consultar') {
            consultarStock();
          } else if (selectOption === 'Añadir') {
            modificarStock();
          } else if (selectOption === 'option4') {
            eliminarStock();
          }
        }


          function consultarStock() {
            var select = document.getElementById('div1').style.display = "none";
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                var res = xhttp.responseText;
                document.getElementById("divResult").innerHTML = res;
                

              }
            };

            xhttp.open("GET", "pagina1.php?", true);
            xhttp.send();
          }

          function modificarStock() {
            var select = document.getElementById('div1').style.display = "none";
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                var res = xhttp.responseText;
                document.getElementById("divResult").innerHTML = res;
                // div.appendChild(res);

              }
            };

            xhttp.open("GET", "pagina2.php?", true);
            xhttp.send();
          }
        
    </script>

  </section>
</body>

</html>