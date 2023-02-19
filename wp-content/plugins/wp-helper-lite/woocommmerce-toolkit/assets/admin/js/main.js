const urlCurrent = window.location.search;
const urlParams = new URLSearchParams(urlCurrent);
const currentPage = urlParams.get("page");

// if (currentPage == "plugin-options-general-settings") {
//   window.onbeforeunload = function (e) {
//     e = e || window.event;
//     // For IE and Firefox prior to version 4
//     jQuery.ajax({
//       type: "get",
//       url: mb_ajax_object.ajax_url,
//       data: { action: "removeDataTempo" },
//       dataType: "json",
//       success: function (response) {
//         console.log(response);
//       },
//     });
//     if (e) {
//       e.returnValue = "Any string";
//     }
//     // For Safari
//     return "Any string";
//   };
// }
jQuery(document).ready(function () {
  const currentURL = window.location.search;
  const currentURLParams = new URLSearchParams(currentURL);
  let currentID = currentURLParams.get("id");
  currentID = currentID ? currentID : "cta";
  let url = mb_ajax_object.ajax_url;
  jQuery(`.panel-menu-item[data-id=${currentID}]`).addClass("active");
  showPreviewImage(jQuery(`.panel-menu-item[data-id=${currentID}]`));
  jQuery(".panel-menu-item")
    .not(`.panel-menu-item[data-id=${currentID}]`)
    .removeClass("active");
  showHtmlPanel(url, currentID);
  jQuery(".panel-menu-item").click(function () {
    let id = jQuery(this).data("id");
    showPreviewImage(jQuery(this));
    jQuery(this).addClass("active");
    jQuery(".panel-menu-item").not(this).removeClass("active");
    showHtmlPanel(url, id);
  });
  jQuery("#updateSetting").click(function () {
    let id = jQuery(this).data("id");
    jQuery(this).text("Đang cập nhật ... ");
    jQuery.ajax({
      type: "get",
      url: url,
      data: { action: "getSettingInfo" },
      dataType: "json",
      success: function (response) {
        console.log(response);
        jQuery.toast({
          text: "Bạn đã cập nhật cài đặt thành công", // Text that is to be shown in the toast
          heading: "Thông báo", // Optional heading to be shown on the toast
          icon: "success", // Type of toast icon
          showHideTransition: "fade", // fade, slide or plain
          allowToastClose: true, // Boolean value true or false
          hideAfter: 5000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
          stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
          position: "bottom-right", // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values

          textAlign: "left", // Text alignment i.e. left, right or center
          loader: true, // Whether to show loader or not. True by default
          loaderBg: "#9ec600", // Background color of the toast loader
          beforeShow: function () {}, // will be triggered before the toast is shown
          afterShown: function () {
            const urlCurrent = window.location.search;
            window.location.href = `${urlCurrent}&id=${id}`;
          }, // will be triggered after the toat has been shown
          beforeHide: function () {}, // will be triggered before the toast gets hidden
          afterHidden: function () {}, // will be triggered after the toast has been hidden
        });
        // swal(
        //   "Thành công",
        //   "Bạn đã cập nhật cài đặt thành công",
        //   "success"
        // ).then(function () {
        //   const urlCurrent = window.location.search;
        //   window.location.href = `${urlCurrent}&id=${id}`;
        // });
      },
    });
  });
  jQuery(window).on("beforeunload", function () {
    jQuery.ajax({
      type: "get",
      url: mb_ajax_object.ajax_url,
      data: { action: "removeDataTempo" },
      dataType: "json",
      success: function (response) {
        console.log(response);
      },
    });
  });
  jQuery(".upload_input_qr").each(function (i, e) {
    jQuery(e).hide();
    jQuery(e).after(
      '<div class="wp-hp-wc-preview-qrcode"><img id="placeholder_' +
        jQuery(e).attr("name") +
        '" src="' +
        jQuery(e).val() +
        '"></div>'
    );
    jQuery(e).after(
      '<input type="button" class="btn_upload_qr button button-primary button-large" data-forinput="' +
        jQuery(e).attr("name") +
        '" value="Chọn Hình">'
    );
  });
  jQuery(".btn_upload_qr").on("click", function (e) {
    e.preventDefault();
    var inputName = jQuery(this).data("forinput");
    var custom_uploader = wp
      .media({
        title: "Chọn Hình QR Code",
        button: {
          text: "Chọn",
        },
        multiple: false,
      })
      .on("select", function () {
        var attachment = custom_uploader
          .state()
          .get("selection")
          .first()
          .toJSON();
        jQuery('input[name="' + inputName + '"]').val(attachment.url);
        jQuery("#placeholder_" + inputName).attr("src", attachment.url);
      })
      .open();

    return false;
  });
});
function showHtmlPanel(url, id) {
  jQuery("#updateSetting").attr("data-id", id);
  showLoading();
  jQuery.ajax({
    type: "get",
    url: url,
    data: { action: "showHtmlPanel", id: id },
    dataType: "html",
    success: function (response) {
      jQuery(".panel-custom .panel-content").html(response);
      jQuery(".setting-value").change(function () {
        let id = jQuery(this).attr("id");
        let key = jQuery(this).data("key");
        let value = jQuery(this).val();
        let type = jQuery(this).attr("type");
        if (type == "checkbox") {
          if (jQuery(this).is(":checked")) {
            value = 1;
            jQuery(this).val(1);
          }
        }
        saveTemporary(key, id, value);
      });
    },
  });
}
function showPreviewImage(ele) {
  let image = ele.data("image");
  let previewDefault = jQuery(".preview-default");
  image = image ? image : previewDefault.data("placeholder");
  jQuery(".preview-default").attr("src", image);
}
const saveTemporary = (id = "", key = "", value = "") => {
  jQuery.ajax({
    type: "get",
    url: mb_ajax_object.ajax_url,
    data: { action: "saveTempo", id: id, key: key, value: value },
    dataType: "json",
    success: function (response) {
      console.log(response);
    },
  });
};
function showLoading() {
  let loading = ` <div class="card-loading">
    <div class="double-loading">
        <div class="c1"></div>
        <div class="c2"></div>
    </div>
    </div>`;
  jQuery(".panel-custom .panel-content").html(loading);
  jQuery(".card-loading").css("display", "flex");
}
