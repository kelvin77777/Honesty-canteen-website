document.getElementById('menu-icon').addEventListener('click', function() {
    var navbar = document.getElementById('navbar');
    var menuIcon = document.getElementById('menu-icon');
    var content = document.querySelector('.content');

    if (navbar.style.width === '250px') {
        navbar.style.width = '0';
        menuIcon.style.left = '15px';
        content.style.paddingLeft = '0';
    } else {
        navbar.style.width = '250px';
        menuIcon.style.left = '265px';
        content.style.paddingLeft = '250px';
    }
});
