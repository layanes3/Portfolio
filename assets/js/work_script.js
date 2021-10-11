


window.onload = function() 
{
    let elem = document.querySelector('.grid');
    let msnry = new Masonry( elem, {
      // options
      itemSelector: '.grid-item',
      columnWidth: 200,
      gutter: 10,
    });
     
    ScrollReveal().reveal('.headline');
}


//ScrollReveal().reveal('.headline');