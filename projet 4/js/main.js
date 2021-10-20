// Supression du bouton connexion si on est déja connecté
let button_connexion = document.getElementById('button_connexion');
let button_deconnexion = document.getElementById('button_deconnexion');
button_deconnexion.style.display = 'block';

if(button_deconnexion.style.display == "block"){
    button_connexion.style.display = 'none';
}    

