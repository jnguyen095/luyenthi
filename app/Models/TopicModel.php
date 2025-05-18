<?php
/**
 * Created by Khang Nguyen
 * User: nguyennhukhangvn@gmail.com
 * Date: 5/17/2025
 * Time: 1:18 PM
 */

namespace App\Models;
use CodeIgniter\Model;

class TopicModel extends Model
{
    protected $table = 'topics';
    protected $primaryKey = 'id';
    protected $allowedFields = ['subject_id', 'code', 'name'];
    protected $useTimestamps = false;
}