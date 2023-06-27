<?php
class employeesalary_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function employee_salary() {
        $data['title'] = 'Employee Salary';
        $data['menu'] = 'Salary';
        return array('page'=>'employee/employee_salary_list_v', 'data'=>$data);
    }

    public function ajax_employee_salary_table_data() {
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

    public function add_salary(){        
        $data['title'] = 'Employee Salary';
        $data['employees'] = 'Add Salary';

        $employees = $this->db->get('employee')->result();
        $data['employees'] = $employees;

        return array('page'=>'employee/employee_salary_add_v', 'data'=>$data);
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

    public function form_add_salary(){ 
        $emp_id = $this->input->post('emp_id');
        $emp_name = $this->input->post('emp_name');

        $all_allowance = new stdClass();
        $all_deduction = new stdClass();

        //Allowance
        $all_allowance->basic = $this->input->post('basic');
        $all_allowance->hra = $this->input->post('hra');
        $all_allowance->conveyanceAllowance = $this->input->post('conveyanceAllowance');
        $all_allowance->ProfDevelopmentAllowance = $this->input->post('ProfDevelopmentAllowance');
        $all_allowance->booksAndPeriodicals = $this->input->post('booksAndPeriodicals');
        $all_allowance->medicalReimbursement = $this->input->post('medicalReimbursement');
        $all_allowance->childEducationAllowance = $this->input->post('childEducationAllowance');
        $all_allowance->PerformancePayAllowance = $this->input->post('PerformancePayAllowance');
        $all_allowance->specialAllowance = $this->input->post('specialAllowance');
        $all_allowance->entertainmentAllowance = $this->input->post('entertainmentAllowance');
        $all_allowance->fuelAndMaintenance = $this->input->post('fuelAndMaintenance');
        $all_allowance->otherAllowance = $this->input->post('otherAllowance');
        $all_allowance->variablePay = $this->input->post('variablePay');
        $all_allowance->lta_AnnualBenefit = $this->input->post('lta_AnnualBenefit');
        $all_allowance->festivalBonus = $this->input->post('festivalBonus');
        $all_allowance->medicalInsurancePremium = $this->input->post('medicalInsurancePremium');
        $all_allowance->arrear = $this->input->post('arrear');

        //Deduction
        $all_deduction->employees_PF_PPF = $this->input->post('employees_PF_PPF');
        $all_deduction->employeesESIC = $this->input->post('employeesESIC');
        $all_deduction->professionalTax = $this->input->post('professionalTax');
        $all_deduction->incomeTax = $this->input->post('incomeTax');
        $all_deduction->ltaDeduction = $this->input->post('ltaDeduction');
        $all_deduction->festivalBonusDeduction = $this->input->post('festivalBonusDeduction');
        $all_deduction->medicalInsurancePremiumDeduct = $this->input->post('medicalInsurancePremiumDeduct');
        $all_deduction->otherDeductions = $this->input->post('otherDeductions');
        $all_deduction->miscDeduction = $this->input->post('miscDeduction');
        $all_deduction->loan = $this->input->post('loan');


        $insertArray = array(
            'emp_id' => $emp_id,
            'emp_name' => $emp_name,
            'all_allowance' => json_encode($all_allowance),
            'all_deduction' => json_encode($all_deduction)
        );   

        if($this->db->insert('emp_salary', $insertArray)){
            $salary_id = $this->db->insert_id();
            $data['salary_id'] = $salary_id;

            $data['type'] = 'success';
            $data['msg'] = 'Salary added successfully.'; 
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

    public function edit_salary($salary_id = ''){        
        $data['title'] = 'Employee Salary';
        $data['menu'] = 'Salary';

        $employees = $this->db->get('employee')->result();
        $data['employees'] = $employees;

        $data['salary_details'] = $this->db->get_where('emp_salary', array('salary_id' => $salary_id))->result();

        return array('page' => 'employee/employee_salary_edit_v', 'data' => $data);

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

    public function form_edit_salary(){   
        $salary_id = $this->input->post('salary_id'); 
        $emp_id = $this->input->post('emp_id');
        $emp_name = $this->input->post('emp_name');

        $all_allowance = new stdClass();
        $all_deduction = new stdClass();

        //Allowance
        $all_allowance->basic = $this->input->post('basic');
        $all_allowance->hra = $this->input->post('hra');
        $all_allowance->conveyanceAllowance = $this->input->post('conveyanceAllowance');
        $all_allowance->ProfDevelopmentAllowance = $this->input->post('ProfDevelopmentAllowance');
        $all_allowance->booksAndPeriodicals = $this->input->post('booksAndPeriodicals');
        $all_allowance->medicalReimbursement = $this->input->post('medicalReimbursement');
        $all_allowance->childEducationAllowance = $this->input->post('childEducationAllowance');
        $all_allowance->PerformancePayAllowance = $this->input->post('PerformancePayAllowance');
        $all_allowance->specialAllowance = $this->input->post('specialAllowance');
        $all_allowance->entertainmentAllowance = $this->input->post('entertainmentAllowance');
        $all_allowance->fuelAndMaintenance = $this->input->post('fuelAndMaintenance');
        $all_allowance->otherAllowance = $this->input->post('otherAllowance');
        $all_allowance->variablePay = $this->input->post('variablePay');
        $all_allowance->lta_AnnualBenefit = $this->input->post('lta_AnnualBenefit');
        $all_allowance->festivalBonus = $this->input->post('festivalBonus');
        $all_allowance->medicalInsurancePremium = $this->input->post('medicalInsurancePremium');
        $all_allowance->arrear = $this->input->post('arrear');

        //Deduction
        $all_deduction->employees_PF_PPF = $this->input->post('employees_PF_PPF');
        $all_deduction->employeesESIC = $this->input->post('employeesESIC');
        $all_deduction->professionalTax = $this->input->post('professionalTax');
        $all_deduction->incomeTax = $this->input->post('incomeTax');
        $all_deduction->ltaDeduction = $this->input->post('ltaDeduction');
        $all_deduction->festivalBonusDeduction = $this->input->post('festivalBonusDeduction');
        $all_deduction->medicalInsurancePremiumDeduct = $this->input->post('medicalInsurancePremiumDeduct');
        $all_deduction->otherDeductions = $this->input->post('otherDeductions');
        $all_deduction->miscDeduction = $this->input->post('miscDeduction');
        $all_deduction->loan = $this->input->post('loan'); 

        $updateArray1 = array(
            'emp_id' => $emp_id,
            'emp_name' => $emp_name,
            'all_allowance' => json_encode($all_allowance),
            'all_deduction' => json_encode($all_deduction)
        );

        $val = $this->db->update('emp_salary', $updateArray1, array('salary_id' => $salary_id));
        //echo $this->db->last_query();die;
        
        if($val){
            $data['type'] = 'success';
            $data['msg'] = 'Salary Uploaded successfully.';          
        }else{
            $data['type'] = 'error';
            $data['msg'] = 'Database Update Error';
        }

        return $data;
    }

    public function ajax_delete_user(){

        $user_id = $this->input->post('user_id');
        $delClause = array(
            'user_id' => $user_id
        );

        $this->db->where($delClause)->delete('user_details');
        $this->db->where($delClause)->delete('users');

        $data['type'] = 'success';
        $data['title'] = 'Deletion!';
        $data['msg'] = 'User deleted successfully'; 

        return $data;
        
    }

    

// User ENDS 

}