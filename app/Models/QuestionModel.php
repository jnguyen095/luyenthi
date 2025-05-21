<?php
/**
 * Created by Khang Nguyen
 * User: nguyennhukhangvn@gmail.com
 * Date: 5/16/2025
 * Time: 10:06 PM
 */
namespace App\Models;
use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $table = 'questions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['question_type', 'grade_code', 'subject_code', 'topic_code', 'difficulty', 'question', 'option_a', 'option_b', 'option_c', 'option_d', 'correct_answer', 'created_at']; // Thay đổi theo cấu trúc bảng
    protected $useTimestamps = false;

    public function getQuestions($gradeId, $subjectId, $topicId, $difficulty, $keyword, $offset)
    {
        $builder = $this->db->table('questions');//$db->table('questions');
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
        return $query->getResult();
    }
}