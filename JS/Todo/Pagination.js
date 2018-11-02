var removed = [];
  function sortList() {
var list, i, switching, b, shouldSwitch;
list = document.getElementById("todoHolder");
switching = true;
while (switching) {
  switching = false;
  b = list.getElementsByTagName("LI");
  for (i = 0; i < (b.length - 1); i++) {
    shouldSwitch = false;
    if (b[i].innerHTML.toLowerCase() > b[i + 1].innerHTML.toLowerCase()) {
      shouldSwitch = true;
      break;
    }
  }
  if (shouldSwitch) {
    b[i].parentNode.insertBefore(b[i + 1], b[i]);
    switching = true;
  }
}
}

  function saveTask(){
    var temp = getter.value;
    if(localStorage.getItem(document.getElementById('userInput').value) == null){
      var tasks = [];
      //tasks.push(temp);
      localStorage.setItem(document.getElementById('userInput').value,JSON.stringify(tasks));
    }else{
      if(temp != ""){
      var currentTask = JSON.parse(localStorage.getItem(document.getElementById('userInput').value));
        currentTask.push(temp);
        localStorage.setItem(document.getElementById('userInput').value, JSON.stringify(currentTask));
      }else{
        return;
      }

    }
  }
  function getTasks(){
    first.style.display = 'none';
    second.style.display = 'block';
    saveTask();
    var task = JSON.parse(localStorage.getItem(document.getElementById('userInput').value));
    for(var i =0; i < task.length; i++){
      if(task[i] != ""){
      firstAppend(task[i]);
      }
    }
  }
function logout(){
  second.style.display = 'none';
  first.style.display = 'block';
  var ul = document.getElementById("todoHolder");
  while((ul.getElementsByTagName("li")).length > 0) {
    ul.removeChild(ul.firstChild);
  }
  getter.value="";
  removed = [];
}
function firstAppend(tasker){
if(tasker == ""){
  return;
}
saveTask();
getter.value = "";
var node = document.createElement('LI');
  var dode = document.createElement('INPUT');
  dode.type = 'checkbox';
  node.innerHTML = tasker;
  dode.onclick = function(){
      node.remove();
      var currentTask = JSON.parse(localStorage.getItem(document.getElementById('userInput').value));
      console.log(currentTask.splice(currentTask.indexOf(tasker),1));
      localStorage.setItem(document.getElementById('userInput').value, JSON.stringify(currentTask));
      removed.push(tasker);
      console.log("removedarray" +  removed);
  }
  node.appendChild(dode);
  todoHolder.appendChild(node);
}
function undo(){
if(removed.length != 0){
    firstAppend(removed.pop());
}
}
  var list = document.querySelector('ul');
  list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
  ev.target.classList.toggle('checked');
}
}, false);
