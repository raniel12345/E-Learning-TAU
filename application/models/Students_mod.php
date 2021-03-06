<?php 
	
	class Students_mod extends CI_Model{

		##
		## LOGIN FUNCTIONS
		##

		public function is_student_can_login($stdNum, $pass){
			$data = array(
				'stdNum' => $stdNum,
				'pswd' => $pass,
				'isDeleted' => 0
			);

			$this->db->select('id, stdNum, firstName, lastName, email');
			$this->db->where($data);
			$results = $this->db->get('Students');
			return $results->row_array();
		}

		public function select_latest_lessons_with_or_without_cover($limit=25){

			$this->db->select("Les.*, DATE_FORMAT(Les.dateAdded, '%M %d, %Y') As dateAddedFormated, 
								DATE_FORMAT(Les.dateModify, '%M %d, %Y') As dateModifyFormated, Chap.chapterTitle, Top.topic, Prin.principle,
								CONCAT(Fac.firstName, ' ', Fac.lastName) As AddedByUser");
			$this->db->order_by('Les.id', 'DESC');
			$this->db->from('Lessons As Les');
			$this->db->join('TopicChapters As Chap', 'Les.chapterID = Chap.id');
			$this->db->join('PrinciplesSubTopic As Top', 'Chap.topicID = Top.id');
			$this->db->join('AgriPrinciples As Prin', 'Top.principleID = Prin.id');
			$this->db->join('Faculties As Fac', 'Fac.facultyIDNum=Les.addedByFacultyNum');
			$this->db->where(array(
							'Les.isDeleted' => 0,
							'Chap.isDeleted' => 0,
							'Top.isDeleted' => 0,
							'Prin.isDeleted' => 0
						));
			$this->db->order_by("Les.id", "DESC");
			$this->db->limit($limit);

			$results = $this->db->get();
			return $results->result_array();

		}

		public function select_latest_lessons_cover_img($limit=15){
			$this->db->select("id, coverPhoto");
			$this->db->where(array(
						"isDeleted" => 0,
						"coverPhoto <>" => 'NA',
						"isWithCoverPhoto" => 1,
						"coverOrientation" => 'L'
					));
			$this->db->where("coverPhoto IS NOT NULL");
			$this->db->order_by("id", "DESC");
			$this->db->limit($limit);
			$results = $this->db->get("Lessons");
			return $results->result_array();
		}

		public function select_latest_lessons_with_cover($limit = 8){

			$this->db->select("Les.*, DATE_FORMAT(Les.dateAdded, '%M %d, %Y') As dateAddedFormated, 
								DATE_FORMAT(Les.dateModify, '%M %d, %Y') As dateModifyFormated, Chap.chapterTitle, Top.topic, Prin.principle,
								CONCAT(Fac.firstName, ' ', Fac.lastName) As AddedByUser");
			$this->db->order_by('Les.id', 'DESC');
			$this->db->from('Lessons As Les');
			$this->db->join('TopicChapters As Chap', 'Les.chapterID = Chap.id');
			$this->db->join('PrinciplesSubTopic As Top', 'Chap.topicID = Top.id');
			$this->db->join('AgriPrinciples As Prin', 'Top.principleID = Prin.id');
			$this->db->join('Faculties As Fac', 'Fac.facultyIDNum=Les.addedByFacultyNum');
			$this->db->where(array(
							'Les.isDeleted' => 0,
							'Chap.isDeleted' => 0,
							'Top.isDeleted' => 0,
							'Prin.isDeleted' => 0,
							'Les.isWithCoverPhoto' => 1
						));
			$this->db->where("Les.coverPhoto <> 'NA' AND Les.coverOrientation <> '-'");
			$this->db->order_by("Les.id", "DESC");
			$this->db->limit($limit);

			$results = $this->db->get();
			return $results->result_array();
		}

		public function select_latest_lessons_without_cover($limit = 12){

			$this->db->select("Les.*, DATE_FORMAT(Les.dateAdded, '%M %d, %Y') As dateAddedFormated, 
								DATE_FORMAT(Les.dateModify, '%M %d, %Y') As dateModifyFormated, Chap.chapterTitle, Top.topic, Prin.principle,
								CONCAT(Fac.firstName, ' ', Fac.lastName) As AddedByUser");
			$this->db->order_by('Les.id', 'DESC');
			$this->db->from('Lessons As Les');
			$this->db->join('TopicChapters As Chap', 'Les.chapterID = Chap.id');
			$this->db->join('PrinciplesSubTopic As Top', 'Chap.topicID = Top.id');
			$this->db->join('AgriPrinciples As Prin', 'Top.principleID = Prin.id');
			$this->db->join('Faculties As Fac', 'Fac.facultyIDNum=Les.addedByFacultyNum');
			$this->db->where(array(
							'Les.isDeleted' => 0,
							'Chap.isDeleted' => 0,
							'Top.isDeleted' => 0,
							'Prin.isDeleted' => 0,
							'Les.isWithCoverPhoto' => 0,
							'Les.coverPhoto' => 'NA',
							'Les.coverOrientation' => '-'
						));
			
			$this->db->order_by("Les.id", "DESC");
			$this->db->limit($limit);

			$results = $this->db->get();
			return $results->result_array();
		}

		public function insert_lesson_comment($lessonID, $comments, $stdNum_facNum, $userType){

			$data = array(
				'lessonID' => $lessonID,
				'comments' => $comments,
				'stdNum_facNum' => $stdNum_facNum,
				'userType' => $userType
			);

			$result = $this->db->insert('Lesson_comments', $data);
			return $result;
		}

		public function get_all_lesson_comments($lessonID){

			$this->db->where('lessonID', $lessonID);
			$results = $this->db->get('Lesson_comments');
			return $results->result_array();

		}
		
		// Use to display comments
		public function getDatesMinsDifference_today($date_1){
			$this->db->select("TIMESTAMPDIFF(MINUTE, '". $date_1 ."', CURRENT_TIMESTAMP ) as timeDiff");
			$results = $this->db->get();
			return $results->row_array();
		}

		public function getFormattedDate_without_year($date){
			$this->db->select("DATE_FORMAT('". $date ."', '%M %d, %r') as formattedDate");
			$results = $this->db->get();
			return $results->row_array();
		}

		public function getFormattedDate_with_year($date){
			$this->db->select("DATE_FORMAT('". $date ."', '%M %d, %Y %r') as formattedDate");
			$results = $this->db->get();
			return $results->row_array();
		}

		public function get_code_exp_date(){
			$this->db->select("DATE_ADD(CURRENT_TIMESTAMP,INTERVAL 1 HOUR) As curDate");
			$results = $this->db->get();
			return $results->row_array();
		}

		public function insert_student_init_reg($info){

			$data = array(
				'stdNum' => $info['student_id_num'],
				'firstName' => $info['firstname'],
				'lastName' => $info['lastname'],
				'email' => $info['email'],
				'pswd' => $info['hashPass'],
				'expDate' => $info['expDate'],
				'randomCode' => $info['regCode']
			);

			// $this->db->set($data);
			// $sql = $this->db->get_compiled_insert('StdRegTempStorage');
			// echo $sql;

			$result = $this->db->insert('StdRegTempStorage', $data);
			return $result;
		}

		public function is_std_reg_code_exists($code, $stdNum){

			$this->db->select("COUNT(*) as count");
			$this->db->from("StdRegTempStorage");
			$this->db->where(array(
							"randomCode" => $code,
							"stdNum" => $stdNum
						));

			$results = $this->db->get();
			$count = $results->row_array();

			if ($count['count'] == 1){
				return TRUE;
			}else{
				return FALSE;
			}

		}

		public function is_std_reg_code_not_yet_exprd($code){

			$this->db->select("COUNT(*) as count");
			$this->db->from("StdRegTempStorage");
			$this->db->where("isConfirm", "0");
			$this->db->where("randomCode", $code);
			$this->db->where("CONCAT(CURDATE(), ' ', CURTIME()) >= expDate");

			// $sql = $this->db->get_compiled_select();

			// echo $sql;
			$results = $this->db->get();
			$count = $results->row_array();

			if ($count['count'] == 0){
				return TRUE;
			}else{
				return FALSE;
			}

		}


		public function is_std_reg_code_not_yet_confirm($code, $stdNum){

			$this->db->select("COUNT(*) as count");
			$this->db->from("StdRegTempStorage");
			$this->db->where(array(
							"randomCode" => $code,
							"stdNum" => $stdNum,
							"isConfirm" => 0
						));

			$this->db->order_by("id", "DESC");
			$this->db->limit(1);

			$results = $this->db->get();
			$count = $results->row_array();

			if ($count['count'] == 1){
				return TRUE;
			}else{
				return FALSE;
			}

		}


		public function confirm_std_registration($code, $stdNum){

						
			$this->db->where(array(
								"randomCode" => $code,
								"stdNum" => $stdNum
							));
			$this->db->order_by("id", "DESC");
			$this->db->limit(1);

			$this->db->set("isConfirm", 1);

			// $sql = $this->db->get_compiled_update('StdRegTempStorage');
			// echo $sql;

			$result = $this->db->update('StdRegTempStorage');
			return $result;
		}


		public function get_std_reg_data($code, $stdNum){

			$this->db->where(array(
							"randomCode" => $code,
							"stdNum" => $stdNum
						));
			$results = $this->db->get("StdRegTempStorage");
			return $results->row_array();
		}


		public function move_student_registered($info){

			$data = array(
				'stdNum' => $info['stdNum'],
				'firstName' => $info['firstName'],
				'lastName' => $info['lastName'],
				'email' => $info['email'],
				'pswd' => $info['pswd']
			);

			$result = $this->db->insert('Students', $data);
			return $result;
		}

		public function get_std_data_for_pswd_recovery($stdNum, $stdEmail){

			$this->db->select("count(*) As count");
			$this->db->where(array(
							"stdNum" => $stdNum,
							"email" => $stdEmail
						));
			$this->db->order_by("id", "DESC");
			$this->db->limit(1);

			$results = $this->db->get("students");
			return $results->row_array();
		}


		public function insert_student_for_pswd_recovery($info){

			$data = array(
				'stdNum' => $info['stdNum'],
				'email' => $info['email'],
				'randomCode' => $info['randomCode'],
				'expDate' => $info['expDate']
			);

			$result = $this->db->insert('StdPswdRecoveryTempStorage', $data);
			return $result;
		}

		public function is_std_recovery_code_exists($code, $stdNum){

			$this->db->select("COUNT(*) as count");
			$this->db->from("StdPswdRecoveryTempStorage");
			$this->db->where(array(
							"randomCode" => $code,
							"stdNum" => $stdNum
						));

			$results = $this->db->get();
			$count = $results->row_array();

			if ($count['count'] == 1){
				return TRUE;
			}else{
				return FALSE;
			}

		}


		public function is_std_recovery_code_not_yet_exprd($code){

			$this->db->select("COUNT(*) as count");
			$this->db->from("StdPswdRecoveryTempStorage");
			$this->db->where("isConfirm", "0");
			$this->db->where("randomCode", $code);
			$this->db->where("CONCAT(CURDATE(), ' ', CURTIME()) >= expDate");

			$results = $this->db->get();
			$count = $results->row_array();

			if ($count['count'] == 0){
				return TRUE;
			}else{
				return FALSE;
			}

		}


		public function is_std_recovery_code_not_yet_confirm($code, $stdNum){

			$this->db->select("COUNT(*) as count");
			$this->db->from("StdPswdRecoveryTempStorage");
			$this->db->where(array(
							"randomCode" => $code,
							"stdNum" => $stdNum,
							"isConfirm" => 0
						));

			$this->db->order_by("id", "DESC");
			$this->db->limit(1);

			$results = $this->db->get();
			$count = $results->row_array();

			if ($count['count'] == 1){
				return TRUE;
			}else{
				return FALSE;
			}

		}


		public function confirm_std_pswd_recovery($code, $stdNum){
	
			$this->db->where(array(
								"randomCode" => $code,
								"stdNum" => $stdNum
							));
			$this->db->order_by("id", "DESC");
			$this->db->limit(1);

			$this->db->set("isConfirm", 1);

			$result = $this->db->update('StdPswdRecoveryTempStorage');
			return $result;
		}


		public function update_student_password($info){

			$data = array(
				'pswd' => $info['new_password_hash']
			);

			$this->db->where(array(
								"stdNum" => $info['student_num'],
								"isDeleted" => 0
							));

			$this->db->set($data);
			$result = $this->db->update('Students');
			return $result;
		}

		public function update_student_without_pass($info){

			$data = array(
				'firstName' => $info['firstname'],
				'lastName' => $info['lastname'],
				'email' => $info['email'],
				'stdSection' => $info['section']
			);

			$this->db->set($data);
			$this->db->where("id", $info['studentID']);
			$result = $this->db->update('Students');
			return $result;
		}

		public function update_student_with_pass($info){

			$data = array(
				'firstName' => $info['firstname'],
				'lastName' => $info['lastname'],
				'email' => $info['email'],
				'pswd' => $info['pswd'],
				'stdSection' => $info['section']
			);

			$this->db->set($data);
			$this->db->where("id", $info['studentID']);
			$result = $this->db->update('Students');
			return $result;
		}


		public function insert_student_quiz_results($chapterID, $quizID, $score, $stdNum){

			$data = array(
				'chapterID' => $chapterID,
				'quizID' => $quizID,
				'score' => $score,
				'stdNum' => $stdNum
			);
			// print_r($data);
			$result = $this->db->insert('StudentQuizResults', $data);
			
			if ($result == 1){
				return $this->db->insert_id();
			}

			return false;
		}

		public function insert_student_quiz_answer($answer){

			$data = array(
				'resultsID' => $answer['resultsID'],
				'questionID' => $answer['questionID'],
				'choiceID' => $answer['choiceID'],
				'stdNum' => $answer['stdNum']
			);

			$result = $this->db->insert('StudentQuizAnswers', $data);
			return $result;
		}


		public function is_choice_is_right_ans($choiceID, $questionID){

			$this->db->select("count(*) As count");
			$this->db->where(array(
							"id" => $choiceID,
							"questionID" => $questionID,
							"isRightAns" => 1
						));
			$this->db->order_by("id", "DESC");
			$this->db->limit(1);

			$results = $this->db->get("QuestionChoices");
			return $results->row_array();
		}


		public function count_question_right_answer($questionID){

			$this->db->select("count(*) As count");
			$this->db->where(array(
							"questionID" => $questionID,
							"isRightAns" => 1
						));
			$this->db->order_by("id", "DESC");
			$this->db->limit(1);

			$results = $this->db->get("QuestionChoices");
			return $results->row_array();
		}


		public function get_std_last_chapter_quiz($resultsID, $stdNum){

			$this->db->select("id, chapterID, quizID, score, stdNum, dateTaken, DATE_FORMAT(dateTaken, '%M %d, %Y %h:%i:%S') As dateTaketFormat");

			$this->db->where(array(
								"id" => $resultsID,
								"stdNum" => $stdNum
							));

			$results = $this->db->get("StudentQuizResults");
			return $results->row_array();
		}

		public function get_std_last_chapter_quiz_answers($resultsID, $stdNum){

			$this->db->where(array(
						"resultsID" => $resultsID,
						"stdNum" => $stdNum
					));

			$results = $this->db->get("StudentQuizAnswers");
			return $results->result_array();
		}

		public function get_quiz_number_right_answers($quizID){

			$this->db->select("COUNT(QC.id) As count");
			$this->db->from("QuestionChoices As QC");
			$this->db->join("QuizQuestions As QQ", "QC.questionID=QQ.id");
			$this->db->where(array(
						"QQ.isDeleted" => 0,
						"QC.isDeleted" => 0,
						"QC.isRightAns" => 1,
						"QQ.quizID" => $quizID
					));

			$results = $this->db->get();
			return $results->row_array();
		}

		public function get_std_quizzes_results($stdNum){

			$this->db->select("R.*, C.chapterTitle, Q.quizTitle, R.score, DATE_FORMAT(dateTaken, '%M %d, %Y %h:%i:%S') As dateTakenFormat");
			$this->db->from("StudentQuizResults As R");
			$this->db->join("TopicChapters As C", "R.chapterID=C.id");
			$this->db->join("Quizzes As Q", "R.quizID=Q.id");
			$this->db->where(array(
						"R.stdNum" => $stdNum
					));
			$this->db->order_by("R.id", "DESC");

			$results = $this->db->get();
			return $results->result_array();
		}

	}

?>