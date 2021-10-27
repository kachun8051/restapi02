<?php

class StudentService {

	function restGet($params) {
		echo 'Student: restGet'.'<br>';
		echo json_encode($params);
	}
	
	function restPost($params) {
		echo 'Student: restPost';
	}
	
	function restPut($params) {
		echo 'Student: restPut';
	}
	
	function restDelete($params) {
		echo 'Student: restDelete';
	}
}
