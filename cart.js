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
    $(campoSubTotal).html(subTotal); 

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