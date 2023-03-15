function responsiveMenu() {
  var x = document.getElementById("myMenu");
  if (x.className === "menu") {
    x.className += " responsive";
  } else {
    x.className = "menu";
  }
}

function message() {
  let employ = "WebSoft";
  alert(`Seja bem vindo à ${employ}.`);
}

