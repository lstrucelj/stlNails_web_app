$(document).ready(function(){
    $("#signup_btn"), click(function(){
        $("#main").animate({left:"22.5%"}, 300);
        $("#main").animate({left:"30%"}, 500);

        $("#login_form").css("visibility", "hidden");
        $("#login_form").form({left:"30%"}, 400);

        $("#signup_form").css("visibility", "visible");
        $("#signup_form").animate({left: "23%"}, 400);
        $("#signup_form").animate({left: "30%"}, 500);
    });
});

$(document).ready(function () {
    $("#login_btn").click(function (){
        $("#main").animate({left:"77.5%"}, 300);
        $("#main").animate({left:"70%"}, 500);

        $("#login_form").css("visibility", "visible");
        $("#login_form").animate({left: "83.5%"}, 400);
        $("#login_form").animate({left: "70%"}, 500);

        $("#signup_form").css("visibility", "hidden");
        $("#signup_form").animate({left: "75%"}, 400)
    });

});

