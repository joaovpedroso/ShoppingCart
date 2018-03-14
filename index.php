<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h1>Carrinho de Compras</h1>
        <table border="1">
            <tr>
                <th>Item</th>
                <th>Quantidade</th>
                <th>Valor Un</th>
                <th>Sub Tot</th>
            </tr>
        </table>
        <ul class="carrinho-itens">
            <li id="item10">
                <td>Geladeira</td>
                <td>
                    <input type="number" name="item10" class="input-quantidade" value="1"> 
                </td>
                <td><p id="item10Un" class="unitario">500,00</p></td>
                <td> Sub <span id="item10Sub" class="subTotal">500,00</span></td><br>
                <td><a href="" id="item10Remover" class="remover">Remover</a></td>
            </li>
            <li id="item11">
                <td>Televisão</td>
                <td>
                    <input type="number" name="item11" class="input-quantidade" value="1"> 
                </td>
                <td><p id="item11Un" class="unitario">350,00</p></td>
                <td> Sub <span id="item11Sub" class="subTotal">350,00</span></td><br>
                <td><a href="" id="item11Remover" class="remover">Remover</a></td>
            </li>
        </ul>
        <h1>Valor Total dos Itens  - <span id="totalCart">0</span></h1>
        
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
       
        
        <script type="text/javascript">
        //Após Carregar a página
        $(document).ready(function(){

            //Ao Alterar o valor dos inputs de Quantidade executa a função alteraQuantidade
            $(document).on('change', '.input-quantidade', alteraQuantidade);

            //Atualizar os dados do carrinho
            atualizaCarrinho();            
        })
        
        //Atualiza os dados do carrinho
        function atualizaCarrinho(){
            carrinho = $(".carrinho-itens");
            
            carrinho.each(function(){
               
                var carrinhoAtual = $(this); 
                
                //Selecionar o subTotal dos Itens
                var valorItem = carrinhoAtual.find('.subTotal');
                var valorTotal = carrinhoAtual.find('#totalCart');
                var resultado = 0;
               
                valorItem.each(function(){
                    var tdAtual = $(this);

                    var pegaValor = parseFloat(tdAtual.text());
                                    
                    resultado = parseFloat(resultado + pegaValor);
                    
                });
                
                //console.log(resultado);
                $("#totalCart").html(resultado);
                //valorTotal.html("<span id='totalCart'>"+resultado+"</span>");
            
            });            
            
        }
        
        //Realiza o calcula dos produtos e atualiza o carrinho
        function alteraValor(quantidade, valorUn){
            //Calcular o valor do produto
            
            subTotal = quantidade*valorUn
            //console.log(subTotal);
            
            //Selecionar o campo SubTotal referente ao item
            campoSubTotal = "#"+codItem+"Sub";
            //Inserir no SubTotal o valor Total do Item
            $(campoSubTotal).html("<p>"+subTotal+"</p>"); 
            
            atualizaCarrinho();
        }
        
        //Função que é chamada quando se altera o valor do input de quantidade
        function alteraQuantidade(){
            //Selecionar o input referente ao Item
            inputQuantidade = $(this);
            //Receber a quantidade informada no Input
            quantidade = inputQuantidade.val();
            
            //Selecionar o cod do item a ser alterado
            codItem = inputQuantidade[0].name;
            
            //Transforma o codigo em um ID
            utemUn = '#'+codItem+"Un";
            
            //Pega o valor unitário od produto
            valUnitario = parseFloat( $(utemUn).text() );
            
            //Chama a função que realiza o calculo dos valores
            alteraValor(quantidade, valUnitario);
            
            //Atualiza os dados do Carrinho
            atualizaCarrinho();
        }
              
        //Remove um elemento do código após atualiza o carrinho
        removeItem = function(event){
            event.preventDefault();
            
            //Seleciona qual o elemento que será removido e remove com a função remove
            $(this).parents('li').remove();
            
            //Atualiza o carrinho
            atualizaCarrinho();
        };

        //Executa as funções após serem acionadas
        afterLoad = function(){
            
            //Executa a função de remover quando clicado no elemento com classe .remover
            $('.remover').click(removeItem);
            
            //Atualiza o Carrinho
            atualizaCarrinho();
            
         };
         
        //Executa o atributo afterLoad que executa as funções apos acionadas 
        $(afterLoad);
            
        </script>
        
    </body>
</html>
