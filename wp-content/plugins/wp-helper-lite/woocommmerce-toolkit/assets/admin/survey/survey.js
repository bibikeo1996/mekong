jQuery(document).ready(function () {
  
  jQuery(".survey-toggle,.survey-head").click(function () {
    jQuery(".survey-body").toggleClass("active");
    jQuery(".survey-toggle i").toggleClass("fa-angle-down fa-angle-up");
  });
  jQuery(".star-rating__input").change(function () {
    let valueSurvey = jQuery(".radio-input:checked").val();
    if (valueSurvey) {
      jQuery("#surveySubmit").prop("disabled", false);
    }
  });
  jQuery(".radio-input").change(function () {
    let valueSurvey = jQuery(this).val();
    let starSurvey = jQuery(".star-rating__input:checked").val();
    if (starSurvey) {
      jQuery("#surveySubmit").prop("disabled", false);
    } else {
      jQuery("#surveySubmit").prop("disabled", true);
    }
  });
  let isShow = localStorage.getItem("isshow");
  if (!isShow) {
    jQuery(".survey").show();
  }
  console.log(isShow);
  jQuery("#surveySubmit").click(function () {
    let valueSurvey = jQuery(".radio-input:checked").val();
    let starSurvey = jQuery(".star-rating__input:checked").val();
    let comment = jQuery("#comment").val();
    let btnName = "Đánh giá";
    let loading = jQuery(this).data("loading-text");
    let url = mb_ajax_object.ajax_url;
    let data = {
      action : "surveySubmit",
      valueSurvey: valueSurvey,
      starSurvey: starSurvey,
      comment: comment,
    };
    console.log(data);
    jQuery(this).html(loading);
    jQuery.ajax({
      type: "get",
      url: url,
      data: data,
      dataType: "json",
      success: function (response) {
        console.log(response);
        jQuery(this).html(btnName);
        let status = response.status;
        if (status == 200) {
          jQuery(".survey-body").html(response.msg);
          localStorage.setItem("isshow", 1);
        }
      },
    });
  });
});
