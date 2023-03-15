var contexto;

//Posição atual do jogador com as dimensões da raquete
var jogador = new Raquete(150, 580, 100, 10);

// Cria uma nova instância da bola
var bola = new Bola(200, 570, 10);

// Guarda os tempos de execução dos framerates, setInterval e setTimeout
var temporizador = 0; temporizador1 = 0; temporizador2 = 0; temporizador3 = 0; temporizador4 = 0;

// Cria um novo Array que guarda o estado dos processos a decorrerem
var mapaTecla = new Array();

// O estado inicial é o zero
var estado = 0;

// guarda a pontuação
var hiscore;

// Vai buscar o hiscore guardado no ficheiro
dado = parseInt(localStorage.getItem("hiscore"));

// Verifica se é um número se for retorna o hiscore, senão retorna zero
hiscore = (isNaN(dado)) ? 0 : dado;

// Guarda os sons no array
var sons = new Array();
sons[0] = new Audio('Blop.wav');
sons[1] = new Audio('MirrorBreaking.wav');
sons[2] = new Audio('GameOver.wav');
sons[3] = new Audio('Win.mp3');

// Os pontos começam em zero
var pontos = 0;

var canvas;

var velocidade;

var nivel;

var espacoAtivado = false;

var tijolosDestruidos = [];

var incrementa = 0;

//Cria uma nova imagem
var imagem = new Image();

// Aumenta as colunas dos tijolos
var aumentaColunasTijolos = 2;
console.log(20 / 10)

//Aumenta as linhas dos tijolos
var aumentaLinhasTijolos = 7;


//Inicializa o jogo Mostrando os elementos no canvas
function iniciar() {
  clearInterval(0);
  habilitarButao();
  if (estado == 1) {
    return
  }
  canvas = document.getElementById("game");
  contexto = canvas.getContext("2d");
  jogador.pintar();
  nivel = 0;
  velocidade = 37;
  temporizador = setInterval(mainloop, velocidade);
}

//x e y representam a posição em que começa neste caso o canto superior esquerdo
function Raquete(x, y, largura, altura) {
  this.x = x;
  this.y = y;
  this.largura = largura;
  this.altura = altura;

  this.pintar = function () {
    contexto.fillRect(this.x, this.y, this.largura, this.altura);
  }

  // Move a raquete de 2 em pixels na posição x

  this.mover = function (dx) {
    this.x += dx;
  }
}

//Guarda as teclas pressionadas do teclado no Array
function teclapressionada(evento) {
  mapaTecla[evento.keyCode] = true;
}

//Guarda a tecla do teclado no Array para iniciar o jogo
function teclaSolta(evento) {
  mapaTecla[evento.keyCode] = false;
}

window.onkeydown = teclapressionada;
window.onkeyup = teclaSolta;

