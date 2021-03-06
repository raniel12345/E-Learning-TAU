<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// Students Routing:
//
$route['student_login_page'] = "students/index";

$route['student_registration_page'] = "students/registration";
$route['student_initial_registration'] = "students/initial_registration";
$route['student_registration_code/(:any)'] = "students/registration_code/$1";
$route['verify_registration_code'] = "students/verify_registration_code";
$route['registration_done_msg'] = "students/registration_done_msg";

$route['password_recovery'] = "students/password_recovery";
$route['recover_password'] = "students/recover_password";
$route['password_recovery_code/(:any)'] = "students/password_recovery_code/$1";
$route['verify_pswd_recovery_code'] = "students/verify_pswd_recovery_code";
$route['student_change_password_form'] = "students/student_change_password_form";
$route['change_student_password'] = "students/change_student_password";
$route['student_successfully_change_password'] = "students/pswd_recovery_done_msg";

$route['student_login'] = "students/login";
$route['student_logout'] = "students/destroy_student_session";
$route['view_lesson/(:any)/(:any)'] = "students/view_lesson/$1/$2";
$route['add_lesson_comment'] = "students/add_lesson_comment";
$route['get_all_lesson_comments'] = "students/get_all_lesson_comments";

$route['student_profile'] = "students/profile";
$route['update_student_profile'] = "students/update_profile";
$route['update_student_data'] = "students/update_student_data";

$route['main_search_lessons/(:any)'] = "students/search_lessons/$1";
$route['search_lessons_view/(:any)'] = "students/search_lessons_view/$1";

$route['quizzes_results'] = "students/quizzes_results";

// Take Quiz
$route['chapter_take_quiz/(:any)/(:any)'] = "students/chapter_take_quiz/$1/$2";
$route['insert_student_quiz_answer'] = "students/insert_student_quiz_answer";
$route['chapter_take_quiz_results/(:any)'] = "students/chapter_take_quiz_results/$1";


// Admin Routing:
//

$route['admin_login_page'] = "admin/login_page";
$route['admin_login'] = "admin/login";
$route['admin_logout'] = "admin/destroy_admin_session";
$route['admin_main_panel'] = "admin/main_panel";

$route['get_all_stds_quizzes_results'] = "admin/get_all_stds_quizzes_results";
$route['std_quiz_view_results/(:any)/(:any)'] = "admin/std_quiz_view_results/$1/$2";

// Principles

$route['admin_agriculture_principles'] = "admin/agriculture_principles";
$route['admin_agriculture_principles/(:any)'] = "admin/agriculture_principles/$1";
$route['add_agri_principle'] = "admin/add_principle";
$route['get_all_principles'] = "admin/get_all_principles";
$route['search_principles'] = "admin/search_principles";
$route['delete_principle'] = "admin/delete_principle";
$route['update_principle'] = "admin/update_principle";

// Sub topics

$route['admin_principles_sub_topics'] = "admin/principles_sub_topics";
$route['admin_principles_sub_topics/(:any)'] = "admin/principles_sub_topics/$1";
$route['add_principle_sub_topic'] = "admin/add_principle_sub_topic";
$route['get_all_principles_sub_topic'] = "admin/get_all_principles_sub_topics";
$route['search_principles_sub_topics'] = "admin/search_principles_sub_topics";
$route['delete_principle_sub_topic'] = "admin/delete_principle_sub_topic";
$route['update_principle_sub_topic'] = "admin/update_principle_sub_topic";


// Chapters

$route['sub_topic_chapters'] = "admin/sub_topic_chapters";
$route['sub_topic_chapters/(:any)'] = "admin/sub_topic_chapters/$1";
$route['get_principles_sub_topics_by_principle'] = "admin/get_principles_sub_topics_by_principle";
$route['add_topic_new_chapter'] = "admin/add_topic_new_chapter";
$route['update_topic_chapter'] = "admin/update_topic_chapter";
$route['delete_topic_chapter'] = "admin/delete_topic_chapter";
$route['get_all_chapters'] = "admin/get_all_topics_chapters";
$route['get_chapter_by_id'] = "admin/get_chapter_by_id";
$route['search_topics_chapters'] = "admin/search_topics_chapters";


$route['add_new_chapter_quiz'] = "admin/add_new_chapter_quiz";
$route['get_all_chapter_quizes'] = "admin/get_all_chapter_quizes";
$route['add_quiz_questions/(:any)/(:any)'] = "admin/add_quiz_questions/$1/$2";

$route['add_quiz_question'] = "admin/add_quiz_question";
$route['update_quiz_question'] = "admin/update_quiz_question";
$route['add_question_choice'] = "admin/add_question_choice";
$route['update_question_choice'] = "admin/update_question_choice";

$route['get_quiz_questions_and_choices_matrix'] = "admin/get_quiz_questions_and_choices_matrix";

$route['delete_quiz_question'] = "admin/delete_quiz_question";
$route['get_quiz_questions_by_id'] = "admin/get_quiz_questions_by_id";

$route['delete_question_choice'] = "admin/delete_question_choice";
$route['get_questions_choice_by_id'] = "admin/get_questions_choice_by_id";

