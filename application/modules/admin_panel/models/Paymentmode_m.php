<?php
class paymentmode_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function payment_mode() {
        $data['title'] = 'Payment Mode';
        $data['menu'] = 'Payment Mode';
        return array('page'=>'paymentmode/paymentmode_list_v', 'data'=>$data);
    }

    public function ajax_payment_mode_data() {
        $usertype = $this->session->usertype;
        $user_id = $this->session->user_id;
        $data = array();
        $nestedData = array();

        $p_data = $this->db->get('master_payment_mode')->result();

        if(sizeof($p_data) > 0){
            $slNo = 1;
            foreach($p_data as $index => $val){
                $pm_id = $val->pm_id;
                $pm_name = $val->pm_name;
                $pm_note = $val->pm_note;

                $nestedData['slNo'] = $slNo;
                $nestedData['paymentModeName'] = $pm_name;
                $nestedData['paymentModeNote'] = $val->pm_note;
                $nestedData['action'] = '<a href="'. base_url('admin/edit-payment-mode/'.$pm_id).'" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                <a href="javascript:void(0)" data-pm_id="'.$pm_id.'" class="btn btn-danger delete"><i class="fa fa-times"></i> Delete</a>';
                            
                array_push($data, $nestedData);
                $slNo++;
            }//end foreach
        }
        

        $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => sizeof($data),
            "recordsFiltered" => sizeof($data),
            "data"            => $data
        );

        return $json_data;
    } //end


    private function _user_common_query($usertype, $user_id){

        if($usertype == 1){

            #for admin

            $rs = $this->db
                ->select('users.*, CONCAT(firstname, " ", lastname) AS name')
                ->join('user_details', 'users.user_id = user_details.user_id', 'left')
                ->get('users')
                ->result();            
            
            // echo $this->db->get_compiled_select('users');
            // exit();
        }

        return $rs;
        
    }

    private function _user_common_actions($usertype, $user_id){

        if($usertype == 1){
            # resource is still working
            $nestedData = '
            <a href="'. base_url('admin/edit-user/'.$user_id) .'" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>';
        }else{
            $nestedData = '
            <a href="'. base_url('admin/edit-user/'.$user_id) .'" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
            <a data-user_id="'.$user_id.'" href="javascript:void(0)" class="btn btn-danger delete"><i class="fa fa-times"></i> Delete</a>';
        }
        return $nestedData;

    }

    public function add_payment_mode(){        
        $data['title'] = 'Payment Mode';
        $data['menu'] = 'Add Payment Mode';

        return array('page'=>'paymentmode/paymentmode_add_v', 'data'=>$data);
    }

    public function ajax_unique_username(){
        
        $username = $this->input->post('username');
        $rs = $this->db->get_where('users', array('username' => $username))->num_rows();
        // echo $this->db->last_query();die;
        
        if($rs != '0') {
            $data = 'Username already exists.';
        }else{
            $data='true';
        }

        return $data;

    }

    public function acc_master_on_usertype(){
        
        $usertype = $this->input->post('usertype');

        if($usertype == 1){
            # admin - all

            $rs = $this->db->get_where('acc_master', array('status' => 1))->result();

        }else if($usertype == 2){
            
            # resource develper -> Supplier
            $rs = $this->db->get_where('acc_master', array('status' => 1, 'supplier_buyer' => 0))->result();

        }else if($usertype == 3){
            
            # marketing -> Buyer
            $rs = $this->db->get_where('acc_master', array('status' => 1, 'supplier_buyer' => 1))->result();

        }if($usertype == 4){
            
            # exporter -> Offers
            $rs = $this->db->get_where('offers', array('status' => 1))->result();
            
        }

        return $rs;

    }

    public function form_add_payment_mode(){  
        $insertArray = array(
            'pm_name' => $this->input->post('pm_name'),
            'pm_note' => $this->input->post('pm_note')
        );   

        if($this->db->insert('master_payment_mode', $insertArray)){
            $pm_id = $this->db->insert_id();
            $data['insert_id'] = $pm_id;

            $data['type'] = 'success';
            $data['msg'] = 'Payment Mode added.'; 
        }else{
            $data['type'] = 'error';
            $data['msg'] = 'Database Insert Error';
        }

        return $data;
    }

    private function _upload_files($files, $upload_path, $file_type, $user_file_name){

        // date_default_timezone_set("Asia/Kolkata");  

        $uploadedFileData = array();
        $key = 0;

        $config = array(
            'upload_path'   => $upload_path,
            'allowed_types' => $file_type,
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);

        // print_r($_FILES[$user_file_name]);

        $_FILES['file']['name']       = $_FILES[$user_file_name]['name'];
        $_FILES['file']['type']       = $_FILES[$user_file_name]['type'];
        $_FILES['file']['tmp_name']   = $_FILES[$user_file_name]['tmp_name'];
        $_FILES['file']['error']      = $_FILES[$user_file_name]['error'];
        $_FILES['file']['size']       = $_FILES[$user_file_name]['size'];

        // $config['file_name'] = date('His') .'_'. $image;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            
            $imageData = $this->upload->data();

            $new_array[] = array(
                'filename' => $imageData['file_name'], 
                'status' => 'success',
                'msg' => 'OK'
            );

            $final_array = array_merge($uploadedFileData, $new_array);

        } else {
            $new_array[] = array(
                'filename' => null, 
                'status' => 'error',
                'msg' => 'Type or Size Mismatch' //$this->upload->display_errors() .
            );

            $final_array = array_merge($uploadedFileData, $new_array);
        }

        return $final_array;
    }

    public function edit_payment_mode($pm_id = ''){        
        $data['title'] = 'Payment Mode';
        $data['menu'] = 'Payment Mode';
        $data['payment_details'] = $this->db->get_where('master_payment_mode', array('pm_id' => $pm_id))->result();
        return array('page' => 'paymentmode/paymentmode_edit_v', 'data' => $data);
    }

    public function ajax_unique_username_edit(){
        
        $username = $this->input->post('username');
        $user_id = $this->input->post('user_id');

        $rs = $this->db->where('user_id !=', $user_id)->get_where('users', array('username' => $username))->num_rows();

        
        if($rs != '0') {
            $data = 'Username already exists.';
        }else{
            $data='true';
        }

        return $data;

    }

    public function form_edit_payment_mode(){   
        $pm_id = $this->input->post('pm_id');  

        $updateArray1 = array(
            'pm_name' => $this->input->post('pm_name'),
            'pm_note' => $this->input->post('pm_note')
        );

        $val = $this->db->update('master_payment_mode', $updateArray1, array('pm_id' => $pm_id));
        //echo $this->db->last_query();die;
        
        if($val){
            $data['type'] = 'success';
            $data['msg'] = 'Payment Method Updated';          
        }else{
            $data['type'] = 'error';
            $data['msg'] = 'Database Update Error';
        }

        return $data;
    }

    public function ajax_delete_payment_mode(){
        $pm_id = $this->input->post('pm_id');
        $delClause = array(
            'pm_id' => $pm_id
        );
        
        $this->db->where($delClause)->delete('master_payment_mode');
        //echo $this->db->last_query();die;

        $data['type'] = 'success';
        $data['title'] = 'Deletion!';
        $data['msg'] = 'Payment Mode deleted'; 

        return $data;        
    }

    

// User ENDS 

}