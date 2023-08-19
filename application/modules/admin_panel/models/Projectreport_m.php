<?php
class projectreport_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function project_report() {
        $data['title'] = 'Project Report';
        $data['menu'] = 'Report';
        return array('page'=>'projectreport/projectreport_v', 'data'=>$data);
    }

    public function ajax_project_report_table_data() {
        $usertype = $this->session->usertype;
        $user_id = $this->session->user_id;

        $fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
        $empId = $this->input->post('empId');
        $projectStatus = $this->input->post('projectStatus');

        $data = array();
        $nestedData = array();

        $first_date = date('Y-m-d H:i:s', strtotime($fromDate));
        $second_date = date('Y-m-d H:i:s', strtotime($toDate));

        //$p_data =  $this->db->select('project_id, project_description, created_at, modified_at')->get_where('project_detail', array('created_at' => 1, 'supplier_buyer' => 0))->result();

        $this->db->where('created_at >=', $first_date);
        $this->db->where('created_at <=', $second_date);
        $p_data = $this->db->get('project_detail')->result();

        //echo json_encode($p_data);

        if(sizeof($p_data) > 0){
            $slNo = 1;
            foreach($p_data as $index => $val){
                $project_id = $val->project_id;
                $project_description = $val->project_description;
                $created_at = $val->created_at;
                $modified_at = $val->modified_at;

                $p_description = json_decode($project_description);

                $projectName = $p_description->projectDetail->title;
                
                $nestedData['slNo'] = $slNo;
                $nestedData['projectName'] = $projectName;
                $nestedData['created_at'] = $created_at;
                $nestedData['projectStatus'] = 'In Progress';
                            
                array_push($data, $nestedData);
                $slNo++;
            }//end foreach
        }
        

        $json_data = array(            
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

    public function form_search_project_report(){  
        $cont_person_name = $this->input->post('cont_person_name'); 
        $data['cont_person_name'] = $cont_person_name;

        
        // file name 
        $filename = 'p_report_'.date('Ymd').'.csv'; 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/csv; ");

        // get data 
        //$users = new Users();
        //$usersData = $users->select('*')->findAll();
        $usersData = $this->db->get('project_detail')->result();
        //$usersData = ["1","Yogesh singh", "yogesh@makitweb.com", "Bhopal"];

        echo json_encode($usersData);

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array("ID","Name","Email","City"); 
        fputcsv($file, $header);
        foreach ($usersData as $key => $line){ 
            fputcsv($file, $line); 
        }
        fclose($file); 
        //exit; 
    

        $data['cont_person_name'] = $cont_person_name;
        $data['msg'] = 'Report Generated Successfully.'; 
        $data['type'] = 'success';
        $data['title'] = 'Report';
        //return $data;

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