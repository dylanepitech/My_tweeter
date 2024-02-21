$("#formulaire_inscription").submit(function (e) {
  e.preventDefault();

  const firstname = document.getElementById("firstname");
  const lastname = document.getElementById("lastname");
  const city = document.getElementById("city");
  const password = document.getElementById("password");
  const pseudo = document.getElementById("pseudo");
  const phone = document.getElementById("phone");
  const email = document.getElementById("email");
  const error = document.getElementById("error");

  if (firstname.value.length < 2 || firstname.value.length > 255) {
    error.textContent = "Prénom invalide";
    return;
  }
  if (lastname.value.length < 2 || lastname.value.length > 255) {
    error.textContent = "Nom invalide";
    return;
  }
  if (city.value.length < 2 || city.value.length > 255) {
    error.textContent = "Ville invalide";
    return;
  }
  if (pseudo.value.length < 2 || pseudo.value.length > 255) {
    error.textContent = "Pseudo invalide";
  }
  if (phone.value.length < 1 || phone.value.length > 10) {
    error.textContent = "Téléphone invalide";
    return;
  }
  if (email.value.length < 3 || email.value.length > 255) {
    error.textContent = "Email invalide";
    return;
  }
  if (password.value.length < 6 || password.value.length > 255) {
    error.textContent = "Mot de passe invalide ";
    return;
  }

  const value = $("#formulaire_inscription").serialize();
  $.ajax({
    type: "POST",
    url: "http://localhost:8888/My_tweeter/inscription",
    data: value,
    dataType: "json",
    success: function (response) {
      if (response.status == "success") {
        let date = new Date(Date.now() + 86400000);
        date = date.toUTCString();
        document.cookie = "inscription=success; path=/; expires=" + date;
        window.location.href = "connexion";
      } else {
        error.textContent = "Erreur l'or de l'inscription";
      }
    },
  });
});
