document.addEventListener('DOMContentLoaded', function() {
  const checkbox = document.getElementById('condiciones');
  const btnRegistrar = document.getElementById('btnRegistrar');
  
  checkbox.addEventListener('change', function() {
    btnRegistrar.disabled = !this.checked;
    btnRegistrar.classList.toggle('enabled', this.checked);
  });
  
  // Validación de contraseña en tiempo real
  document.getElementById('password').addEventListener('input', function(e) {
    if (e.target.value.length >= 8) {
      e.target.style.borderColor = '#4caf50';
    } else {
      e.target.style.borderColor = '#f44336';
    }
  });
});