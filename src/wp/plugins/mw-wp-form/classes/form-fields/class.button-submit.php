<?php
/**
 * Name       : MW WP Form Field Button Submit
 * Description: 送信ボタン（button）を出力
 * Version    : 1.0.0
 * Author     : Takashi Kitajima
 * Author URI : http://2inc.org
 * Created    : December 26, 2016
 * Modified   :
 * License    : GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
class MW_WP_Form_Field_Button_Submit extends MW_WP_Form_Abstract_Form_Field {

	/**
	 * $type
	 * フォームタグの種類 input|select|button|input_button|error|other
	 * @var string
	 */
	public $type = 'button';

	/**
	 * set_names
	 * shortcode_name、display_nameを定義。各子クラスで上書きする。
	 * @return array shortcode_name, display_name
	 */
	protected function set_names() {
		return array(
			'shortcode_name' => 'mwform_bsubmit',
			'display_name'   => __( 'Submit Button', 'mw-wp-form' ),
		);
	}

	/**
	 * set_defaults
	 * $this->defaultsを設定し返す
	 * @return array defaults
	 */
	protected function set_defaults() {
		return array(
			'name'            => '',
			'class'           => null,
			'value'           => 'send',
			'element_content' => __( 'Send', 'mw-wp-form' ),
			'display_input'   => 'false',
		);
	}

	/**
	 * input_page
	 * 入力ページでのフォーム項目を返す
	 * @return string HTML
	 */
	protected function input_page() {
		if ( $this->atts['display_input'] === 'false' ) {
			return;
		}

		return $this->Form->button_submit(
			$this->atts['name'],
			$this->atts['value'],
			array(
				'class' => $this->atts['class'],
			),
			$this->element_content
		);
	}

	/**
	 * confirm_page
	 * 確認ページでのフォーム項目を返す
	 * @return string HTML
	 */
	protected function confirm_page() {
		return $this->Form->button_submit(
			$this->atts['name'],
			$this->atts['value'],
			array(
				'class' => $this->atts['class'],
			),
			$this->element_content
		);
	}

	/**
	 * add_mwform_tag_generator
	 * フォームタグジェネレーター
	 */
	public function mwform_tag_generator_dialog( array $options = array() ) {
		?>
		<p>
			<strong>name<span class="mwf_require">*</span></strong>
			<?php $name = $this->get_value_for_generator( 'name', $options ); ?>
			<input type="text" name="name" value="<?php echo esc_attr( $name ); ?>" />
		</p>
		<p>
			<strong>class</strong>
			<?php $class = $this->get_value_for_generator( 'class', $options ); ?>
			<input type="text" name="class" value="<?php echo esc_attr( $class ); ?>" />
		</p>
		<p>
			<strong><?php esc_html_e( 'Value', 'mw-wp-form' ); ?></strong>
			<?php $value = $this->get_value_for_generator( 'value', $options ); ?>
			<input type="text" name="value" value="<?php echo esc_attr( $value ); ?>" />
		</p>
		<p>
			<strong><?php esc_html_e( 'String on the button', 'mw-wp-form' ); ?></strong>
			<?php $element_content = $this->get_value_for_generator( 'element_content', $options ); ?>
			<input type="text" name="element_content" value="<?php echo esc_attr( $element_content ); ?>" />
		</p>
		<p>
			<strong><?php esc_html_e( 'Display on input page', 'mw-wp-form' ); ?></strong>
			<?php $display_input = $this->get_value_for_generator( 'display_input', $options ); ?>
			<input type="checkbox" name="display_input" value="true" <?php checked( 'true', $display_input ); ?> />
			<?php esc_html_e( 'Display', 'mw-wp-form' ); ?>
		</p>
		<?php
	}
}