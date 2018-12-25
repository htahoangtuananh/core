<?php
/**
 * Created by PhpStorm.
 * User: Inspiron
 * Date: 12/25/2018
 * Time: 1:59 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property adminModel $adminModel
 */

class Index extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('string');
        $this->load->helper('log');
        $this->load->helper('permission');

        date_default_timezone_set("Asia/Ho_Chi_Minh");
    }

    public function index(){
        $this->load->model('nodeModel');
        $this->load->view('index');
    }
}