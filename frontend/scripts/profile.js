

const signupPopupBtn = document.getElementById("edit");
const signupPopup = document.getElementById("signup-popup");
const closeBtn = document.getElementById("close");
const signupBtn = document.getElementById("signup-btn");
const signinBtn = document.getElementById("signin-btn");
const interests = document.getElementById("interests");
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


let signUpAPI = "http://127.0.0.1:8000/api/v1/editProfile";

signupBtn.onclick = (e)=>{
    e.preventDefault();
    let enteredemail = document.getElementById("email-input").value
    let enteredpassword = document.getElementById("password-input").value
    let enteredname = document.getElementById("name-input").value
    let enteredage = document.getElementById("age-input").value
    let enteredgender = document.getElementById("gender-input").value
    let enteredintreset = document.getElementById("preferred_gender").value
    let enteredlocation = document.getElementById("location-input").value

        signUp(enteredemail,enteredpassword,enteredname,enteredage,enteredgender,enteredintreset,enteredlocation);

}

const signUp = (email,password,name,age,gender,intreset,location) => {

   let payload = { email: email, password: password , name: name , gender: gender , preferred_gender: intreset , location: location , age: age , token:localStorage.getItem("token")} 
   console.log("payload: ", payload)
   axios.post(signUpAPI,payload)
   .then((response) => {

    console.log(response);
     window.location.reload();

   }
    )
    .catch((error) => console.log(error))
}

