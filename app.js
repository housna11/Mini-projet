
const projets=document.querySelector(".projects")
function afficher(){ 
projets.innerHTML = ""; 
axios.get("http://localhost:4000/card").then(res=>
    
    res.data.forEach(element => {
        
       let div=document.createElement("div")
       div.classList.add("card") 
       div.innerHTML=`<img src="${element.url}" alt="Portrait Urbain">
        <div class="card-body">
          <p class="card-title">${element.titre}</p>
          <p class="card-text">${element.description}</p>
          <button class="delete-btn" onclick="supprimer('${element.id}')">🗑️</button>
        </div>`
       projets.appendChild(div);
    })
)
}
afficher()
const form=document.getElementById("form")
form.addEventListener("submit",function(event){ 
event.preventDefault();
const nouveauCarde = {
  titre: form.titre.value,
  description: form.description.value,
  url: form.url.value
}
axios.post("http://localhost:4000/card",nouveauCarde).then(res=>res.data)
afficher();

  
})

function supprimer(id) {
  axios.delete(`http://localhost:4000/card/${id}`)
    .then(res => {
      console.log(res.data);
      afficher();    
    })
    
}

