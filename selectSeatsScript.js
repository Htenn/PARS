const container = document.querySelector(".container");
const seats = document.querySelectorAll(".row .seat:not(.sold)");

populateUI();

// Update total and count
function updateSelectedCount() {
    const selectedSeats = document.querySelectorAll(".row .seat.selected");

    const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));

    localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));

    // an algorithm to get id of seats
    const ids = $(".seat.selected").map(function() {
        return this.id;
    }).get();  // put into array the divs that contain "seat" and "selected" classes
    // $('#text').text(ids.join(',')); // output to div containing the div id = 'test'

    // another algorithm for getting seats based on class
    var seatSelection = [];
    document.querySelectorAll(".seat.selected").forEach(item => {
        seatSelection.push(item.innerHTML);
    });

    const jsondata = JSON.stringify(ids);
}

function populateUI() {
    const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));

    if (selectedSeats !== null && selectedSeats.length > 0) {
        seats.forEach((seat, index) => {
            if (selectedSeats.indexOf(index) > -1) {
                console.log(seat.classList.add("selected"));
            }
        });
    }
}

// Seat click event
container.addEventListener("click", (e) => {
    if (
        e.target.classList.contains("seat") &&
        !e.target.classList.contains("sold")
    ) {
        e.target.classList.toggle("selected");

        updateSelectedCount();
        document.write("hello");
    }
});

//initial count and total set
updateSelectedCount();