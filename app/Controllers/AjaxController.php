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
        $result = $questionModel->getQuestions($gradeId, $subjectId, $topicId, $difficulty, $keyword, $offset);
        return json_encode($result);
    }

    public function getQuestionById(): string
    {
        $questionId = $this->request->getGet('question_id');
        $questionModel = new QuestionModel();
        $question = $questionModel->find($questionId);
        return json_encode($question);
    }
}