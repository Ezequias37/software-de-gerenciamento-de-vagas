<h1>Estacione bem</h1>
<h2>Especificação de requisitos</h2>
<b>1. Introdução</b><br><br>
<b>1.1. Propósito do Documento de Requisitos</b>
<p>Este documento descreve os requisitos para o desenvolvimento de um aplicativo de controle de estacionamento. O aplicativo visa facilitar a gestão e monitoramento dos espaços de estacionamento em um determinado local.
</p>
<b>1.2. Público Alvo</b>
<p>Usuários que possuem veículos automotores.
</p>
<b>2. Descrição Geral do Produto</b>
<p>O objetivo do software seria garantir ao estabelecimento segurança aos usuários, ofertando um lugar seguro, e sua funcionalidade seria: agendamento de horário, cadastramento de usuários, pagamento diários, mensal, e quinzenal, e o nosso público seria proprietário de veículos automotores, a necessidade de implementação seria agilidade ao escolher o local e segurança da implementação.</p>
<b>2.1. Situação Atual</b>
<p>Percebemos a necessidade de um sistema, devido a dificuldade de encontrar estacionamento capazes de dar um conforto ao usuário quanto a segurança, agilidade e confiabilidade e também a modalidade de reserva antecipada.</p>
<b>2.2. Objetivos do Produto </b>
<p>O software irá resolver a dificuldade de encontrar vagas próximas ao destino do usuário, trazendo assim a comodidade de reserva dentro do conforto de sua casa.</p>
<b>2.3. Benefícios do Projeto </b><br>
- Agendamento prévio;<br>
- Conforto;<br>
- Segurança;<br>
- Praticidade;<br>
- Pagamento pelo App;<br><br>
<b>3. Requisitos Específicos</b><br><br>
<b>3.1. Requisitos Funcionais</b><br>
RF 01- Registro de Usuários: O sistema deve permitir que os usuários se cadastrem com nome, e-mail e senha.<br>
RF 02- Recuperação de senha: o sistema deve haver opção para recuperação de senha.<br>
RF 03- Visualização: O sistema deverá permitir a visibilidade de vagas. <br>
RF 04-Reservas de vagas: O sistema deverá permitir a reserva de uma vaga por um determinado período de tempo.<br>
RF 05- Confirmação de vaga:O sistema enviará e-mail de confirmação.<br>
RF 06- Check-in: O sistemas deve permitir fazer check-in ao ocupar uma vaga. <br>
RF 07-Check-out: O sistema deve permitir fazer check-out ao liberar uma vaga.<br>
RF 08-Calculo do Pagamento: O sistema deve calcular e registrar o tempo de permanência do veículo.<br>
RF 09- calculo do valor: O sistema deve calcular o valor do estacionamento com base no tempo de permanência.<br>
RF 10- Pagamento: o sistema deverá permitir o pagamento através do aplicativo.<br>
RF 11- Recebimento: O sistema enviará um recibo por e-mail após o pagamento.<br>
RF 12- Histórico de Estacionamento: O sistema deve disponibilizar o histórico de estacionamento e pagamentos.<br><br>
<b>3.2. Requisitos Não Funcionais</b><br>
RNF 01- Desempenho: O sistema deve ser capaz de lidar com um grande volume de usuários simultaneamente.<br>
RNF 02-Desempenho: O sistema deve ser rápido na resposta aos usuário, especialmente durante o processo de reserva e pagamento.<br>
RNF 03- Segurança: o sistema deve usar transações seguras e criptografadas.<br>
RNF 04-O Criptografia: O sitema deve manter informações dos usuários restrito e protegido..<br>
RNF 05- Usabilidade: o sistema deve ter interface do aplicativo intuitiva e fácil de usar.<br>
RNF 06-Responsividade: O sistema deve ser responsivo e funcionar bem em dispositivos móveis.<br><br>
<b>3.3. Regras de Negócio</b><br>
RN 01- Tarifas de Estacionamento: o sistema deverá calcular a tarifa de estacionamento base no tempo de permanência do veículo por 1h com tolerância de 5 min para atrasos.
O preço por hora será definido pela administração do estacionamento.<br>
RN 02- Reservas e Cancelamentos:
As reservas só serão válidas se forem confirmadas pelo usuário através do pagamento.
Os usuários podem cancelar uma reserva até 15 minutos antes do horário de check-in.<br>
RN 03- Responsabilidade do Usuário:
Os usuários são responsáveis por garantir que as informações de seu veículo estejam corretas durante o check-in.
Os usuários devem respeitar as regras e regulamentos do estacionamento.<br><hr>

