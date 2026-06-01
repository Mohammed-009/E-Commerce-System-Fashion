let cartItems = [];
let cartCount = 0;

function addToCart(product) {
  cartCount++;
  document.getElementById('cart-count').innerText = cartCount;
  cartItems.push(product);
}

function cartToggle() {
  let cart = document.getElementById('cart');
  let cartlayout = document.getElementById('cart-layout');
  
  if (cart.style.display === 'block') {
    cart.style.display = 'none';
    cartlayout.style.display = 'none';
  } else {
    renderCartItems();
    cart.style.display = 'block';
    cartlayout.style.display = 'block';
  }
}

function renderCartItems() {
  let cartItemsList = document.getElementById('cart-items');
  cartItemsList.innerHTML = '';
  cartItems.forEach((item, index) => {
    let li = document.createElement('li');
    li.textContent = item;
    let deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.onclick = function() {
      removeFromCart(index);
    };
    li.appendChild(deleteButton);
    cartItemsList.appendChild(li);
  });
}

function removeFromCart(index) {
  cartItems.splice(index, 1);
  cartCount--;
  document.getElementById('cart-count').innerText = cartCount;
  renderCartItems();
}

function clearCart() {
  cartItems = [];
  cartCount = 0;
  document.getElementById('cart-count').innerText = cartCount;
  renderCartItems();
}



// leaflet js
var map = L.map('map').setView([-4.043740, 39.658871], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);