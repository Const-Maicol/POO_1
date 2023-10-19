<link rel="icon" type="image/png" href="../../assets/icons/logo.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }

  footer {
    background-image: url('ruta/de/la/imagen.jpg'); /* Reemplaza 'ruta/de/la/imagen.jpg' con la ubicación real de tu imagen */
    background-size: cover; /* Ajusta la imagen para cubrir todo el área del footer */
    background-repeat: no-repeat; /* Evita que la imagen se repita si es más pequeña que el footer */
    height: 200px; /* Ajusta la altura del footer según tus necesidades */
    color: #fff; /* Establece el color del texto para que sea legible sobre la imagen de fondo */
    text-align: center; /* Centra el contenido del footer horizontalmente */
    padding: 20px; /* Añade un espacio interno al contenido del footer para que no esté pegado a los bordes */
  }
   /* Estilos para quitar la decoración de los enlaces */
   .navbar-nav .nav-link {
    text-decoration: none !important; /* !important para asegurar que se aplique incluso si hay otras reglas de estilo */
    color: inherit; /* Mantener el color de texto original */
  }
</style>

 <style>

.preloder{
  width: 100%;
  height: 100%;
  background: gray;
  opacity:0.5;
  text-align: center;
  position: fixed;
  left: 0;
  top: 0;
  z-index: 500;
  overflow: hidden;

}
.spinenrBtn{
  top: 50%;
position: absolute;

}

#form {
  max-width: 600px;
  margin: 30px auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

label {
  font-weight: bold;
}

.form-group {
  margin-bottom: 20px; /* Ajusta el espacio vertical entre elementos del formulario */
}

.input-group-text {
  background-color: #f8f9fa;
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  background-color: #0056b3;
  border-color: #0056b3;
}

p {
  text-align: center;
  display: flex;
  justify-content: center;
  font-family: cursive;
  font-size: 30px;
  color: #0056b3;
}


/* Estilo para ocultar las flechas de aumento y disminución en el campo de número */
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style> 