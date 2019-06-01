<?php 
class Image_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->tableName = 'files';
    }

    /*
     * Fetch files data from the database
     * @param id returns a single record if specified, otherwise all records
     */
    public function getRows($id = ''){
        $this->db->select('id,file_name,uploaded_on');
        $this->db->from('file');
        if($id){
            $this->db->where('id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('uploaded_on','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    
    /*
     * Insert file data into the database
     * @param array the data for inserting into the table
     */
    public function insert($data = array()){
        $insert = $this->db->insert_batch('file',$data);
        return $insert?true:false;
    }
    
}
