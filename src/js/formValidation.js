let form = document.getElementById("form");

let inputs = [];
let inputNome = document.getElementById("nome");
let inputEmail = document.getElementById("email");

inputs.push(inputNome);
inputs.push(inputEmail);



form.addEventListener("submit", (e) => {
    e.preventDefault();
    removeMsgs(e.target);

    let enviar = true;

    inputs.forEach((input) => {
        result = checkInput(input);
        if(result == false) {
            enviar = false;
        }
    });


    if(enviar == true) {
        form.submit();
    } else {

    }
    
});



function checkInput(input) {
    requirements = input.getAttribute("data-requirements").split(",");

    for(let i = 0; i < requirements.length; i++) {
        let requirement = requirements[i];
        switch(requirement) {
            case "required":
                if(input.value == "") {
                    let msg = "Campo não pode ser vazio!";
                    addMsg(input, msg);
                    return false;
                }
                break;
        }

        return true;
    }
}


function addMsg(input, msg) {
    let divMsg = document.createElement("div");

    divMsg.classList.add("invalid-feedback");
    divMsg.innerHTML = msg;

    let inputGroup = input.closest(".input-group");
    let formFloating = input.closest(".form-floating");

    formFloating.classList.add("is-invalid");
    input.classList.add("is-invalid");
    inputGroup.appendChild(divMsg);
    

}


function removeMsgs(form) {
    form.querySelectorAll(".invalid-feedback").forEach((item) => {
        item.remove();
    });

    form.querySelectorAll(".is-invalid").forEach((item) => {
        item.classList.remove("is-invalid");
    });
}