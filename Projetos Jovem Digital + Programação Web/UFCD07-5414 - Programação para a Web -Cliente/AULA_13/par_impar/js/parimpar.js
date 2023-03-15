function teste() {
  let num = Number(window.prompt("Digite um número Inteiro;"));
  let resultado;
  if (num % 2 == 0) {
    resultado = "<h2>PAR</h2>";
  } else {
    resultado = "<h2>ÍMPAR</h2>";
  }

  let msg = document.querySelector('section#mensagem');
  msg.innerHTML = `<p>O resultado é</p> ${resultado}`;
}