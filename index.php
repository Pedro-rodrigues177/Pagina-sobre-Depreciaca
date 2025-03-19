
<?php
$smg = null;

if (!empty($_POST['compra']) && !empty($_POST['venda']) && !empty($_POST['vida'])) {
    $valor_compra = (float) $_POST['compra'];
    $valor_venda = (float) $_POST['venda'];
    $vida_util = (int) $_POST['vida']; // Convertendo para número inteiro
    $vida_util_meses = (int) $vida_util * 12;

    if ($vida_util <= 0) {
        $smg = "⛔ O tempo de vida útil deve ser maior que 0.";
    }
    elseif ($valor_compra <= $valor_venda) {
            $smg = "⛔ O valor de compra deve ser maior que o de venda.";
    }
    elseif ($valor_compra <= 0 || $valor_venda < 0) {
        $smg = "⛔ O valor de compra e o de venda devem ser positivos.";
    }
     else {
        $depreciacao_anual = ($valor_compra - $valor_venda) / $vida_util;
        $resultado = "📊 A depreciação anual é: <strong>R$ " . number_format($depreciacao_anual, 2, ',', '.') . "</strong>";
        $depreciacao_mensal = ($valor_compra - $valor_venda) / $vida_util_meses;
        $resultado_mensal = "📊 A depreciação mensal é: <strong>R$ " . number_format($depreciacao_mensal, 2, ',', '.') . "</strong>";
    }
} else {
    $smg = "⚠️ Preencha todos os campos!";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de depreciação</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body">
       <header>
            <nav class="nav-links">
                <img src="https://cdn-icons-png.flaticon.com/512/2486/2486903.png" class="logo"/>
                <ul class="nav-list">
                    <li><a href="#inicio">inicio</a></li>
                     <li><a href="#sobre">sobre</a></li>
                      <li><a href="#calculadora">calculadora</a></li>
                       <li><a href="#contatos">contatos</a></li>
                </ul>
            </nav>
            <div class="btn-abrir-menu" id="btn-menu">
                <img src="https://cdn-icons-png.flaticon.com/512/2486/2486903.png"/>
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="menu-mobile" id="menu-mobile">
                <div class="btn-fechar"><i class="fa-solid fa-xmark"></i></div>
                <div>
                     <nav>
                        <ul>
                            <li><a href="#inicio">inicio</a></li>
                            <li><a href="#sobre">sobre</a></li>
                            <li><a href="#calculadora">calculadora</a></li>
                            <li><a href="#contatos">contatos</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <div class="container0">
    <div class="aba1">
        <h1  id="inicio">Depreciação, oque é, e como se calcula?</h1>
    </div>
   </div>
    
   <div class="container1">
    <div class="box">
        <h1 id="calculadora">Calcular Depreciação</h1>
        <br/>
        <form action="index.php#calculadora" method="POST">
            <input type="number" name="compra" placeholder="valor inicial do ativo" required step="0.01" min="0"/>
            <br/><br/>
            <input type="number" name="venda" placeholder="valor residual do ativo" required step="0.01" min="0"/>
            <br/><br/>
            <input type="number" name="vida" placeholder="vida util do ativo" required min="1"/>
            <br/><br/>
            <input type="submit" value="calcular" class="button"/>
            <br/>
            <br/>
            <?php  
                if (!empty($resultado) && !empty($resultado_mensal)) {
                    echo "$resultado <br> $resultado_mensal";
                }
             ?>                               
            <?php   
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    echo $smg;
                }
             ?>
        </form>
        </div>

        <div class="oqueE-depreciação">
            <!-- exibição das mensagens --> 
            <h2 class="h2-resultado">Como funciona o Calculo?</h2>
            <br/>
            <h3>Referente a Depreciação Anual:</h3>
            </br>
            <p>
                A depreciação anual é o processo de calcular a perda de valor de um bem ao longo do tempo. O método mais comum para isso é a depreciação linear, onde o bem perde um valor fixo a cada ano.
A fórmula é: Depreciação anual = Valor da aquisição - Valor residual / Vida util(em anos)
            </p>
            <br>
        <h3>Referente a Depreciação Mensal:</h3>
            </br>
            <p>
                A depreciação mensal indica a perda de valor de um bem a cada mês, ajudando no controle financeiro e contábil das empresas. Ela é calculada a partir da depreciação anual, simplesmente dividindo esse valor por 12 meses, a formula e: Depreciação mensal = depreciação Anual / 12.
            </p>
    </div>
   </div>

   <div class="container2">
    <div class="aba2">
        <h1>como é utilizado e quais suas vantagens?</h1>
    </div>
   </div> <br/><br/>

   <div class="container3">
    <div class="aba3">
        <h2 id="sobre">Cálculo de Depreciação: Uso e Vantagens</h2>
        <br/>
        <p>
            A depreciação é o processo de reconhecimento da perda de valor de um bem ao longo do tempo devido a fatores como uso, desgaste, obsolescência ou tempo de vida útil limitado. Essa prática é fundamental para empresas e organizações que possuem ativos, pois permite um controle mais preciso do patrimônio e otimiza a gestão financeira.</p>
        </p>
        <br/>
        <h2>Como o Cálculo de Depreciação é Usado?</h2>
        <br/>
        <p>
            A depreciação tem diversas aplicações, sendo utilizada principalmente para: <br>

