//Variáveis GLobais
let contador = 0;
let saida = document.querySelector('section#resultadoDeCliques');

function contar() {
  //contador = contador + 1
  contador++;
  saida.innerHTML = `<p>O contador está com <mark>${contador}</mark> cliques.</p>`;
}

function limpar() {
  contador = 0;
  saida.innerHTML = null;
}