/* 
    main.js
    Author: Jordan Hay
*/

// Expand/collapse mobile nav
function toggleNav() {

    var nav = document.getElementById("page-nav");

    if (nav.className === "") {
        nav.className += " mobile";
    } else {
        nav.className = "";
    }
}