change();
setInterval(change, 5000);

function change() {
    rpg_box = document.getElementById("idle_msg");
    myArray = object_name.messages;    
    rpg_box.innerText = (myArray[Math.floor(Math.random() * myArray.length)] + "..." ).replace(/(\r\n|\n|\r)/gm,"");;    //To be replaced by the other messages.
}
