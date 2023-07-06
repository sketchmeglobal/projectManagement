<?php
class bankaccount_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function bank_account() {
        $data['title'] = 'Bank Account';
        $data['menu'] = 'Bank Account';
        return array('page'=>'bankaccount/bankaccount_list_v', 'data'=>$data);
    }

    public function ajax_bank_table_data() {
        $usertype = $this->session->usertype;
        $user_id = $this->session->user_id;
        $data = array();
        $nestedData = array();

        $p_data = $this->db->get('master_bank_account')->result();

        if(sizeof($p_data) > 0){
            $slNo = 1;
            foreach($p_data as $index => $val){
                $ba_id = $val->ba_id;
                $bank_name = $val->bank_name;
                $bank_address = $val->bank_address;
                $bank_account_no = $val->bank_account_no;
                $bank_ifs_code = $val->bank_ifs_code;
                $bank_micr_code = $val->bank_micr_code;
                $bank_branch_code = $val->bank_branch_code;

                $nestedData['slNo'] = $slNo;
                $nestedData['bank_name'] = $bank_name;
                $nestedData['bank_address'] = $val->bank_address;
                $nestedData['bank_account_no'] = $val->bank_account_no;
                $nestedData['bank_ifs_code'] = $bank_ifs_code;
                $nestedData['bank_micr_code'] = $bank_micr_code;
                $nestedData['bank_branch_code'] = $bank_branch_code;
                $nestedData['action'] = '<a href="'. base_url('admin/edit-bank-account/'.$ba_id).'" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                <a href="javascript:void(0)" data-ba_id="'.$ba_id.'" class="btn btn-danger delete"><i class="fa fa-times"></i> Delete</a>';
                            
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

    public function add_bank_account(){        
        $data['title'] = 'Bank Account Master';
        $data['menu'] = 'Add Bank A/c';

        return array('page'=>'bankaccount/bankaccount_add_v', 'data'=>$data);
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

    public function form_add_bank_account(){  
        $insertArray = array(
            'bank_name' => $this->input->post('bank_name'),
            'bank_address' => $this->input->post('bank_address'),
            'bank_account_no' => $this->input->post('bank_account_no'),
            'bank_ifs_code' => $this->input->post('bank_ifs_code'),
            'bank_micr_code' => $this->input->post('bank_micr_code'),
            'bank_branch_code' => $this->input->post('bank_branch_code')
        );   

        if($this->db->insert('master_bank_account', $insertArray)){
            $ba_id = $this->db->insert_id();
            $data['insert_id'] = $ba_id;

            $data['type'] = 'success';
            $data['msg'] = 'Bank added successfully.'; 
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

    public function edit_bank_account($ba_id = ''){
        
        $data['title'] = 'Bank Account Management';
        $data['menu'] = 'Users';

        $data['bankaccount_details'] = $this->db->get_where('master_bank_account', array('ba_id' => $ba_id))->result();

        return array('page' => 'bankaccount/bankaccount_edit_v', 'data' => $data);

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

    public function form_edit_bank_account(){   
        $ba_id = $this->input->post('ba_id');  

        $updateArray1 = array(
            'bank_name' => $this->input->post('bank_name'),
            'bank_address' => $this->input->post('bank_address'),
            'bank_account_no' => $this->input->post('bank_account_no'),
            'bank_ifs_code' => $this->input->post('bank_ifs_code'),
            'bank_micr_code' => $this->input->post('bank_micr_code'),
            'bank_branch_code' => $this->input->post('bank_branch_code')
        );

        $val = $this->db->update('master_bank_account', $updateArray1, array('ba_id' => $ba_id));
        //echo $this->db->last_query();die;
        
        if($val){
            $data['type'] = 'success';
            $data['msg'] = 'Bank Info Uploaded.';          
        }else{
            $data['type'] = 'error';
            $data['msg'] = 'Database Update Error';
        }

        return $data;
    }

    public function ajax_delete_bank_account(){
        $ba_id = $this->input->post('ba_id');
        $delClause = array(
            'ba_id' => $ba_id
        );
        
        $this->db->where($delClause)->delete('master_bank_account');

        $data['type'] = 'success';
        $data['title'] = 'Deletion!';
        $data['msg'] = 'Bank Info deleted successfully'; 

        return $data;        
    }

    

// User ENDS 

}