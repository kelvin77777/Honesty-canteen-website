function toggleNav() {
    var nav = document.getElementById("mySidenav");
    var content = document.querySelector(".content");
    var menuToggle = document.querySelector(".menu-toggle");

    if (nav.style.width === "250px") {
        closeNav();
    } else {
        openNav();
    }
}

function openNav() {
    var nav = document.getElementById("mySidenav");
    var menuToggle = document.querySelector(".menu-toggle");

    nav.style.width = "250px";
    menuToggle.style.marginLeft = "250px";
}

function closeNav() {
    var nav = document.getElementById("mySidenav");
    var menuToggle = document.querySelector(".menu-toggle");

    nav.style.width = "0";
    menuToggle.style.marginLeft = "0";
}

function addToCart(itemName, itemPrice) {
    var cartItems = document.getElementById("cart-items");
    var cartItem = document.createElement("div");
    cartItem.className = "cart-item";
    cartItem.innerHTML = '<span>' + itemName + '</span><span>Rp. ' + itemPrice + '</span>';
    cartItems.appendChild(cartItem);

    // Hitung total belanja saat menambahkan item
    calculateTotal();
}

function calculateTotal() {
    var cartItems = document.getElementsByClassName("cart-item");
    var totalAmount = 0;

    for (var i = 0; i < cartItems.length; i++) {
        var priceText = cartItems[i].getElementsByTagName("span")[1].innerText;
        var price = parseInt(priceText.replace("Rp. ", ""));
        totalAmount += price;
    }

    document.getElementById("total-amount").textContent = "Rp. " + totalAmount;
}

function checkoutCart() {
    var totalAmount = document.getElementById("total-amount").textContent;
    alert("Anda telah melakukan checkout dengan total belanja " + totalAmount);
}

function redirectToLogin() {
    window.location.href = "{{ route('login') }}";
}
