<?php
/**
 * Created by Khang Nguyen
 * User: nguyennhukhangvn@gmail.com
 * Date: 5/16/2025
 * Time: 5:32 PM
 */

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\QuestionModel;
use App\Models\GradeModel;
use CodeIgniter\I18n\Time;


class QuestionController extends BaseController
{
    protected $helpers = ['form'];

    public function index(): string
    {
        $gradeModel = new GradeModel();
        $data = ['grades'=>$gradeModel->findAll()];
        return view('admin/question/upload', $data);
    }

    public function upload()
    {
        $validationRule = [
            'excel_file' => [
                'label' => 'Excel File',
                'rules' => 'uploaded[excel_file]'
                    . '|ext_in[excel_file,xls,xlsx]'
                    . '|max_size[excel_file,5000]',

            ],
            'grade_code' => 'required',
        ];

        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
            $gradeModel = new GradeModel();
            $data['grades'] = $gradeModel->findAll();
            return view('admin/question/upload', $data);
        }

        $file = $this->request->getFile('excel_file');

        if (!$file->isValid()) {
            throw new RuntimeException($file->getErrorString().'('.$file->getError().')');
        }

        $spreadsheet = IOFactory::load($file->getTempName());
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();
        $gradeCode = $this->request->getPost('grade_code');

        // Bỏ qua header nếu có
        array_shift($rows);

        $model = new QuestionModel();

        foreach ($rows as $row) {
            $data = [
                'question_type' => 'SINGLE_CHOICE',
                'grade_code' => $gradeCode,
                'subject_code' => $row[0],
                'question' => $row[1],
                'topic_code' => $row[2],
                'difficulty' => $row[3],
                'option_a' => $row[4],
                'option_b' => $row[5],
                'option_c' => $row[6],
                'option_d' => $row[7],
                'correct_answer' => $row[8],
                'created_at' => new Time('now'),
            ];

           $model->insert($data);
        }

        return redirect()->to(base_url('/admin/question'))->with('rows', $rows);
    }
}