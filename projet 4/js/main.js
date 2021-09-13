// Supression du bouton connection si on est déja connecté
let button_connection = document.getElementById('button_connection');
let button_deconnection = document.getElementById('button_deconnection');
button_deconnection.style.display = 'block';

if(button_deconnection.style.display == "block"){
    button_connection.style.display = 'none';
}    

