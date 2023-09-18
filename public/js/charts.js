document.addEventListener("DOMContentLoaded", function (e) {


    const despesasMensais = new Chart(document.querySelector("#despesasMensais"), {
        type: "bar",
        data: {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Maio', 'Jun'],
            datasets: [{
                label: 'Valor: R$',
                data: [4750, 5500, 6200, 5000, 4250, 4800],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const despesasCategorias = new Chart(document.querySelector("#despesasCategoria"), {
        type: "doughnut",
        data: {
            labels: ['Saúde', 'Alimentação', 'Educação', 'Automobilistica'],
            datasets: [{
                label: "Qtd de Despesas: ",
                data: [2, 5, 3, 2]
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

});

