function GenererCaptcha(){
    var cap = document.getElementById("cap");
    var ch = "";
    for(let i = 0;i<10;i++){
        ch = ch + random()
    }
    cap.value = ch
    return false
}
function random(){
    var x = Math.ceil(Math.random() *26)
    console.log(x);
    if(x%2 ==0){
        return String.fromCharCode (x +64) 
    }else{
        return String.fromCharCode(x +96) 
    }
}
function maj(txt){
    var total = 0
    for(let i = 0 ;i<txt.length;i++){
        if(txt[i] == txt[i].toUpperCase()){
            total++
        }
    }
    return total
}
function verif(){
    var hotel = document.getElementById('hotel').value
    if(hotel == 0){
        alert('choisir un hotel');
        document.getElementById('hotel').focus
        return false
    }
    var aTS = document.getElementById('aTS');
    var aS = document.getElementById('aS');
    var aPS = document.getElementById('aPS');

    var rTS = document.getElementById('rTS');
    var rS = document.getElementById('rS');
    var rPS = document.getElementById('rPS');

    if(aTS.checked == false && aS.checked == false && aPS.checked == false){
        alert('L’évaluation des critères "Accueil" et "Restauration" est obligatoire.');
        return false
    }
    if(rTS.checked == false && rS.checked == false && rPS.checked == false){
        alert('L’évaluation des critères "Accueil" et "Restauration" est obligatoire.');
        return false
    }
    var rep = document.getElementById('rep');
    if(rep.value != maj(document.getElementById('cap').value)){
        alert('Verifier capthcha .');
        return false
    }
}
