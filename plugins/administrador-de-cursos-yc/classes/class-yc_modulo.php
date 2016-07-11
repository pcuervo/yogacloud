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
		$lecciones = array();
		$lecciones_terms = wp_get_post_terms( $this->id, 'lecciones' );
		if( empty( $lecciones_terms ) ) return $lecciones;

		foreach ( $lecciones_terms as $key => $leccion_term ) $lecciones[$key] = new YC_Leccion( array( 'name' => $leccion_term->name ) );

		return $lecciones;
	}

}// YC_Modulo

 