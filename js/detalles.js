//Poniendo mascara para los numeros de telefono y celular
$(window).load(function()
{
   var telefono = [{ "mask": "(###) ### ####"}, { "mask": "(###) ### ####"}];
   var celular =  [{ "mask": "(###) ### ####"}, { "mask": "(###) ### ####"}];
   var numero = [{ "mask": "#####"}, { "mask": "#####"}];
   var numeroEmpleados = [{ "mask": "#####"}, { "mask": "#####"}];
    $('#Tel').inputmask({
        mask: telefono,
        greedy: false,
        definitions: { '#': { validator: "[0-9]", cardinality: 1}} });

    $('#Cel').inputmask({
        mask: celular,
        greedy: false,
        definitions: { '#': { validator: "[0-9]", cardinality: 1}} });

          $('#Num').inputmask({
            mask: numero,
            greedy: false,
            definitions: { '#': { validator: "[0-9]", cardinality: 1}} });

            $('#NumEmpleados').inputmask({
              mask: numeroEmpleados,
              greedy: false,
              definitions: { '#': { validator: "[0-9]", cardinality: 1}} });
});


//_____________Esta function es para el select de Giro (Comercio, Servicios, etc)_________
function habilitar()
{
  var comboBox = document.getElementById('IdLista').value;
  var tieneLetras = document.getElementById('IdEspecificar').value;

  if (comboBox == 'otro') {
        var IdEspecificar = document.getElementById('IdEspecificar').disabled = false;
  }
  else{
    var IdEspecificar = document.getElementById('IdEspecificar').disabled = true;
  }

  var num = tieneLetras.length;
  if(num > 0)
  {
    var comboBox = document.getElementById('IdLista').disabled = true;
  }
  else
  {
      var comboBox = document.getElementById('IdLista').disabled = false;
  }

  //_____________________________________Habilitando y desabilitando Telefono/Celular_________________________________________//

var select = document.getElementById("IdListaTelefonos").value;
var tel = document.getElementById("Tel").value;
var cel = document.getElementById("Cel").value;
var desabilitarTel = document.getElementById('Tel').disabled = false;
var desabilitarCel = document.getElementById('Cel').disabled = false;

if(select == 'telefono')
{
  desabilitarTel = document.getElementById('Tel').disabled = false;
  desabilitarCel = document.getElementById('Cel').disabled = true;
}
else if (select == 'celular')
{
  desabilitarCel = document.getElementById('Cel').disabled = false;
  desabilitarTel = document.getElementById('Tel').disabled = true;
}

if(select == 'ambos')
{
  tel = document.getElementById('Tel').disabled = false;
  cel = document.getElementById('Cel').disabled = false;
}


}
