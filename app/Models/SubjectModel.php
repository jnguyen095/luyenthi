<?php
/**
 * Created by Khang Nguyen
 * User: nguyennhukhangvn@gmail.com
 * Date: 5/17/2025
 * Time: 1:18 PM
 */

namespace App\Models;
use CodeIgniter\Model;

class SubjectModel extends Model
{
    protected $table = 'subjects';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'code'];
    protected $useTimestamps = false;
}