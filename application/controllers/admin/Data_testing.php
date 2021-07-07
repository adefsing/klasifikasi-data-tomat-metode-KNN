<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_testing extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->output->enable_profiler(TRUE);
        $this->load->model("m_login");
        $this->load->model("m_data_latih");
        $this->load->model("m_data_latih_normalized");
        $this->load->model("m_register");
        $this->load->model("m_admin");
        $this->load->model("m_user");
        $this->load->model("m_log");
        $this->load->helper('array');
        $this->load->library("pagination");
        $this->load->library('form_validation');
    }


    public function index()
    {
        $log['log_datetime'] = date("Y-m-d H:i:s");
        $log['log_message'] = "HOMEPAGE :  user => " . $this->session->userdata('user_username') . "( id = " . $this->session->userdata('user_id') . ") ; result => ";
        $log['user_id'] = $this->session->userdata('user_id');
        $log['log_message'] .= "true";
        $this->m_log->inserLog($log);
        //   $data=$this->m_kost->getData( $this->session->userdata('user_id') );
        //   $data['files'] = $data;
        $data['page_name'] = "Data Testing";
        $data['user'] = $this->m_user->getUser($this->session->userdata('user_id'))[0];
        $data['files'] = $this->m_data_latih->read();
        $data['files_normalized'] = $this->m_data_latih_normalized->read();
        $this->load->view("_admin/_template/header");
        $this->load->view("_admin/_template/sidebar_menu");
        $this->load->view("_admin/data_testing/View_list", $data);
        $this->load->view("_admin/_template/footer");
    }

    public function create()
    {
        $data['page_name'] = "Tambah Data Testing";
        $inpust =  ($this->input->post('area[]') == null) ? array() : $this->input->post('area[]');
        // echo var_dump( $inpust );
        foreach ($inpust as $ind => $val) {
            if (!empty($this->input->post('area')[$ind])) {
                $this->form_validation->set_rules('area[' . $ind . ']', 'area', 'trim|required');
                $this->form_validation->set_rules('perimeter[' . $ind . ']', 'perimeter', 'trim|required');
                $this->form_validation->set_rules('bentuk[' . $ind . ']', 'bentuk', 'trim|required');
                $this->form_validation->set_rules('G0_kontras[' . $ind . ']', 'G0_kontras', 'trim|required');
                $this->form_validation->set_rules('G45_kontras[' . $ind . ']', 'G45_kontras', 'trim|required');
                $this->form_validation->set_rules('G90_kontras[' . $ind . ']', 'G90_kontras', 'trim|required');
                $this->form_validation->set_rules('G135_kontras[' . $ind . ']', 'G135_kontras', 'trim|required');
                $this->form_validation->set_rules('jenis[' . $ind . ']', 'jenis', 'trim|required');
            }
        }



        if ($this->form_validation->run() == true) {
            $data_testing = array();
            $inpust =  ($this->input->post('area[]') == null) ? array() : $this->input->post('area[]');
            foreach ($inpust as $ind => $val) {
                $data = array();
                if (!empty($this->input->post('area')[$ind])) {
                    $data_test["area"] = $this->input->post('area')[$ind];
                    $data_test["perimeter"] = $this->input->post('perimeter')[$ind];
                    $data_test["bentuk"] = $this->input->post('bentuk')[$ind];
                    $data_test["G0_kontras"] = $this->input->post('G0_kontras')[$ind];
                    $data_test["G45_kontras"] = $this->input->post('G45_kontras')[$ind];
                    $data_test["G90_kontras"] = $this->input->post('G90_kontras')[$ind];
                    $data_test["G135_kontras"] = $this->input->post('G135_kontras')[$ind];
                    $data_test["jenis"] = $this->input->post('jenis')[$ind];

                    array_push($data_testing, $data_test);
                }
            }

            // echo var_dump( $data_testing );
            if ($this->m_data_latih->create($data_testing)) {
                $this->session->set_flashdata('info', array(
                    'from' => 1,
                    'message' =>  'item berhasil ditambah'
                ));
                redirect(site_url('admin/data_testing'));
                return;
            }
            $this->session->set_flashdata('info', array(
                'from' => 0,
                'message' =>  'terjadi kesalahan saat mengirim data'
            ));
            redirect(site_url('admin/data_testing'));
        } else {
            $data['files'] = $this->m_data_latih->read();
            $data['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
            $this->load->view("_admin/_template/header");
            $this->load->view("_admin/_template/sidebar_menu");
            $this->load->view("_admin/data_testing/View_create", $data);
            $this->load->view("_admin/_template/footer");
        }
    }

    public function edit($id_latih = null)
    {
        $data['page_name'] = "Edit Data Testing";
        $inpust =  ($this->input->post('area[]') == null) ? array() : $this->input->post('area[]');
        // echo var_dump( $inpust );
        foreach ($inpust as $ind => $val) {
            if (!empty($this->input->post('area')[$ind])) {
                $this->form_validation->set_rules('area[' . $ind . ']', 'area', 'trim|required');
                $this->form_validation->set_rules('perimeter[' . $ind . ']', 'perimeter', 'trim|required');
                $this->form_validation->set_rules('bentuk[' . $ind . ']', 'bentuk', 'trim|required');
                $this->form_validation->set_rules('G0_kontras[' . $ind . ']', 'G0_kontras', 'trim|required');
                $this->form_validation->set_rules('G45_kontras[' . $ind . ']', 'G45_kontras', 'trim|required');
                $this->form_validation->set_rules('G90_kontras[' . $ind . ']', 'G90_kontras', 'trim|required');
                $this->form_validation->set_rules('G135_kontras[' . $ind . ']', 'G135_kontras', 'trim|required');
            }
        }



        if ($this->form_validation->run() == true) {
            $data_testing = array();
            $inpust =  ($this->input->post('area[]') == null) ? array() : $this->input->post('area[]');
            foreach ($inpust as $ind => $val) {
                $data = array();
                if (!empty($this->input->post('area')[$ind])) {
                    $data["area"] = $this->input->post('area')[$ind];
                    $data["perimeter"] = $this->input->post('perimeter')[$ind];
                    $data["bentuk"] = $this->input->post('bentuk')[$ind];
                    $data["G0_kontras"] = $this->input->post('G0_kontras')[$ind];
                    $data["G45_kontras"] = $this->input->post('G45_kontras')[$ind];
                    $data["G90_kontras"] = $this->input->post('G90_kontras')[$ind];
                    $data["G135_kontras"] = $this->input->post('G135_kontras')[$ind];

                    // array_push($data_testing, $data) ;
                }
            }

            // echo var_dump( $data_testing );
            $data_param['id_latih'] = $this->input->post('id_latih');

            if ($this->m_data_latih->update($data, $data_param)) {
                $this->session->set_flashdata('info', array(
                    'from' => 1,
                    'message' =>  'item berhasil diubah'
                ));
                redirect(site_url('admin/data_testing'));
                return;
            }
            $this->session->set_flashdata('info', array(
                'from' => 0,
                'message' =>  'terjadi kesalahan saat mengirim data'
            ));
            redirect(site_url('admin/data_testing'));
        } else {
            if ($id_latih == null) redirect(site_url('admin/data_testing'));

            $data['files'] = $this->m_data_latih->read($id_latih);
            $data['user'] = $this->m_user->getUser($this->session->userdata('user_id'));
            $this->load->view("_admin/_template/header");
            $this->load->view("_admin/_template/sidebar_menu");
            $this->load->view("_admin/data_testing/View_edit", $data);
            $this->load->view("_admin/_template/footer");
        }
    }

    public function import()
    {
        $data['page_name'] = "import Data Testing";
        // if( !($_POST) ) redirect(site_url(''));  

        $this->load->library('upload'); // Load librari upload
        $filename = "excel";
        $config['upload_path'] = './upload/datatestingexcel/';
        $config['allowed_types'] = "xls|xlsx";
        $config['overwrite'] = "true";
        $config['max_size'] = "2048";
        $config['file_name'] = '' . $filename;
        $this->upload->initialize($config);

        if ($this->upload->do_upload("document_file")) {
            $filename = $this->upload->data()["file_name"];
            // echo $filename;
            // Load plugin PHPExcel nya
            include APPPATH . 'third_party/PHPExcel.php';

            $excelreader = new PHPExcel_Reader_Excel2007();
            $loadexcel = $excelreader->load('upload/datatestingexcel/' . $filename); // Load file yang telah diupload ke folder excel
            $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

            // Buat sebuah vari
            $data_testing = array();
            $numrow = 1;
            foreach ($sheet as $row) {
                // Cek $numrow apakah lebih dari 1
                // Artinya karena baris pertama adalah nama-nama kolom
                // Jadi dilewat saja, tidak usah diimport
                if ($numrow > 1 &&  !empty($row['A'])) {
                    $data_test["area"] = $row['A'];
                    $data_test["bentuk"] = $row['B'];
                    $data_test["perimeter"] = $row['C'];
                    $data_test["G0_kontras"] = $row['D'];
                    $data_test["G90_kontras"] = $row['E'];
                    $data_test["G45_kontras"] = $row['F'];
                    $data_test["G135_kontras"] = $row['G'];
                    $data_test["jenis"] = $row['H'];
                    // Kita push (add) array data ke variabel data
                    array_push($data_testing, $data_test);
                }

                $numrow++; // Tambah 1 setiap kali looping
            }

            // echo var_dump( $data_testing );
            if ($this->m_data_latih->create($data_testing)) {
                $this->session->set_flashdata('info', array(
                    'from' => 1,
                    'message' =>  'item berhasil diimport'
                ));
                redirect(site_url('admin//data_testing'));
                return;
            }
            $this->session->set_flashdata('info', array(
                'from' => 0,
                'message' =>  'terjadi kesalahan saat mengirim data'
            ));
            redirect(site_url('admin/data_testing'));
        } else {
            echo  $this->upload->display_errors();
            $this->load->view("_admin/_template/header");
            $this->load->view("_admin/_template/sidebar_menu");
            $this->load->view("_admin/data_testing/View_import", $data);
            $this->load->view("_admin/_template/footer");
        }
    }

    public function normalize()
    {
        $this->m_data_latih_normalized->clear(); //kosongka normalisasi
        $files = $this->m_data_latih->read();
        $min_max = $this->m_data_latih->get_min_max();

        if (empty($min_max)) {
            redirect(site_url('admin/data_testing'));
            return;
        }
        // echo json_encode( $min_max );
        // prosedur untuk menormalisasi
        for ($i = 0; $i < count($files); $i++) {
            // echo round( $files[ $i ]->G45_kontras,3)."<br>";

            $len = $min_max["max_area"] -  $min_max["min_area"];
            $files[$i]->area  =  (($files[$i]->area - $min_max["min_area"]) / ($len)) * 1 + 0;
            $files[$i]->area = round($files[$i]->area, 4);

            $len = $min_max["max_perimeter"] -  $min_max["min_perimeter"];
            $files[$i]->perimeter  =  (($files[$i]->perimeter - $min_max["min_perimeter"]) / ($len)) * 1 + 0;
            $files[$i]->perimeter = round($files[$i]->perimeter, 4);

            $len = $min_max["max_bentuk"] -  $min_max["min_bentuk"];
            $files[$i]->bentuk  =  (($files[$i]->bentuk - $min_max["min_bentuk"]) / ($len)) * 1 + 0;
            $files[$i]->bentuk = round($files[$i]->bentuk, 4);

            $len = $min_max["max_G0_kontras"] -  $min_max["min_G0_kontras"];
            $files[$i]->G0_kontras  =  (($files[$i]->G0_kontras - $min_max["min_G0_kontras"]) / ($len)) * 1 + 0;
            $files[$i]->G0_kontras = round($files[$i]->G0_kontras, 4);

            $len = $min_max["max_G45_kontras"] -  $min_max["min_G45_kontras"];
            $files[$i]->G45_kontras  =  (($files[$i]->G45_kontras - $min_max["min_G45_kontras"]) / ($len)) * 1 + 0;
            $files[$i]->G45_kontras = round($files[$i]->G45_kontras, 4);

            $len = $min_max["max_G90_kontras"] -  $min_max["min_G90_kontras"];
            $files[$i]->G90_kontras  =  (($files[$i]->G90_kontras - $min_max["min_G90_kontras"]) / ($len)) * 1 + 0;
            $files[$i]->G90_kontras = round($files[$i]->G90_kontras, 4);

            $len = $min_max["max_G135_kontras"] -  $min_max["min_G135_kontras"];
            $files[$i]->G135_kontras  =  (($files[$i]->G135_kontras - $min_max["min_G135_kontras"]) / ($len)) * 1 + 0;
            $files[$i]->G135_kontras = round($files[$i]->G135_kontras, 4);
        }

        if ($this->m_data_latih_normalized->create($files)) {
            $this->session->set_flashdata('info', array(
                'from' => 1,
                'message' =>  'item berhasil di normalisasi'
            ));
            redirect(site_url('admin/data_testing'));
            return;
        }
        $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  'terjadi kesalahan saat mengirim data'
        ));
        redirect(site_url('admin/data_testing'));
    }

    public function delete($id_latih = null)
    {
        if ($id_latih == null) redirect(site_url('admin/data_testing'));

        $data_param['id_latih'] = $id_latih;
        if ($this->m_data_latih->delete($data_param)) {
            $this->session->set_flashdata('info', array(
                'from' => 1,
                'message' =>  'item berhasil diubah'
            ));
            redirect(site_url('admin/data_testing'));
            return;
        }
        $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  'terjadi kesalahan saat mengirim data'
        ));
        redirect(site_url('admin/data_testing'));
    }
}
