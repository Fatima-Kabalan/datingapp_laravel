const interests = document.getElementById("interests");


let params = new URLSearchParams();
params.append("token" , localStorage.getItem("token"));
console.log(localStorage.getItem("token"));
window.onload = ()=>{
    axios.post("http://127.0.0.1:8000/api/v1/getFavoriteUsers",params).then((res)=>{
    let users = res.data.favorites;
console.log(res);
    users.forEach(element => {
        let user_id = element.id;
        interests.innerHTML+=`<div class="card">
        <img src="" alt="pic" style="width:100%">
        <h1>${element.name}</h1>
        <p>${element.gender}</p>
        <p>${element.age}</p>
        <p>${element.location}</p>
        <p>${element.preferred_gender}</p>
        <p>${element.bio}</p>
        <span class="material-symbols-outlined" id="fav_${user_id}">favorite</span>
        <span class="material-symbols-outlined" id="chat_${user_id}">chat_bubble</span>
        </div>`;
    });

});
}

    