✅ Contabilidade: Ajusta o valor dos ativos no balanço patrimonial, refletindo sua desvalorização ao longo do tempo.<br>
✅ Gestão Financeira: Permite que empresas planejem a substituição de bens antes que fiquem obsoletos ou inutilizáveis.<br>
✅ Tributação: Em muitos países, a depreciação pode ser usada para reduzir a base de cálculo dos impostos, já que ela é considerada uma despesa contábil dedutível.<br>
✅ Avaliação de Investimentos: Ajuda a entender a viabilidade econômica da compra de novos ativos. <br/><br/>
        <h2>Vantagens do Uso da Depreciação</h2> <br/>
        <p>
            ✔ Controle Contábil Preciso: A empresa mantém um registro correto do valor de seus ativos ao longo do tempo.<br>
✔ Melhor Planejamento Financeiro: Permite que as empresas saibam quando precisarão substituir equipamentos.<br>
✔ Redução de Impostos: A depreciação pode ser registrada como despesa contábil, reduzindo o imposto sobre o lucro.<br>
✔ Melhoria na Precificação: Empresas podem calcular custos de produção mais realistas, incorporando a depreciação no preço dos produtos.<br>
✔ Decisões de Investimento Mais Inteligentes: A depreciação ajuda a analisar se vale a pena manter um ativo ou substituí-lo.
   </p><br/>
   <h2>Conclusão</h2><br/>
   <p>
     O cálculo de depreciação é uma ferramenta crucial na gestão de ativos e no planejamento financeiro das empresas. A escolha do método de depreciação deve ser feita com base no tipo de ativo, sua vida útil e a estratégia fiscal da empresa. Cada método oferece vantagens específicas, dependendo do contexto, e todos eles contribuem para uma melhor avaliação do valor econômico dos bens, além de otimizar a gestão de recursos e impostos. Ao adotar o método mais adequado, as empresas podem melhorar o controle financeiro, reduzir custos e garantir uma gestão mais eficiente de seus ativos.
   </p>
    </div>
   </div><br><br>

    <footer>
        <div id="footer-content">
            <div id="footer-contatos">
                <h1 id="contatos">Pedro Rodrigues</h1>
                <p>Olá, meu nome é Pedro e eu sou Programador Full Stack.</p>
                <div id="footer-social-media">
                    <a href="https://www.linkedin.com/in/pedro-henrique-de-oliveira-rodrigues-77a910304/" target="_blank" class="footer-link" id="linkedin"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="https://www.instagram.com/pedrorodrigues2844/" target="_blank" class="footer-link" id="instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://wa.link/nyb4xo" target="_blank" class="footer-link" id="zapzap"><i class="fa-brands fa-whatsapp"></i></a>

                </div>
            </div>

            <ul class="footer-list">
                <li> <h3 style="color: white;">Sobre a Página</h3></li>
                <li>
                    <a href="#inicio" class="footer-link">Inicio</a>
                </li>
                <li>
                    <a href="#sobre" class="footer-link">Sobre</a>
                </li>
                <li>
                    <a href="#calculadora" class="footer-link">Calculadora</a>
                </li>
            </ul>
             <ul class="footer-list">
                <li> <h3 style="color: white;">Tecnologias Utilizadas</h3></li>
                <li>
                    <a href="https://www.alura.com.br/artigos/html" target="_blank" class="footer-link">HTML</a>
                </li>
                <li>
                    <a href="https://www.alura.com.br/artigos/css" target="_blank" class="footer-link">CSS</a>
                </li>
                <li>
                    <a href="https://www.alura.com.br/artigos/php" target="_blank" class="footer-link">PHP</a>
                </li>
            </ul>
            

            <div id="email">
                <h3 style="color: white;">Contatar por E-mail.</h3><br>
                <p style="color: white;">Clique abaixo para contatar por E-mail!</p><br>
                <div id="input_group">
                    <a href="http://www.rodriguesphtech.infinityfreeapp.com/formulario-email.php" target="_blank">
                        <button class="button-email"><i class="fa-solid fa-paper-plane"></i></button>
                    </a>
                </div>
            </div>    
        </div>
        <div id="footer-autoral">
            &#169
            2025 Feito Por Pedro Henrique De Oliveira Rodrigues.
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>