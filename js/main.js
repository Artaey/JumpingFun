let up = false;
pop = document.getElementById("merepop");
function popup(){
    console.log("bob")
    if (up == false) {
        
        setTimeout(() => {
            pop.style.bottom = "141px";
        }, 195);
        pop.animate({"bottom" : "141px"},{duration : 200});
        console.log("up");
        up = true;
    }else{
        setTimeout(() => {
            pop.style.bottom = "0px"
        }, 195);
        pop.animate({"bottom" : "0px"},{duration : 200});
        console.log("down");
        up = false;
    }
}

document.getElementById("X").addEventListener("click", popup, false);
document.getElementById("mere").addEventListener("click", popup, false);