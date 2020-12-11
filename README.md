<h1>EMS Ventura - Tech Challenge</h1>
<h2>Autor: Rickson Mickael Knop</h2>
<h2>Link: <a href="https://tech-challenge.knopstudio.com.br/">tech-challenge.knopstudio.com.br</a></h2>
<hr>
<p>Este projeto apresenta o valor de determinadas moedas em relação ao Real Brasileiro e também apresenta um gráfico dos últimos 10 dias com o valor de cada moeda.</p>
<hr>
<p>Na elaboração do projeto fora utilizado o Framework Laravel em sua versão Master (8.+)</p>
<p>Foram adicionadas duas bibliotecas externas ao sistema: jQuery e Chart.js.</p>
<ul>
    <li>jQuery foi utilizado para realizar requisições Ajax, atuando em conjunto e alimentando o Chart.js</li>
    <li>Chart.js foi utilizado para gerar o gráfico visual através do canvas html</li>
</ul>
<p>No quesito Cache e Produção, os seguintes comandos <i>artisan</i> foram aplicados:</p>
<ul>
    <li>php artisan config:cache</li>
    <li>php artisan route:cache</li>
    <li>php artisan view:cache</li>
    <li>php artisan clear-compiled</li>
    <li>php artisan optimize:clear</li>
    <li>npm run production</li>
    <li>composer install --optimize-autoloader --no-dev</li>
</ul>
<hr>
<h3>Sobre o desenvolvimento do projeto:</h3>
<p>O projeto foi elaborado através da instanciação de um Controller (ApiController) que foi responsável pela utilização da <i>facade</i> HTTP, que possibilitou a requisição dos dados da API em questão (<a target="_blank" href="https://docs.awesomeapi.com.br/api-de-moedas">https://docs.awesomeapi.com.br/api-de-moedas</a>).</p>
<p>Após a obtenção dos dados, foi retornada uma View (index) que passava como parâmetro todos os dados obtidos em JSON.</p>
<p>Com os dados disponíveis, foi possível elaborar o template utilizando laços de repetição nos campos de formulário.</p>
<p>O template foi criado utilizando conceitos de Flexbox CSS e foi viabilizado através do Laravel Mix.</p>
<p>Após organizar o template, foi inserido o canvas do Chart.js (modelo de <strong>Linhas</strong>) e foi alimentado através de requisições Ajax para a mesma API em questão. Também foram aplicados estilos e configurações básicas ao canvas.</p>
<p>O projeto fora hospedado em um servidor compartilhado da HostGator.</p>
<h4>Observações importantes:</h4>
<p>Apesar de concluído, o projeto apresenta falhas (relacionadas ao Chart.js e jQuery). Ocasionalmente, ao passar o cursor em cima da linha do gráfico, ele retoma a visão do gráfico da moeda anterior.</p>
<p>O primeiro <i>push</i> do projeto só ocorreu após a finalização do mesmo (todos commits saíram ao mesmo tempo).</p>
<p><strong>Não fora utilizado Docker nem fora realizado Controle de Qualidade no desenvolvimento do projeto</strong> (pois nunca trabalhei com estas mecânicas e tive receio de estragar a proposta).</p>
