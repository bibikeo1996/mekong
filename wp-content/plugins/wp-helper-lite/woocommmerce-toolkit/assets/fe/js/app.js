jQuery(document).ready(function () {
  jQuery(".mb-buynow-button").click(function (e) {
    e.preventDefault();
    let thisParent = jQuery(this).parents("form.cart");
    if (jQuery(".single_add_to_cart_button", thisParent).hasClass("disabled")) {
      jQuery(".single_add_to_cart_button", thisParent).trigger("click");
      return false;
    }
    thisParent.addClass("mb-hpwc-quickbuy");
    jQuery(".is_buy_now", thisParent).val("1");
    jQuery(".single_add_to_cart_button", thisParent).trigger("click");
  });
  jQuery(".mb_hpwc_invoice_vat_input").on("change", function () {
    let parentVAT = jQuery(".mb_hpwc_invoice_vat_input").closest(
      ".mb_hpwc_invoice_vat"
    );
    if (jQuery(".mb_hpwc_invoice_vat_input").is(":checked")) {
      parentVAT.addClass("active_invoice_vat");
    } else {
      parentVAT.removeClass("active_invoice_vat");
    }
  });
  jQuery(window).on('load', function(){
    if(jQuery('.single-product div#tab-description.compact-active').length > 0){
        var wrap = jQuery('.single-product div#tab-description');
        var current_height = wrap.height();
        var your_height = 300;
        if(current_height > your_height){
            wrap.css('height', your_height+'px');
            wrap.append(function(){
                return '<div class="mbhp_wc_btn_readmore mbhp_wc_btn_readmore_more"><a title="Xem thêm" href="javascript:void(0);">Xem thêm</a></div>';
            });
            wrap.append(function(){
                return '<div class="mbhp_wc_btn_readmore mbhp_wc_btn_readmore_less" style="display: none;"><a title="Xem thêm" href="javascript:void(0);">Thu gọn</a></div>';
            });
            jQuery('body').on('click','.mbhp_wc_btn_readmore_more', function(){
                wrap.removeAttr('style');
                jQuery('body .mbhp_wc_btn_readmore_more').hide();
                jQuery('body .mbhp_wc_btn_readmore_less').show();
            });
            jQuery('body').on('click','.mbhp_wc_btn_readmore_less', function(){
                wrap.css('height', your_height+'px');
                jQuery('body .mbhp_wc_btn_readmore_less').hide();
                jQuery('body .mbhp_wc_btn_readmore_more').show();
            });
        }
    }
});
});
