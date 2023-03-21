photo.onchange = evt => {
    let file = photo.files[0];
    
    if (file)
        someImg.src = URL.createObjectURL(file); 
}


async function getUsers(){
    let res = await fetch("http://localhost/api/v1/notebook");
    let users = await res.json();

    document.querySelector(".user-list").innerHTML = '';
    users.forEach((user) => {
        document.querySelector(".user-list").innerHTML += `
        <div class="card" style="...">
            <div class="card-body">
                <h6 class="card-name">${user.name}</h6>
                <p class="card-telephoone">${user.telephone}</p>
                <p class="card-email">${user.email}</p>
                <p class="card-birthday">${user.birthday}</p>
                <img src="data:image/*;base64, ${user.photo}" height: 200px; width: 200px;'/><br>
                <a href="#" class="card-but" onclick = "deleteUser(${user.id})">Удалить</a>
            </div>
        </div>
        `
    });
}


async function deleteUser(id){
    const res = await fetch(`http://localhost/api/v1/notebook/${id}`, {
        method: "DELETE"
    });
    const data = await res.json();
    await getUsers();
}

getUsers();