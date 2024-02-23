$("#formulaire_profile").submit(function (e) {
  e.preventDefault();

  const value = $("#formulaire_profile").serialize();

  $.ajax({
    type: "POST",
    url: "http://localhost:8888/My_tweeter/profil",
    data: value,
    dataType: "json",
    success: function (response) {
      if (response.status == "success") {
        location.reload(true);
        return;
      }
    },
  });
});
