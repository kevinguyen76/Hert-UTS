var checkoutBtn = document.getElementById("checkoutButton");

// When user clicks Checkout button
// Check if there are items in the cart
// If there are no items in the cart, redirect to home page
// If there are items in the cart
// 1. Find all the inputs
// 2. Check the .value of the inputs is greater than 0
// 3. If one of the inputs is less than 0, alert the user that the input is invalid
// 4. If all the inputs are valid, redirect to checkout page

// docuemnt.querySelectorAll("input[name='rentalPeriod']").forEach(checkValue)

checkoutBtn.addEventListener("click", function () {
  if (document.querySelector(".view-car-cart").childElementCount === 0) {
    window.location.href = "../index.php";
  } else {
    var inputs = document.querySelectorAll("input[name='rentalPeriod']");
    var isValid = true;
    inputs.forEach(function (input) {
      if (input.value < 1) {
        isValid = false;
      } else {
        isValid = true;
      }
    });
    if (isValid) {
      window.location.href = "../checkoutForm/checkout.php";
    } else {
      alert("Please enter a valid number of days");
    }
  }
});
