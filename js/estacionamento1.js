/*document.querySelectorAll('.vagas-container').forEach(available => {
    available.addEventListener('click', () => {
        const spot = available.getAttribute('data-spot');
        // Redirecionar para a página de reserva com o parâmetro da vaga
        window.location.href = "../html/reserva.html";
    });
}); */


document.addEventListener('DOMContentLoaded', () => {
    loadSpots();
    setupEventListeners();
});

function loadSpots() {
    const spots = document.querySelectorAll('.vagas-container');
    spots.forEach(spot => {
        const spotId = spot.getAttribute('data-spot');
        if (localStorage.getItem(spotId) === 'true') {
            spot.classList.add('unavailable');
        }
    });
}

function saveSpot(spotId) {
    localStorage.setItem(spotId, 'true');
    console.log(localStorage);
}

function handleSpotClick(event) {
    const spot = event.target;
    if (!spot.classList.contains('unavailable')) {
        const spotId = spot.getAttribute('data-spot');
        spot.classList.add('unavailable');
        saveSpot(spotId);

        // Redireciona para reserva.html
        window.location.href = 'reserva.html?spot='+ spotId;
    }
}

function setupEventListeners() {
    const spots = document.querySelectorAll('.vagas-container');
    spots.forEach(spot => {
        spot.addEventListener('click', handleSpotClick);
    });
}
