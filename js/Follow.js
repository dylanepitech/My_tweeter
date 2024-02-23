$.ajax({
  type: "POST",
  url: "http://localhost:8888/My_tweeter/delete_follower",
  data: "data",
  dataType: "json",
  success: function (response) {
    console.log(response);
  },
});
