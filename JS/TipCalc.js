function calc(){
  var start = (document.getElementById('first').value);
  var tip = (document.getElementById('tip').value/100);
  document.getElementById('display').innerHTML = +start * +tip;
}
