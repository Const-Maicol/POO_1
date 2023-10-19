<?php
include('../../config/config.php');

if (isset($_POST["submit"])) {
    if (!empty($_POST["Name"]) && !empty($_POST["Description"]) && !empty($_POST["due_date"])) {
        $Name = $_POST["Name"];
        $Description = $_POST["Description"];
        $due_date = $_POST["due_date"];

        $sql = $conn->prepare("INSERT INTO products (Name, Description, due_date) VALUES (?, ?, ?)");
        $sql->bind_param("sss", $Name, $Description, $due_date);

        if ($sql->execute()) {
            echo '<div class="alert alert-success">Producto registrado correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Hubo un error al registrar el producto: ' . $conn->error . '</div>';
        }
        $sql->close();
    } else {
        echo '<div class="alert alert-warning">Algun campo está vacío</div>';
    }
}
?>
<!-- Formulario para crear un nuevo producto -->
<form class="col-4 p-3" method="post">
    <!-- ... (Campos del formulario) ... -->
</form>
