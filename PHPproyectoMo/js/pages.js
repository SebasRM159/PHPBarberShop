
document.getElementById('show-agenda-form').addEventListener('click', function() {
  if(document.getElementById('cita-form').style.display === 'block'){
    document.getElementById('cita-form').style.display = 'none';
    document.getElementById('agenda-form').style.display = 'block';
    } else if(document.getElementById('main').style.display === 'block'){
    document.getElementById('main').style.display = 'none';
    document.getElementById('agenda-form').style.display = 'block';
    } else{
    document.getElementById('agenda-form').style.display = 'block';
    }
});

document.getElementById('show-cita-form').addEventListener('click', function() {
  if(document.getElementById('agenda-form').style.display === 'block'){
    document.getElementById('agenda-form').style.display = 'none';
    document.getElementById('cita-form').style.display = 'block';
    } else if(document.getElementById('main').style.display === 'block'){
    document.getElementById('main').style.display = 'none';
    document.getElementById('cita-form').style.display = 'block';
    } else {
    document.getElementById('cita-form').style.display = 'block';
    }
});