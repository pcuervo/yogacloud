<?php

class WPML_ST_Upgrade {

	/** @var SitePress $sitepress */
	private $sitepress;
	
	private $string_settings;

	/** @var  WPML_ST_Upgrade_Command_Factory */
	private $command_factory;

	public function __construct(&$sitepress, WPML_ST_Upgrade_Command_Factory $command_factory ) {
		$this->sitepress = $sitepress;
		$this->string_settings = $this->sitepress->get_setting( 'st', array() );
		$this->command_factory = $command_factory;
	}
	
	public function run() {
		if ( $this->sitepress->get_wp_api()->is_admin() ) {
			if ( $this->sitepress->get_wp_api()->constant( 'DOING_AJAX' ) ) {
				$this->run_ajax();
			} else {
				$this->run_admin();
			}
		} else {
			$this->run_front_end();
		}
	}
	
	private function run_admin() {
		$this->maybe_run( 'WPML_ST_Upgrade_Migrate_Originals' );
		$this->maybe_run( 'WPML_ST_Upgrade_Db_Cache_Command' );
	}

	private function run_ajax() {
		$this->maybe_run_ajax( 'WPML_ST_Upgrade_Migrate_Originals' );

		// it has to be maybe_run
		$this->maybe_run( 'WPML_ST_Upgrade_Db_Cache_Command' );
	}

	private function run_front_end() {
		$this->maybe_run( 'WPML_ST_Upgrade_Db_Cache_Command' );
	}
	
	private function maybe_run( $class ) {
		if ( ! $this->has_been_command_executed( $class ) ) {
			$upgrade = $this->command_factory->create( $class );
			if ( $upgrade->run() ) {
				$this->mark_command_as_executed( $class );
			}
		}
	}

	private function maybe_run_ajax( $class ) {
		if ( ! $this->has_been_command_executed( $class ) ) {
			if ( $this->nonce_ok( $class ) ) {
				$upgrade = $this->command_factory->create( $class );
				if ( $upgrade->run_ajax() ) {
					$this->mark_command_as_executed( $class );
					$this->sitepress->get_wp_api()->wp_send_json_success( '' );
				}
			}
		}
	}
	
	private function nonce_ok( $class ) {
		$ok = false;
		
		$class = strtolower( $class );
		$class = str_replace( '_', '-', $class );
		if ( isset( $_POST['action'] ) && $_POST['action'] === $class ) {
			$nonce = filter_input( INPUT_POST, 'nonce', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
			if ( $this->sitepress->get_wp_api()->wp_verify_nonce( $nonce, $class . '-nonce' ) ) {
				$ok = true;
			}
		}
		return $ok;
	}

	/**
	 * @param string $class
	 *
	 * @return bool
	 */
	private function has_been_command_executed( $class ) {
		return isset( $this->string_settings[ $class::get_commnand_id() . '_has_run' ] );
	}

	/**
	 * @param string $class
	 */
	private function mark_command_as_executed( $class ) {
		$this->string_settings[ $class::get_commnand_id() . '_has_run' ] = true;
		$this->sitepress->set_setting( 'st', $this->string_settings, true );
		wp_cache_flush();
	}
}

