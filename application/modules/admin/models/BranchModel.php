<?php
/**
 * Created by PhpStorm.
 * User: Inspiron
 * Date: 12/25/2018
 * Time: 3:24 AM
 */
class BranchField{
    public $node_name = "";
    public $lang = "";
    public $node_link = "";
    public $is_enable = 0;
    public $brand_id = 0;
}

class BranchModel extends CI_Model
{

    public $table = 'branch';
    public $dataModel;

    public function __construct()
    {
        parent::__construct();
    }

    public function set_data($data)
    {
        $this->dataModel = new BranchField();
        $this->dataModel->node_name = $data['node_name'];
        $this->dataModel->node_link = $data['node_link'];
        $this->dataModel->brand_id = $data['brand_id'];
        $this->dataModel->lang = $data['lang'];
        $this->dataModel->is_enable = $data['is_enable'];
    }

    public function get_node($lang)
    {
        $this->db->select('*');
        $query = $this->db->get($this->dataModel)
            ->where('lang', $lang)
            ->get()
            ->result_array();

        return $query;
    }

    public function select_node()
    {
        $this->db->select('*');
        $query = $this->db->get($this->dataModel)
            ->get()
            ->row_array();

        return $query;
    }

    public function save($data)
    {
        $this->set_data($data);
        $this->db->insert($this->table, $this->dataModel);
    }
}
