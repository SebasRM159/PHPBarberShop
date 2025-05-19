const root = document.querySelector('#root');
const Agendar = `
    <div class="FormularioA">
        <section>
          <h1 class="titulo">AGENDACION</h1>
          <div class="container-form">
          <form method="post">
                  <label for="email">Nombre Completo</label>
                  <input type="text" id="email" name="email" required>
                  <br>
                  <label for="text">Alias(opcional)</label>
                  <input type="text" id="Alias" name="Alias">
                  <br>
                  <label for="date">Fecha de la cita</label>
                  <input type="date" id="fecha" name="fecha" required>
                  <br>
                  <label for="time">Hora de la cita</label>
                  <input type="time" id="hora" name="hora" required>
                  <br>
                  <label for="text">Nombre del Barbero</label>
                  <input type="text" id="barbero" name="barbero" required>
                  <br>
                  <label for="text">Descripcion del corte</label>
                  <input type="text" id="desc" name="desc" required>
                  <br>
                  <input id="submit-button" type="submit" value="Agendar cita" href="index.html">
                  <!-- <button type="button">¿Olvidaste tu contraseña?</button> -->
          </form>
          </div>
        </section>
        <img src="https://i.pinimg.com/736x/30/e2/18/30e218881e252ec96c2d85190529bca0.jpg" alt="Banner" class="banner"/>

    </div>
`
const Nosotros = `<div class="FormularioA">
  <img src="https://i.pinimg.com/736x/21/8e/88/218e88b6c9424777497d5d826235ce1b.jpg" alt="Banner" class="banner"/>
  <section>
    <h1>Que te importa</h1>
    <p>ajuasjuasjajsaskasjuan</p>
  </section>
  </div>`
const Tienda = `<h1>Tienda</h1>`
const html = {
  Agendar,
  Nosotros,
  Tienda, 
}
Object.entries(html).forEach(([key, value]) => {
  document.querySelector(`[aria-label="${key}"]`).addEventListener('click', e => {
    console.log(key);
    root.innerHTML = value;
  });
})