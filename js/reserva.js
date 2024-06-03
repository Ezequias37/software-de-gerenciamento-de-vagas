function validarCampos() {
    const modelo = document.getElementById('modelo').value.trim();
    const placa = document.getElementById('placa').value.trim();
    const dataReserva = document.getElementById('dataReserva').value.trim();
    const horarioReserva = document.getElementById('horarioReserva').value.trim();
    const tempoReserva = document.getElementById('tempoReserva').value.trim();

    if (!modelo || !placa || !dataReserva || !horarioReserva || !tempoReserva) {
        alert('Por favor, preencha todos os campos.');
        return false; 
    }

    if (placa.length !== 7) {
        alert('A placa deve conter exatamente 7 caracteres.');
        return false;
    }

    window.location.href = '../html/areaPagamento.html';

    return false;
}