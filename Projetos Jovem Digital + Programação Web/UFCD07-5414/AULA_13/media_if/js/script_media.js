function media() {
  let nome = window.prompt('Qual o nome do aluno?');
  let n1 = Number(window.prompt(`Qual foi a primeira nota de ${nome}?`));
  let n2 = Number(window.prompt(`Qual foi a segunda nota de ${nome}?`));
  mediaFinal = (n1 + n2) / 2;
  let resultado = document.querySelector('section#situacao');

  //Variável com conteúdo vazio
  let msg;

  if (mediaFinal >= 10) { // testar se o resultado da média do aluno será maior que 10
    msg = "<h2 id='green'>Muitos parabéns!</h2>";
  } else {
    msg = "<h2 id='red'>Tem que estudar mais um pouco!</h2>";
  }

  resultado.innerHTML = `<p>Calcular a média final do aluno ${nome}.</p>`;
  resultado.innerHTML += `<p>As notas obtidas foram ${n1} e ${n2}.</p>`;
  resultado.innerHTML += `<p>A média final do aluno é ${mediaFinal}.</p>`;
  resultado.innerHTML += `${msg}`;

}

