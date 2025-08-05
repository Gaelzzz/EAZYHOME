function enviarFormulario() {
  const servicio = document.getElementById('servicio').value;
  const descripcion = document.getElementById('descripcion').value;
  const fecha = document.getElementById('fecha').value;
  const urgencia = document.getElementById('urgencia').value;
  const acepto = document.getElementById('acepto').checked;

  if (!servicio || !descripcion || !fecha || !acepto) {
    alert('Por favor completa todos los campos y acepta los términos.');
    return;
  }

  const mensaje = `
    ✅ ¡Formulario enviado con éxito!
    Servicio: ${servicio}
    Descripción: ${descripcion}
    Fecha: ${fecha}
    Urgencia: ${urgencia}
  `;

  alert(mensaje);
}
