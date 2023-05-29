<?php

$db=new PDO('mysql:host=localhost; dbname=am', "root", "");
$consulta=$db->prepare("SELECT * FROM stock");
$consulta->execute();
$resul=$consulta->fetchAll(PDO::FETCH_ASSOC);?>
<h2>Stock Actual:</h2>
    <table border='1px black solid'>              
        <tr><th> Product Code </th>
            <th> Name </th>
            <th> Supplier </th>
            <th> Description </th>
            <th> Sales Price </th> 
            <th> Supplier Price </th>
            <th> Ud:</th>
         </tr>
         <?php
foreach($resul as $r){ 
    echo "         
        <tr>
            <td>{$r['CodProd']}</td>
            <td>{$r['NameProd']}</td>
            <td>{$r['Supplier']}</td>
            <td>{$r['Description']}</td>
            <td>{$r['SalesPrice']}</td>
            <td>{$r['SupplierPrice']}</td>
            <td>{$r['Ud']}</td>
        </tr>
    ";
}
?>
</table> 