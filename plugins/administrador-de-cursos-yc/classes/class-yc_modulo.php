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

		foreach ( $lecciones_results as $key => $result ) $lecciones[$key] = new YC_Leccion( array( 'id' => $result->lesson_id ) );

		return $lecciones;
	}

	/**
	* Return the progress in the module by a given user
	* @param int $user_id
	* @return int $progress
	*/
	public function get_progress_by_user( $user_id ){
		if( 0 == $user_id ) return 0;

		global $wpdb;
		$seen_lessons_results = $wpdb->get_results(
			"SELECT COUNT(*) as completed FROM  " . $wpdb->prefix . "modules_lessons ml
			 INNER JOIN  " . $wpdb->prefix . "user_lessons ul ON ul.lesson_id = ml.lesson_id
			 WHERE module_id = " . $this->id . " AND user_id = " . $user_id, ARRAY_A);
		if( empty( $seen_lessons_results ) ) return 0;

		$lecciones_totales = count( $this->get_lecciones() );
		if( 0 == $lecciones_totales ) return 0; 

		return $seen_lessons_results[0]['completed'] / $lecciones_totales * 100;
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

	/**
	* Return the permalink of the next lesson
	* @param int $current_lesson_position
	* @return string $permalink
	*/
	public function get_next_lesson_link( $current_lesson_positon ) {
		global $wpdb;
		$next_position = $current_lesson_positon + 1;
		$results = $wpdb->get_row( "SELECT lesson_id FROM " . $wpdb->prefix . "modules_lessons WHERE position =" . $next_position . " AND module_id = " . $this->id, "ARRAY_A" );
		if( empty( $results ) ) return 0;

		$lesson = new YC_Leccion( array( 'id' => $results['lesson_id'] ) );
		return $lesson->permalink . '?mid=' . $this->id;
	}

	/**
	* Return the permalink of the previous lesson
	* @param int $current_lesson_position
	* @return string $permalink
	*/
	public function get_previous_lesson_link( $current_lesson_positon ) {
		global $wpdb;
		$next_position = $current_lesson_positon - 1;
		$results = $wpdb->get_row( "SELECT lesson_id FROM " . $wpdb->prefix . "modules_lessons WHERE position =" . $next_position . " AND module_id = " . $this->id, "ARRAY_A" );
		if( empty( $results ) ) return 0;

		$lesson = new YC_Leccion( array( 'id' => $results['lesson_id'] ) );
		return $lesson->permalink . '?mid=' . $this->id;
	}

}// YC_Modulo

 