//Move a bola e cria uma nova bola com as novas coordenadas e pixels, o seu movimento e o estado do jogo
function mainloop() {


  if (mapaTecla[37] == true && estado == 1 || mapaTecla[37] == true && estado == 4) {
    jogador.mover(-2);
  }

  if (mapaTecla[39] == true && estado == 1 || mapaTecla[39] == true && estado == 4) {
    jogador.mover(2);
  }

  detectarColisaoRaquetexLimite();

  if (mapaTecla[32] == true && estado == 0) {
    espacoAtivado = true;
    estado = 1;
    desabilitarButao();
  }

  if (mapaTecla[32] == true && estado == 5) {
    espacoAtivado = false;
    desabilitarButao();
  }

  if (mapaTecla[32] == true && estado == 3) {
    espacoAtivado = true;
    desabilitarButao();
  }


  // A bola só se move se o estado for 1
  if (estado == 1 || estado == 3 || estado == 4) {
    bola.mover();
  }


  bola.verificaColisao();

  aumentaVelocidadeBola(pontos);

  // verifica se houve colisão com o tijolo, é retirado a primeira posição do array,
  // caso for destruído todos os tijolos muda para o estado = 3 de vitória tocando o 
  //som e guardando o h-score que vai ser exibido no ecrã
  for (t in tijolos) {
    if (tijolos[t].detectarColisaoTijoloxBola()) {
      tijolos.splice(t, 1);

      if (tijolos.length == 0) {

        estado = 3;
        sons[3].play();
        setarhiscore();
        let incrementaUmaVez = true;
        temporizador1 = setTimeout(() => {

          for (let i = 0; i < pontosArray.length; i++) {

            // Verifica se os pontos feitos são menores que os do pontosArray
            // Se forem passa para o estado 4 em que mostra os pontos feitos naquele nível
            if (pontos <= pontosArray[i]) {
              estado = 4;
              pontos = 0;

              // verifica se a variável foi incrementada para não duplicar valores no incremento, se for verdadeiro incrementa senão não faz nada
              incrementaUmaVez ? incrementa++ : incrementa;
              incrementaUmaVez = false;

              // Cria novas colunas após passar de faze neste caso passa a aumentar duas linhas no próximo nível
              tijolos = criarTijolos(410, 50, 50, 10, aumentaColunasTijolos = incrementa + 2, aumentaLinhasTijolos);
              jogador = new Raquete(150, 580, 100, 10);
              bola = new Bola(200, 570, 10);
              console.log("teste pontos: ", incrementa)
              console.log("teste pontos: ", aumentaColunasTijolos)

            }

            // Se os pontos obtidos forem iguais aos do pontosArray e o espaço não for pressionado o espaço fica desabilitado
            // mudando para o estado 5 que é o final do jogo
            if (pontos == pontosArray[i]) {
              if (!espacoAtivado) return;
              espacoAtivado = false;
              estado = 5;

            }
            // break;

            console.log("teste: " + pontosArray.length)
          }

        }, 1000);
        //limparTempos(temporizador1);

      }

    }

  }


  pintar();
}



//Cria a bola com as coordenadas de posição e o tamanho 
function Bola(x, y, raio) {
  this.x = x;
  this.y = y;
  this.raio = raio;

  // Faz um movimento aleatório caso a direção da bola seja maior que 0.5 sobe 3 pixels senão desde 3 pixels
  this.dirX = (Math.random() > 0.5) ? 3 : -3;
  this.dirY = -3;

  // Desenha a bola e o respetivo preenchimento
  this.pintar = function () {
    contexto.beginPath();
    contexto.arc(this.x, this.y, this.raio, 0, 2 * Math.PI);
    contexto.fill();
  }

  this.mover = function () {
    this.x += this.dirX;
    this.y += this.dirY;

  }

  // Troca a posição X ao bater nas laterais do cenário
  this.inverterX = function () {
    this.dirX *= -1;
  }

  // Troca a posição Y ao bater nas laterais do cenário
  this.inverterY = function () {
    this.dirY *= -1;
  }

  // Verifica se a bola é menor que zero. Ao chegar na zero neste caso o lado esquerdo ou posição 400 do lado direito
  // caso seja uma das posição inverte a direção em X da bola
  this.verificaColisao = function () {
    if ((this.x - this.raio) <= 0 || (this.x + this.raio) >= 400) {
      this.inverterX();
      sons[0].play();
    }

    // Verifica se a bola é menor que zero. Ao chegar na posição Y zero, neste caso a altura
    // caso seja uma das posição inverte a direção em Y da bola ou 
    // Se detectar a colisão da bola inverte a direção em Y
    if ((this.y - this.raio) <= 0 || detectarColisaoRaquetexBola()) {
      this.inverterY();
      sons[0].play();
    }

    // Se a bola passar dos 600 pixels do cenário muda para o estado 2 que significa jogo perdido
    // Depois muda para o estado 0 repondo todos os elementos no ecrã e habilita o botão H-score
    if ((this.y - this.raio) >= 600) {
      estado = 2;
      sons[2].play();
      setarhiscore();

      reiniciar();
      habilitarButao();

    }
  }
}

// Verifica se foram feitos pontos e guarda-os num ficheiro do computador
function setarhiscore() {
  if (pontos > hiscore) {
    hiscore = pontos;
    localStorage.setItem("hiscore", pontos);
  }
}

