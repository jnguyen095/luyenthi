<?php
/**
 * Created by Khang Nguyen
 * User: nguyennhukhangvn@gmail.com
 * Date: 5/16/2025
 * Time: 5:32 PM
 */

namespace App\Controllers;

use App\Models\GradeModel;
use App\Models\SubjectModel;


class AssessmentController extends BaseController
{
    protected $helpers = ['form'];

    public function create(): string
    {
        $gradeModel = new GradeModel();
        $subjectModel = new SubjectModel();
        $data = ['grades'=>$gradeModel->findAll(), 'subjects' => $subjectModel->findAll()];
        return view('admin/assessment/create', $data);
    }


}