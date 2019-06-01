<?php
class Image_ctrl extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library('session');

        $this->load->model('multi-image/image_model');
        
    }

    public function index(){
        $data = array();
        // file submit
        if($this->input->post('fileSubmit') && !empty($_FILES['files']['name'])){
            $filesCount = count($_FILES['files']['name']);
            
            for($i=0;$i<$filesCount;$i++){
                $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['files']['name'][$i];
                $_FILES['file']['size'] = $_FILES['files']['size'][$i];

                // file upload configuration
                $uploadpath = 'upload/file';
                $config['upload_path'] = $uploadpath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload',$config);
                $this->upload->initialize($config);

                // upload file to server
                if($this->upload->do_upload('file')){
                    // upload file data into database
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['upload_on'] = date("Y-m-d H:i:s");
                    
                }
            }

            if(!empty($uploadData)){
                // insert file data in database
                $insert = $this->image_model->insert($uploadData);

                //upload status massage
                $statusMsg = $insert?'File uploaded successfully.':'Some problem occurred,please try again.';
                $this->sessin->set_flashdata('statusMsg',$statusMsg);
            }

        }

        //get file data fron the database
        $data['files'] = $this->image_model->getRows();

        //pass the file data to view
        $this->load->view('multi-image/image',$data);
    }
    
}