<h2>História de usuário para o usuário  do estacionamento</h2>
<ul>
  <h3>Grau de complexidade</h3>
  <table> 
  <tr>
    <th> Dificil</th> 
    <th>Médio</th>
      <th>Fácil</th>
  </tr>
  <tr>
    <th> &#128557;</th> 
    <th>&#128517;</th>
      <th>&#128513;</th>
   </tr>

  </table>
  
 <h3>1) Registro de usuário</h3>
<p><b>Como/Sendo:</b> usuário </p>
<p><b>Quero/Posso:</b> me cadastrar no aplicativo fornecendo meu nome, e-mail e senha </p>
<p><b>Para:</b> utilizar os serviços de reserva de vagas de estacionamento </p></br>


<h3>Cenário de aceitação:</h3>

<p><b>Dado que:</b> estou na tela de registro do aplicativo </p>
<p><b>Quando:</b> preencho todos os campos obrigatórios com informações válidas </p>
</p><b>E:</b> clico no botão de cadastro <p>
<p><b>Então:</b> devo receber uma confirmação via e-mail de que meu cadastro foi realizado com sucesso. </p></br>
 
 <p>Grau de complexidade &#128557;</p> 

<h3>2) Reserva de vaga de estacionamento</h3>
<p><b>Como/Sendo:</b> usuário </p>
<p><b>Quero/Posso:</b> poder reservar uma vaga de estacionamento por um período específico de tempo através do aplicativo </p>
<p><b>Para:</b>  garantir um local para guardar meu carro</p></br>
 
  
<h3>Cenário de aceitação:</h3>
<p><b>Dado que:</b> estou na tela de visualização de vagas de estacionamento </p>
<p><b>Quando:</b> escolho uma vaga disponível e seleciono o período de reserva desejado </p>
</p><b>E:</b> confirmo a reserva <p>
<p><b>Então:</b> devo receber um e-mail de confirmação da reserva. </p></br>
</li>
<p>Grau de complexidade &#128517; </p> 


<h3>3) Check-in no estacionamento</h3>
  <p><b>Como/Sendo:</b> usuário </p>
<p><b>Quero/Posso:</b> fazer check-in no aplicativo ao ocupar uma vaga de estacionamento </p>
<p><b>Para:</b> registrar minha entrada no estacionamento</p></br>
  
  
<h3>Cenário de aceitação:</h3>
<p><b>Dado que:</b> estou na tela de check-in do aplicativo </p>
<p><b>Quando:</b> chego ao estacionamento e seleciono a opção de check-in </p>
<p><b>Então:</b> devo receber uma confirmação de que meu check-in foi registrado com sucesso. </p></br>

<p>Grau de complexidade &#128513; </p>

<h3>4) Check-out no estacionamento</h3>
 
 <p><b>Como/Sendo:</b> usuário </p>
<p><b>Quero/Posso:</b> fazer check-out no aplicativo ao liberar uma vaga de estacionamento </p>
<p><b>Para:</b> registrar minha saída e calcular o tempo de permanência do meu veículo.</p></br>


<h3>Cenário de aceitação:</h3>

<p><b>Dado que:</b> estou na tela de check-out do aplicativo </p>
<p><b>Quando:</b> ao sair do estacionamento, seleciono a opção de check-out </p>
<p><b>Então:</b> devo receber o cálculo do valor e ser direcionado a tela de pagamento. </p></br>

<p>Grau de complexidade &#128513; </p>

<h3>5) Pagamento pelo estacionamento</h3>

<p><b>Como/Sendo:</b> usuário </p>
<p><b>Quero/Posso:</b> poder realizar o pagamento pelo estacionamento através do aplicativo, com base no tempo de permanência do meu veículo </p>
<p><b>Para:</b> agilizar o processo e evitar o uso de dinheiro físico.</p></br>
  
<h3>Cenário de aceitação:</h3>

<p><b>Dado que:</b> estou na tela de pagamento do aplicativo </p>
<p><b>Quando:</b> selecionei o período de permanência do meu veículo e confirmo o pagamento </p>
<p><b>Então:</b> devo receber um recibo por e-mail após a conclusão bem-sucedida do pagamento. </p></br>
  
  <p>Grau de complexidade &#128513; </p>

