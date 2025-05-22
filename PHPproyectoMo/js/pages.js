const root = document.querySelector('#root');

const Agendar = `
    <div class="FormularioA">
        <section>
          <h1 class="titulo">Agenda Semanal</h1>
          <div class="container-form">
          <form method="post">
                  <label for="horaEntrada">Hora de Entrada</label>
                  <input type="time" id="horaEntrada" name="horaEntrada" required>
                  <br>
                  <label for="horaSalida">Hora de Salida</label>
                  <input type="time" id="horaSalida" name="horaSalida">
                  <br>
                  <label for="semana">Semana</label>
                  <input type="week" id="semana" name="semana" required>
                  <br>
                  <input id="submit-button" type="submit" value="Crear agenda" href="index.html">
          </form>
          </div>
        </section>
        <img src="https://i.pinimg.com/736x/30/e2/18/30e218881e252ec96c2d85190529bca0.jpg" alt="Banner" class="banner"/>
    </div>
`

const Citar = `
    <div class="FormularioA">
        <section>
          <h1 class="titulo">CITACION</h1>
          <div class="container-form">
          <form method="post">
                  <label for="text">Nombre Completo del Cliente</label>
                  <input type="text" id="nombre" name="nombre" required>
                  <br>
                  
                  <label for="date">Fecha de la cita</label>
                  <input type="date" id="fechaC" name="fechaC" required>
                  <br>

                  <label for="time">Hora de la cita</label>
                  <input type="time" id="horaC" name="horaC" required>
                  <br>

                  <label for="text">Descripcion del corte</label>
                  <input type="text" id="tipoC" name="desc" required>
                  <br>

                  <input id="submit-button" type="submit" value="Agendar cita" href="index.html">
                 
          </form>
          </div>
        </section>
        <img src="https://i.pinimg.com/736x/30/e2/18/30e218881e252ec96c2d85190529bca0.jpg" alt="Banner" class="banner"/>

    </div>
`

const Vista = `<h1>Tienda</h1>`
const html = {
  Agendar,
  Citar,
  Vista, 
}


Object.entries(html).forEach(([key, value]) => {
  document.querySelector(`[aria-label="${key}"]`).addEventListener('click', e => {
    console.log(key);
    root.innerHTML = value;
  });
})