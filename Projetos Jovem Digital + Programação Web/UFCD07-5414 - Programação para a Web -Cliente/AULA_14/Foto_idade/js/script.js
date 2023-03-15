function verificar() {
  // VARIÁVEL PARA VERIFICAR A DATA ATUAL
  var data = new Date();
  // VARIÁVEL PARA VERIFICAR APENAS O ANO ATUAL
  var ano = data.getFullYear();
  var fano = document.getElementById('txtano');
  var res = document.querySelector('div#res');

  if (fano.value.length == 0 || Number(fano.value) > ano) {
    window.alert("ERRO! Verifique o ano novamente.");
  } else {
    var fgen = document.getElementsByName('radgen');
    var idade = ano - Number(fano.value);
    var genero = '';
    var img = document.createElement('img');
    img.setAttribute('id', 'foto');

    if (fgen[0].checked) {
      genero = 'Homem';
      if (idade >= 0 && idade < 10) {
        //CRIANÇA HOMEM
        img.setAttribute('src', 'imagens/child.jpg');
      } else if (idade < 21) {
        //ADOLESCENTE HOMEM
        img.setAttribute('src', 'imagens/young.jpg');
      } else if (idade < 50) {
        //ADULTO HOMEM
        img.setAttribute('src', 'imagens/adult.jpg');
      } else {
        //IDOSO HOMEM
        img.setAttribute('src', 'imagens/old.jpg');
      }
    } else if (fgen[1].checked) {
      genero = 'Mulher';
      if (idade >= 0 && idade < 10) {
        //CRIANÇA MULHER
        img.setAttribute('src', 'imagens/child_f.jpg');
      } else if (idade < 21) {
        //ADOLESCENTE MULHER
        img.setAttribute('src', 'imagens/young_f.jpg');
      } else if (idade < 50) {
        //ADULTO MULHER
        img.setAttribute('src', 'imagens/adult_f.jpg');
      } else {
        //IDOSO MULHER
        img.setAttribute('src', 'imagens/old_f.jpg');
      }
    }
    res.style.textAlign = 'center';
    res.innerHTML = `Encontrámos ${genero} com ${idade} anos.`;
    res.appendChild(img);

  }

}
