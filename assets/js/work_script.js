


window.onload = function() 
{
    let elem = document.querySelector('.grid');
    // let msnry = new Masonry( elem, {
    //   // options
    //   itemSelector: '.grid-item',
    //   columnWidth: 200,
    //   gutter: 10,
    // });
     
    // ScrollReveal().reveal('.headline');

    // Références JavaScript aux éléments du DOM
    document.getElementById("boutonVolet_p1").addEventListener('click', ouvreFermeVolet);
}


//ScrollReveal().reveal('.headline');


    /*
* --------------------------------
* Ouverture et fermeture du volet
* ---------------------------------
*/


// Fonction : ouvre / ferme le volet
function ouvreFermeVolet(){
    let volet = document.getElementById("voletGauche_p1");
  volet.classList.toggle("ouvert");

};
