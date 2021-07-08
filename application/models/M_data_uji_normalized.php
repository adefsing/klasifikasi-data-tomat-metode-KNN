<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_data_uji_normalized extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function create($data_uji)
    {
        return $this->db->insert_batch('data_uji_normalized', $data_uji);
    }
    public function read($id_uji = -1, $mode = "object")
    {
        $sql = "
            SELECT * from data_uji_normalized
        ";
        if ($id_uji != -1) {
            $sql .= "
                where id_uji = '$id_uji'
            ";
        }
        if ($mode == "array")
            return $query = $this->db->query($sql)->result_array();
        else
            return $query = $this->db->query($sql)->result();
    }

    public function rangking($id_uji = -1, $mode = "object", $quota = NULL)
    {
        $sql = "
            SELECT * from data_uji_normalized a
            
        ";
        if ($id_uji != -1) {
            $sql .= "
                where id_uji = '$id_uji'
                AND jenis != 0
            ";
        }
        $sql .= "
            ORDER BY
            jenis DESC,
            tetangga_terdekat ASC
           
        ";

        // a.data_IPK DESC,
        // a.data_gaji_ortu ASC

        if ($quota != NULL) {
            $sql .= "
                LIMIT $quota
            ";
        }

        if ($mode == "array")
            return $query = $this->db->query($sql)->result_array();
        else
            return $query = $this->db->query($sql)->result();
    }

    public function read_single_table($id_uji = -1, $mode = "object")
    {
        $sql = "
            SELECT a.* from data_uji_normalized a 
        ";
        if ($id_uji != -1) {
            $sql .= "
                where a.id_uji = '$id_uji'
            ";
        }
        if ($mode == "array")
            return $query = $this->db->query($sql)->result_array();
        else
            return $query = $this->db->query($sql)->result();
    }
    public function update($data_uji, $data_uji_param)
    {
        // echo var_dump( $data_uji );return;
        $data_uji = $this->_filter_data('data_uji_normalized', $data_uji);
        return  $this->db->update('data_uji_normalized', $data_uji, $data_uji_param);
    }
    public function _update_batch($data_uji)
    {
        return $this->db->update_batch('data_uji_normalized', $data_uji, 'id_uji');
    }
    /**
     * @param string $table
     * @param array  $data
     *
     * @return array
     */
    protected function _filter_data($table, $data)
    {
        $filtered_data = array();
        $columns = $this->db->list_fields($table);

        if (is_array($data)) {
            foreach ($columns as $column) {
                if (array_key_exists($column, $data))
                    $filtered_data[$column] = $data[$column];
            }
        }
        return $filtered_data;
    }
    public function delete($data_uji_param)
    {
        return $this->db->delete("data_uji_normalized", $data_uji_param);
    }
    public function clear()
    {
        return $query = $this->db->query(" TRUNCATE data_uji_normalized ");
    }

    public function record_count()
    {
        $this->db->where('data_uji_normalized.jenis != -1', NULL);
        return $this->db->count_all_results('data_uji_normalized');
    }
}
