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

    public function ajax_employee_table_data() {
        $usertype = $this->session->usertype;
        $user_id = $this->session->user_id;
        $data = array();
        $nestedData = array();

        $p_data = $this->db->get('employee')->result();

        if(sizeof($p_data) > 0){
            $slNo = 1;
            foreach($p_data as $index => $val){
                $emp_id = $val->emp_id;
                $first_name = $val->first_name;
                $last_name = $val->last_name;
                $basicPay = $val->basic_pay;

                if($val->emp_photo != ''){
                    $emp_photo = $val->emp_photo;
                }else{
                    $emp_photo = 'no_image.png';
                }
                
                $employeeName = $first_name;
                if($last_name != ''){
                    $employeeName .= ' '.$last_name;
                }

                $emp_type = $val->emp_type;
                if($emp_type == '1'){
                    $employeeType = 'Permanent';
                }else if($emp_type == '2'){
                    $employeeType = 'Part Timer';
                }else{
                    $employeeType = 'Freelancer';
                }

                $emp_desig = $val->emp_desig;
                if($emp_desig == '1'){
                    $designation = 'Designer';
                }else if($emp_desig == '2'){
                    $designation = 'Developer';
                }else if($emp_desig == '3'){
                    $designation = 'Full Stack Developer';
                }else if($emp_desig == '4'){
                    $designation = 'Sr. Designer';
                }else if($emp_desig == '5'){
                    $designation = 'Sr. Developer';
                }else if($emp_desig == '6'){
                    $designation = 'Team Lead';
                }else if($emp_desig == '7'){
                    $designation = 'Project Mgr.';
                }else if($emp_desig == '8'){
                    $designation = 'Manager';
                }else if($emp_desig == '9'){
                    $designation = 'Director';
                }else if($emp_desig == '10'){
                    $designation = 'Managing Director';
                }else if($emp_desig == '11'){
                    $designation = 'Accounts & project coordinator';
                }else{
                    $designation = 'Business Developer';
                }

                $nestedData['slNo'] = $slNo;
                $nestedData['employeeName'] = $employeeName;
                $nestedData['phNumber'] = $val->ph_number;
                $nestedData['emailId'] = $val->email_id;
                $nestedData['employeeType'] = $employeeType;
                $nestedData['designation'] = $designation;
                $nestedData['basicPay'] = number_format($basicPay);
                $nestedData['photo'] = '<img src="'.base_url('upload/employee/'.$emp_photo).'" style="height: 50px;">';
                $nestedData['action'] = '<a href="javascript:void(0)" data-emp_id="'.$emp_id.'" class="btn bg-yellow slt_view_ofr"><i class="fa fa-eye"></i> View</a>
                <a href="'. base_url('admin/edit-employee/'.$emp_id).'" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                <a href="javascript:void(0)" data-emp_id="'.$emp_id.'" class="btn btn-danger delete"><i class="fa fa-times"></i> Delete</a>';
                            
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

    public function add_employee(){        
        $data['title'] = 'Employee Management';
        $data['menu'] = 'Add Employee';

        return array('page'=>'employee/employee_add_v', 'data'=>$data);
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

    public function form_add_employee(){  
        $active_loan = $this->input->post('active_loan');

        $insertArray = array(
            'emp_type' => $this->input->post('emp_type'),
            'emp_desig' => $this->input->post('emp_desig'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email_id' => $this->input->post('email_id'),
            'ph_number' => $this->input->post('ph_number'),
            'basic_pay' => $this->input->post('basic_pay'),
            'active_loan' => $active_loan,
            'loan_duration' => $this->input->post('loan_duration'),
            'loan_amount_remaining' => $active_loan,
            'last_incriment_date' => $this->input->post('last_incriment_date')
        );   

        if($this->db->insert('employee', $insertArray)){
            $emp_id = $this->db->insert_id();
            $data['insert_id'] = $emp_id;

            $data['type'] = 'success';
            $data['msg'] = 'Employee added successfully.'; 

            // image upload
            if (!empty($_FILES['employeefile']['name'][0])) {
                $return_data = array(); 

                $upload_path = './upload/employee/' ; 
                $file_type = 'jpg|jpeg|png|bmp';
                $user_file_name = 'employeefile';

                $return_data = $this->_upload_files($_FILES['employeefile'], $upload_path, $file_type, $user_file_name);
                //print_r($return_data);die;

                foreach ($return_data as $datam) {
                    if ($datam['status'] != 'error') {                        
                        // Insert filename to db

                        $updateArray = array(
                            'emp_photo' => $datam['filename']
                        );

                        $val = $this->db->update('employee', $updateArray, array('emp_id' => $emp_id));
                    }
                }
                
                $data['msg'] = 'Image Files Uploaded<hr>Employee added successfully.'; 

            }
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

    public function edit_employee($emp_id = ''){
        
        $data['title'] = 'Employee Management';
        $data['menu'] = 'Users';

        $data['employee_details'] = $this->db->get_where('employee', array('emp_id' => $emp_id))->result();

        return array('page' => 'employee/employee_edit_v', 'data' => $data);

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

    public function form_edit_employee(){   
        $emp_id = $this->input->post('emp_id');  

        $updateArray1 = array(
            'emp_type' => $this->input->post('emp_type'),
            'emp_desig' => $this->input->post('emp_desig'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email_id' => $this->input->post('email_id'),
            'ph_number' => $this->input->post('ph_number'),
            'basic_pay' => $this->input->post('basic_pay'),
            'active_loan' => $this->input->post('active_loan'),
            'loan_duration' => $this->input->post('loan_duration'),
            'loan_amount_remaining' => $this->input->post('active_loan'),
            'last_incriment_date' => $this->input->post('last_incriment_date')
        );

        $val = $this->db->update('employee', $updateArray1, array('emp_id' => $emp_id));
        //echo $this->db->last_query();die;
        
        if($val){
            $data['type'] = 'success';
            $data['msg'] = 'User edited successfully<hr>No Files Uploaded.';          
        }else{
            $data['type'] = 'error';
            $data['msg'] = 'Database Update Error';
        }

        return $data;
    }

    public function ajax_delete_employee(){
        $emp_id = $this->input->post('emp_id');
        $delClause = array(
            'emp_id' => $emp_id
        );
        
        $this->db->where($delClause)->delete('employee');

        $data['type'] = 'success';
        $data['title'] = 'Deletion!';
        $data['msg'] = 'Employee deleted successfully'; 

        return $data;        
    }

    

// User ENDS 

}