$route['add_new_question_choice'] = "admin/add_new_question_choice";

// Lessons

$route['chapters_lessons'] = "admin/chapters_lessons";
$route['get_all_chapters_by_topic_id'] = "admin/get_all_chapters_by_topic_id";
$route['get_all_lessons_by_current_user'] = "admin/get_all_lessons_by_current_user";
$route['search_lessons'] = "admin/search_lessons";
$route['advance_search_lessons'] = "admin/advance_search_lessons";
$route['get_lesson_data_by_id'] = "admin/get_lesson_by_id";
$route['add_lessons'] = "admin/add_lessons";

$route['add_lessons/(:any)'] = "admin/add_lessons/$1";
$route['add_new_lesson'] = "admin/add_new_lesson";
$route['update_lesson'] = "admin/update_lesson";
$route['delete_lesson'] = "admin/delete_lesson";
$route['upload_lesson_img'] = "admin/upload_lessons_img";

$route['view_lesson_update_summary/(:any)/(:any)'] = "admin/view_lesson_update_summary/$1/$2";

$route['faculty_view_lesson/(:any)/(:any)'] = "admin/view_lesson/$1/$2";
$route['faculty_add_lesson_comment'] = "admin/add_lesson_comment";

// Faculties

$route['faculties'] = "admin/faculty_list";
$route['faculties/(:any)'] = "admin/faculty_list/$1";
$route['add_faculty'] = "admin/add_faculty";
$route['update_faculty'] = "admin/update_faculty";
$route['delete_faculty'] = "admin/delete_faculty_data";
$route['get_all_faculties'] = "admin/get_all_faculties";
$route['search_faculties'] = "admin/search_faculty";
$route['mark_faculty_as_admin_or_dean'] = "admin/mark_faculty_as_admin_or_dean";
$route['get_faculty_by_id'] = "admin/get_faculty_by_id";

$route['profile'] = "admin/profile";
$route['update_faculty_profile'] = "admin/update_faculty_profile";



// Students

$route['students'] = "admin/students_list";
$route['students/(:any)'] = "admin/students_list/$1";
$route['add_student'] = "admin/add_student";
$route['get_all_student'] = "admin/get_all_students";
$route['delete_student'] = "admin/delete_student_data";
$route['update_student'] = "admin/update_student";
$route['search_students'] = "admin/search_students";
$route['validate_student_number'] = "admin/validate_student_number";
$route['student_number_mass_upload'] = "admin/student_number_mass_upload";
$route['get_all_student_numbers'] = "admin/get_all_student_numbers";
$route['search_student_nums'] = "admin/search_student_nums";


$route['admin_home'] = "admin/main_panel";

$route['home_page'] = "students/home";


// Audit Trail

$route['audit_trail'] = "admin/audit_trail";
$route['get_all_audit_trails'] = "admin/get_all_audit_trails";
$route['search_audit_trail'] = "admin/search_audit_trail";


// Recycle bin - Principle
$route['recycle_bin_principle'] = "admin/recycle_bin_principle";
$route['get_all_deleted_principles'] = "admin/get_all_deleted_principles";
$route['search_deleted_principles'] = "admin/search_deleted_principles";
$route['restore_principle'] = "admin/restore_principle";

// Recycle bin - Principle Sub topic
$route['recycle_bin_principle_sub_topic'] = "admin/recycle_bin_principle_sub_topic";
$route['search_deleted_principles_sub_topics'] = "admin/search_deleted_principles_sub_topics";
$route['get_all_deleted_principles_sub_topics'] = "admin/get_all_deleted_principles_sub_topics";
$route['restore_principle_sub_topic'] = "admin/restore_principle_sub_topic";

// Recycle bin - Chapters
$route['recycle_bin_chapters'] = "admin/recycle_bin_chapters";
$route['get_all_deleted_topics_chapters'] = "admin/get_all_deleted_topics_chapters";
$route['restore_deleted_topic_chapter'] = "admin/restore_deleted_topic_chapter";
$route['search_deleted_topics_chapters'] = "admin/search_deleted_topics_chapters";

// Recycle bin - Lessons
$route['recycle_bin_lessons'] = "admin/recycle_bin_lessons";
$route['get_all_deleted_lessons_by_current_user'] = "admin/get_all_deleted_lessons_by_current_user";
$route['restore_deleted_lesson'] = "admin/restore_deleted_lesson";
$route['search_deleted_lessons'] = "admin/search_deleted_lessons";


// Recycle bin - Faculties
$route['recycle_bin_faculties'] = "admin/recycle_bin_faculties";
$route['get_all_deleted_faculties'] = "admin/get_all_deleted_faculties";
$route['restore_deleted_faculty_data'] = "admin/restore_deleted_faculty_data";
$route['search_deleted_faculty'] = "admin/search_deleted_faculty";

// Recycle bin - Students
$route['recycle_bin_students'] = "admin/recycle_bin_students";
$route['get_all_deleted_students'] = "admin/get_all_deleted_students";
$route['restore_deleted_student_data'] = "admin/restore_deleted_student_data";
$route['search_deleted_students'] = "admin/search_deleted_students";


$route['default_controller'] = 'students';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;