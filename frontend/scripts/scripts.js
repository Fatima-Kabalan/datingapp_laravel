
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

let signAPI = "http://127.0.0.1:8000/api/login";

signinBtn.onclick = (e)=>{
    e.preventDefault();
    let enteredemail = document.getElementById("email-signin").value
    let enteredpassword = document.getElementById("password-signin").value
    if(enteredemail && enteredpassword){
        signIn(enteredemail,enteredpassword);
    }
}

const signIn = (email,password) => {

   let payload = { email : email, password: password};
   console.log("payload: ", payload)
   axios.post(signAPI,payload)
   .then((response) => {

        if(response.data.status == "success"){
            window.location.replace("feed.html");
        }
   }
    )
    .catch((error) => console.log(error))
}