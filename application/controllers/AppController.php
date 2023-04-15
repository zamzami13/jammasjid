<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class AppController extends RestController
{

    private $tbl        = '';
    private $title      = '';

    public function __construct()
    {
        parent::__construct();

        $this->datetime = date('Y-m-d H:i:s');
        $this->date     = date('Y-m-d');
        $this->time     = date('H:i:s');
    }

    public function index()
    {
    }
}
