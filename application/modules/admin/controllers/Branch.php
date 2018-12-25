<?php
/**
 * Created by PhpStorm.
 * User: Inspiron
 * Date: 12/25/2018
 * Time: 3:22 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property nodeModel $nodeModel
 */

class Branch extends CI_Controller {

    public $lang;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('string');
        $this->load->helper('log');
        $this->load->helper('permission');
        $this->load->model('nodeModel');
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $this->lang = $this->session->site_lang;
    }

    public function index(){
        $dataLayout['node'] = $this->nodeModel->get_node($this->lang);

    }
}