</br>
<hr>
<h2>História de usuário para o proprietário do estacionamento</h2>


<h3>6) Acesso ao painel de controle</h3>

<p><b>Como/Sendo:</b> proprietário do estacionamento </p>
<p><b>Quero/Posso:</b> ter acesso a um painel de controle com informações sobre a ocupação atual das vagas e as reservas feitas </p>
<p><b>Para:</b> monitorar e gerenciar o espaço de estacionamento de forma eficiente. </p></br>

<h3>Cenário de aceitação:</h3>
<p><b>Dado que:</b> estou logado na conta de proprietário do estacionamento no aplicativo </p>
<p><b>Quando:</b> acesso o painel de controle </p>
<p><b>Então:</b> devo ver informações atualizadas sobre a ocupação das vagas e as reservas feitas no estacionamento. </p></br>
  
  <p>Grau de complexidade &#128517; </p>
  
<h3>7) Acesso as tarifas no painel de controle</h3>

<p><b>Como/Sendo:</b> proprietário do estacionamento </p>

<p><b>Quero/Posso:</b> ter a capacidade de definir e ajustar as tarifas de estacionamento através do aplicativo </p>
<p><b>Para:</b> acompanhar as demandas do mercado e otimizar a receita. </p></br>

<h3>Cenário de aceitação:</h3>

<p><b>Dado que:</b> estou logado na conta de proprietário do estacionamento no aplicativo </p>
<p><b>Quando:</b>  acesso as configurações de tarifas de estacionamento </p>
<p><b>Então:</b> devo conseguir definir e ajustar as tarifas com facilidade. </p></br>

<p>Grau de complexidade &#128517; </p>

<h3>8) Acesso aos relatórios de utilização do estacionamento</h3>

<p><b>Como/Sendo:</b> proprietário do estacionamento </p>
<p><b>Quero/Posso:</b> acessar relatórios detalhados sobre a utilização do estacionamento ao longo do tempo, incluindo informações sobre ocupação, receitas e tendências de uso, </p>
<p><b>Para:</b> tomar decisões estratégicas informadas. </p></br>
  
<h3>Cenário de aceitação:</h3>
<p><b>Dado que:</b> estou logado na conta de proprietário do estacionamento no aplicativo </p>
<p><b>Quando:</b> acesso a seção de relatórios </p>
<p><b>Então:</b> devo ver relatórios detalhados sobre a ocupação, receitas e tendências de uso do estacionamento. </p></br>

<p>Grau de complexidade &#128557;</p> 

<h2>MAPA DE REQUISITOS</h2>

<h3>Gerenciamento</h3>

<p>RF 12- Histórico de Estacionamento: O sistema deve disponibilizar o histórico de estacionamento e pagamentos.</p>
<p>RF 01- Registro de Usuários: O sistema deve permitir que os usuários se cadastrem com nome, e-mail e senha.</p>
<p>RF 04-Rservas de vagas: O sistema deverá permitir a reserva de uma vaga por um determinado período de tempo.</p>

<h3>Funcionalidade</h3>

<p>RF 01- Registro de Usuários: O sistema deve permitir que os usuários se cadastrem com nome, e-mail e senha.</p>
<p>RF 02- Recuperação de senha:Deve haver opção para recuperação de senha.</p>
<p>RF 05- Confirmação de vaga:O sistema enviará e-mail de confirmação.</p>
<p>RF 03- Visualização: O sistema deverá permitir a visibilidade de vaga.</p>
<p>RNF 05- Usabilidade: o sistema deve ter interface do aplicativo intuitiva e fácil de usar.</p>
<p>RF 06- Check-in: O sistemas deve permitir fazer check-in ao ocupar uma vaga.</p>
<p>RF 07-Check-out: O sistema deve permitir fazer check-out ao liberar uma vaga.</p>
<p>RF 08-Calculo do Pagamento: O sistema deve calcular e registrar o tempo de permanência do veículo.</p>
<p>RF 09- calculo do valor: O sistema deve calcular o valor do estacionamento com base no tempo de permanência.</p>
<p>RF 10- Pagamento: o sistema deverá permitir o pagamento através do aplicativo.</p>
<p>RF 11- Recebimento: o sistema enviará um recibo por e-mail após o pagamento.</p>
<p>RF 12- Histórico: O sistema deve disponibilizar o histórico de estacionamento e pagamentos.</p>
<p>RNF 01- Capacidade: O sistema deve ser capaz de lidar com um grande volume de usuários simultaneamente.</p>
<p>RNF 02- Desempenho: O sistema deve ser rápido na resposta aos usuário, especialmente durante o processo de reserva e pagamento.</p>
<p>RNF 06-Responsividade: O sistema deve ser responsivo e funcionar bem em dispositivos móveis.</p>


