let up = false;
function popup(){
    console.log("bob")
    if (up == false) {
        pop = document.getElementById("merepop");
        setTimeout(() => {
            pop.style.bottom = "141px";
        }, 395);
        pop.animate({"bottom" : "141px"},{duration : 400});
        console.log("up");
        up = true;
    }else{
        pop = document.getElementById("merepop");
        pop.animate({"bottom" : "0px"},{duration : 400});
        setTimeout(() => {
            pop.style.bottom = "0px";
        }, 395);
        console.log("down");
        up = false;
    }
}

document.getElementById("X").addEventListener("click", popup, false);
document.getElementById("mere").addEventListener("click", popup, false);