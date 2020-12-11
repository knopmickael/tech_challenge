<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EMS Ventura - Tech Challenge</title>
    <meta name="author" content="Rickson Mickael Knop">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>
<body>

    <div class="content">

        <div class="leftData">

            <p>1 <span id="moedaNome">{{ $moedas["USD"]["name"] }}</span> equivale a</p>
            <h1 id="moedaBid">{{ floatval($moedas["USD"]["bid"]) . ' Reais Brasileiros'}}</h1>
            <p><small>{{date("d M - H:i - e")}}</small></p>

            <form>
                <select name="moedaNome" onchange="alterarMoeda(this.value)">
                    @foreach ($moedas as $moeda)
                        {{-- Aqui, estou enviando mais de um valor no formulário para a mesma option --}}
                        <option value="{{ $moeda["name"] }}-{{ $moeda["bid"] }}-{{ $moeda["code"] }}">
                            {{ $moeda["name"] }}
                        </option>
                    @endforeach
                </select>
            </form>

        </div>

        <div class="rightData">

            <div class="grafico">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>

        </div>

    </div>

    <span class="info">Gráfico baseado nos últimos 10 dias *</span>

    <script>

        carregarGrafico('USD');

        function alterarMoeda(dadosMoeda) {
            let moedaBid = document.getElementById("moedaBid");
            let moedaNome = document.getElementById("moedaNome");
            let array = dadosMoeda.split('-'); // Aqui, separo os valores recebidos através do hífen
            moedaNome.innerHTML = array[0];
            if (parseFloat(array[1])>1) {
                moedaBid.innerHTML = array[1] + ' Reais Brasileiros'; // Aqui, se for maior que 1 real >> plural
            } else {
                moedaBid.innerHTML = array[1] + ' Real Brasileiro'; // Aqui, se for menor que 1 real >> singular
            }
            carregarGrafico(array[2]);
        }

        function carregarGrafico(moedaCode) {
            $.ajax({
                type: 'GET',
                url: 'https://economia.awesomeapi.com.br/json/daily/'+moedaCode+'-BRL/10',
                data: {
                    format: 'json'
                },
                dataType: 'json',
                error: function() {
                    $('.grafico').html('<p>Erro ao carregar o gráfico.</p>');
                },
                success: function(dados) {
                    let data = new Date;
                    var ctx = document.getElementById('myChart');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: [
                                data.getDate()-9 + '/' + (data.getMonth()+1),
                                data.getDate()-8 + '/' + (data.getMonth()+1),
                                data.getDate()-7 + '/' + (data.getMonth()+1),
                                data.getDate()-6 + '/' + (data.getMonth()+1),
                                data.getDate()-5 + '/' + (data.getMonth()+1),
                                data.getDate()-4 + '/' + (data.getMonth()+1),
                                data.getDate()-3 + '/' + (data.getMonth()+1),
                                data.getDate()-2 + '/' + (data.getMonth()+1),
                                'Ontem',
                                'Hoje'],
                            datasets: [{
                                data: [

                                    // Eu gostaria de ter utilizado laços de repetição, mas não obtive sucesso

                                    // dados.forEach(element => {
                                    //     parseFloat(element.bid)
                                    // })

                                    // for (let index = 0; index < dados.length; index++) {
                                    //     dados[0].bid
                                    // }

                                    dados[9].bid,
                                    dados[8].bid,
                                    dados[7].bid,
                                    dados[6].bid,
                                    dados[5].bid,
                                    dados[4].bid,
                                    dados[3].bid,
                                    dados[2].bid,
                                    dados[1].bid,
                                    dados[0].bid
                                ],
                                backgroundColor: [
                                    'rgba(0, 255, 0, 0.5)'
                                ],
                                borderWidth: 2,
                                borderColor: 'green'
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },
                            legend: {
                                display: false
                            }
                        }
                    });
                }
            });
        }

    </script>

</body>
</html>
