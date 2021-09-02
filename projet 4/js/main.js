//Bouton suivant/précédent des chapitres

//instanciation des variables
const slides = document.querySelectorAll(".message");
let backButton = document.querySelector("#back");
let nextButton = document.querySelector("#next");

//instanciation d'un nouvel Objet Button
let Button_1 = new Button(slides,backButton,nextButton);
