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
      success: function (response) {
        if (response.status == "success") {
          window.location.href = "accueil";
          return;
        }
      },
    });
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

const like = document.querySelector(".like");
like.addEventListener("click", (e) => {
  e.preventDefault();
  const myCookieValue = getCookie("user_id");

  const id_post = e.target.id;

  const array = { id_user: myCookieValue, id_post: id_post };
  if (myCookieValue !== null) {
    $.ajax({
      type: "POST",
      url: "http://localhost:8888/My_tweeter/accueil_like",
      data: array,
      dataType: "json",
      success: function (response) {},
    });
  } else {
    console.log("Le cookie mon_cookie n'existe pas.");
  }
});
