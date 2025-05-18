<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Question management
$routes->get('/admin/question', 'QuestionController::index');
$routes->post('/admin/question/upload', 'QuestionController::upload');
// Assessment management
$routes->get('/admin/assessment/create', 'AssessmentController::create');
// Ajax REST
$routes->get('/admin/ajax/getTopicBySubjectId', 'AjaxController::getTopicBySubjectId');
$routes->post('/admin/ajax/getQuestions', 'AjaxController::getQuestions');
