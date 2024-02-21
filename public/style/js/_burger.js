const burger = document.getElementById("burger");
const nav = document.getElementById("nav_corp");
const connexion = document.getElementById("connexion");
const inscription = document.getElementById("inscription");

connexion.addEventListener("click", () => {
  window.location.href = "connexion";
});

inscription.addEventListener("click", () => {
  window.location.href = "inscription";
});

console.log(burger, nav);

$e = 0;

burger.addEventListener("click", () => {
  if ($e == 0) {
    nav.style.transform = "translateX(0px)";
    $e = 1;
    return;
  }
  if ($e == 1) {
    nav.style.transform = "translateX(-200px)";
    $e = 0;
    return;
  }
});
