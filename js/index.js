var path = window.location.pathname;
let content=[];
let x;
if (path == "/tomato.com/" || path == "/tomato.com/index.php"){
function displayNextContent() {
    x = (x === content.length - 1) ? 0 : x + 1;
    document.getElementById("dynamic-content").innerHTML = content[x] + '&nbsp;';
}

function displayPreviousContent() {
    x = (x <= 0) ? content.length - 1 : x - 1;
    document.getElementById("dynamic-content").innerHTML = content[x];
}
function startTimer() {
    setInterval(displayNextContent, 2000);
}

x = -1;
content[3] = "Late Night With Friends?";
content[1] = "Unexpected Guests?";
content[2] = "Lazy To Cook?";
content[0] = "Cooking Gone Wrong?";
content[4] = "All Alone?";
content[5] = "Hungry?";
startTimer();
}
function openNav() {
    document.getElementById("nav-bar").style.width = "250px";
}
function closeNav() {
    document.getElementById("nav-bar").style.width = "0";
    document.getElementById("nav-bar").style.border = "none";
}

