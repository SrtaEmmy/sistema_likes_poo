let xhr = new XMLHttpRequest();

// manejar respuesta
xhr.onreadystatechange = () =>{
    if (xhr.readyState === 4 && xhr.status === 200) {
        let respuestas = JSON.parse(xhr.response);

        if (Array.isArray(respuestas)) { //respuesta de GetLikesController
            respuestas.forEach(respuesta => {
                let show_likes = document.getElementById(`like${respuesta.idImg}`);
                show_likes.textContent = respuesta.likes;
            });
            
        }else{ //respuesta de UpdateLikeController
            let show_likes = document.getElementById(`like${respuestas.idImg}`);
            show_likes.textContent = respuestas.likes;
        }
        
    }
}

// solicitud ajax
const updateLike = (idImg, idUser)=>{
    xhr.open('POST', 'index.php?class=UpdateLike&method=update', true);
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
    xhr.send(`id_image=${idImg}&id_user=${idUser}`);
    
}

// solicitud ajax obtener todos los likes
const getAllLikes = ()=>{
    xhr.open('POST', 'index.php?class=GetLikes&method=getAll', true);
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
    xhr.send();
}

document.addEventListener('DOMContentLoaded', ()=>{
   getAllLikes();
});