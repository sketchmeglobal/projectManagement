<?php
class Projects_m extends CI_Model {

    public function __construct() {
        parent::__construct();
        
    }

    public function projects() {
        $data["insert"] = '';   
        $data['title'] = 'Project Lists';
        $data['menu'] = 'Projects';
        $data['mar_users'] = $this->db->get_where('users', array('usertype' => 3))->result();
        $data['res_users'] = $this->db->get_where('users', array('usertype' => 2))->result();
        //$data['view_templates'] = $this->db->get_where('view_templates', array('status' => 1))->result();
        //$data['company_details'] = $this->db->get_where('company', array('status' => 'Active'))->result();
        return array('page'=>'projects/project_list_v', 'data'=>$data);   
    }

    public function ajax_project_table_data() {
        $usertype = $this->session->usertype;
        $user_id = $this->session->user_id;
        $data = array();
        $nestedData = array();

        $p_data = $this->db->get('project_detail')->result();

        if(sizeof($p_data) > 0){
            foreach($p_data as $index => $val){
                $project_id = $val->project_id;
                $created_at = $val->created_at;
                $project_description = json_decode($val->project_description);
                $project_name = $project_description->projectDetail->title;        

                $nestedData['sl_no'] = $project_id;
                $nestedData['project_name'] = $project_name;
                $nestedData['create_dt'] = date("d-m-Y", strtotime($created_at));
                $nestedData['action'] = '<a href="javascript:void(0)" data-project_id="'.$project_id.'" class="btn bg-yellow slt_view_ofr"><i class="fa fa-eye"></i> View</a>
                <a href="'. base_url('admin/project-detail/'.$project_id).'" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                <a href="javascript:void(0)" data-project_id="'.$project_id.'" class="btn btn-danger delete"><i class="fa fa-times"></i> Delete</a>';
                            
                array_push($data, $nestedData);
            }//end foreach
        }

        $totalData = sizeof($nestedData);
        $totalFiltered = sizeof($nestedData);

        $json_data = array(
            "recordsTotal"    => sizeof($data),
            "recordsFiltered" => sizeof($data),
            "data"            => $data
        );

        return $json_data;
    } 

    public function project_detail($project_id) {
        $usertype = $this->session->usertype;
        $user_id = $this->session->user_id;
        $project_description = array();

        $account_name = '';
        $account_address1 = '';
        $account_address2 = '';
        $account_gst_no = '';
        $account_telephone = '';
        $cbill_payment_mode = '';
        $important_note = '';
        $other_client_details = '';

        if($project_id > 0){
            $result = $this->db->get_where('project_detail', array('project_id' => $project_id))->result();
            //print_r($result);

            if(count($result) > 0){
                $project_description1 = $result[0]->project_description;
                $project_description = json_decode($project_description1);
        
                $client = $project_description->client;
                $account_name = $client->account_name;
                $account_address1 = $client->account_address1;
                $account_address2 = $client->account_address2;
                $account_gst_no = $client->account_gst_no;
                $account_telephone = $client->account_telephone;
                $cbill_payment_mode = $client->cbill_payment_mode;
                $important_note = $client->important_note;
                $other_client_details = $client->other_client_details;
            }
        }
        
        $data['title'] = 'Edit Offer';
        $data['menu'] = 'Offers';
        $data['project_id'] = $project_id;  
        $data['project_description'] = $project_description; 
        $data['account_name'] = $account_name;
        $data['account_address1'] = $account_address1;
        $data['account_address2'] = $account_address2;
        $data['account_gst_no'] = $account_gst_no;
        $data['account_telephone'] = $account_telephone;
        $data['cbill_payment_mode'] = $cbill_payment_mode;
        $data['important_note'] = $important_note;
        $data['other_client_details'] = $other_client_details;

        return array('page'=>'projects/project_detail_v', 'data'=>$data);
    }

    //Print quotation
    public function print_quotation_details($project_id, $bi_obj) {
        $usertype = $this->session->usertype;
        $user_id = $this->session->user_id;
        $project_description = array();
        $quotationDetail = array();
        $particulars = array();
        $quotation = '';

        if($project_id > 0){
            $result = $this->db->get_where('project_detail', array('project_id' => $project_id))->result();
            //print_r($result);

            if(count($result) > 0){
                $project_description1 = $result[0]->project_description;
                $project_description = json_decode($project_description1);
                $quotationDetail = $project_description->quotationDetail;
            }
        }

        if(sizeof($quotationDetail) > 0){
            for($i = 0; $i < sizeof($quotationDetail); $i++){
                if($quotationDetail[$i]->bi_obj == $bi_obj){
                    $quotation = $quotationDetail[$i];
                    $particulars = $quotation->particulars;
                }
            }
        }

        //Header details/Client Details
        if(isset($project_description->client)){
            $client = $project_description->client;
            $account_name = $client->account_name;
            $account_address1 = $client->account_address1;
            $account_address2 = $client->account_address2;
            $account_gst_no = $client->account_gst_no;
            $account_telephone = $client->account_telephone;
            $cbill_payment_mode = $client->cbill_payment_mode;
            $important_note = $client->important_note;
            $other_client_details = $client->other_client_details;
        }else{
            $account_name = '';
            $account_address1 = '';
            $account_address2 = '';
            $account_gst_no = '';
            $account_telephone = '';
            $cbill_payment_mode = '';
            $important_note = '';
            $other_client_details = '';
        }

        $cbill_header_details = array();
        $cbill_header_detail = new stdClass();
        $cbill_header_detail->account_name = $account_name;
        $cbill_header_detail->account_address1 = $account_address1;
        $cbill_header_detail->account_address2 = $account_address2;
        $cbill_header_detail->account_gst_no = $account_gst_no;
        $cbill_header_detail->account_telephone = $account_telephone;
        $cbill_header_detail->cbill_payment_mode = $cbill_payment_mode;
        $cbill_header_detail->important_note = $important_note;
        $cbill_header_detail->other_client_details =  $other_client_details;

        array_push($cbill_header_details, $cbill_header_detail);

        //Company Details start
        $company_name = '';
        $address1 =  '';
        $GST =  '';
        $phone =  '';
        $email =  '';
        $website =  '';
        $PAN =  '';
        $contact_person =  '';
        $mobile1 =  '';
        $mobile2 =  '';
        $alternate_email =  '';
        $company_subtitle =  '';
        $company_detail =  '';

        $result_u = $this->db->get_where('user_details', array('user_id' => $user_id))->result();
        //print_r($result_u);

        //Bank details & company details
        if(count($result_u) > 0){
            $company_details1 = $result_u[0]->company_details;
            $company_details = json_decode($company_details1);

            $bank_details1 = $result_u[0]->sbi_bank_details;
            $bank_details2 = $result_u[0]->hdfc_bank_details;

            if(isset($quotation->tax_BankName)){
                if($quotation->tax_BankName == "SBI"){
                    $bank_details = json_decode($bank_details1);
                }else if($quotation->tax_BankName == "HDFC"){
                    $bank_details = json_decode($bank_details2);
                }else{
                    $bank_details = '';
                }
            }else{
                $bank_details = '';
            }

            $company_name = $company_details->company_name;
            $address1 = $company_details->address1;
            $GST = $company_details->GST;
            $phone = $company_details->phone;
            $email = $company_details->email;
            $website = $company_details->website;
            $PAN = $company_details->PAN;
            $contact_person = $company_details->contact_person;
            $mobile1 = $company_details->mobile1;
            $mobile2 = $company_details->mobile2;
            $alternate_email = $company_details->alternate_email;
            $company_subtitle = $company_details->company_subtitle;
            $company_detail = $company_details->company_detail;
        }

        $company_details = array();        
        $company_detail = new stdClass();
        
        $company_detail->company_name = $company_name;
        $company_detail->address1 = $address1;
        $company_detail->GST = $GST;
        $company_detail->phone = $phone;
        $company_detail->email = $email;
        $company_detail->website = $website;
        $company_detail->PAN = $PAN;
        $company_detail->contact_person = $contact_person;
        $company_detail->mobile1 = $mobile1;
        $company_detail->mobile2 = $mobile2;
        $company_detail->alternate_email = $alternate_email;
        $company_detail->company_subtitle = "[Think - Design - Develop - Maintain]";
        $company_detail->company_detail = "[Website Designing - Website Development - Software Development - Android Apps - System Maintenance - Domain Name - Server Space]";
        
        array_push($company_details, $company_detail);
        
        //Banking Details
        $banking_details = array();
        $banking_detail = new stdClass();
        if($bank_details != ''){
            $banking_detail->bank_name = $bank_details->bank_name;
            $banking_detail->bank_address = $bank_details->bank_address;
            $banking_detail->bank_account_no = $bank_details->bank_account_no;
            $banking_detail->bank_ifs_code = $bank_details->bank_ifs_code;
            $banking_detail->bank_micr_code = $bank_details->bank_micr_code;
            $banking_detail->bank_branch_code = $bank_details->bank_branch_code;
        }else{
            $banking_detail->bank_name = '';
            $banking_detail->bank_address = '';
            $banking_detail->bank_account_no = '';
            $banking_detail->bank_ifs_code = '';
            $banking_detail->bank_micr_code = '';
            $banking_detail->bank_branch_code = '';
        }

        array_push($banking_details, $banking_detail);

        //Tax Calculation
        $taxes = array();
        $tax = new stdClass();
        if(isset($quotation->tax_GrossAmount)){
            $tax->tax_GrossAmount = $quotation->tax_GrossAmount;
            $tax->tax_DiscountPercentage = $quotation->tax_DiscountPercentage;
            $tax->tax_DiscountAmount = $quotation->tax_DiscountAmount;
            $tax->tax_CGST_Rate = $quotation->tax_CGST_Rate;
            $tax->tax_CGST_Amount = $quotation->tax_CGST_Amount;
            $tax->tax_SGST_Rate = $quotation->tax_SGST_Rate;
            $tax->tax_SGST_Amount = $quotation->tax_SGST_Amount;
            $tax->tax_IGST_Rate = $quotation->tax_IGST_Rate;
            $tax->tax_IGST_Amount = $quotation->tax_IGST_Amount;
        }else{
            $tax->tax_GrossAmount = 0.00;
            $tax->tax_DiscountPercentage = 0.00;
            $tax->tax_DiscountAmount = 0.00;
            $tax->tax_CGST_Rate = 0.00;
            $tax->tax_CGST_Amount = 0.00;
            $tax->tax_SGST_Rate = 0.00;
            $tax->tax_SGST_Amount = 0.00;
            $tax->tax_IGST_Rate = 0.00;
            $tax->tax_IGST_Amount = 0.00;
        }

        array_push($taxes, $tax);



        $data['title'] = 'Print Quotation';
        $data['menu'] = 'Offers';
        $data['project_id'] = $project_id;   
        $data['company_details'] = $company_details; 
        $data['cbill_header_details'] = $cbill_header_details; 
        $data['banking_details'] = $banking_details;
        $data['quotation'] = $quotation;
        $data['particulars'] = $particulars;
        $data['taxes'] = $taxes;

        return array('page' => 'projects/quotation_print', 'data' => $data);
    }

