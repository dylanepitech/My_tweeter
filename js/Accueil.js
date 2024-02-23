$(document).ready(function () {
  $("#twitt").submit(function (e) {
    e.preventDefault();

    const formdata = new FormData($(this)[0]);

    $.ajax({
      type: "POST",
      url: "http://localhost:8888/My_tweeter/accueil",
      data: formdata,
      processData: false,
      contentType: false,
      success: function (response) {},
    });
    location.reload(true);
  });
});

//like
function getCookie(name) {
  const cookieString = document.cookie;
  const cookies = cookieString.split(";");

  for (let cookie of cookies) {
    const [cookieName, cookieValue] = cookie.split("=");
    if (cookieName.trim() === name) {
      return decodeURIComponent(cookieValue);
    }
  }
}

$(document).ready(function () {
  $(".like-button").on("click", function (e) {
    e.preventDefault();
    const myCookieValue = getCookie("user_id");
    const id_post = $(this).data("post-id");
    const array = { id_user: myCookieValue, id_post: id_post };
    if (myCookieValue !== null) {
      $.ajax({
        type: "POST",
        url: "http://localhost:8888/My_tweeter/accueil_like",
        data: array,
        dataType: "json",
        success: function (response) {
          if (response.status == "success") {
            console.log(response);
            location.reload(true);
          }
        },
        error: function (xhr, status, error) {},
      });
    } else {
      console.log("Le cookie user_id n'existe pas.");
    }
  });
});
