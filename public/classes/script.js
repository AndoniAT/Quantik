let elem_blocked = document.getElementsByClassName('bouton_piece_blocked');

Array.prototype.forEach.call(elem_blocked, el => {
    el.style.opacity = 0.5;
  });

let images = document.querySelectorAll('.bouton_piece_blocked img');
Array.prototype.forEach.call(images, im => {
    im.addEventListener("mouseenter", function( event ) {
        im.style.width = '30px';
        im.style.height = '30px';
    });
});

let elem_enabled = document.querySelectorAll('.btn_turn img');
console.log(elem_enabled);
Array.prototype.forEach.call(elem_enabled, el => {
    el.addEventListener("mouseenter", function( event ) {
        //alert('entra');
        event.target.style.width = '32px';
        event.target.style.height = '32px';
        event.target.style.opacity = '0.7px';
        event.target.style.transform = 'rotate(-5deg)';
    }, false);

    el.addEventListener("mouseout", function( event ) {
        event.target.style = '30px';
        event.target.style.height = '30px';
        event.target.style.opacity = '1px';
        event.target.style.transform = 'rotate(0deg)'; 
      }, false);
});