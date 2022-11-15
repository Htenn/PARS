const container = document.querySelector(".container");
const seats = document.querySelectorAll(".row .seat:not(.sold)");

// Update total and count


// Seat click event
container.addEventListener("click", (e) => {
    if (
        e.target.classList.contains("seat") &&
        !e.target.classList.contains("sold")
    ) {
        e.target.classList.toggle("selected");

        updateSelectedCount();
    }
});

function updateSelectedCount() {
    const selectedSeats = document.querySelectorAll(".row .seat.selected");

    const seatsIndex = $(".row .seat.selected").map(function() {
        return this.id;
    }).get();
}