window.onload = iniciar;

// Apaga o rastro do jogador a fazer o movimento e cria um novo com as novas coordenadas e pixels
function pintar() {
  contexto.clearRect(0, 0, 400, 600);
  jogador.pintar();
  bola.pintar();

  // percorre todas as posições do array tijolos posicionando-os no cenário
  for (t in tijolos) {
    tijolos[t].pintar();
  }

  // Mostra a pontuação no ecrã
  contexto.font = "18pt monospace";
  /*contexto.fillText(pontos, 350, 595);*/

  contexto.fillText("Hi-Score", 5, 575);
  contexto.fillText(hiscore, 10, 595);

  // Mostra a informação relevante em cada um dos estados no ecrã
  switch (estado) {
    case 0:
      //contexto.clearRect(0, 0, 400, 600);
      contexto.fillText("Pressione ESPAÇO para iniciar", 12, 295);
      break;
    case 1:
      contexto.fillText(pontos, 350, 595);
      var textoNiveis = "Nivel ";

      // percorre o array de pontos e compara se o nível guardado no array é igual ao nível, se for incrementa o nível
      for (let i = 0; i < pontosArray.length; i++) {

        if (nivel == guardarNivel[0]) {
          contexto.fillText(textoNiveis + (nivel + 1), canvas.width / 2 - 40, canvas.width / 2);
          break;
        }

      }
      break;
    case 2:
      //este case não faz nada apenas deixeio para não mudar todas as configurações de estado
      contexto.clearRect(0, 0, 400, 600);
      contexto.fillText("VOCÊ PERDEU!", 125, 295);
      break;
    case 3:
      contexto.clearRect(0, 0, 400, 600);
      contexto.fillText("NIVEL " + (nivel + 1) + " COMPLETO", 125 - 20, 295 - 100 - 30);

      // Carrega a imagem utilizando o drawImage
      imagem.src = 'taca.png';
      imagem.onload = function () {
        contexto.drawImage(imagem, 145 - 35, 295 - 50, 200, 150);
        contexto.fillText("PONTUAÇÃO", 125 + 25, 490 - 30);
        contexto.fillText(pontos, 200, 520 - 30);
      }
      break;
    case 4:
      contexto.fillText(pontos, 350, 595);
      var textoNiveis = "Nivel ";
      contexto.fillText(textoNiveis + (nivel + 1), canvas.width / 2 - 40, canvas.width / 2);

      break;
    case 5:
      contexto.clearRect(0, 0, 400, 600);
      contexto.fillText("FIM DO JOGO", 270 / 2, 195 - 50);

      // Carrega a imagem utilizando o drawImage
      imagem.src = 'taca.png';
      imagem.onload = function () {
        contexto.drawImage(imagem, 145 - 35, 295 - 100, 200, 150);
        contexto.fillText("PONTUAÇÃO", 125 + 25, 490 - 100);
        contexto.fillText(pontos, 200, 520 - 100);
        contexto.fillText("HI-SCORE", 150 + 10, 490 - 20);
        contexto.fillText(hiscore, canvas.width / 2 - 5, canvas.width / 2 + 300);
      }
      break;
  }
}

// Verifica qual o valor mais proximo de max e min entre a bola e a raquete
function clamp(val, min, max) {
  if (min > max) {
    return;
  }
  return Math.max(min, Math.min(max, val));
}


