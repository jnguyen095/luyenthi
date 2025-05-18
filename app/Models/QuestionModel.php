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
}