<h3>Segurança</h3>

<p>RNF 03- Segurança: o sistema deve usar transações seguras e criptografadas.
<p>RNF 04-Criptografia: O sitema deve manter informações dos usuários restrito e protegido.
<p>RF 11- Recebimento: o sistema enviará um recibo por e-mail após o pagamento.
</ul>
<hr>
<h2>Arquitetura do software</h2>                           
<h3>Modelo de arquitetura:</h3>
<p>Link para a visualização do padrão arquitetural <a href = "https://lucid.app/lucidchart/05ffca38-a30d-4ec6-91b9-4e7ce817da92/edit?viewport_loc=-7004%2C25%2C12630%2C5723%2C0_0&invitationId=inv_7d70fdf5-a73a-4ed5-89e7-0ce060c34391"> clique aqui</a></p>
<p>Escolhemos o modelo de arquitetura MVC.</p>
  
<h3>Interação Sistema:</h3>

<p>Link para a visualização da interação do sistema <a href = "https://lucid.app/lucidchart/7204057e-9a49-4134-920d-988f7b5d3c3b/edit?viewport_loc=-1561%2C-2218%2C8722%2C3952%2C0_0&invitationId=inv_0074df80-f012-4455-b02b-13709f491db7">clique aqui</a>

<h3>Banco de Dados:</h3>

<p>Link para o modelo de banco de dados <a href = "https://lucid.app/lucidchart/2be0982d-92a3-4484-8109-c1dad394707d/edit?view_items=AeVz73qQj35D&invitationId=inv_4f23783f-48d9-48f1-b7b3-25f84d821d74">clique aqui</a>

<h3>Visão de Processo:</h3>

<b>Cadastro do usuario e Login:</b>
<p>O cliente deverá acessar o site, onde ele deverá clicar para fazer o cadastro, informando seu nome, CPF, e data de nascimento, email e senha.<br>
Logo apos o cadastro devera ser realizado o login utilizando o email e senha. <br>

<b>Visualização das vagas :</b>
<p>Após o cadastro, o cliente poderá acessar o site, onde podera escolher o estacionamento que deseja ir e terá visibilidade das vagas e dos horários em que a vaga estará disponível para reserva; no entanto, ele não poderá fazer a reserva até que seja feito o cadastro do veículo.</p>

<b>Cadastro do veiculo:</b>
<p>O cliente deverá cadastrar ao menos um veículo, informando o modelo do carro e a placa, para que consiga fazer a reserva da vaga.</p>

<b>Reserva de vagas:</b>
<p>O usuário poderá selecionar uma vaga que deseja; onde verá o horário em que a vaga selecionada estará disponível, bem como os horários já reservados; e poderá escolher o horário que não estiver reservado, com base em sua escolha.</p>

<b>Confirmação da vaga:</b>
<p>O sistema avisará ao cliente que ele recebeu uma mensagem no email cadastrado e pedirá que seja feita a confirmação.</p>

<b>Historico de reservas:</b>
<p>O cliente pode optar por visualizar as reservas ativas e as reservas anteriores.</p>

<b>Check-in e Check-out:</b>
<p>O cliente tera que fazer um Check-in ao ocupar a vaga e um Check-out apos a liberação da vaga para que possa ser feito a finalização da reserva e o calculo do tempo da reserva. </p>

<b>Calculo de pagamento:</b>
<p>O sistema devera calcular o valor com base no tempo reservado pelo cliente. </p>

<b>Pagamento:</b>
<p>O Sistema devera enviar uma notificação pelo email do usuario para realização do pagamento direcionando para o site na area de pagamento onde ele podera escolher a forma de pagamento. </p>

<b>Recebimento:</b>
<p>O Sistema devera enviar uma notificação pelo email do usuario com a confirmação do pagamento. </p>

<b>Atualização de reserva:</b>

<p>O Sistema devera atualizar a disponibilidade da vaga apos o check-out do usuario. </p>
