<?php

class TeacherService {

	function restGet($params) {
		echo 'Teacher: restGet';
		echo json_encode($params);
	}
	
	function restPost($params) {
		echo 'Teacher: restPost';	
	}
	
	function restPut($params) {
		echo 'Teacher: restPut';	
	}
	
	function restDelete($params) {
		echo 'Teacher: restDelete';	
	}
}