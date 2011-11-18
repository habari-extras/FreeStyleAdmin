<?php
class FreeStyleAdmin extends Plugin {

	public function configure() {

		$ui = new FormUI(strtolower(get_class($this)));
		$css_location = $ui->append('text', 'css_location', 'option:freestyleadmin__css_location', _t('FreeStyle CSS Location', 'FreeStyleAdmin'));
		$css_location->add_validator( 'validate_required' );

		$ui->append( 'submit', 'save', _t( 'Save', 'FreeStyleAdmin' ) );
		$ui->set_option( 'success_message', _t( 'Configuration saved', 'FreeStyleAdmin' ) );
		return $ui;
	}

	private static function getvar($var) {
		return Options::get('freestyleadmin__'.$var);
	}

	function action_admin_header() {
		if (self::getvar('css_location') != '') {
			Stack::add('admin_stylesheet', array(self::getvar('css_location'), 'screen'));
		}
	}

}
?>

