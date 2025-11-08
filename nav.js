function splitAtRoot(path){
    const url = new URL(path, location.origin);
    const pathFromRoot = url.pathname;
    return pathFromRoot;
}

function setNav(current_path) {
    current_path = splitAtRoot(current_path);

    fetch("nav.html")
        .then(r => r.text())
        .then(html => {
            const nav = document.getElementById("main-nav");
            nav.innerHTML = html;
            for (let child of nav.children) {
                if (child instanceof HTMLAnchorElement) {
                    const childPath = splitAtRoot(child.href);
                    if (childPath === current_path) {
                        child.classList.add("current");
                    }
                }
            }
        });
}