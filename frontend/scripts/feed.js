let params = new URLSearchParams();
params.append("token" , localStorage.getItem("token"));
console.log(localStorage.getItem("token"));

    axios.post("http://127.0.0.1:8000/api/v1/getUsers",params).then((res)=>{
    let users = res.data.matches;

    if(res.data){
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
            <span class="material-symbols-outlined new"  id="${element.id}">favorite</span>
            <span class="material-symbols-outlined"  id="chat_${user_id}">chat_bubble</span>
            </div>`;
        });
    const fav = document.querySelectorAll(".new");

    fav.forEach(element => {
    let param = new URLSearchParams();
    param.append("token" , localStorage.getItem("token"));
    param.append("favorite_id" , element.getAttribute("id"));
        element.onclick=()=>{
                axios.post("http://127.0.0.1:8000/api/v1/addFavorites",param).then((res)=>{
                    console.log(res);
                });
        };
    });
    }


});



   

