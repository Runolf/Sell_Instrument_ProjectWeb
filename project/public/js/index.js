
const allStars = document.querySelectorAll(".fa-star");
const rating = document.querySelector(".rating");
//console.log("allStars", allStars);

init();

function init(){
  allStars.forEach((star) => {
      star.addEventListener("click",  saveRating);
      star.addEventListener("mouseover",  addCss);
      star.addEventListener("mouseleave",  removeCss);
  })
}

function saveRating(e){
  //console.log(e);
  // console.dir(e.target); // affiche toutes les données du span. Permet aussi de voir le data-set ;)
  //console.log(e.target.nodeName, e.target.nodeType); // nodeName = SPAN, nodeType = 1 (1 = SPAN,  3 pour les champs txt par exemple)
  //console.log(e.target.dataset);

  removeEventListenerToAllStars();
  rating.innerText = e.target.dataset.star; // recupère la valeur de l'etoile. 1,2,3,4 ou 5. data-star = chiffre dans le html.
}

function addCss(e, css="star_checked"){
  const overedStar = e.target;
  overedStar.classList.add(css);
  const previousSiblings = getPreviousSiblings(overedStar);
  //console.log("previousSiblings", previousSiblings);
  previousSiblings.forEach((elem) => elem.classList.add(css));

}

function removeCss(e, css="star_checked") {
  const overedStar = e.target;
  overedStar.classList.remove(css);
  const previousSiblings = getPreviousSiblings(overedStar);
  previousSiblings.forEach((elem) => elem.classList.remove(css));

}

function getPreviousSiblings(elem) {
  console.log("elem.previousSibling " , elem.previousSibling);
  let siblings = [];
  const spanNodeType = 1; // 1 == SPAN

  while (elem = elem.previousSibling) { // on boucle tant qu'on a un element frère à l'element courant(l'etoile mouseover)
    if (elem.nodeType === 1) {
      siblings = [elem, ...siblings];
    }
  }
  return siblings;
}

function removeEventListenerToAllStars() {
    allStars.forEach((star) => {
      star.removeEventListener("click", saveRating);
      star.removeEventListener("mouseover", addCss);
      star.removeEventListener("mouseleave", removeCss);
    });

}
