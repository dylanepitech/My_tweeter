$(document).ready(function () {
  const body = document.querySelector("body");
  const alertDiv = document.createElement("div");

  $("#twitt").submit(function (e) {
    e.preventDefault();

    const value = $("#twitt").serialize();

    $.ajax({
      type: "POST",
      url: "http://localhost:8888/My_tweeter/accueil",
      data: value,
      dataType: "json",
      success: function (response) {
        if (response.status == "success") {
          window.location.href = "http://localhost:8888/My_tweeter/accueil";
        } else {
          $(alertDiv).addClass("alert alert-danger");
          $(alertDiv).text("Impossible de twitter");
          $(body).prepend(alertDiv);
        }
      },
    });
  });
});
