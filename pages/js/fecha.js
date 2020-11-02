
function pad(num) {return ("0" + num).slice(-2);}
function time1() {
     var today = new Date(),
       h = today.getHours(),
       m = today.getMinutes(),
       s = today.getSeconds();
       
     h = h % 12;
     h = h ? h : 12; // the hour '0' should be '12'
     clk.innerHTML = h + ':' + 
       pad(m) + ' ' + 
       (today.getHours() >= 12 ? 'PM' : 'AM');
}
window.onload = function() {
     var clk = document.getElementById('clk');
     t = setInterval(time1, 500);
     var dd = document.getElementById("dd");
     tt = setInterval(Fecha,500);
}


function Fecha()
{
meses = new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
data = new Date();
index = data.getMonth();
diasemana=new Array("Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
indexday =  data.getDay();
if (indexday == 0)
indexday = 7;
any = data.getYear();
if (any < 1900)
  any = 1900 + any;
//document.write(diasemana[indexday-1]+ "," + ' '+data.getDate()+ " de " + meses[index] + " de " + any);
dd.innerHTML = (diasemana[indexday-1]+ "," + ' '+data.getDate()+ " " + meses[index] + "  " + any);
}