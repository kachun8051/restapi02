<?php

class VaccineService {
	
	function restGet($params) {
		$type = array_shift($params);		
		if ($type==='student') {
			// search booking record of a student
			$stid = array_shift($params);

			if (!isset($stid) || $stid==='') {
				$arr = array();
				$arr['status'] = 'error';
				$arr['errno'] = '201';
				$arr['errmsg'] = 'Missing parameter - stid';
				echo json_encode($arr);
				exit();
			}

			require_once 'db.php';
			
			$resultArray = array();
			$sql = "SELECT * FROM booking WHERE staffStudentId='$stid'";
			if ($dbresult=$conn->query($sql)) {
				// records retrieved
				while ( $row=$dbresult->fetch_object()  ) {
					$record = array();
					$record['bookingId'] = $row->bookingId;
					$record['staffStudentId'] = $row->staffStudentId;
					$record['staffStudentName'] = $row->staffStudentName;
					$record['campusId'] = $row->campusId;
					$record['scheduleDate'] = $row->scheduleDate;
					$record['timeSlotId'] = $row->timeSlotId;
					$record['bookingDateTime'] = $row->bookingDateTime;
					$resultArray[] = $record;
				}
				echo json_encode($resultArray);
			} else {
				// retrieval failed
				echo "sql failed";
				exit;
			}
			
		} elseif ($type==='campus') {
			// search bookings in a campus
			$campusId = array_shift($params);
			require_once 'db.php';
			$resultArray = array();
			$sql = "SELECT * FROM booking WHERE campusId='$campusId'";
			if ($dbresult=$conn->query($sql)) {
				// records retrieved
				while ( $row=$dbresult->fetch_object()  ) {
					$record = array();
					$record['bookingId'] = $row->bookingId;
					$record['staffStudentId'] = $row->staffStudentId;
					$record['staffStudentName'] = $row->staffStudentName;
					$record['campusId'] = $row->campusId;
					$record['scheduleDate'] = $row->scheduleDate;
					$record['timeSlotId'] = $row->timeSlotId;
					$record['bookingDateTime'] = $row->bookingDateTime;
					$resultArray[] = $record;
				}
				echo json_encode($resultArray);
			} else {
				// retrieval failed
				echo "sql failed";
				exit;
			}
			
		} elseif ($type==='month') {
		}
	}
	
	function restPost($params) {
		$type = array_shift($params);
		if ($type==='booking') {
			$staffStudentId = array_shift($params);
			$staffStudentName = array_shift($params);
			$campusId = array_shift($params);
			$scheduleDate = array_shift($params);
			$timeSlotId = array_shift($params);
			
			require_once 'db.php';
			$sql = "INSERT INTO booking (staffStudentId, staffStudentName, campusId, scheduleDate, timeSlotId) VALUES ('$staffStudentId', '$staffStudentName', '$campusId', '$scheduleDate', $timeSlotId)";
			if ($dbresult=$conn->query($sql)) {
				echo "booking recorded";
				exit;
			} else {
				echo "booking failed";
				exit;
			}
			
		}
	}
	
	function restPut($params) {
	}
	
	function restDelete($params) {
	}
}








