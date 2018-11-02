function appender(){
  var node = document.createElement('LI');
  var dode = document.createElement('BUTTON');
  dode.innerHTML = 'X';
  node.innerHTML = document.getElementById('getter').value;
  dode.onclick = function(){
    node.remove();
  }
  node.appendChild(dode);
  holder.appendChild(node);
}
