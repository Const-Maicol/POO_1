<?php
include('../../config/config.php');

$sql = "SELECT * FROM `typeproduct` WHERE 1;";
$resultArray = array();

if (!$conn->multi_query($sql)) {
    echo "Falló la multiconsulta: (" . $conn->errno . ") " . $conn->error;
}

do {
    if ($result = $conn->store_result()) {
        $resultQuery = $result->fetch_all(MYSQLI_NUM);
        array_push($resultArray, $resultQuery);
        $result->free();
    }
} while ($conn->more_results() && $conn->next_result());

$resultcategory = $resultArray[0]; // Debería ser 0 en lugar de 5
?>

<?php include('../assets/css/css.php'); ?>
<?php include('../assets/view/header.php'); ?>

<div class="container fluid row">
    <form class="col-4 p-3" method="post" action="">
        <h3 class="text-center text-secondary">Registro de productos</h3>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" name="Name" required>
        </div>
        <div class="mb-3">
            <label for="Description" class="form-label">Descripción</label>
            <textarea class="form-control" id="Description" name="Description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="due_date" class="form-label">Fecha de vencimiento</label>
            <input type="date" class="form-control" name="due_date" required>
        </div>

        <div class="col-md-6">
            <label for="validationDefault04" class="form-label">Categoría</label>
            <select class="form-select" id="category" name="category" required>
                <option selected disabled value="">Seleccione</option>
                <?php
                for ($i = 0; $i < count($resultcategory); $i++) :
                ?>
                    <option value="<?= $resultcategory[$i][0] ?>"><?= $resultcategory[$i][1] ?></option>
                <?php
                endfor;
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

    <div class="col-8 p-4">
        <table class="table">
            <!-- Encabezados de la tabla -->
            <thead class="bg-info">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">due_date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('../../config/config.php');

                // Manejar el envío del formulario y la inserción de nuevos productos
                if (isset($_POST['submit'])) {
                    $Name = $_POST['Name'];
                    $Description = $_POST['Description'];
                    $due_date = $_POST['due_date'];

                    // Realizar la inserción en la base de datos
                    $sql = "INSERT INTO products (Name, Description, Images, description_detailed, category, due_date)
                            VALUES ('$Name', '$Description', '', '', 1, '$due_date')";
                    $result = $conn->query($sql);

                    if ($result) {
                        echo '<div class="alert alert-success">Producto registrado correctamente.</div>';
                    } else {
                        echo '<div class="alert alert-danger">Hubo un error al registrar el producto.</div>';
                    }
                }

                // Consulta para mostrar los productos
                $sql = $conn->query("SELECT * FROM products");
                while ($datos = $sql->fetch_object()) { ?>
                    <tr>
                        <td><?= $datos->Id ?></td>
                        <td><?= $datos->Name ?></td>
                        <td><?= $datos->category ?></td>
                        <td><?= $datos->Description ?></td>
                        <td><?= $datos->due_date ?></td>
                        <td>
                            <a href="../crud/edit.php" class="btn btn-small btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502 .646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg></a>
                            <a href="../crud/delete.php" class="btn btn-small btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                                </svg></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('../assets/view/footer.php'); ?>
<?php include('../assets/js/js.php'); ?>
