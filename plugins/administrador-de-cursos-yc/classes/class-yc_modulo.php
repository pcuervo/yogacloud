<?php
/**
 * Curso YogaCloud.
 *
 * This class represent a course in the platform. 
 *
 * @since 1.0.0
 */

require_once("class-yc_leccion.php");

class YC_Modulo {

	public $id;
	public $name;
	public $description;
	public $permalink;
	public $course_name;

	/**
	 * Constructor
	 */
	public function __construct( $args ) {
		if( isset( $args['name'] ) ) {
			$modulo_query = get_page_by_title( $args['name'], OBJECT, 'modulos' );
		} else {
			$modulo_query = get_post( $args['id'], OBJECT, 'modulos' );
		}

		$this->id = $modulo_query->ID;
		$this->name = $modulo_query->post_title;
		$this->description = $modulo_query->post_content;
		$this->permalink = get_permalink( $modulo_query->ID );
	}

	/**
	* Return all Módulos from the course
	* @return array $lecciones
	*/
	public function get_lecciones(){
		global $wpdb;
		$lecciones = array();

		$lecciones_results = $wpdb->get_results(
			"SELECT lesson_id FROM " . $wpdb->prefix . "modules_lessons WHERE module_id = " . $this->id . " ORDER BY position"  
			);
		if( empty( $lecciones_results ) ) return $lecciones;

		foreach ( $lecciones_results as $key => $result ) $lecciones[$key] = new YC_Modulo( array( 'id' => $result->lesson_id ) );

		return $lecciones;
	}

	/**
	* Check if a lesson exists in the module
	* @param int $lesson_id 
	* @return boolean
	*/
	public function has_leccion( $lesson_id ) {
		global $wpdb;
		return $wpdb->get_row( "SELECT lesson_id FROM " . $wpdb->prefix . "modules_lessons WHERE lesson_id =" . $lesson_id . " AND module_id = " . $this->id, "ARRAY_A" );
	}

	/**
	* Add lesson to module 
	* @param int $lesson_id 
	* @param int $position
	* @return boolean
	*/
	public function add_lesson( $lesson_id, $position=-1 ) {
		global $wpdb;

		$delegacion_data = array(
			'module_id'	=> $this->id,
			'lesson_id'	=> $lesson_id,
			'position'	=> $position,
		);
		$wpdb->insert(
			$wpdb->prefix . 'modules_lessons',
			$delegacion_data,
			array( '%s' )
		);
		return $wpdb->insert_id;
	}

}// YC_Modulo

 