<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script>
   

   window.addEventListener("load", (event) => {
    alert();
    setTimeout(function(){
      hiddenPreload();
    },1500);
  
});

function hiddenPreload(){
  var objPreload=document.getElementById('preloder');
  objPreload.style.display="none";
}

function validarFormulario() {
    var password1 = document.getElementById("p_pass").value;
    var password2 = document.getElementById("repeat_pass").value;

    if (password1 !== password2) {
        alert("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.");
        return false; // Evita que el formulario se envíe
    }

    // Si las contraseñas coinciden, el formulario se enviará normalmente
    return true;
}

</script> 