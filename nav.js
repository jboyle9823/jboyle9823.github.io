function setNav(){
    fetch("nav.html").then(r => r.text()).then(html => document.getElementById("main-nav").innerHTML = html);
}