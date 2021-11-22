
// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';
import "tailwindcss/tailwind.css"


// à externaliser
let submitComm = document.getElementById('submit_com');
let commentaire = document.getElementById('commentaire');
submitComm.onclick = function () {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", 'https://127.0.0.1:8000/issue/comment/new', true);

    //Envoie les informations du header adaptées avec la requête
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() { //Appelle une fonction au changement d'état.
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // Requête finie, traitement ici.
            /**
             * TODO : Update comments body with ajax
             *
             */
        }
    }

    xhr.send("content=" + commentaire.value + "&issue=" + commentaire.dataset.issue);
};
