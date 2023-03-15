function compra() {
  let nomeProd = Number(window.prompt("Insira o nome do produto:"));
  let precoProd = Number(window.prompt("Insira o preço do produto:"));
  let dinheiroCliente = window.prompt("Insira o dinheiro do cliente:");
  let troco = dinheiroCliente - precoProd;
  if (troco >= 0) {
    alert(`Comprou o produto ${nomeProd} que custou ${precoProd}€.\n\nEntregou ${dinheiroCliente}€ em dinheiro e vai receber ${troco}€ de troco.\n\nVolte sempre!!!`);
  } else {
    alert(`O dinheiro inserido ${precoProd}€ não é suficiente para pagar o produto.`);
  }
}