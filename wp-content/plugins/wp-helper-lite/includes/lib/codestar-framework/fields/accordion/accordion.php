<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: accordion
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'CSF_Field_accordion' ) ) {
  class CSF_Field_accordion extends CSF_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $unallows = array( 'accordion' );

      echo $this->field_before();

      echo '<div class="csf-accordion-items">';

      foreach ( $this->field['accordions'] as $key => $accordion ) {
//        echo '<pre>';
//        print_r($accordion);
//        echo '</pre>';
//        break;
        echo '<div class="csf-accordion-item">';

          $icon = ( ! empty( $accordion['icon'] ) ) ? 'csf--icon '. $accordion['icon'] : 'csf-accordion-icon fas fa-angle-right';
          if(!empty($accordion['desc'])){
              echo '<div class="csf-accordion-desc">'.$accordion['desc'].'</div>';
          }
          echo '<h4 class="csf-accordion-title">';
          echo esc_html( $accordion['title'] );
          echo '<i class="icon-help fas fa-question-circle"></i>';
          echo '<i class="'. esc_attr( $icon ) .'"></i>';
          echo '</h4>';
          echo '<div class="csf-accordion-content">';

          foreach ( $accordion['fields'] as $field ) {

            if ( in_array( $field['type'], $unallows ) ) { $field['_notice'] = true; }

            $field_id      = ( isset( $field['id'] ) ) ? $field['id'] : '';
            $field_default = ( isset( $field['default'] ) ) ? $field['default'] : '';
            $field_value   = ( isset( $this->value[$field_id] ) ) ? $this->value[$field_id] : $field_default;
            $unique_id     = ( ! empty( $this->unique ) ) ? $this->unique .'['. $this->field['id'] .']' : $this->field['id'];

            CSF::field( $field, $field_value, $unique_id, 'field/accordion' );

          }
          echo '<div class="csf_btn-submit btn-inner-accordion">
                      <button type="submit" name="_prefix_my_options[_nonce][save]" class="button button-primary csf-top-save csf-save csf-save-ajax" data-save="Đang lưu...">
                          <img src="'.MBWP_HP_URL.'assets/images/admin/Luu.svg" alt="save">
                          Lưu</button>
                  </div>';
          echo '</div>';

        echo '</div>';

      }

      echo '</div>';

      echo $this->field_after();

    }

  }
}
