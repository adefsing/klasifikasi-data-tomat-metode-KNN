<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_data_latih extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function create($data_latih)
    {
        return $this->db->insert_batch('data_latih', $data_latih);
    }
    public function read($id_latih = -1)
    {
        $sql = "
            SELECT * from data_latih
        ";
        if ($id_latih != -1) {
            $sql .= "
                where id_latih = '$id_latih'
            ";
        }
        return $query = $this->db->query($sql)->result();
    }

    function edit_latih($where,$table){    
        return $this->db->get_where($table,$where);
        }

        function update_data($where,$data){
            $this->db->where($where);
            $this->db->update('data_latih',$data);
        
        
          } 
          
    public function update($data_latih, $data_latih_param)
    {
        return  $this->db->update('data_latih', $data_latih, $data_latih_param);
    }
    public function delete($data_latih_param)
    {
        return $this->db->delete("data_latih", $data_latih_param);
    }
    public function count()
    {
        return $this->db->count_all("data_latih");
    }

    public function get_min_max()
    {
        $sql = "
            SELECT * from data_latih
        ";
        $query = $this->db->query($sql)->result();
        if (empty($query)) {
            return array();
        }
        return array(
            "min_area" => $this->db->query("SELECT a.area FROM data_latih a ORDER BY a.area ASC LIMIT 1")->result()[0]->area,
            "max_area" => $this->db->query("SELECT a.area FROM data_latih a ORDER BY a.area DESC LIMIT 1")->result()[0]->area,
            "min_perimeter" => $this->db->query("SELECT a.perimeter FROM data_latih a ORDER BY a.perimeter ASC LIMIT 1")->result()[0]->perimeter,
            "max_perimeter" => $this->db->query("SELECT a.perimeter FROM data_latih a ORDER BY a.perimeter DESC LIMIT 1")->result()[0]->perimeter,
            "min_bentuk" => $this->db->query("SELECT a.bentuk FROM data_latih a ORDER BY a.bentuk ASC LIMIT 1")->result()[0]->bentuk,
            "max_bentuk" => $this->db->query("SELECT a.bentuk FROM data_latih a ORDER BY a.bentuk DESC LIMIT 1")->result()[0]->bentuk,
            "min_G0_kontras" => $this->db->query("SELECT a.G0_kontras FROM data_latih a ORDER BY a.G0_kontras ASC LIMIT 1")->result()[0]->G0_kontras,
            "max_G0_kontras" => $this->db->query("SELECT a.G0_kontras FROM data_latih a ORDER BY a.G0_kontras DESC LIMIT 1")->result()[0]->G0_kontras,
            "min_G45_kontras" => $this->db->query("SELECT a.G45_kontras FROM data_latih a ORDER BY a.G45_kontras ASC LIMIT 1")->result()[0]->G45_kontras,
            "max_G45_kontras" => $this->db->query("SELECT a.G45_kontras FROM data_latih a ORDER BY a.G45_kontras DESC LIMIT 1")->result()[0]->G45_kontras,
            "min_G90_kontras" => $this->db->query("SELECT a.G90_kontras FROM data_latih a ORDER BY a.G90_kontras ASC LIMIT 1")->result()[0]->G90_kontras,
            "max_G90_kontras" => $this->db->query("SELECT a.G90_kontras FROM data_latih a ORDER BY a.G90_kontras DESC LIMIT 1")->result()[0]->G90_kontras,
            "min_G135_kontras" => $this->db->query("SELECT a.G135_kontras FROM data_latih a ORDER BY a.G135_kontras ASC LIMIT 1")->result()[0]->G135_kontras,
            "max_G135_kontras" => $this->db->query("SELECT a.G135_kontras FROM data_latih a ORDER BY a.G135_kontras DESC LIMIT 1")->result()[0]->G135_kontras
        );
    }
}
