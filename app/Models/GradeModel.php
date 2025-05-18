<?php
/**
 * Created by Khang Nguyen
 * User: nguyennhukhangvn@gmail.com
 * Date: 5/17/2025
 * Time: 1:18 PM
 */

namespace App\Models;
use CodeIgniter\Model;

class GradeModel extends Model
{
    protected $table = 'grades';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];
    protected $useTimestamps = false;
}