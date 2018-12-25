<?php
/**
 * Created by PhpStorm.
 * User: Inspiron
 * Date: 12/25/2018
 * Time: 3:54 AM
 */

class MY_model extends CI_Model{

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
}