//Verifica se houve colisão entre a bola e a raquete 
function detectarColisaoRaquetexBola() {
  var xMaisProximo = clamp(bola.x, jogador.x, (jogador.x + jogador.largura));
  //console.log("jogadorx: " + jogador.x + " Tamanho da raquete:" + jogador.largura);

  var yMaisProximo = clamp(bola.y, jogador.y, (jogador.y + jogador.altura));

  var distanciaX = bola.x - xMaisProximo;

  var distanciaY = bola.y - yMaisProximo;

  var distancia = (Math.hypot((distanciaX * distanciaX) + (distanciaY * distanciaY)));

  // Verifica se a distância entre a bola e a raquete é menor que o raio da bola
  // Se for verifica se a colisão ocorreu na parte superior o inferior ou esquerda ou direita da raquete e chama a função inverter bola  
  if (distancia < (bola.raio * bola.raio)) {
    if ((bola.velocidadeX < 0 && bola.x < jogador.x) || (bola.velocidadeX > 0 && bola.x > jogador.x + jogador.largura)) {
      bola.inverterX();
    }
    if ((bola.velocidadeY < 0 && bola.y < jogador.y) || (bola.velocidadeY > 0 && bola.y > jogador.y + jogador.altura)) {
      bola.inverterY();
    }
    if (bola.x > jogador.x && bola.x < (jogador.x + jogador.largura)) {
      bola.inverterY();
    } else if (bola.y > jogador.y && bola.y < (jogador.y + jogador.altura)) {
      bola.inverterX();
    } else {
      bola.inverterY();
      bola.inverterX();
    }
    if (bola.x < jogador.x && bola.x > jogador.x + jogador.largura) {
      bola.inverterX();
    }
  }

}


// Detecta quando a raquete está nos limites do canvas do lado esquerdo ou direito não deixando passar desses limites
function detectarColisaoRaquetexLimite() {
  if (jogador.x <= 0) {
    jogador.x = 0;
  } else if (jogador.x + jogador.largura >= canvas.width) {
    jogador.x = canvas.width - jogador.largura;
  }
}

// Cria o tijolo com o traço meio zinzento e o preenchimento a preto
function Tijolo(x, y, largura, altura) {
  this.x = x;
  this.y = y;
  this.largura = largura;
  this.altura = altura;
  this.destruido = false;

  this.pintar = function () {
    contexto.fillRect(this.x, this.y, this.largura, this.altura);
    contexto.fillStyle = "#555555";
    contexto.strokeRect(this.x, this.y, this.largura, this.altura);
    contexto.fillStyle = "#3CB6A8";
  }

  // detecta a colisão da bola com o tijolo destruindo o tijolo e fazendo com que o tijolo mude de direção
  this.detectarColisaoTijoloxBola = function () {
    var xMaisProximo = clamp(bola.x, this.x, (this.x + this.largura));
    var yMaisProximo = clamp(bola.y, this.y, (this.y + this.altura));

    var distanciaX = bola.x - xMaisProximo;
    var distanciaY = bola.y - yMaisProximo;

    var distancia = (Math.hypot((distanciaX * distanciaX) + (distanciaY * distanciaY)));

    if (distancia < (bola.raio * bola.raio)) {
      if ((bola.x > this.x && bola.x < (this.x + this.largura))) {
        bola.inverterY();
      } else if (bola.y > this.y && bola.y < (this.y + this.altura)) {
        bola.inverterX();
      } else {
        bola.inverterY();
        bola.inverterX();
      }
      pontos += 1;
      sons[1].play();
      return true;
    } else {
      return false;
    }
  }

}

// Repõem os elementos e reseta os pontos na tela do canvas pausando a musica de perdedor
function reiniciar() {

  //if (!espacoAtivado) return;
  // espacoAtivado = false;
  estado = 2
  temporizador2 = setTimeout(() => {
    sons[2].pause();
    estado = 0;
    jogador = new Raquete(150, 580, 100, 10);
    bola = new Bola(200, 570, 10);
    //.slice faz voltar a ter todos os elementos da cópia do array tijolosRepostos
    //tijolos = tijolosRepostos.slice(); //.slice faz voltar a ter todos os elementos da cópia do array tijolosRepostos
    pontos = 0;
    nivel = 0;
    tijolos = criarTijolos(410, 50, 50, 10, 2, aumentaLinhasTijolos);
    // location.reload();
  }, 1500);
  limparTempos(temporizador3);
}

