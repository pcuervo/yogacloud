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
	public $short_description;
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

		$this->id 					= $modulo_query->ID;
		$this->name 				= $modulo_query->post_title;
		$this->description 			= $modulo_query->post_content;
		$this->short_description 	= $modulo_query->post_excerpt;
		$this->permalink 			= get_permalink( $modulo_query->ID );
	}

	/**
	* Return all Módulos from the course
	* @return array $lecciones
	*/
	public function get_lecciones( $exclude_full_modules=false ){
		global $wpdb;
		$lecciones = array();

		$lecciones_results = $wpdb->get_results(
			"SELECT lesson_id FROM " . $wpdb->prefix . "modules_lessons WHERE module_id = " . $this->id . " ORDER BY position"  
			);
		if( empty( $lecciones_results ) ) return $lecciones;

		foreach ( $lecciones_results as $key => $result ) {
			$lesson = new YC_Leccion( array( 'id' => $result->lesson_id ) );
			if( $exclude_full_modules && $lesson->is_full_module ) continue;
			$lecciones[$key] = $lesson;
		}

		return $lecciones;
	}

	/**
	* Return number of Lecciones in Curso
	* @return int $num_lecciones
	*/
	public function get_num_lecciones(){
		global $wpdb;
		$lecciones_results = $wpdb->get_results(
			"SELECT lesson_id FROM " . $wpdb->prefix . "modules_lessons WHERE module_id = " . $this->id . " ORDER BY position"  
			);
		if( empty( $lecciones_results ) ) return 0;

		return count( $lecciones_results );
	}

	/**
	* Return all Módulos from the course
	* @return array $lecciones
	*/
	public function get_lecciones_from_terms(){
		$lecciones = array();
		$lecciones_terms = wp_get_post_terms( $this->id, 'lecciones' );
		if( empty( $lecciones_terms ) ) return $lecciones;
		foreach ( $lecciones_terms as $key => $leccion_term ) $lecciones[$key] = new YC_Leccion( array( 'name' => $leccion_term->name ) );
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
			"SELECT ul.lesson_id FROM  " . $wpdb->prefix . "modules_lessons ml
			 INNER JOIN  " . $wpdb->prefix . "user_lessons ul ON ul.lesson_id = ml.lesson_id
			 WHERE module_id = " . $this->id . " AND user_id = " . $user_id, ARRAY_A);
		if( empty( $seen_lessons_results ) ) return 0;

		$exclude_full_modules = true;
		$total_lecciones = count( $this->get_lecciones( $exclude_full_modules ) );
		if( 0 == $total_lecciones ) return 0; 

		$completed_lessons = 0;
		foreach ( $seen_lessons_results as $result ) {
			$lesson = new YC_Leccion( array( 'id' => $result['lesson_id'] ) );
			if( $lesson->is_full_module ) continue;
			$completed_lessons += 1;
		}
		if( 0 == intval($completed_lessons) ) return 0;
		return $completed_lessons / $total_lecciones * 100;
	}

	/**
	* Return the progress in the module by a given user
	* @param int $user_id
	* @return int $progress
	*/
	public function get_completed_lessons( $user_id ){
		if( 0 == $user_id ) return 0;

		global $wpdb;
		$seen_lessons_results = $wpdb->get_results(
			"SELECT ul.lesson_id FROM  " . $wpdb->prefix . "modules_lessons ml
			 INNER JOIN  " . $wpdb->prefix . "user_lessons ul ON ul.lesson_id = ml.lesson_id
			 WHERE module_id = " . $this->id . " AND user_id = " . $user_id, ARRAY_A);
		if( empty( $seen_lessons_results ) ) return 0;

		$exclude_full_modules = true;
		$total_lecciones = count( $this->get_lecciones( $exclude_full_modules ) );
		if( 0 == $total_lecciones ) return 0; 

		$completed_lessons = 0;
		foreach ( $seen_lessons_results as $result ) {
			$lesson = new YC_Leccion( array( 'id' => $result['lesson_id'] ) );
			if( $lesson->is_full_module ) continue;
			$completed_lessons += 1;
		}
		if( 0 == intval($completed_lessons) ) return 0;
		return $completed_lessons;
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
	public function add_leccion( $lesson_id, $position=-1 ) {
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

	/**
	* Update position of lección
	* @param int $lesson_id 
	* @param int $position
	* @return boolean
	*/
	public function update_leccion_position( $lesson_id, $position ) {
		global $wpdb;

		$lesson_data = array( 'position' => $position );
		$where = array(
			'lesson_id'	=> $lesson_id,
			'module_id' => $this->id,
		);
		return $wpdb->update(
			$wpdb->prefix . 'modules_lessons',
			$lesson_data,
			$where,
			array( '%d', '%d' )
		);
	}

	/**
	* Remove lección fromm módulo
	* @param int $lesson_id 
	* @return int|false
	*/
	public function remove_leccion( $lesson_id ) {
		global $wpdb;

		$where = array(
			'lesson_id'	=> $lesson_id,
			'module_id' => $this->id,
		);
		return $wpdb->delete(
			$wpdb->prefix . 'modules_lessons',
			$where,
			array( '%d', '%d' )
		);
	}

	/**
	 * Return all modules
	 * @return array YC_Modulos
	 */
	public static function get_modulos(){
		$modules = array();
		$args = array(
	        'post_type' => 'modulos',
	        'posts_per_page' => -1,
	   	);
		$modules_query = new WP_Query( $args );
	    if ( ! $modules_query->have_posts() ) return $modules;
	    
	    while ( $modules_query->have_posts() ) : $modules_query->the_post(); 
	    	$curso = new YC_Modulo( array( 'id' => $modules_query->post->ID ) );
			array_push( $modules, $curso );
		endwhile; wp_reset_postdata();
		return $modules;
	}

}// YC_Modulo

 