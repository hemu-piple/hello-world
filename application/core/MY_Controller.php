<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MY_Controller extends CI_Controller {

    public function __construct() {

        parent::__construct();


        $this->load->library('upload');



    }

    public function uploadImage($filename){

        $config = array(
                'upload_path' => "./uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
//                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
//                'max_height' => "768",
//                'max_width' => "1024"
                );
                $this->load->library('upload', $config);
                 $this->upload->initialize($config);
                if($this->upload->do_upload())
                {
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('upload_success',$data);
                }
                else
                {
                $error = array('error' => $this->upload->display_errors());
              //  $this->load->view('register', $error);
                $this->load->view('header');
                $this->load->view('user/register/register', $error);
                $this->load->view('footer');
                }



    }
}