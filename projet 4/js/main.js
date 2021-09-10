//bouton connection admin disparait si un admin est connecté

let connection_admin = document.getElementById("#button_admin");
let deconnection_admin = document.getElementById("#button_deconnection");

if(deconnection_admin){
    connection_admin.style.display = "none";
}



