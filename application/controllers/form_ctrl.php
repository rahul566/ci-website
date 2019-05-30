<?php
class Form_ctrl extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->helper(array('form', 'url'));
    }

    public function index(){
        $this->load->view('form', array('error' => ' ' ));
    }
    public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|pdf';
                $config['max_size']             = 10000;
                $config['max_width']            = 10240;
                $config['max_height']           = 76008;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('form', $error);
                }
                elseif ( ! $this->upload->do_upload('userfile1'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
        }
    
}
