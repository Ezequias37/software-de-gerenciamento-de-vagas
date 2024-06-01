document.querySelectorAll('.vagas-container').forEach(available => {
    available.addEventListener('click', () => {
        const spot = available.getAttribute('data-spot');
        // Redirecionar para a página de reserva com o parâmetro da vaga
        window.location.href = "reserva.html";
    });
});
/*
document.querySelectorAll('.vagas-container').forEach(item => {
    item.addEventListener('click', () => {
        const url = item.getAttribute('data-spot');
        if (url) {
            window.location.href = url;
        }
    });
});*/
