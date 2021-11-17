const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("left-panel-active");
    goTo("", "", 'register');
    clearErrorMessage()
});

signInButton.addEventListener('click', () => {
    container.classList.remove("left-panel-active");
    goTo("", "", 'login');
    clearErrorMessage()
});

switch(window.location.href.split('/').pop()) {
    case "login":
        container.classList.remove("left-panel-active");
        break;
    case "register":
        container.classList.add("left-panel-active");
        break;
    default:
}

function goTo(page, title, url) {
    if ("undefined" !== typeof history.pushState) {
        history.pushState({page: page}, title, url);
    } else {
        window.location.assign(url);
    }
}

function clearErrorMessage() {
    let errorMessages = document.querySelectorAll(".error-message");
    errorMessages.forEach((i) =>{
        i.innerHTML =""
    });
}
