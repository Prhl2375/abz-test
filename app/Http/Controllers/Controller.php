<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public $data;
    public $queries;
    public function __construct()
    {
        $this->queries = array_merge($_GET, $_POST);
        foreach ($this->queries as &$query){
            $query = urldecode($query);
        }
    }

    public function setMeta($title = '', $desc = '', $keywords = ''){
        $this->data['meta']['title'] = $title;
        $this->data['meta']['desc'] = $desc;
        $this->data['meta']['keywords'] = $keywords;
    }



    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
