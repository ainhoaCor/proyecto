<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="div">
        <p id="p"></p>
    </div>
    <script>
        function confirmar(){
            var email=document.getElementById("email").value;
            var password=document.getElementById("password").value;
            xhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        var p1 = xhttp.responseText;
                        p.innerHTML= p1;
                        div.appendChild(p);
                    }
                };

              
                xhttp.open("GET", "comprobarDatosSesion.php?email=" + email +  "&password=" + password,true);
                xhttp.send();

        }

    </script>


</body>

</html>