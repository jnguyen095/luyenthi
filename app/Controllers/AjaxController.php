<?php
/**
 * Created by Khang Nguyen
 * User: nguyennhukhangvn@gmail.com
 * Date: 5/17/2025
 * Time: 10:27 PM
 */

namespace App\Controllers;
use App\Models\TopicModel;
use App\Models\QuestionModel;

class AjaxController extends BaseController
{
    public function getTopicBySubjectId(): string
    {
        $subjectId = $this->request->getGet('subject_id');
        $topicModel = new TopicModel();
        $data = $topicModel->where('subject_id', $subjectId)->find();
        return json_encode($data);
    }

    public function getQuestions(): string
    {
        $gradeId = $this->request->getPost('grade_id');
        $subjectId = $this->request->getPost('subject_id');
        $topicId = $this->request->getPost('topic_id');
        $keyword = $this->request->getPost('keyword');
        $difficulty = $this->request->getPost('difficulty');
        $offset = $this->request->getPost('offset');

        $questionModel = new QuestionModel();
        //$data = $questionModel->join('subjects', 'questions.subject_code = subjects.code', 'left')->where('subjects.id', $subjectId)->findAll(10, $offset * 10);
        $db      = \Config\Database::connect();
        $builder = $db->table('questions');
        $builder->select('questions.*');
        $builder->join('grades', 'questions.grade_code = grades.code', 'left');
        $builder->join('subjects', 'questions.subject_code = subjects.code', 'left');
        if($topicId != null & $topicId > 0){
            $builder->join('topics', 'questions.topic_code = topics.code', 'left');
        }
        $builder->where('grades.id', $gradeId);
        $builder->where('subjects.id', $subjectId);
        if($topicId != null & $topicId > 0){
            $builder->where('topics.id', $topicId);
        }
        if($difficulty > 0){
            $builder->where('questions.difficulty', $difficulty);
        }
        if(strlen(trim($keyword)) > 0){
            $builder->like('questions.question', $keyword);
        }
        $query = $builder->get(10, $offset * 10);

        return json_encode($query->getResult());
    }
}