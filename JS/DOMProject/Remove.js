function appender(){
  var node = document.createElement('LI');
  node.className = 'yellow';
  node.innerHTML = document.getElementById('getter').value;
  holder.appendChild(node);
}
function remover(){
  holder.removeChild(document.getElementsByClassName('yellow')[0]);
}
