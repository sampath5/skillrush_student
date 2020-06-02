// Set the date we're counting down to
var countDownDate = new Date("Mar 25, 2020 09:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = "<b>TIME LEFT</b>:<br>"+hours+"h "
  + minutes + "m " + seconds + "s";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "<b>TIME LEFT</b>:<br><b>EXPIRED</b>";
  }
}, 1000);
function myfunction1(a,b){
document.getElementById("q1").style="background-color:blue";
}
function myfunction2(){


document.getElementById("q2").style="background-color:blue";

}
function myfunction3(){
document.getElementById("q3").style="background-color:blue";
}
function myfunction4(){
document.getElementById("q4").style="background-color:blue";
}
function myfunction5(){
document.getElementById("q5").style="background-color:blue";
}
function myfunction6(){
document.getElementById("q6").style="background-color:blue";
}
function myfunction7(){
document.getElementById("q7").style="background-color:blue";
}
function myfunction8(){
document.getElementById("q8").style="background-color:blue";
}
function myfunction9(){
document.getElementById("q9").style="background-color:blue";
}
function myfunction10(){
document.getElementById("q10").style="background-color:blue";
}
function myfunction11(){
document.getElementById("q11").style="background-color:blue";
}
function myfunction12(){
document.getElementById("q12").style="background-color:blue";
}
function myfunction13(){
document.getElementById("q13").style="background-color:blue";
}
function myfunction14(){
document.getElementById("q14").style="background-color:blue";
}
function myfunction15(){
document.getElementById("q15").style="background-color:blue";
}
function myfunction16(){
document.getElementById("q16").style="background-color:blue";
}
function myfunction17(){
document.getElementById("q17").style="background-color:blue";
}
function myfunction18(){
document.getElementById("q18").style="background-color:blue";
}
function myfunction19(){
document.getElementById("q19").style="background-color:blue";
}
function myfunction20(){
document.getElementById("q20").style="background-color:blue";
}