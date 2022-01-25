$(document).ready(function () {
  $("ul li ").click(function () {
    $(this).parent().children().removeClass("selected");
    $(this).addClass("selected");

    $(".content > div").hide();
    // $(this)

    $($(this).data("value")).fadeIn();
  });
});

$(document).ready(function () {
  $("#homes").parent().children().removeClass("selected");
  $("#homes").addClass("selected");
});

$(document).ready(function () {
  $("#homes").click(function (e) {
    e.preventDefault();
    $(".info").hide();
    $(".view").hide();
    $(".result").hide();
    $(".student").hide();
    $(".home").show();

    $("#homes").parent().children().removeClass("selected");
    $("#homes").addClass("selected");
  });
});

$(document).ready(function () {
  $("#quizs").click(function (e) {
    e.preventDefault();
    $(".info").hide();
    $(".view").hide();
    $(".result").hide();
    $(".student").hide();
    $(".quiz").show();

    $("#quizs").parent().children().removeClass("selected");
    $("#quizs").addClass("selected");
  });
});

$(document).ready(function () {
  $("#infos").click(function (e) {
    e.preventDefault();
    $(".quiz").hide();
    $(".view").hide();
    $(".result").hide();
    $(".student").hide();
    $(".info").show();

    $("#infos").parent().children().removeClass("selected");
    $("#infos").addClass("selected");
  });
});

$(document).ready(function () {
  $("#students").click(function (e) {
    e.preventDefault();
    $(".info").hide();
    $(".view").hide();
    $(".result").hide();
    $(".quiz").hide();
    $(".student").show();

    $("#students").parent().children().removeClass("selected");
    $("#students").addClass("selected");
  });
});

$(document).ready(function () {
  $("#views").click(function (e) {
    e.preventDefault();
    $(".student").hide();
    $(".info").hide();
    $(".quiz").hide();
    $(".result").hide();
    $(".view").show();

    $("#views").parent().children().removeClass("selected");
    $("#views").addClass("selected");
  });
});

$(document).ready(function () {
  $("#results").click(function (e) {
    e.preventDefault();
    $(".info").hide();
    $(".student").hide();
    $(".view").hide();
    $(".result").show();

    $("#results").parent().children().removeClass("selected");
    $("#results").addClass("selected");
  });
});

$(document).ready(function () {
  $("#add").click(function (e) {
    $(".add").append("<form>");
    $(".add").append("<div>").addClass("input-group mb-3 rn");

    $(".add").append(
      '<div class="input-group mb-3 rn" style="padding-top:20px;">'
    );
    $(".add").append(
      '<span class="input-group-text" id="basic-addon1">Q1</span>'
    );
    $(".add").append(
      '<input type="text" class="form-control fw" placeholder="Enter Your Question">'
    );
    $(".add").append("</div>");
    $(".add").append('<div class="input-group pb">');
    $(".add").append(
      '<span class="input-group-text" id="basic-addon1">A1</span>'
    );
    $(".add").append('<input type="text" class="form-control">');

    $(".add").append('<div class="input-group-text">');

    $(".add").append(
      '<input class="form-check-input mt-0" type="radio" value="">'
    );
    $(".add").append("</div>");
    $(".add").append('<div class="input-group pb">');
    $(".add").append(
      '<span class="input-group-text" id="basic-addon1">A1</span>'
    );
    $(".add").append('<input type="text" class="form-control">');

    $(".add").append('<div class="input-group-text">');

    $(".add").append(
      '<input class="form-check-input mt-0" type="radio" value="">'
    );
    $(".add").append("</div>");
    $(".add").append('<div class="input-group pb">');
    $(".add").append(
      '<span class="input-group-text" id="basic-addon1">A1</span>'
    );
    $(".add").append('<input type="text" class="form-control">');

    $(".add").append('<div class="input-group-text">');

    $(".add").append(
      '<input class="form-check-input mt-0" type="radio" value="">'
    );
    $(".add").append("</div>");
    $(".add").append("</div>");
    $(".add").append('<div class="input-group pb">');
    $(".add").append(
      '<span class="input-group-text" id="basic-addon1">A1</span>'
    );
    $(".add").append('<input type="text" class="form-control">');

    $(".add").append('<div class="input-group-text">');

    $(".add").append(
      '<input class="form-check-input mt-0" type="radio" value="">'
    );
    $(".add").append("</div>");
    $(".add").append("</div>");

    $(".new").append("mih");
  });
});
