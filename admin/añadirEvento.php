<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>

<body>


    <?php

    if (isset($_REQUEST["añadir"])) {
        $name = $_REQUEST['name'];
        $date = $_REQUEST['date'];
        $time = $_REQUEST['time'];
        $colab = $_REQUEST['colab'];
        $codEvent = 0;
        $db = new PDO('mysql:host=localhost; dbname=am', "root", "");
        $sql = $db->prepare("SELECT CodEvent FROM events ORDER BY CodEvent desc LIMIT 1");
        $sql->execute();
        $resul = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resul as $r) {
            $codEvent = $r["CodEvent"] + 1;
        }

        $sql2 = "INSERT INTO events (CodEvent, Name, Date, Time, Colab) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql2);
        $stmt->execute([$codEvent, $name, $date, $time, $colab]);
        if ($stmt->rowCount() > 0) {
            header("Location: pagina_admin.php");
        } else {
            echo "Error al insertar el evento."; ?>
            <form action="pagina_admin.php">
                <button type="submit" name="añadir" style="width:70px; height:30px; font-size:15px;">Volver</button>
            </form> <?php
                }
            } else { ?>
        <div class="container-fluid p-2">
            <h2>Añadir evento:</h2>
            <br>
            <form method="get" action="añadirEvento.php">
                <table class="responsive-table">
                    <?php
                    ?>
                    <tr>
                        <th scope="row" style="vertical-align: middle;"><b>Nombre:</b></th>
                        <th scope="row" style="vertical-align: middle;"><b>Fecha</b> </th>
                        <th scope="row" style="vertical-align: middle;"><b>Hora</b></th>
                        <th scope="row" style="vertical-align: middle;"><b>Colaborador</b></th>
                        <th scope="row" style="vertical-align: middle;"></th>
                    </tr>
                    <tr>
                        <td style='vertical-align: middle;'><input type="text" name="name" value=""></td>
                        <td style='vertical-align: middle;'><input type="date" name="date" value=""></td>
                        <td style='vertical-align: middle;'><input type="text" name="time" value=""></td>
                        <td style='vertical-align: middle;'><input type="text" name="colab" value=""></td>
                        <td><button type="submit" name="añadir" style="width:70px; height:30px; font-size:15px;">Añadir</button></td>
                    </tr>
                </table>

            </form>
        </div><?php
            } ?>
</body>

</html>