// Aumenta a velocidade da bola consoante cada nível completo.  
function aumentaVelocidadeBola(pontos) {
  //Guarda o tamnho de blocos a ser preenchidos por cada nível passo
  pontosArray = [14, 28, 42, 56, 70, 84, 98, 112, 126, 140];


  velocidade = 30;

  // guardarNivel é inicializado no array a zero e guarda esses valores na variável nível
  guardarNivel = [0];
  nivel = guardarNivel[0];

  // Guarda o valor de velocidade máxima permitida no jogo 
  let velocidadeMaxima = 5;

  for (let i = 0; i < pontosArray.length; i++) {

    // Verifica se os pontos por destruição de cada tijolo são maiores ou iguais aos do pontosArray e se o nível for o atual
    // compara de seguida a velocidade se é menor ou igual à velocidade máxima, se for vai perdendo velocidade ficando o jogo mais rápido senão a velocidade passa a ser 5   
    if (pontos >= pontosArray[i] && nivel == guardarNivel[0]) {
      velocidade <= velocidadeMaxima ? velocidade -= 3 : velocidade = 5;
      //velocidade -= 2;

      //incrementa 1 valor dentro da posição zero do array guardarNivel e guarda esse valor na variável nivel
      guardarNivel[0]++;
      nivel = guardarNivel[0];
      setarhiscore();

    }

  }

  acelerarJogo(velocidade);

}

// Guarda o valor declarado na variável novoIntervalo e depois limpa o tempo de execução do temporizador anterior criando um novo intervalo de tempo
function acelerarJogo(tempo) {
  var novoIntervalo = tempo - 2;
  limparTempos(temporizador);
  temporizador = setInterval(mainloop, novoIntervalo);
  console.log(novoIntervalo);
}


// Verifica se o botão foi clicado, 
// Se foi de ser cria um novo elemento p com uma mensagem aplicando vários estilos
// removendo-a após um período de tempo exibida no ecrã fazendo um refresh à página
function reiniciarHiscore(evento) {
  if (evento.button === 0) {
    //Reseta o hiscore armazenado
    dado = localStorage.clear();

    var mensagem = document.createElement("p");
    mensagem.innerHTML = "O H-Score Foi Reiniciado com sucesso!";
    mensagem.style.color = "#3CB6A8";
    mensagem.style.textAlign = "center";
    mensagem.style.fontSize = "1.2em";
    document.body.appendChild(mensagem);


    // Remove a mensagem passado um determinado tempo
    temporizador3 = setTimeout(() => {
      mensagem.remove();
    }, temporizador3);

    limparTempos(2000);

    // Faz o refresh à página
    location.reload();

  }
}

// Desabilita o butão do H-score
function desabilitarButao() {
  var desabilitarBtn = document.getElementById("reiniciarHiscore");
  desabilitarBtn.disabled = true;
}

// Habilita o butão do H-score
function habilitarButao() {
  var ativarBtn = document.getElementById("reiniciarHiscore");
  ativarBtn.disabled = false;
}

//Cria os tijolos em relação à altura e largura do canvas
function criarTijolos(larguraCanvas, alturaCanvas, larguraTijolo, alturaTijolo, quantidadeComprimento, quantidadeLargura) {
  var tijolos = [];
  var x, y;

  for (let i = 0; i < quantidadeComprimento; i++) {
    //  tijolos.length % 2 == 1 ? null : tijolos.splice(Math.floor(Math.random() * (tijolos.length + i + 1)) + i, 1);
    for (let j = 0; j < quantidadeLargura; j++) {
      //  tijolos.length % 2 == 0 ? null : tijolos.splice(Math.floor(Math.random() * (tijolos.length + i + 1)) + i, 3);
      x = j * (larguraTijolo + 2.5);
      y = i * (alturaTijolo + 2.5);
      var tijolo = new Tijolo(x + 18, y + 10, 50, 10);
      if (!tijolo.destruido) {
        tijolos.push(tijolo);
      } else {
        tijolos.slice(x, y);
      }
    }
  }
  return tijolos;
}

tijolos = criarTijolos(410, 50, 50, 10, aumentaColunasTijolos, aumentaLinhasTijolos);

//Limpa os tempos do clearTimeout e clearInterval
function limparTempos(tempo) {
  clearTimeout(tempo);
  clearInterval(tempo);
}

















