<?php
defined( 'ABSPATH' ) || exit;
/**
 *
 * Field: Btn_A
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'CSF_Field_Btn_A' ) ) {
class CSF_Field_Btn_A extends CSF_Fields {
public $value = '';
public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
parent::__construct( $field, $value, $unique, $where, $parent );
}
public function render() {
echo esc_html( $this->field_before() );
echo '<a class="btn mbwp-btn-install" target="_blank" href="' . esc_attr( $this->value ) . '"> Cài đặt</a>';
echo esc_html( $this->field_after() );
}
}
}
