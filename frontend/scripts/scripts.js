const signupPopupBtn = document.getElementById("signup");
const signupPopup = document.getElementById("signup-popup");
const closeBtn = document.getElementById("close");
const signupBtn = document.getElementById("signup-btn");
const signinBtn = document.getElementById("signin-btn");



if (typeof signupPopup.showModal !== 'function') {
    signupPopup.hidden = true;
}

window.onload = () => {
    if (localStorage.getItem("userId") != null) {
        window.location.href = "./signup.html";
    }
}

// Event listeners functions
const openSignupPopup = () => {
    signupPopup.showModal();
    signupPopup.classList.toggle("hide");
}

const closeSignupPopup = () => {
    signupPopup.close();
    signupPopup.classList.add("hide");
}


// Event listeners
signupPopupBtn.addEventListener("click", openSignupPopup);
closeBtn.addEventListener("click", closeSignupPopup);
