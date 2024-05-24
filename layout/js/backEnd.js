$(document).ready(function () {
  $("select").selectBoxIt({
    // Uses the jQuery 'fadeIn' effect when opening the drop down
    showEffect: "fadeIn",

    // Sets the jQuery 'fadeIn' effect speed to 400 milleseconds
    showEffectSpeed: 400,

    // Uses the jQuery 'fadeOut' effect when closing the drop down
    hideEffect: "fadeOut",

    // Sets the jQuery 'fadeOut' effect speed to 400 milleseconds
    hideEffectSpeed: 400,
  });

  $("[placeholder]")
    .focus(function () {
      $(this).attr("data-text", $(this).attr("placeholder"));

      $(this).attr("placeholder", "");
    })
    .blur(function () {
      $(this).attr("placeholder", $(this).attr("data-text"));
    });
  // ******************************************************************
  // var passFeiled = $(".password");
  // $(".show-pass").hover(
  //   function () {
  //     passFeiled.attr("type", "text");
  //   },
  //   function () {
  //     passFeiled.attr("type", "password");
  //   }
  // );
  //  *****************************************************************

  $(".confirm").click(function () {
    return confirm("Are You Sure You Want To Delete This Member");
  });
});
