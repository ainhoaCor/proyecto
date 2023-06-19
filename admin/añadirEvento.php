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
    <h2>Añadir evento:</h2>
    <br>
    <form method="get" action="añadirEvento.php">
        <table class="responsive-table">
            <?php
            ?>
            <tr>
                <td id="tab"><b>Nombre</b><input type="text" name="name" value=""></td>
                <td id="tab"><b>Fecha</b><input type="date" name="date" value=""></td>
                <td id="tab"><b>Hora</b><input type="text" name="time" value=""></td>
                <td id="tab"><b>Colaborador</b><input type="text" name="colab" value=""></td>

            </tr>
        </table>
        <br>
        <button type="submit" name="añadir" style="width:70px; height:30px; font-size:15px;">Añadir</button>
    </form><?php

        }
