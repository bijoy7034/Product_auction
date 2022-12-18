$(".carousel-item *").addClass("d-none");


setTimeout(function() {
  $(".carousel-item.active *")
    .removeClass("d-none")
    .addClass("animated");
}, 700);


$("#mainBanner").on("slid.bs.carousel", function(e) {

  $(".carousel-item *").addClass("d-none");


  var c = e["relatedTarget"];

  setTimeout(function() {
    $(c)
      .find("*")
      .removeClass("d-none")
      .addClass("animated");
    console.log("c");
  }, 700);
});
