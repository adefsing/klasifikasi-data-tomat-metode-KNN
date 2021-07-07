<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_data_latih_normalized extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create($data_latih)
    {
        return $this->db->insert_batch('data_latih_normalized', $data_latih);
    }

    public function read($id_latih = -1, $mode = "object")
    {
        $sql = "
            SELECT * from data_latih_normalized
        ";
        if ($id_latih != -1) {
            $sql .= "
                where id_latih = '$id_latih'
            ";
        }
        if ($mode == "array")
            return $query = $this->db->query($sql)->result_array();
        else
            return $query = $this->db->query($sql)->result();
    }

    public function update($data_latih, $data_latih_param)
    {
        return  $this->db->update('data_latih_normalized', $data_latih, $data_latih_param);
    }

    public function delete($data_latih_param)
    {
        return $this->db->delete("data_latih_normalized", $data_latih_param);
    }

    public function clear()
    {
        return $query = $this->db->query(" TRUNCATE data_latih_normalized ");
    }
}
