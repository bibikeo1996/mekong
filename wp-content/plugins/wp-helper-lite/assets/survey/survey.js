jQuery(document).ready(function () {
  let surveyID = jQuery(".survey").attr('id');
  jQuery(`#${surveyID} .survey-toggle, #${surveyID} .survey-head`).click(function () {
    jQuery(`#${surveyID} .survey-body`).toggleClass("active");
    jQuery(`#${surveyID} .survey-toggle i`).toggleClass("fa-angle-down fa-angle-up");
  });
  jQuery(`#${surveyID} .star-rating__input`).change(function () {
    let valueSurvey = jQuery(".radio-input:checked").val();
    if (valueSurvey) {
      jQuery("#surveySubmit").prop("disabled", false);
    }
  });
  jQuery(`#${surveyID} .radio-input`).change(function () {
    let valueSurvey = jQuery(this).val();
    let starSurvey = jQuery(".star-rating__input:checked").val();
    if (starSurvey) {
      jQuery("#surveySubmit").prop("disabled", false);
    } else {
      jQuery("#surveySubmit").prop("disabled", true);
    }
  });
  let isShow = localStorage.getItem(`isshow`);
  if (isShow == null && isShow != surveyID) {
    jQuery(`#${surveyID}.survey`).show();
  }
  console.log(localStorage);
  jQuery(`#${surveyID} #surveySubmit`).click(function () {
    let valueSurvey = jQuery(".radio-input:checked").val();
    let starSurvey = jQuery(".star-rating__input:checked").val();
    let comment = jQuery("#comment").val();
    let btnName = "Đánh giá";
    let loading = jQuery(this).data("loading-text");
    
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
      url: ajaxurl,
      data: data,
      dataType: "json",
      success: function (response) {
        console.log(response);
        jQuery(this).html(btnName);
        let status = response.status;
        if (status == 200) {
          jQuery(`#${surveyID} .survey-body`).html(response.msg);
          localStorage.setItem(`isshow`, surveyID);
        }
      },
    });
  });
});
