var carContainer = document.getElementById("car-info");
var carArray = [];

async function getData() {
  // Load Array of cars
  const request = await fetch("http://localhost:3000/rentalCars");
  const data = await request.json();
  carArray = data;
  console.log(data);
  renderHTML(data);
}

function renderHTML(data) {
  var htmlString = "";

  for (i = 0; i < data.length; i++) {
    htmlString += '<div id="' + data[i].id + '" class="cars_card">';

    htmlString += '<div class="car_image">';
    htmlString +=
      '<img src="' + data[i].image + '" alt= " ' + data[i].model + ' ">';
    htmlString += "</div>";

    htmlString +=
      "<h1>" +
      data[i].brand +
      " " +
      data[i].model +
      " " +
      data[i].modelYear +
      "</h1>";

    htmlString += '<div class="car_deets">';
    htmlString += "<h2> Fuel Type </h2>";
    htmlString += "<h2> Milage (Kms) </h2>";
    htmlString += "<h2> Seats </h2>";
    htmlString += "<p>" + data[i].fuelType + "</p>";
    htmlString += "<p>" + data[i].milage + "</p>";
    htmlString += "<p>" + data[i].seats + "</p>";
    htmlString += "</div>";

    htmlString += '<div class="car_description">';
    htmlString += "<p>" + data[i].description + "</p>";
    htmlString += "</div>";

    htmlString += '<div class="car_price">';
    htmlString += "<h2> $" + data[i].pricePerDay + " / day </h2>";
    htmlString += "</div>";

    if (data[i].available == true) {
      htmlString += '<div class="btn_wrapper">';
      htmlString +=
        '<input class="reservation_btn" type="submit" value="Book Now">';
      htmlString += "</div>";
    } else {
      htmlString += '<div class="btn_wrapper">';
      htmlString +=
        '<input class="unavailable_btn" type="submit" value="Unavailable">';
      htmlString += "</div>";
    }

    htmlString += "</div>";
  }
  carContainer.insertAdjacentHTML("beforeend", htmlString);

  carContainer
    .querySelectorAll(".btn_wrapper input")
    .forEach(function (button) {
      button.addEventListener("click", function (event) {
        var carId = event.target.parentNode.parentNode.id;
        var car = carArray.find(function (car) {
          return car.id == carId;
        });

        if (!car.available) {
          alert("Sorry, the car is not available now. Please try other cars!");
          return;
        }

        fetch("rentalCart/retrieveData.php", {
          method: "POST",
          body: JSON.stringify(car),
          headers: {
            "Content-Type": "application/json",
          },
        });

        alert("You have successfully added a car to your reservation!");
      });
    });
}

getData();
