var pos = '000000';
function change(){
    pos = (parseInt(pos,16) + parseInt('000001',16)).toString(16);
    while (pos.length<6) {
      pos = '0' + pos;
    }
    document.getElementById('random').style.background = '#' + pos;
}
