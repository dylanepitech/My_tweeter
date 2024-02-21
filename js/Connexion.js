const body = document.querySelector("body");
const alertDiv = document.createElement("div");

if (document.cookie.includes("inscription=success")) {
  alertDiv.classList.add("alert-success", "flex", "center", "item-center");
  alertDiv.textContent = "Inscription réussie !";
  body.prepend(alertDiv);
}
document.cookie = "inscription=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC";

$("#formulaire_connexion").submit(function (e) {
  e.preventDefault();
  const email = document.getElementById("email");
  const password = document.getElementById("password");
  const error = document.getElementById("error");

  if (email.value.length < 3) {
    error.textContent = "Email incorrect";
    return;
  }
  error.textContent = "";

  if (password.value.length < 5) {
    error.textContent = "Mot de passe incorrect";
    return;
  }
  error.textContent = "";
  const value = $("#formulaire_connexion").serialize();

  $.ajax({
    type: "POST",
    url: "http://localhost:8888/My_tweeter/connexion",
    data: value,
    dataType: "json",
    success: function (response) {
      if (response.status == "success") {
        window.location.href = "accueil";
      } else {
        error.textContent = "Connexion refuser";
      }
    },
  });
});
