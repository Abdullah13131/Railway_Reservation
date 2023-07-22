window.onresize = checkSiderSize;

let sideBarToggler = document.querySelector(".sidebar-toggle");

let sideBar = document.querySelector(".side-menu");

let sideBarIcons = Array.from(document.querySelectorAll(".side-bar-icon"));
let sideBarTexts = Array.from(document.querySelectorAll(".side-bar-text"));
let sidebarActive = false;

let overlay = document.querySelector("#overlay");

function checkSiderSize() {

    w = document.documentElement.clientWidth || document.body.clientWidth || window.innerWidth;
    console.log(w);
    var targetWidth = 992;
    if (w > targetWidth) {
        sideBar.classList.remove("active");
        sideBarIcons.forEach(element => {
            element.removeAttribute("style");
        });
        sideBarTexts.forEach(element => {
            element.removeAttribute("style");
        });

        overlay.removeAttribute("style");
    }
}

sideBarToggler.onclick = toggleSidebar;

function toggleSidebar() {
    console.log("Toggle Sidebar");

    sidebarActive = !sidebarActive;
    if (sidebarActive) {
        sideBar.classList.add("active");
        sideBarIcons.forEach(element => {
            element.style.marginLeft = "0";
        });
        sideBarTexts.forEach(element => {
            element.style.display = "inline-flex";
        });
        overlay.style.display = "block";
    } else {
        sideBarIcons.forEach(element => {
            element.style.marginLeft = "185px";
        });
        sideBarTexts.forEach(element => {
            element.style.display = "none";
        });
        overlay.style.display = "none";
        sideBar.classList.remove("active");
    }
}