    public function ajax_update_project_document(){
        $project_id = $this->input->post('project_id');
        $project_description = $this->input->post('project_description');
        $project_description_form = json_decode($project_description);
        $created_by = $this->session->user_id;

        if($project_id == 0){
            //insert sql
            $insertArray = array(
                'project_description' => $project_description
            );
            if($this->db->insert('project_detail', $insertArray)){
                $project_id = $this->db->insert_id();
                $data['type'] = 'success';
            }
        }else{
            // update
            $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $project_id))->result();
            if(count($result) > 0){
                $project_description1 = $result[0]->project_description;
                $project_description_new = json_decode($project_description1);            
                $projectDetail = $project_description_new->projectDetail;
                $projectDetail->title = $project_description_form->projectDetail->title;
                $projectDetail->description = $project_description_form->projectDetail->description;
                $project_description_new->projectDetail = $projectDetail;
            }

            $updateArray = array(
                'project_description' => json_encode($project_description_new)
            );
            if($this->db->update('project_detail', $updateArray, array('project_id' => $project_id))){
                $data['type'] = 'success';
            }
        }//end if
        

        
        $data['title'] = 'Project!';
        $data['msg'] = 'Project document updated successfully'; 
        $data['project_id'] = $project_id;

        return $data;
        
    }//end fun
    

    //Contact details part
    public function form_add_client_details(){  
        $daya = array();
        $status = true;

        $project_id = $this->input->post('cli_project_id');
        $account_name = $this->input->post('account_name');
        $account_address1 = $this->input->post('account_address1');
        $account_address2 = $this->input->post('account_address2');
        $account_gst_no = $this->input->post('account_gst_no');
        $account_telephone = $this->input->post('account_telephone');
        $cbill_payment_mode = $this->input->post('cbill_payment_mode');
        $important_note = $this->input->post('important_note');
        $other_client_details = $this->input->post('other_client_details');

        $created_by = $this->session->user_id;
        $client_obj = rand(1000, 9999);
        $files = array();

        $client_list_obj = new stdClass();
        $client_list_obj->client_obj = $client_obj;
        $client_list_obj->account_name = $account_name;
        $client_list_obj->account_address1 = $account_address1;
        $client_list_obj->account_address2 = $account_address2;
        $client_list_obj->account_gst_no = $account_gst_no;
        $client_list_obj->account_telephone = $account_telephone;
        $client_list_obj->cbill_payment_mode = $cbill_payment_mode;
        $client_list_obj->important_note = $important_note;
        $client_list_obj->other_client_details = $other_client_details;

        //check existing data
        $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $project_id))->result();
        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1); 
        }
        
        $project_description->client = $client_list_obj;

        $updateArray = array(
            'project_description' => json_encode($project_description)
        );

        $val = $this->db->update('project_detail', $updateArray, array('project_id' => $project_id));
        $data['file_updated'] = $val;      
        
        $data['type'] = 'success';
        $data['msg'] = 'Client data updated Properly';
        $data['title'] = 'Client';
        $data['update_id'] = $project_id;
        return $data;

    }//end client details
    

    //Contact details part
    public function form_add_contact(){  
        $daya = array();
        $status = true;

        $cont_project_id = $this->input->post('cont_project_id');
        $cont_person_name = $this->input->post('cont_person_name');
        $org_name = $this->input->post('org_name');
        $contact_email = $this->input->post('contact_email');
        $contact_first_ph = $this->input->post('contact_first_ph');
        $contact_second_ph = $this->input->post('contact_second_ph');
        $contact_persn_address = $this->input->post('contact_persn_address');

        $created_by = $this->session->user_id;
        $contact_obj = rand(1000, 9999);
        $files = array();

        $contact_list_obj = new stdClass();
        $contact_list_obj->contact_obj = $contact_obj;
        $contact_list_obj->cont_person_name = $cont_person_name;
        $contact_list_obj->org_name = $org_name;
        $contact_list_obj->contact_email = $contact_email;
        $contact_list_obj->contact_first_ph = $contact_first_ph;
        $contact_list_obj->contact_second_ph = $contact_second_ph;
        $contact_list_obj->contact_persn_address = $contact_persn_address;

        //check existing data
        $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $cont_project_id))->result();
        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1);            
            $contactDetail = $project_description->contactDetail;
        }else{
            $contactDetail = array();
        }
                
        array_push($contactDetail, $contact_list_obj);
        $project_description->contactDetail = $contactDetail;

        $updateArray = array(
            'project_description' => json_encode($project_description)
        );

        $val = $this->db->update('project_detail', $updateArray, array('project_id' => $cont_project_id));
        $data['file_updated'] = $val;      
        
        $data['type'] = 'success';
        $data['msg'] = 'Contact added Properly';
        $data['title'] = 'Contact';
        $data['update_id'] = $cont_project_id;
        return $data;

    }//end contacts
    

    //Contact details edit
    public function form_edit_contact(){  
        $daya = array();
        $contactDetail = array();
        $project_description = array();
        $status = true;

        $cont_project_id = $this->input->post('e_cont_project_id');
        $contact_obj = $this->input->post('contact_obj');
        $cont_person_name = $this->input->post('e_cont_person_name');
        $org_name = $this->input->post('e_org_name');
        $contact_email = $this->input->post('e_contact_email');
        $contact_first_ph = $this->input->post('e_contact_first_ph');
        $contact_second_ph = $this->input->post('e_contact_second_ph');
        $contact_persn_address = $this->input->post('e_contact_persn_address');

        $created_by = $this->session->user_id;

        if($contact_obj > 0){
            //check existing data
            $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $cont_project_id))->result();
            if(count($result) > 0){
                $project_description1 = $result[0]->project_description;
                $project_description = json_decode($project_description1);            
                $contactDetail = $project_description->contactDetail;

                for($i = 0; $i < sizeof($contactDetail); $i++){
                    if($contactDetail[$i]->contact_obj == $contact_obj){
                        $contactDetail[$i]->cont_person_name = $cont_person_name;
                        $contactDetail[$i]->org_name = $org_name;
                        $contactDetail[$i]->contact_email = $contact_email;
                        $contactDetail[$i]->contact_first_ph = $contact_first_ph;
                        $contactDetail[$i]->contact_second_ph = $contact_second_ph;
                        $contactDetail[$i]->contact_persn_address = $contact_persn_address;
                    }
                }//end for
                $project_description->contactDetail = $contactDetail;
            }//end if

            $updateArray = array(
                'project_description' => json_encode($project_description)
            );

            $val = $this->db->update('project_detail', $updateArray, array('project_id' => $cont_project_id));
            $data['file_updated'] = $val;   
        }   
        
        $data['type'] = 'success';
        $data['msg'] = 'Contact updated successfully';
        $data['title'] = 'Contact';
        $data['update_id'] = $cont_project_id;
        return $data;

    }//end contacts edit    
    

    //Requirement edit
    public function requirement_gather_edit_form(){  
        $daya = array();
        $status = true;

        $project_id = $this->input->post('e_gr_project_id');
        $doc_obj = $this->input->post('doc_obj');
        $e_req_gather_title = $this->input->post('e_req_gather_title');
        $e_req_gather_desc = $this->input->post('e_req_gather_desc');
        $e_req_gather_by = $this->input->post('e_req_gather_by');
        $e_req_gather_by_name = $this->input->post('e_req_gather_by_name');
        $e_req_gather_date = $this->input->post('e_req_gather_date');
        $contact_persn_address = $this->input->post('e_contact_persn_address');

        $created_by = $this->session->user_id;

        if($doc_obj > 0){
            //check existing data
            $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $project_id))->result();
            if(count($result) > 0){
                $project_description1 = $result[0]->project_description;
                $project_description = json_decode($project_description1);            
                $requirementDetail = $project_description->requirementDetail;

                for($i = 0; $i < sizeof($requirementDetail); $i++){
                    if($requirementDetail[$i]->doc_obj == $doc_obj){
                        $requirementDetail[$i]->req_gather_title = $e_req_gather_title;
                        $requirementDetail[$i]->req_gather_desc = $e_req_gather_desc;
                        $requirementDetail[$i]->req_gather_by = $e_req_gather_by;
                        $requirementDetail[$i]->req_gather_by_name = $e_req_gather_by_name;
                        $requirementDetail[$i]->req_gather_date = $e_req_gather_date;
                    }
                }//end for
            }//end if
            
            $project_description->requirementDetail = $requirementDetail;

            $updateArray = array(
                'project_description' => json_encode($project_description)
            );

            $val = $this->db->update('project_detail', $updateArray, array('project_id' => $project_id));
            $data['file_updated'] = $val;   
        }   
        
        $data['type'] = 'success';
        $data['msg'] = 'Requirement updated successfully';
        $data['title'] = 'Requirement';
        $data['update_id'] = $project_id;
        return $data;

    }//end contacts edit  


    //Contact list delete
    public function del_row_contact_details(){
        $project_id = $this->input->post('project_id');
        $contact_obj = $this->input->post('contact_obj');
        $status = true;
        
        if($contact_obj > 0){
            //check existing data
            $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $project_id))->result();
            if(count($result) > 0){
                $project_description1 = $result[0]->project_description;
                $project_description = json_decode($project_description1);            
                $contactDetail = $project_description->contactDetail;
                $newContactDetail = array();

                for($i = 0; $i < sizeof($contactDetail); $i++){
                    if($contactDetail[$i]->contact_obj != $contact_obj){
                        array_push($newContactDetail, $contactDetail[$i]);
                    }
                }//end for
            }//end if
            
            $project_description->contactDetail = $newContactDetail;

            $updateArray = array(
                'project_description' => json_encode($project_description)
            );

            $val = $this->db->update('project_detail', $updateArray, array('project_id' => $project_id));
            $data['file_updated'] = $val;   
        }   

        if ($status == true) {
            $data['title'] = 'Deleted!';
            $data['type'] = 'success';
            $data['msg'] = 'Contact Deleted Successfully';
        }
        return $data;        
    }//end fun 


    //Requirement list delete
    public function del_row_requirement_details(){
        $project_id = $this->input->post('project_id');
        $doc_obj = $this->input->post('doc_obj');
        $status = true;
        
        if($doc_obj > 0){
            //check existing data
            $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $project_id))->result();
            if(count($result) > 0){
                $project_description1 = $result[0]->project_description;
                $project_description = json_decode($project_description1);            
                $requirementDetail = $project_description->requirementDetail;
                $newRequirementDetail = array();

                for($i = 0; $i < sizeof($requirementDetail); $i++){                        
                    if($requirementDetail[$i]->doc_obj == $doc_obj){ 
                        $files = $requirementDetail[$i]->files;  
                        for($j = 0; $j < sizeof($files); $j++){
                            $path = './upload/proj_doc/' . $files[$j]->file_name;
                            if(file_exists($path)){
                                unlink($path);
                            }
                        }//end for
                    }//end if

                    if($requirementDetail[$i]->doc_obj != $doc_obj){
                        array_push($newRequirementDetail, $requirementDetail[$i]);
                    }
                }//end for
            }//end if
            
            $project_description->requirementDetail = $newRequirementDetail;

            $updateArray = array(
                'project_description' => json_encode($project_description)
            );

            $val = $this->db->update('project_detail', $updateArray, array('project_id' => $project_id));
            $data['file_updated'] = $val;   
        }   

        if ($status == true) {
            $data['title'] = 'Deleted!';
            $data['type'] = 'success';
            $data['msg'] = 'Contact Deleted Successfully';
        }
        return $data;        
    }//end fun


    //Project list delete
    public function del_row_project_details(){
        $project_id = $this->input->post('project_id');
        
        $status = true;
        $this->db->where('project_id', $project_id)->delete('project_detail');

        if ($status == true) {
            $data['title'] = 'Deleted!';
            $data['type'] = 'success';
            $data['msg'] = 'Project Deleted Successfully';
        }
        return $data;        
    }//end fun


    //Quotation list delete
    public function del_row_quotation_details(){
        $project_id = $this->input->post('project_id');
        $bi_obj = $this->input->post('bi_obj');
        $status = true;
        
        if($bi_obj > 0){
            //check existing data
            $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $project_id))->result();
            if(count($result) > 0){
                $project_description1 = $result[0]->project_description;
                $project_description = json_decode($project_description1);            
                $quotationDetail = $project_description->quotationDetail;
                $newQuotationDetail = array();

                for($i = 0; $i < sizeof($quotationDetail); $i++){ 
                    if($quotationDetail[$i]->bi_obj != $bi_obj){
                        array_push($newQuotationDetail, $quotationDetail[$i]);
                    }
                }//end for
            }//end if
            
            $project_description->quotationDetail = $newQuotationDetail;

            $updateArray = array(
                'project_description' => json_encode($project_description)
            );

            $val = $this->db->update('project_detail', $updateArray, array('project_id' => $project_id));
            $data['file_updated'] = $val;   
        }   

        if ($status == true) {
            $data['title'] = 'Deleted!';
            $data['type'] = 'success';
            $data['msg'] = 'Quotatiom Deleted Successfully';
        }
        return $data;        
    }//end fun


    //Particular list delete
    public function del_row_particular_details(){
        $project_id = $this->input->post('project_id');
        $bi_obj = $this->input->post('bi_obj');
        $parti_obj = $this->input->post('parti_obj');

        $status = true;
        $particularsNew = array();
        
        if($bi_obj > 0){   
            //check existing data
            $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $project_id))->result();
            if(count($result) > 0){
                $project_description1 = $result[0]->project_description;
                $project_description = json_decode($project_description1); 
                $quotationDetail = $project_description->quotationDetail;

                for($i = 0; $i < sizeof($quotationDetail); $i++){
                    if($quotationDetail[$i]->bi_obj == $bi_obj){
                        if(isset($quotationDetail[$i]->particulars)){
                            $particulars = $quotationDetail[$i]->particulars;
                        }

                        for($j = 0; $j < sizeof($particulars); $j++){
                            if($particulars[$j]->parti_obj != $parti_obj){                        
                                array_push($particularsNew, $particulars[$j]);
                            }
                        }

                        $quotationDetail[$i]->particulars = $particularsNew;

                    }//end if
                }//end for
            }
            
            $project_description->quotationDetail = $quotationDetail;

            $updateArray = array(
                'project_description' => json_encode($project_description)
            );

            $val = $this->db->update('project_detail', $updateArray, array('project_id' => $project_id));
            $data['file_updated'] = $val;   
        }   

        if ($status == true) {
            $data['title'] = 'Deleted!';
            $data['type'] = 'success';
            $data['msg'] = 'Particular Deleted Successfully';
        }
        return $data;        
    }//end fun


    //Commission list delete
    public function del_row_commission_details(){
        $project_id = $this->input->post('project_id');
        $bi_obj = $this->input->post('bi_obj');
        $comi_obj = $this->input->post('comi_obj');

        $status = true;
        $commissionsNew = array();
        
        if($bi_obj > 0){   
            //check existing data
            $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $project_id))->result();
            if(count($result) > 0){
                $project_description1 = $result[0]->project_description;
                $project_description = json_decode($project_description1); 
                $quotationDetail = $project_description->quotationDetail;

                for($i = 0; $i < sizeof($quotationDetail); $i++){
                    if($quotationDetail[$i]->bi_obj == $bi_obj){
                        if(isset($quotationDetail[$i]->commissions)){
                            $commissions = $quotationDetail[$i]->commissions;
                        }

                        for($j = 0; $j < sizeof($commissions); $j++){
                            if($commissions[$j]->comi_obj != $comi_obj){                        
                                array_push($commissionsNew, $commissions[$j]);
                            }
                        }

                        $quotationDetail[$i]->commissions = $commissionsNew;

                    }//end if
                }//end for
            }
            
            $project_description->quotationDetail = $quotationDetail;

            $updateArray = array(
                'project_description' => json_encode($project_description)
            );

            $val = $this->db->update('project_detail', $updateArray, array('project_id' => $project_id));
            $data['file_updated'] = $val;   
        }   

        if ($status == true) {
            $data['title'] = 'Deleted!';
            $data['type'] = 'success';
            $data['msg'] = 'Commission Deleted Successfully';
        }
        return $data;        
    }//end fun

    

    //Requirement gathering part
    public function form_gather_requirement(){  
        $daya = array();
        $status = true;

        $gr_project_id = $this->input->post('gr_project_id');
        $req_gather_title = $this->input->post('req_gather_title');
        $req_gather_desc = $this->input->post('req_gather_desc');
        $req_gather_by = $this->input->post('req_gather_by');
        $req_gather_by_name = $this->input->post('req_gather_by_name');
        $req_gather_date = $this->input->post('req_gather_date');
        $requirementFile = $this->input->post('requirementFile');

        $created_by = $this->session->user_id;
        $doc_obj = rand(1000, 9999);
        $files = array();

        $requirementDetail_obj = new stdClass();
        $requirementDetail_obj->doc_obj = $doc_obj;
        $requirementDetail_obj->req_gather_title = $req_gather_title;
        $requirementDetail_obj->req_gather_desc = $req_gather_desc;
        $requirementDetail_obj->req_gather_by = $req_gather_by;
        $requirementDetail_obj->req_gather_by_name = $req_gather_by_name;
        $requirementDetail_obj->req_gather_date = $req_gather_date;
        $requirementDetail_obj->files = [];

        //check existing data
        $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $gr_project_id))->result();
        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1);            
            $requirementDetail = $project_description->requirementDetail;
        }else{
            $requirementDetail = array();
        }
        
        if($gr_project_id > 0){
            if (!empty($_FILES['requirementFile']['name'][0])) {
                $return_data = array(); 

                $upload_path = './upload/proj_doc/'; 
                $file_type = 'jpg|jpeg|png|bmp|mp4|csv|pdf|docx|txt|zip|xlsx';
                $user_file_name = 'requirementFile';

                $return_data = $this->_upload_files($_FILES['requirementFile'], $upload_path, $file_type, $user_file_name);

                foreach ($return_data as $datam) {
                    if ($datam['status'] != 'error') { 
                        $file_id = rand(1000, 9999);
                        $file = new stdClass();
                        $file->doc_obj = $doc_obj;
                        $file->file_id = $file_id;
                        $file->file_name = $datam['filename'];
                        $file->file_type = $datam['meta_data']['file_type'];
                        $file->meta_data = $datam['meta_data'];
                        
                        array_push($files, $file);
                    }//end if
                }//end foreach 
            }//end file upload
            $requirementDetail_obj->files = $files;
                
            array_push($requirementDetail, $requirementDetail_obj);
            $project_description->requirementDetail = $requirementDetail;

            $updateArray = array(
                'project_description' => json_encode($project_description)
            );

            $val = $this->db->update('project_detail', $updateArray, array('project_id' => $gr_project_id));
            $data['file_updated'] = $val;
        }//end        
        
        $data['type'] = 'success';
        $data['msg'] = 'Requirement Updated Properly';
        $data['title'] = 'Requirement';
        $data['update_id'] = $gr_project_id;

        return $data;

    }//end
    
    //quotation Basic Info
    public function form_particular_basic_info_add(){  
        $daya = array();
        $status = true;
        //$old_quote_obj_id = '10000';

        $bi_obj = rand(1000, 9999);
        $parti_bi_project_id = $this->input->post('parti_bi_project_id'); 
        $bi_PartyId = $this->input->post('bi_PartyId'); 
        $bi_PartyId_name = $this->input->post('bi_PartyId_name'); 
        $bi_QuotationNo = $this->input->post('bi_QuotationNo');      
        $bi_QuotationDate = $this->input->post('bi_QuotationDate'); 
        $bi_SubPartyName = $this->input->post('bi_SubPartyName'); 
        $bi_InvoiceDate = $this->input->post('bi_InvoiceDate'); 
        $bi_NoticeNo = $this->input->post('bi_NoticeNo'); 
        $bi_PaymentMode = $this->input->post('bi_PaymentMode'); 
        $bi_PaymentModeName = $this->input->post('bi_PaymentModeName'); 
        $bi_InstrumentNumber = $this->input->post('bi_InstrumentNumber'); 
        $bi_Remarks = $this->input->post('bi_Remarks'); 
        $bi_OtherClientInfo = $this->input->post('bi_OtherClientInfo'); 
        $bi_ImportantNotes = $this->input->post('bi_ImportantNotes'); 

        $quotation_bi = new stdClass();
        $quotation_bi->bi_obj = $bi_obj;
        $quotation_bi->bi_PartyId = $bi_PartyId;
        $quotation_bi->bi_PartyId_name = $bi_PartyId_name;
        $quotation_bi->bi_QuotationNo = $bi_QuotationNo;
        $quotation_bi->bi_QuotationDate = $bi_QuotationDate;
        $quotation_bi->bi_SubPartyName = $bi_SubPartyName;
        $quotation_bi->bi_InvoiceDate = $bi_InvoiceDate;
        $quotation_bi->bi_NoticeNo = $bi_NoticeNo;
        $quotation_bi->bi_PaymentMode = $bi_PaymentMode;
        $quotation_bi->bi_PaymentModeName = $bi_PaymentModeName;
        $quotation_bi->bi_InstrumentNumber = $bi_InstrumentNumber;
        $quotation_bi->bi_Remarks = $bi_Remarks;
        $quotation_bi->bi_OtherClientInfo = $bi_OtherClientInfo;
        $quotation_bi->bi_ImportantNotes = $bi_ImportantNotes;

        //check existing data
        $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $parti_bi_project_id))->result();
        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1); 
            $quotationDetail = $project_description->quotationDetail;  
        }else{
            $quotationDetail = array();
        }

        array_push($quotationDetail, $quotation_bi);
        $project_description->quotationDetail = $quotationDetail; 
        $updateArray = array(
            'project_description' => json_encode($project_description)
        );

        $val = $this->db->update('project_detail', $updateArray, array('project_id' => $parti_bi_project_id));
        $data['db_updated'] = $val;
        
        $data['type'] = 'success';
        $data['msg'] = 'Basic Info. Updated Properly';
        $data['title'] = 'Quotation';
        $data['bi_obj'] = $bi_obj;
        $data['update_id'] = $parti_bi_project_id;
        $data['project_id'] = $parti_bi_project_id;
        return $data;

    }
    //end basic info add
    
    //Basic Info Edit start
    public function form_particular_basic_info_edit(){  
        $daya = array();
        $status = true;
        
        $bi_project_id_e = $this->input->post('bi_project_id_e'); 
        $bi_obj_e = $this->input->post('bi_obj_e'); 

        $bi_PartyId = $this->input->post('bi_PartyId_e'); 
        $bi_PartyId_name = $this->input->post('bi_PartyId_name_e'); 
        $bi_QuotationNo = $this->input->post('bi_QuotationNo_e');      
        $bi_QuotationDate = $this->input->post('bi_QuotationDate_e'); 
        $bi_SubPartyName = $this->input->post('bi_SubPartyName_e'); 
        $bi_InvoiceDate = $this->input->post('bi_InvoiceDate_e'); 
        $bi_NoticeNo = $this->input->post('bi_NoticeNo_e'); 
        $bi_PaymentMode = $this->input->post('bi_PaymentMode_e'); 
        $bi_PaymentModeName = $this->input->post('bi_PaymentModeName_e'); 
        $bi_InstrumentNumber = $this->input->post('bi_InstrumentNumber_e'); 
        $bi_Remarks = $this->input->post('bi_Remarks_e'); 
        $bi_OtherClientInfo = $this->input->post('bi_OtherClientInfo_e'); 
        $bi_ImportantNotes = $this->input->post('bi_ImportantNotes_e'); 

        //check existing data
        $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $bi_project_id_e))->result();
        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1); 
            $quotationDetail = $project_description->quotationDetail;  
        }//end if

        for($i = 0; $i < sizeof($quotationDetail); $i++){
            if($quotationDetail[$i]->bi_obj == $bi_obj_e){
                $quotationDetail[$i]->bi_PartyId = $bi_PartyId;
                $quotationDetail[$i]->bi_PartyId_name = $bi_PartyId_name;
                $quotationDetail[$i]->bi_QuotationNo = $bi_QuotationNo;
                $quotationDetail[$i]->bi_QuotationDate = $bi_QuotationDate;
                $quotationDetail[$i]->bi_SubPartyName = $bi_SubPartyName;
                $quotationDetail[$i]->bi_InvoiceDate = $bi_InvoiceDate;
                $quotationDetail[$i]->bi_NoticeNo = $bi_NoticeNo;
                $quotationDetail[$i]->bi_PaymentMode = $bi_PaymentMode;
                $quotationDetail[$i]->bi_PaymentModeName = $bi_PaymentModeName;
                $quotationDetail[$i]->bi_InstrumentNumber = $bi_InstrumentNumber;
                $quotationDetail[$i]->bi_Remarks = $bi_Remarks;
                $quotationDetail[$i]->bi_OtherClientInfo = $bi_OtherClientInfo;
                $quotationDetail[$i]->bi_ImportantNotes = $bi_ImportantNotes;
            }
        }//end for

        $project_description->quotationDetail = $quotationDetail; 

        $updateArray = array(
            'project_description' => json_encode($project_description)
        );

        $val = $this->db->update('project_detail', $updateArray, array('project_id' => $bi_project_id_e));
        $data['db_updated'] = $val;
        
        $data['type'] = 'success';
        $data['msg'] = 'Basic Info. Updated Properly';
        $data['title'] = 'Quotation';
        $data['bi_obj'] = $bi_obj_e;
        $data['update_id'] = $bi_project_id_e;
        return $data;

    }
    //end basic info edit
    
    //Particular Add portion
    public function form_particular_add(){  
        $daya = array();
        $status = true;

        $parti_project_id = $this->input->post('parti_project_id'); 
        $bi_obj = $this->input->post('bi_obj'); 
        $par_TaskType = $this->input->post('par_TaskType'); 
        $par_TaskType_name = $this->input->post('par_TaskType_name'); 
        $par_HSNCode = $this->input->post('par_HSNCode');      
        $par_Duration = $this->input->post('par_Duration'); 
        $par_StartDate = $this->input->post('par_StartDate'); 
        $par_Amount = $this->input->post('par_Amount'); 
        $par_Taxable = $this->input->post('par_Taxable'); 
        $parti_obj = rand(1000, 9999);

        
        $particular = new stdClass();
        $particular->parti_obj = $parti_obj;
        $particular->par_TaskType = $par_TaskType;
        $particular->par_TaskType_name = $par_TaskType_name;
        $particular->par_HSNCode = $par_HSNCode;
        $particular->par_Duration = $par_Duration;
        $particular->par_StartDate = $par_StartDate;
        $particular->par_Amount = $par_Amount;
        $particular->par_Taxable = $par_Taxable;

        //check existing data
        $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $parti_project_id))->result();
        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1); 
            $quotationDetail = $project_description->quotationDetail;

            for($i = 0; $i < sizeof($quotationDetail); $i++){
                if($quotationDetail[$i]->bi_obj == $bi_obj){
                    if(isset($quotationDetail[$i]->particulars)){
                        $particulars = $quotationDetail[$i]->particulars;
                    }else{
                        $quotationDetail[$i]->particulars = array();
                        $particulars = array();
                    }//end if
                    array_push($particulars, $particular);

                    $quotationDetail[$i]->particulars = $particulars;

                }//end if
            }//end for
        }
        
        $project_description->quotationDetail = $quotationDetail;

        $updateArray = array(
            'project_description' => json_encode($project_description)
        );

        $val = $this->db->update('project_detail', $updateArray, array('project_id' => $parti_project_id));
        $data['db_updated'] = $val;
        
        $data['type'] = 'success';
        $data['msg'] = 'Particulars Updated Properly';
        $data['title'] = 'Particulars';
        $data['project_id'] = $parti_project_id;
        $data['bi_obj'] = $bi_obj;
        $data['parti_obj'] = $parti_obj;
        return $data;

    }
    //end particular add
    
    //Particular Add during Edit
    public function form_particular_edit(){  
        $daya = array();
        $status = true;

        $parti_project_id = $this->input->post('parti_project_id_e'); 
        $bi_obj = $this->input->post('parti_bi_obj_e'); 
        $par_TaskType = $this->input->post('par_TaskType_e'); 
        $par_TaskType_name = $this->input->post('par_TaskType_name_e'); 
        $par_HSNCode = $this->input->post('par_HSNCode_e');      
        $par_Duration = $this->input->post('par_Duration_e'); 
        $par_StartDate = $this->input->post('par_StartDate_e'); 
        $par_Amount = $this->input->post('par_Amount_e'); 
        $par_Taxable = $this->input->post('par_Taxable_e'); 
        $parti_obj = rand(1000, 9999);

        
        $particular = new stdClass();
        $particular->parti_obj = $parti_obj;
        $particular->par_TaskType = $par_TaskType;
        $particular->par_TaskType_name = $par_TaskType_name;
        $particular->par_HSNCode = $par_HSNCode;
        $particular->par_Duration = $par_Duration;
        $particular->par_StartDate = $par_StartDate;
        $particular->par_Amount = $par_Amount;
        $particular->par_Taxable = $par_Taxable;

        //check existing data
        $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $parti_project_id))->result();
        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1); 
            $quotationDetail = $project_description->quotationDetail;

            for($i = 0; $i < sizeof($quotationDetail); $i++){
                if($quotationDetail[$i]->bi_obj == $bi_obj){
                    if(isset($quotationDetail[$i]->particulars)){
                        $particulars = $quotationDetail[$i]->particulars;
                    }else{
                        $quotationDetail[$i]->particulars = array();
                        $particulars = array();
                    }//end if
                    array_push($particulars, $particular);

                    $quotationDetail[$i]->particulars = $particulars;

                }//end if
            }//end for
        }
        
        $project_description->quotationDetail = $quotationDetail;

        $updateArray = array(
            'project_description' => json_encode($project_description)
        );

        $val = $this->db->update('project_detail', $updateArray, array('project_id' => $parti_project_id));
        $data['db_updated'] = $val;
        
        $data['type'] = 'success';
        $data['msg'] = 'Particulars Updated Properly';
        $data['title'] = 'Particulars';
        $data['project_id'] = $parti_project_id;
        $data['bi_obj'] = $bi_obj;
        $data['parti_obj'] = $parti_obj;
        return $data;

    }
    //end particular add during edit
    
    //TAX Add portion
    public function form_tax_add(){  
        $daya = array();
        $status = true;

        $project_id = $this->input->post('tax_project_id'); 
        $bi_obj = $this->input->post('tax_bi_obj'); 
        $tax_GrossAmount = $this->input->post('tax_GrossAmount'); 
        $tax_DiscountPercentage = $this->input->post('tax_DiscountPercentage'); 
        $tax_DiscountAmount = $this->input->post('tax_DiscountAmount');      
        $tax_TaxableAmount = $this->input->post('tax_TaxableAmount'); 
        $tax_SGST_Rate = $this->input->post('tax_SGST_Rate'); 
        $tax_SGST_Amount = $this->input->post('tax_SGST_Amount'); 
        $tax_CGST_Rate = $this->input->post('tax_CGST_Rate'); 
        $tax_CGST_Amount = $this->input->post('tax_CGST_Amount'); 
        $tax_IGST_Rate = $this->input->post('tax_IGST_Rate'); 
        $tax_IGST_Amount = $this->input->post('tax_IGST_Amount'); 
        $tax_NetAmount = $this->input->post('tax_NetAmount'); 
        $tax_TotalTax = $this->input->post('tax_TotalTax'); 
        $tax_Bank = $this->input->post('tax_Bank'); 
        $tax_BankName = $this->input->post('tax_BankName'); 
        $tax_ShowStamp = $this->input->post('tax_ShowStamp'); 
        $tax_ShowStampName = $this->input->post('tax_ShowStampName'); 
        

        //check existing data
        $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $project_id))->result();
        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1); 
            $quotationDetail = $project_description->quotationDetail;          
            
        }

        for($i = 0; $i < sizeof($quotationDetail); $i++){
            if($quotationDetail[$i]->bi_obj == $bi_obj){
                $quotationDetail[$i]->tax_GrossAmount = $tax_GrossAmount;
                $quotationDetail[$i]->tax_DiscountPercentage = $tax_DiscountPercentage;
                $quotationDetail[$i]->tax_DiscountAmount = $tax_DiscountAmount;
                $quotationDetail[$i]->tax_TaxableAmount = $tax_TaxableAmount;
                $quotationDetail[$i]->tax_SGST_Rate = $tax_SGST_Rate;
                $quotationDetail[$i]->tax_SGST_Amount = $tax_SGST_Amount;
                $quotationDetail[$i]->tax_CGST_Rate = $tax_CGST_Rate;
                $quotationDetail[$i]->tax_CGST_Amount = $tax_CGST_Amount;
                $quotationDetail[$i]->tax_IGST_Rate = $tax_IGST_Rate;
                $quotationDetail[$i]->tax_IGST_Amount = $tax_IGST_Amount;
                $quotationDetail[$i]->tax_NetAmount = $tax_NetAmount;
                $quotationDetail[$i]->tax_TotalTax = $tax_TotalTax;
                $quotationDetail[$i]->tax_Bank = $tax_Bank;
                $quotationDetail[$i]->tax_BankName = $tax_BankName;
                $quotationDetail[$i]->tax_ShowStamp = $tax_ShowStamp;
                $quotationDetail[$i]->tax_ShowStampName = $tax_ShowStampName;
            }
        }//end for

        $project_description->quotationDetail = $quotationDetail;    

        $updateArray = array(
            'project_description' => json_encode($project_description)
        );

        $val = $this->db->update('project_detail', $updateArray, array('project_id' => $project_id));
        $data['db_updated'] = $val;
        
        $data['type'] = 'success';
        $data['msg'] = 'TAX Updated Properly';
        $data['title'] = 'TAX Calculation';
        return $data;

    }
    //end Tax add
    
    //TAX Edit portion astrt
    public function form_tax_edit(){  
        $daya = array();
        $status = true;

        $project_id = $this->input->post('tax_project_id_e'); 
        $bi_obj = $this->input->post('tax_bi_obj_e'); 
        $tax_GrossAmount = $this->input->post('tax_GrossAmount_e'); 
        $tax_DiscountPercentage = $this->input->post('tax_DiscountPercentage_e'); 
        $tax_DiscountAmount = $this->input->post('tax_DiscountAmount_e');      
        $tax_TaxableAmount = $this->input->post('tax_TaxableAmount_e'); 
        $tax_SGST_Rate = $this->input->post('tax_SGST_Rate_e'); 
        $tax_SGST_Amount = $this->input->post('tax_SGST_Amount_e'); 
        $tax_CGST_Rate = $this->input->post('tax_CGST_Rate_e'); 
        $tax_CGST_Amount = $this->input->post('tax_CGST_Amount_e'); 
        $tax_IGST_Rate = $this->input->post('tax_IGST_Rate_e'); 
        $tax_IGST_Amount = $this->input->post('tax_IGST_Amount_e'); 
        $tax_NetAmount = $this->input->post('tax_NetAmount_e'); 
        $tax_TotalTax = $this->input->post('tax_TotalTax_e'); 
        $tax_Bank = $this->input->post('tax_Bank_e'); 
        $tax_BankName = $this->input->post('tax_BankName_e'); 
        $tax_ShowStamp = $this->input->post('tax_ShowStamp_e'); 
        $tax_ShowStampName = $this->input->post('tax_ShowStampName_e'); 
        

        //check existing data
        $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $project_id))->result();
        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1); 
            $quotationDetail = $project_description->quotationDetail;          
            
        }

        for($i = 0; $i < sizeof($quotationDetail); $i++){
            if($quotationDetail[$i]->bi_obj == $bi_obj){
                $quotationDetail[$i]->tax_GrossAmount = $tax_GrossAmount;
                $quotationDetail[$i]->tax_DiscountPercentage = $tax_DiscountPercentage;
                $quotationDetail[$i]->tax_DiscountAmount = $tax_DiscountAmount;
                $quotationDetail[$i]->tax_TaxableAmount = $tax_TaxableAmount;
                $quotationDetail[$i]->tax_SGST_Rate = $tax_SGST_Rate;
                $quotationDetail[$i]->tax_SGST_Amount = $tax_SGST_Amount;
                $quotationDetail[$i]->tax_CGST_Rate = $tax_CGST_Rate;
                $quotationDetail[$i]->tax_CGST_Amount = $tax_CGST_Amount;
                $quotationDetail[$i]->tax_IGST_Rate = $tax_IGST_Rate;
                $quotationDetail[$i]->tax_IGST_Amount = $tax_IGST_Amount;
                $quotationDetail[$i]->tax_NetAmount = $tax_NetAmount;
                $quotationDetail[$i]->tax_TotalTax = $tax_TotalTax;
                $quotationDetail[$i]->tax_Bank = $tax_Bank;
                $quotationDetail[$i]->tax_BankName = $tax_BankName;
                $quotationDetail[$i]->tax_ShowStamp = $tax_ShowStamp;
                $quotationDetail[$i]->tax_ShowStampName = $tax_ShowStampName;
            }
        }//end for

        $project_description->quotationDetail = $quotationDetail;    

        $updateArray = array(
            'project_description' => json_encode($project_description)
        );

        $val = $this->db->update('project_detail', $updateArray, array('project_id' => $project_id));
        $data['db_updated'] = $val;
        
        $data['type'] = 'success';
        $data['msg'] = 'TAX Updated Properly';
        $data['title'] = 'TAX Calculation';
        return $data;

    }
    //end Tax edit
    
    //Commission Add portion
    public function form_commission_add(){  
        $daya = array();
        $commissions = array();
        $status = true;

        $project_id = $this->input->post('commi_project_id'); 
        $bi_obj = $this->input->post('commi_bi_obj'); 
        $comi_emp_id = $this->input->post('comi_emp_id'); 
        $comi_emp_name = $this->input->post('comi_emp_name'); 
        $comi_rate_type = $this->input->post('comi_rate_type');      
        $comi_rate_type_name = $this->input->post('comi_rate_type_name'); 
        $comi_amount = $this->input->post('comi_amount'); 
        $comi_obj = rand(1000, 9999);

        
        $commission = new stdClass();
        $commission->comi_obj = $comi_obj;
        $commission->comi_emp_id = $comi_emp_id;
        $commission->comi_emp_name = $comi_emp_name;
        $commission->comi_rate_type = $comi_rate_type;
        $commission->comi_rate_type_name = $comi_rate_type_name;
        $commission->comi_amount = $comi_amount;

        //check existing data
        $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $project_id))->result();
        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1); 
            $quotationDetail = $project_description->quotationDetail;
        }

        if(sizeof($quotationDetail) > 0){
            for($i = 0; $i < sizeof($quotationDetail); $i++){
                if($quotationDetail[$i]->bi_obj == $bi_obj){
                    if(isset($quotationDetail[$i]->commissions)){
                        $commissions = $quotationDetail[$i]->commissions;
                        array_push($commissions, $commission);
                        $quotationDetail[$i]->commissions = $commissions;
                    }else{
                        array_push($commissions, $commission);
                        $quotationDetail[$i]->commissions = $commissions;
                    }
                }//end if
            }//end for
        }//end if
        
        $project_description->quotationDetail = $quotationDetail;

        $updateArray = array(
            'project_description' => json_encode($project_description)
        );

        $val = $this->db->update('project_detail', $updateArray, array('project_id' => $project_id));
        $data['db_updated'] = $val;
        
        $data['type'] = 'success';
        $data['msg'] = 'Commission Updated Properly';
        $data['title'] = 'Commission';
        $data['project_id'] = $project_id;
        $data['bi_obj'] = $bi_obj;
        return $data;

    }
    //end commission add
    
    //Commission Edit portion
    public function form_commission_edit(){  
        $daya = array();
        $commissions = array();
        $status = true;

        $project_id = $this->input->post('commi_project_id_e'); 
        $bi_obj = $this->input->post('commi_bi_obj_e'); 
        $comi_emp_id = $this->input->post('comi_emp_id_e'); 
        $comi_emp_name = $this->input->post('comi_emp_name_e'); 
        $comi_rate_type = $this->input->post('comi_rate_type_e');      
        $comi_rate_type_name = $this->input->post('comi_rate_type_name_e'); 
        $comi_amount = $this->input->post('comi_amount_e'); 
        $comi_obj = rand(1000, 9999);

        
        $commission = new stdClass();
        $commission->comi_obj = $comi_obj;
        $commission->comi_emp_id = $comi_emp_id;
        $commission->comi_emp_name = $comi_emp_name;
        $commission->comi_rate_type = $comi_rate_type;
        $commission->comi_rate_type_name = $comi_rate_type_name;
        $commission->comi_amount = $comi_amount;

        //check existing data
        $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $project_id))->result();
        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1); 
            $quotationDetail = $project_description->quotationDetail;
        }

        if(sizeof($quotationDetail) > 0){
            for($i = 0; $i < sizeof($quotationDetail); $i++){
                if($quotationDetail[$i]->bi_obj == $bi_obj){
                    if(isset($quotationDetail[$i]->commissions)){
                        $commissions = $quotationDetail[$i]->commissions;
                        array_push($commissions, $commission);
                        $quotationDetail[$i]->commissions = $commissions;
                    }else{
                        array_push($commissions, $commission);
                        $quotationDetail[$i]->commissions = $commissions;
                    }
                }//end if
            }//end for
        }//end if
        
        $project_description->quotationDetail = $quotationDetail;

        $updateArray = array(
            'project_description' => json_encode($project_description)
        );

        $val = $this->db->update('project_detail', $updateArray, array('project_id' => $project_id));
        $data['db_updated'] = $val;
        
        $data['type'] = 'success';
        $data['msg'] = 'Commission Updated Properly';
        $data['title'] = 'Commission';
        $data['project_id'] = $project_id;
        $data['bi_obj'] = $bi_obj;
        return $data;

    }
    //end commission edit
    

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
        $filesCount = count($_FILES[$user_file_name]['name']); 
        for($i = 0; $i < $filesCount; $i++){ 
            $_FILES['file']['name']       = $_FILES[$user_file_name]['name'][$i];
            $_FILES['file']['type']       = $_FILES[$user_file_name]['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES[$user_file_name]['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES[$user_file_name]['error'][$i];
            $_FILES['file']['size']       = $_FILES[$user_file_name]['size'][$i];

            // $config['file_name'] = date('His') .'_'. $image;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {                
                $imageData = $this->upload->data();
                //echo json_encode($imageData);
                $new_array[] = array(
                    'filename' => $imageData['file_name'], 
                    'meta_data' => $imageData, 
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
        }//end for

        return $final_array;
    }//file upload end

    //Contact detail edit tata fetch
    public function fetch_contact_details_on_pk(){        
        $project_id = $this->input->post('project_id');      
        $contact_obj = $this->input->post('contact_obj');

        $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $project_id))->result();
        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1); 
            $contactDetail = $project_description->contactDetail;

            $returnObj = new stdClass();
            for($i = 0; $i < sizeof($contactDetail); $i++){
                if($contactDetail[$i]->contact_obj == $contact_obj){
                    $returnObj = $contactDetail[$i];
                    break;
                }//end if
            }//end for
        }

        return $returnObj;
    }

    //Quotation detail edit tata fetch
    public function fetch_quotation_details_on_pk(){        
        $project_id = $this->input->post('project_id');      
        $bi_obj = $this->input->post('bi_obj');

        $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $project_id))->result();
        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1); 
            $quotationDetail = $project_description->quotationDetail;

            $returnObj = new stdClass();
            for($i = 0; $i < sizeof($quotationDetail); $i++){
                if($quotationDetail[$i]->bi_obj == $bi_obj){
                    $returnObj = $quotationDetail[$i];
                    break;
                }//end if
            }//end for
        }

        return $returnObj;
    }


    //Tax Calculation
    public function calculate_tax(){
        $project_id = $this->input->post('project_id');
        $bi_obj = $this->input->post('bi_obj');
        $account_gst_no = '';

        $status = true;
        $commissionsNew = array();

        $tax_GrossAmount = 0;
        $tax_DiscountPercentage = 0;
        $tax_DiscountAmount = 0;
        $tax_TaxableAmount = 0;
        $tax_SGST_Rate = 0;
        $tax_SGST_Amount = 0;
        $tax_CGST_Rate = 0;
        $tax_CGST_Amount = 0;
        $tax_IGST_Rate = 0;
        $tax_IGST_Amount = 0;
        $tax_NetAmount = 0;
        $tax_TotalTax = 0;
        
        if($bi_obj > 0){   
            //check existing data
            $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $project_id))->result();
            if(count($result) > 0){
                $project_description1 = $result[0]->project_description;
                $project_description = json_decode($project_description1); 
                $quotationDetail = $project_description->quotationDetail;

                for($i = 0; $i < sizeof($quotationDetail); $i++){
                    if($quotationDetail[$i]->bi_obj == $bi_obj){
                        if(isset($quotationDetail[$i]->particulars)){
                            $particulars = $quotationDetail[$i]->particulars;
                        }

                    }//end if
                }//end for

                if(isset($project_description->client->account_gst_no)){
                    $account_gst_no = $project_description->client->account_gst_no;
                    $first_two = substr($account_gst_no, 0, 2);

                    if($first_two == "19"){
                        $tax_CGST_Rate = 9;
                        $tax_IGST_Rate = 0;
                        $tax_SGST_Rate = 9;
                    }else{
                        $tax_CGST_Rate = 0;
                        $tax_IGST_Rate = 18;
                        $tax_SGST_Rate = 0;
                    }//end
                }

                for($j = 0; $j < sizeof($particulars); $j++){                      
                    $tax_GrossAmount = $tax_GrossAmount + $particulars[$j]->par_Amount; 
                    if($particulars[$j]->par_Taxable == "1"){  
                        $tempTotalTax = 0;    
                        $tempAmount = 0;

                        $tax_TaxableAmount = $tax_TaxableAmount + $particulars[$j]->par_Amount;
                        $tempAmount = $particulars[$j]->par_Amount;

                        $tempCGST_Amount = $tempAmount * $tax_CGST_Rate * 0.01;
                        $tempIGST_Amount = $tempAmount * $tax_IGST_Rate * 0.01;
                        $tempSGST_Amount = $tempAmount * $tax_SGST_Rate * 0.01;

                        $tax_CGST_Amount = $tax_CGST_Amount + $tempCGST_Amount;
                        $tax_IGST_Amount = $tax_IGST_Amount + $tempIGST_Amount;
                        $tax_SGST_Amount = $tax_SGST_Amount + $tempSGST_Amount;
                    }//end if
                }//end for
                
                $tax_TotalTax = $tax_CGST_Amount + $tax_IGST_Amount + $tax_SGST_Amount;
                
                $tax_NetAmount = $tax_GrossAmount + $tax_TotalTax;

                $tax_obj = new stdClass();
                $tax_obj->tax_GrossAmount = $tax_GrossAmount;
                $tax_obj->tax_DiscountPercentage = $tax_DiscountPercentage;
                $tax_obj->tax_DiscountAmount = $tax_DiscountAmount;
                $tax_obj->tax_TaxableAmount = $tax_TaxableAmount;
                $tax_obj->tax_SGST_Rate = $tax_SGST_Rate;
                $tax_obj->tax_SGST_Amount = $tax_SGST_Amount;
                $tax_obj->tax_CGST_Rate = $tax_CGST_Rate;
                $tax_obj->tax_CGST_Amount = $tax_CGST_Amount;
                $tax_obj->tax_IGST_Rate = $tax_IGST_Rate;
                $tax_obj->tax_IGST_Amount = $tax_IGST_Amount;
                $tax_obj->tax_NetAmount = $tax_NetAmount;
                $tax_obj->tax_TotalTax = $tax_TotalTax;


            }//end if
             
        }//edn if   

        if ($status == true) {
            $data['title'] = 'Calculated!';
            $data['type'] = 'success';
            $data['msg'] = 'Tax Calculated';
            $data['tax_obj'] = $tax_obj;
        }
        return $data;        
    }//end fun
     

    //Contact Details
    public function ajax_contact_details_table_data() {     
        $project_id = $this->input->post('project_id');
        $data = array();
        $contactDetail = array();

        $result = $this->db->get_where('project_detail', array('project_id' => $project_id))->result();
        //print_r($result);

        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1);
            $contactDetail = $project_description->contactDetail;
        }

        if(sizeof($contactDetail) > 0){
            foreach($contactDetail as $key => $value){
                $nestedData['ContactPersonName'] = $value->cont_person_name;
                $nestedData['OrganizationName'] = $value->org_name;
                $nestedData['Email'] = $value->contact_email;
                $nestedData['Phone1st'] = $value->contact_first_ph;
                $nestedData['Phone2nd'] = $value->contact_second_ph;
                $nestedData['Address'] = $value->contact_persn_address;
                $nestedData['action'] = '<a href="javascript:void(0)" data-project_id="'.$project_id.'" data-contact_obj="'.$value->contact_obj.'" class="btn btn-info edit_contact_obj"><i class="fa fa-pencil"></i> Edit</a>
                <a href="javascript:void(0)" data-project_id="'.$project_id.'" data-contact_obj="'.$value->contact_obj.'" class="btn btn-danger delete"><i class="fa fa-times"></i> Delete</a>';

                array_push($data, $nestedData);
            }//end foreach
        }//end if

        $json_data = array(
            "recordsTotal"    => sizeof($data),
            "recordsFiltered" => sizeof($data),
            "data"            => $data
        );
        
        return $json_data;
    }   

    //Requirement Gathering Part
    public function ajax_requirementgather_details_table_data() {     
        $project_id = $this->input->post('project_id');
        $data = array();
        $requirementDetail = array();

        $result = $this->db->get_where('project_detail', array('project_id' => $project_id))->result();
        //print_r($result);

        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1);
            $requirementDetail = $project_description->requirementDetail;
        }

        if(sizeof($requirementDetail) > 0){
            foreach($requirementDetail as $key => $value){
                $nestedData['Title'] = $value->req_gather_title;
                $nestedData['Description'] = $value->req_gather_desc;
                $nestedData['Employee'] = $value->req_gather_by_name;
                $nestedData['Date'] = date("d-m-Y", strtotime($value->req_gather_date));
                $nestedData['Attachment'] = '';
                $nestedData['action'] = '<a href="javascript:void(0)" data-doc_obj="'.$value->doc_obj.'" class="btn btn-info edit_doc_obj"><i class="fa fa-pencil "></i> Edit</a>
                <a data-doc_obj="'.$value->doc_obj.'" href="javascript:void(0)" class="btn btn-danger delete"><i class="fa fa-times"></i> Delete</a>';

                array_push($data, $nestedData);
            }//end foreach
        }//end if

        $json_data = array(
            "recordsTotal"    => sizeof($data),
            "recordsFiltered" => sizeof($data),
            "data"            => $data
        );
        
        return $json_data;
    }  
    

    //Requirement edit tata fetch
    public function fetch_requirement_details_on_pk(){        
        $project_id = $this->input->post('project_id');      
        $doc_obj = $this->input->post('doc_obj');

        $result = $this->db->select('project_description')->get_where('project_detail', array('project_id' => $project_id))->result();
        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1); 
            $requirementDetail = $project_description->requirementDetail;

            $returnObj = new stdClass();
            for($i = 0; $i < sizeof($requirementDetail); $i++){
                if($requirementDetail[$i]->doc_obj == $doc_obj){
                    $returnObj = $requirementDetail[$i];
                    break;
                }//end if
            }//end for
        }

        return $returnObj;
    }


    //Quotation part
    public function ajax_quotation_details_table_data() {       
        $project_id = $this->input->post('project_id');
        $data = array();
        $quotationDetail = array();

        $result = $this->db->get_where('project_detail', array('project_id' => $project_id))->result();
        //print_r($result);

        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1);
            $quotationDetail = $project_description->quotationDetail;
        }

        if(sizeof($quotationDetail) > 0){
            $slno = 1;
            foreach($quotationDetail as $key => $value){
                $PartyName = $value->bi_PartyId_name;
                $QuotationNo = $value->bi_QuotationNo;
                $QuotationDate = $value->bi_QuotationDate;

                $nestedData['SlNo'] = $slno;
                $nestedData['PartyName'] = $PartyName;
                $nestedData['QuotationNo'] = $QuotationNo;
                $nestedData['QuotationDate'] = date("d-m-Y", strtotime($QuotationDate));
                $nestedData['action'] = '<a href="'. base_url('admin/print-quotation/'.$project_id.'/'.$value->bi_obj).'" target="_blank" data-project_id="'.$project_id.'" class="btn bg-yellow print_quotation"><i class="fa fa-eye"></i> View</a>
                <a href="javascript:void(0)" data-project_id="'.$project_id.'" data-bi_obj="'.$value->bi_obj.'" class="btn btn-info edit_bi_obj"><i class="fa fa-pencil"></i> Edit</a>
                <a href="javascript:void(0)" data-project_id="'.$project_id.'" data-bi_obj="'.$value->bi_obj.'" class="btn btn-danger delete"><i class="fa fa-times"></i> Delete</a>';

                array_push($data, $nestedData);
                $slno++;
            }//end foreach
        }//end if

        $json_data = array(
            "recordsTotal"    => sizeof($data),
            "recordsFiltered" => sizeof($data),
            "data"            => $data
        );       
        
        return $json_data;
    } 

    //Particular table data
    public function ajax_particular_details_table_data() {       
        $project_id = $this->input->post('project_id');      
        $bi_obj = $this->input->post('bi_obj');
        $data = array();
        $particulars = array();
        $quotationDetail = array();

        $result = $this->db->get_where('project_detail', array('project_id' => $project_id))->result();
        //print_r($result);

        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1);
            $quotationDetail = $project_description->quotationDetail;
        }

        if(sizeof($quotationDetail) > 0){
            $bi_obj_new = 0;
            foreach($quotationDetail as $key => $value){
                $bi_obj_new = $value->bi_obj;

                if($bi_obj == $bi_obj_new){
                    if(isset($value->particulars)){
                        $particulars = $value->particulars;
                    }
                    break;
                }//end if
            }//end foreach
        }//end if

        if(sizeof($particulars) > 0){
            $counter = 1;
            foreach($particulars as $key => $value){
                $parti_obj = $value->parti_obj;
                $par_TaskType = $value->par_TaskType;
                $par_TaskType_name = $value->par_TaskType_name;
                $par_HSNCode = $value->par_HSNCode;
                $par_Duration = $value->par_Duration;
                $par_StartDate = $value->par_StartDate;
                $par_Amount = $value->par_Amount;
                $par_Taxable = $value->par_Taxable;

                $nestedData['slNo'] = $counter;
                $nestedData['taskType'] = $par_TaskType_name;
                $nestedData['hsnCode'] = $par_HSNCode;
                $nestedData['Duration'] = $par_Duration;
                $nestedData['startDate'] = $par_StartDate;
                $nestedData['amount'] = $par_Amount;
                $nestedData['taxable'] = ($par_Taxable == 1) ? 'Yes' : 'No';
                $nestedData['action'] = '<a href="javascript:void(0)" data-project_id="'.$project_id.'" data-bi_obj="'.$bi_obj.'" data-parti_obj="'.$parti_obj.'" class="btn btn-danger delete"><i class="fa fa-times"></i> Delete</a>';

                $counter++;
                array_push($data, $nestedData);
            }//end foreach
        }//end if



        $json_data = array(
            "recordsTotal"    => sizeof($data),
            "recordsFiltered" => sizeof($data),
            "data"            => $data
        );       
        
        return $json_data;
    } 

    //commission table data
    public function ajax_commission_details_table_data() {       
        $project_id = $this->input->post('project_id');      
        $bi_obj = $this->input->post('bi_obj');
        $data = array();
        $commissions = array();
        $quotationDetail = array();

        $result = $this->db->get_where('project_detail', array('project_id' => $project_id))->result();
        //print_r($result);

        if(count($result) > 0){
            $project_description1 = $result[0]->project_description;
            $project_description = json_decode($project_description1);
            $quotationDetail = $project_description->quotationDetail;
        }

        if(sizeof($quotationDetail) > 0){
            $bi_obj_new = 0;
            foreach($quotationDetail as $key => $value){
                $bi_obj_new = $value->bi_obj;

                if($bi_obj == $bi_obj_new){
                    if(isset($value->commissions)){
                        $commissions = $value->commissions;
                    }
                    break;
                }//end if
            }//end foreach
        }//end if

        if(sizeof($commissions) > 0){
            $counter = 1;
            foreach($commissions as $key => $value){
                $comi_obj = $value->comi_obj;
                $comi_emp_id = $value->comi_emp_id;
                $comi_emp_name = $value->comi_emp_name;
                $comi_rate_type = $value->comi_rate_type;
                $comi_rate_type_name = $value->comi_rate_type_name;
                $comi_amount = $value->comi_amount;

                $nestedData['slNo'] = $counter;
                $nestedData['Employee'] = $comi_emp_name;
                $nestedData['RateType'] = $comi_rate_type_name;
                $nestedData['Amount'] = $comi_amount;
                $nestedData['action'] = '<a href="javascript:void(0)" data-project_id="'.$project_id.'"  data-bi_obj="'.$bi_obj.'" data-comi_obj="'.$comi_obj.'" class="btn btn-danger delete"><i class="fa fa-times"></i> Delete</a>';

                $counter++;
                array_push($data, $nestedData);
            }//end foreach
        }//end if



        $json_data = array(
            "recordsTotal"    => sizeof($data),
            "recordsFiltered" => sizeof($data),
            "data"            => $data
        );       
        
        return $json_data;
    } 
    //////////////////////////////////////// final above function /////////////////////////////////////////


}
