<script>
    function vercontraseña(){
        const passwordInput = document.getElementById('p_pass');
        const repeatPasswordInput = document.getElementById('repeat_pass');
        const showPasswordCheckbox1 = document.getElementById('showPassword1');
        const showPasswordCheckbox2 = document.getElementById('showPassword2');

        showPasswordCheckbox1.addEventListener('change', function() {
            passwordInput.type = showPasswordCheckbox1.checked ? 'text' : 'password';
        });

        showPasswordCheckbox2.addEventListener('change', function() {
            repeatPasswordInput.type = showPasswordCheckbox2.checked ? 'text' : 'password';
        });
      }
    </script>