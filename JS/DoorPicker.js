var temp = "second";
function checker(id){
  if(id == temp){
    document.getElementById('result').innerHTML = "You Win!"
  }else{
    document.getElementById('result').innerHTML = "Nope..."
  }
}
function reset(){
  document.getElementById('result').innerHTML = "Pick a Door";
  var hello = Math.ceil(Math.random*2);
  if(hello == 0){
    temp = "first";
  }else{
    temp = "second";
  }
}
