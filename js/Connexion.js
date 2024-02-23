const error = document.getElementById("error");
const error2 = document.getElementById("error2");
const body = document.querySelector("body");
const alertDiv = document.createElement("div");

if (document.cookie.includes("inscription=success")) {
  alertDiv.classList.add("alert-success", "flex", "center", "item-center");
  alertDiv.textContent = "Inscription réussie !";
  body.prepend(alertDiv);
  document.cookie =
    "inscription=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC";
}
if (document.cookie.includes("reactivation=success")) {
  alertDiv.classList.add("alert-success", "flex", "center", "item-center");
  alertDiv.textContent = "Réactivation réussite !";
  body.prepend(alertDiv);
  document.cookie =
    "reactivation=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC";
}

$("#formulaire_reactivation").submit(function (e) {
  e.preventDefault();
  const email_reactivate = document.getElementById("email_reactivate");
  const value = $("#formulaire_reactivation").serialize();

  if (email_reactivate.value.length < 3) {
    error2.textContent = "Email incorrect";
    return;
  }

  $.ajax({
    type: "POST",
    url: "http://localhost:8888/My_tweeter/connexion_reactivate",
    data: value,
    dataType: "json",
    success: function (response) {
      if (response.status == "success") {
        let date = new Date(Date.now() + 86400000);
        date = date.toUTCString();
        document.cookie = "reactivation=success; path=/; expires=" + date;
        window.location.href = "connexion";
      } else {
        error2.textContent = "Erreur compte deja activer ou innexistant.";
      }
    },
  });
});

$("#formulaire_connexion").submit(function (e) {
  e.preventDefault();
  const email = document.getElementById("email");
  const password = document.getElementById("password");

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
