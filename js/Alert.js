function showAlert(input,message){
    const parent = input.parentElement;
    if (parent.querySelector(".alert")){
        return;
    }
    const infoIcon = document.createElement("i");
    infoIcon.classList.add("fa-solid","fa-circle-info");
    infoIcon.style.color = "red";

    const element = document.createElement("p");
    element.style.color="red";
    element.classList.add("alert");
    element.style.fontSize= "14px";

    element.appendChild(infoIcon);
    element.appendChild(document.createTextNode(" "+message));

    input.parentElement.appendChild(element);
}

function removeAlert(input) {
    const parent = input.parentElement;
    const alert = parent.querySelector(".alert");
    if (alert)
        alert.remove();
}
