<?php
/**
 * Created by PhpStorm.
 * User: Inspiron
 * Date: 12/24/2018
 * Time: 1:54 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class NodeField{
    public $node_name = "";
    public $lang = "";
    public $node_link = "";
    public $is_enable = 0;
    public $brand_id = 0;
}

class NodeModel extends CI_Model
{

    public $table = 'node';
    public $dataModel;

    public function __construct()
    {
        parent::__construct();
    }

    public function set_data($data){
        $this->dataModel = new NodeField();
        $this->dataModel->node_name = $data['node_name'];
        $this->dataModel->node_link = $data['node_link'];
        $this->dataModel->brand_id = $data['brand_id'];
        $this->dataModel->lang = $data['lang'];
        $this->dataModel->is_enable = $data['is_enable'];
    }

    public function handleAjax($id, $table, $enable)
    {
        $table_id = $table . '_id';
        $data = [
            'is_enable' => $enable
        ];
        $this->db->set($data)->where($table_id, $id)->update($table);
        return $this->db->insert_id();
    }

    public function can($permission)
    {
        $query = $this->db->select('*')
            ->from('branch')
            ->where('permission_id', $permission)
            ->get()
            ->row_array();

        if (count($query) > 0) {

            return true;
        } else {

            return false;
        }
    }

    public function get_node($lang){
        $this->db->select('*');
        $query = $this->db->get($this->dataModel)
            ->where('lang', $lang)
            ->get()
            ->result_array();

        return $query;
    }

    public function select_node(){
        $this->db->select('*');
        $query = $this->db->get($this->dataModel)

            ->get()
            ->row_array();

        return $query;
    }

    public function save($data){
        $this->set_data($data);
        $this->db->insert($this->table, $this->dataModel);
    }

}