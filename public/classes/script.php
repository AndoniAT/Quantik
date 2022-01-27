<?php
require_once("QuantikUIGenerator.php");
?>

<script type="text/javascript">
let body = document.querySelector("body");

let elem_blocked = document.getElementsByClassName('bouton_piece_blocked');

Array.prototype.forEach.call(elem_blocked, el => {
    el.style.opacity = 0.5;
  });

let images = document.querySelectorAll('.bouton_piece_blocked img');
Array.prototype.forEach.call(images, im => {
    im.addEventListener("mouseenter", function( event ) {
        im.style.width = '60px';
        im.style.height = '60px';
    });
});

let elem_enabled = document.querySelectorAll('.btn_turn img');
//console.log(elem_enabled);
Array.prototype.forEach.call(elem_enabled, el => {
    el.addEventListener("mouseenter", function( event ) {
        //alert('entra');
        event.target.style.width = '62px';
        event.target.style.height = '62px';
        event.target.style.opacity = '0.7px';
        event.target.style.transform = 'rotate(-5deg)';
        event.target.style.cursor = 'pointer';
    }, false);

    el.addEventListener("mouseout", function( event ) {
        event.target.style = '60px';
        event.target.style.height = '60px';
        event.target.style.opacity = '1px';
        event.target.style.transform = 'rotate(0deg)'; 
      }, false);
});

let elem_none = document.querySelectorAll('.piece_form_container form .none');
Array.prototype.forEach.call(elem_none, im => {
    let parent = im.parentNode;
    parent.disabled = true;
    parent.style.border = 'none';
    im.style.opacity = '0.6';
    console.log(parent);

            im.addEventListener("mouseenter", function( event ) {
            event.target.style = '60px';
            event.target.style.height = '60px';
            im.style.opacity = '0.6';
            event.target.style.transform = 'rotate(0deg)'; 
            
        }, false);

        im.addEventListener("mouseout", function( event ) {
            event.target.style = '60px';
            event.target.style.height = '60px';
            event.target.style.transform = 'rotate(0deg)'; 
            im.style.opacity = '0.6';
        }, false);
});

let elem_none_tab = document.querySelectorAll('.plateau_conteneur .none');
Array.prototype.forEach.call(elem_none_tab, im => {
    im.setAttribute('src', '../img/vide.png');
});

</script>



