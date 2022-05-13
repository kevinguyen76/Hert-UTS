var homeBtn = document.getElementById("homeBtn");
var viewCartBtn = document.getElementById("viewCartBtn");

homeBtn.addEventListener("click", function () {
  window.location.href = "../index.php";
});

viewCartBtn.addEventListener("click", function () {
  window.location.href = "../rentalCart/cart.php";
});
