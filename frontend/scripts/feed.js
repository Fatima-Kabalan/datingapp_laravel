let params = new URLSearchParams();
params.append("token" , localStorage.getItem("token"));
console.log(localStorage.getItem("token"));
window.onload = ()=>{
    axios.post("http://127.0.0.1:8000/api/v1/getUsers",params).then((res)=>{
    let users = res.data.matches;

    users.forEach(element => {
        interests.innerHTML+=`<div class="card">
        <img src="" alt="pic" style="width:100%">
        <h1>${element.name}</h1>
        <p>${element.gender}</p>
        <p>${element.age}</p>
        <p>${element.location}</p>
        <p>${element.preferred_gender}</p>
        <p>${element.bio}</p>
        <p><button>Contact</button></p>
        </div>`;
        
    });
        
        
        
        });
}



