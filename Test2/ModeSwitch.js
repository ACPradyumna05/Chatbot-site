const body = document.querySelector("body"),
sidebar=body.querySelector(".sidebar"),
toggle=body.querySelector(".toggle"),
modeSwitch=body.querySelector(".toggle-switch"),
modeText=body.querySelector(".modeText");

modeSwitch.addEventListener("click", ()=>{
    body.classList.toggle("dark");
})

toggle.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
})


