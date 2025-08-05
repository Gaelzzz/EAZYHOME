function togglePassword() {
            const password = document.getElementById("contraseña");
            const toggleBtn = document.querySelector('.toggle-password');
            
            password.type = password.type === "password" ? "text" : "password";
            toggleBtn.textContent = password.type === "password" ? '👁️' : '👁️‍🗨️';
        }
    function togglePassword() {
      const passwordField = document.getElementById('contraseña');
      const toggleIcon = document.querySelector('.toggle-password');
      
      // Cambia el tipo de campo manteniendo el layout
      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleIcon.textContent = '👁️';
      } else {
        passwordField.type = 'password';
        toggleIcon.textContent = '👁️';
      }
      
      // Mantiene el foco y evita parpadeos
      passwordField.focus();
    }
    