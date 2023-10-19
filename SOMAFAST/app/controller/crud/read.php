<?php
include('../../config/config.php');

$sql = $conn->query("SELECT * FROM products");

if ($sql->num_rows > 0) {
    echo '<table class="table">';
    echo '<thead class="bg-info">';
    echo '<tr>';
    echo '<th scope="col">Id</th>';
    echo '<th scope="col">Name</th>';
    echo '<th scope="col">Description</th>';
    echo '<th scope="col">due_date</th>';
    echo '<th scope="col">Actions</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($datos = $sql->fetch_object()) {
        echo '<tr>';
        echo '<td>' . $datos->Id . '</td>';
        echo '<td>' . $datos->Name . '</td>';
        echo '<td>' . $datos->Description . '</td>';
        echo '<td>' . $datos->due_date . '</td>';
        echo '<td>';
        echo '<a href="editar_producto.php?id=' . $datos->Id . '" class="btn btn-small btn-success">Editar</a>';
        echo '<a href="eliminar_producto.php?id=' . $datos->Id . '" class="btn btn-small btn-danger">Eliminar</a>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p>No hay productos registrados.</p>';
}
?>
