<?php include_once "administracion/Model/Conexion2.php";?>


    <thread>
        <th>ID Gestoría</th><th>Nombre Gestoria</th><th>Responsable </th><th>Dirección</th><th>Teléfono</th>
    </thread>
    <tbody class="datos">
<?php
    $consult = $conection->query("SELECT * FROM gestor;");
    while ($res = $consult->fetch_object()) {?>
        <tr>
            <td><?=$res->idGestor?></td>
            <td><?=$res->nombreGestoria?></td>
            <td><?=$res->responsableGestoria?></td>
            <td><?=$res->direccion?></td>
            <td><?=$res->telefono?></td>
        </tr>
    <?php } mysqli_free_result($consult); ?>
    </tbody>
