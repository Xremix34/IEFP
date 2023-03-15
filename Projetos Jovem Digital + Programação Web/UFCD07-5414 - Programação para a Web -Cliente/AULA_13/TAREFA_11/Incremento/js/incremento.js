function incremento() {
  let contador = 0;
  let incremento = window.prompt("Digite um número:");
  alert(`Antes de ${incremento--} temos o número ${incremento++}.\nDepois de ${incremento}, temos o número ${++incremento}.`);
}