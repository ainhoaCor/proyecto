<?php

//MUESTRA LA TABLA DE LOS DATOS DEL PAIS POR EL CODIGO DE PAIS

    $db=new PDO('mysql:host=localhost; dbname=world', "root", "");
    $codPais=$_REQUEST['codPais'];
    $consulta=$db->prepare("SELECT * FROM country WHERE Code='{$codPais}'");
    $consulta->execute();
    $colum=$consulta->fetchColumn();
    if($colum>0){
        $codPais=$_REQUEST['codPais'];
        $consulta=$db->prepare("SELECT * FROM country WHERE Code='{$codPais}'");
        $consulta->execute();
        $resul=$consulta->fetchAll(PDO::FETCH_ASSOC);     
        foreach($resul as $r){ 
            echo"<br><br><br>";         
            echo "<h2>Datos Pais:</h2>
            <table border='1px black solid'>              
            <tr><th>Codigo pais</th>
                <th>Nombre</th>
                <th>Continente:</th>
                <th>Region:</th>
                <th>Surface Area:</th> 
                <th>Indep Year:</th>
                <th>Population:</th>
                <th>Life:</th> 
                <th>GNP:</th>    
                <th>GNPOld:</th>
                <th>Local:</th>
                <th>GovernmentForm:</th>
                <th>HeadOfState:</th>
                <th>Capital:</th>
                <th>Code 2:</th>
            </tr>
            <tr>
                <td>{$r['Code']}</td>
                <td>{$r['Name']}</td>
                <td>{$r['Continent']}</td>
                <td>{$r['Region']}</td>
                <td>{$r['SurfaceArea']}</td>
                <td>{$r['IndepYear']}</td>
                <td>{$r['Population']}</td>
                <td>{$r['LifeExpectancy']}</td>
                <td>{$r['GNP']}</td>
                <td>{$r['GNPOld']}</td>
                <td>{$r['LocalName']}</td>
                <td>{$r['GovernmentForm']}</td>
                <td>{$r['HeadOfState']}</td>
                <td>{$r['Capital']}</td>
                <td>{$r['Code2']}</td>
            </tr>
        </table> ";
        
        }
    }else{
        echo "Pais no encontrado";
    }?>
    
     
