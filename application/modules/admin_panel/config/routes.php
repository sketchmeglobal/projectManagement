<?php

	$route['admin/dashboard'] = 'admin_panel/Dashboard/dashboard';
	$route['404'] = 'admin_panel/Dashboard/error_404';
	$route['js_disabled'] = 'admin_panel/Dashboard/js_disabled';
	
	$route['admin/profile'] = 'admin_panel/Profile/profile';
	$route['admin/form_basic_info'] = 'admin_panel/Profile/form_basic_info';
	$route['admin/form_change_pass'] = 'admin_panel/Profile/form_change_pass';
	$route['admin/form_change_email'] = 'admin_panel/Profile/form_change_email';
	$route['admin/change_email/(:any)'] = 'admin_panel/Profile/change_email/$1';
	$route['admin/ajax_username_check'] = 'admin_panel/Profile/ajax_username_check';
	$route['admin/form_change_username'] = 'admin_panel/Profile/form_change_username';
	
	//PAYMENT MODE MASTER
	//list
	$route['admin/payment-mode'] = 'admin_panel/Paymentmode/payment_mode';
	$route['admin/ajax-payment-mode-data'] = 'admin_panel/Paymentmode/ajax_payment_mode_data';	

	//add employee
	$route['admin/add-payment-mode'] = 'admin_panel/Paymentmode/add_payment_mode';	
	$route['admin/form-add-payment-mode'] = 'admin_panel/Paymentmode/form_add_payment_mode';		

	//edit
	$route['admin/edit-payment-mode/(:num)'] = 'admin_panel/Paymentmode/edit_payment_mode/$1';	
	$route['admin/form-edit-payment-mode'] = 'admin_panel/Paymentmode/form_edit_payment_mode';	
	
	//delete
	$route['admin/ajax-delete-payment-mode'] = 'admin_panel/Paymentmode/ajax_delete_payment_mode';
	
	//EMPLOYEE MASTER
	//list
	$route['admin/employee-master'] = 'admin_panel/Employeemaster/employeemaster_managemnt';
	$route['admin/ajax-employee-master-table-data'] = 'admin_panel/Employeemaster/ajax_employee_master_table_data';

	//add employee
	$route['admin/add-employee-master'] = 'admin_panel/Employeemaster/add_employee_master';	
	$route['admin/form-add-employee-master'] = 'admin_panel/Employeemaster/form_add_employee_master';		

	//edit
	$route['admin/edit-employee-master/(:num)'] = 'admin_panel/Employeemaster/edit_employee_master/$1';	
 	$route['admin/form-edit-employee-master'] = 'admin_panel/Employeemaster/form_edit_employee_master';
	
	//delete
	$route['admin/ajax-delete-employee-master'] = 'admin_panel/Employeemaster/ajax_delete_employee_master';
	
	//TASK TYPE MASTER
	//list
	$route['admin/task-type'] = 'admin_panel/Tasktype/task_type';
	$route['admin/ajax-task-table-data'] = 'admin_panel/Tasktype/ajax_task_table_data';

	//add
	$route['admin/add-task-type'] = 'admin_panel/Tasktype/add_task_type';	
	$route['admin/form-add-task-type'] = 'admin_panel/Tasktype/form_add_task_type';			

	//edit
	$route['admin/edit-task-type/(:num)'] = 'admin_panel/Tasktype/edit_task_type/$1';	
	$route['admin/form-edit-task-type'] = 'admin_panel/Tasktype/form_edit_task_type';
	
	//delete
	$route['admin/ajax-delete-task-type'] = 'admin_panel/Tasktype/ajax_delete_task_type';

	
	//BANK ACCOUNT MASTER
	//list
	$route['admin/bank-account'] = 'admin_panel/Bankaccount/bank_account';	
	$route['admin/ajax-bank-table-data'] = 'admin_panel/Bankaccount/ajax_bank_table_data';

	//add
	$route['admin/add-bank-account'] = 'admin_panel/Bankaccount/add_bank_account';	
	$route['admin/form-add-bank-account'] = 'admin_panel/Bankaccount/form_add_bank_account';		

	//edit
	$route['admin/edit-bank-account/(:num)'] = 'admin_panel/Bankaccount/edit_bank_account/$1';	
 	$route['admin/form-edit-bank-account'] = 'admin_panel/Bankaccount/form_edit_bank_account';	
	
	 //delete
	 $route['admin/ajax-delete-bank-account'] = 'admin_panel/Bankaccount/ajax_delete_bank_account';
	
	//EMPLOYEE MANAGEMENT
	//list
	$route['admin/employee-management'] = 'admin_panel/Employee/employee_managemnt';
	$route['admin/ajax-employee-table-data'] = 'admin_panel/Employee/ajax_employee_table_data';

	//add employee
	$route['admin/add-employee'] = 'admin_panel/Employee/add_employee';	
	$route['admin/form-add-employee'] = 'admin_panel/Employee/form_add_employee';		

	//edit
	$route['admin/edit-employee/(:num)'] = 'admin_panel/Employee/edit_employee/$1';	
 	$route['admin/form-edit-employee'] = 'admin_panel/Employee/form_edit_employee';
	
	//delete
	$route['admin/ajax-delete-employee'] = 'admin_panel/Employee/ajax_delete_employee';

	//EMPLOYEE SALARY
	//list
	$route['admin/employee-salary'] = 'admin_panel/Employeesalary/employee_salary';
	$route['admin/ajax-employee-salary-table-data'] = 'admin_panel/Employeesalary/ajax_employee_salary_table_data';

	//add salary
	$route['admin/add-salary'] = 'admin_panel/Employeesalary/add_salary';	
	$route['admin/form-add-salary'] = 'admin_panel/Employeesalary/form_add_salary';			

	//edit
	$route['admin/edit-salary/(:num)'] = 'admin_panel/Employeesalary/edit_salary/$1';	
 	$route['admin/form-edit-salary'] = 'admin_panel/Employeesalary/form_edit_salary';
	
	//delete
	$route['admin/ajax-delete-salary'] = 'admin_panel/Employeesalary/ajax_delete_salary';	
	 
	//For Document manager types user START
	$route['admin/my-documents/(:num)'] = 'admin_panel/Documents/my_documents/$1';
	$route['admin/add-document/(:num)'] = 'admin_panel/Documents/add_document/$1';	
	$route['admin/ajax-unique-folderName'] = 'admin_panel/Documents/ajax_unique_foldername';	
	$route['admin/form-add-document'] = 'admin_panel/Documents/form_add_document';
	$route['admin/ajax-delete-document'] = 'admin_panel/Documents/ajax_delete_document';
	$route['admin/ajax-share-document'] = 'admin_panel/Documents/ajax_share_document';
	$route['admin/ajax-edit-document'] = 'admin_panel/Documents/ajax_edit_document';	
	//Share Document
	$route['admin/shared-with-me/(:num)'] = 'admin_panel/SharedWithMe/shared_with_me/$1';
	//For Document manager types user END

	//Project part start	
	$route['admin/projects'] = 'admin_panel/Projects/projects';
	$route['admin/ajax-project-table-data'] = 'admin_panel/Projects/ajax_project_table_data';
	$route['admin/project-detail/(:num)'] = 'admin_panel/Projects/project_detail/$1';
	$route['admin/ajax-project-details-table-data'] = 'admin_panel/Projects/ajax_project_details_table_data';
	$route['admin/ajax-contact-details-table-data'] = 'admin_panel/Projects/ajax_contact_details_table_data';
	$route['admin/ajax-client-details-table-data'] = 'admin_panel/Projects/ajax_client_details_table_data';
	$route['admin/ajax-logininfo-details-table-data'] = 'admin_panel/Projects/ajax_logininfo_details_table_data';
	$route['admin/ajax-invoice-details-table-data'] = 'admin_panel/Projects/ajax_invoice_details_table_data';
	$route['admin/ajax-requirementgather-details-table-data'] = 'admin_panel/Projects/ajax_requirementgather_details_table_data';
	$route['admin/ajax-quotation-details-table-data'] = 'admin_panel/Projects/ajax_quotation_details_table_data';
	$route['admin/ajax-particular-details-table-data'] = 'admin_panel/Projects/ajax_particular_details_table_data';
	$route['admin/ajax-inv-parti-details-table-data'] = 'admin_panel/Projects/ajax_inv_particular_details_table_data';
	$route['admin/ajax-inv-payment-details-table-data'] = 'admin_panel/Projects/ajax_inv_payment_details_table_data';
	$route['admin/ajax-commission-details-table-data'] = 'admin_panel/Projects/ajax_commission_details_table_data';
	$route['admin/ajax-update-project-document'] = 'admin_panel/Projects/ajax_update_project_document';	
	$route['admin/form-add-contact'] = 'admin_panel/Projects/form_add_contact';
	$route['admin/form-add-login-info'] = 'admin_panel/Projects/form_add_login_info';
	$route['admin/form-add-invoice-info'] = 'admin_panel/Projects/form_add_invoice_info';
	$route['admin/form-add-invoice-particular-info'] = 'admin_panel/Projects/form_add_invoice_particular_info';
	$route['admin/form-invoice-receive-payment'] = 'admin_panel/Projects/form_invoice_receive_payment';
	$route['admin/form-add-client-details'] = 'admin_panel/Projects/form_add_client_details';
	$route['admin/form-gather-requirement'] = 'admin_panel/Projects/form_gather_requirement';
	$route['admin/form-parti-basic-info-add'] = 'admin_panel/Projects/form_particular_basic_info_add';
	$route['admin/form-parti-basic-info-edit'] = 'admin_panel/Projects/form_particular_basic_info_edit';
	$route['admin/form-particular-add'] = 'admin_panel/Projects/form_particular_add';
	$route['admin/form-particular-edit'] = 'admin_panel/Projects/form_particular_edit';
	$route['admin/form-tax-add'] = 'admin_panel/Projects/form_tax_add';
	$route['admin/form-invoice-tax-add'] = 'admin_panel/Projects/form_invoice_tax_add';
	$route['admin/form-tax-edit'] = 'admin_panel/Projects/form_tax_edit';
	$route['admin/form-commission-add'] = 'admin_panel/Projects/form_commission_add';
	$route['admin/form-commission-edit'] = 'admin_panel/Projects/form_commission_edit';
	$route['admin/fetch-client-details-on-pk'] = 'admin_panel/Projects/fetch_client_details_on_pk';
	$route['admin/fetch-contact-details-on-pk'] = 'admin_panel/Projects/fetch_contact_details_on_pk';
	$route['admin/form-edit-contact'] = 'admin_panel/Projects/form_edit_contact';
	$route['admin/form-edit-client-details'] = 'admin_panel/Projects/form_edit_client';
	$route['admin/del-row-client-details'] = 'admin_panel/Projects/del_row_client_details';
	$route['admin/del-row-contact-details'] = 'admin_panel/Projects/del_row_contact_details';
	$route['admin/del-row-logininfo-details'] = 'admin_panel/Projects/del_row_logininfo_details';
	$route['admin/fetch-requirement-details-on-pk'] = 'admin_panel/Projects/fetch_requirement_details_on_pk';
	$route['admin/form-edit-gather-requirement'] = 'admin_panel/Projects/requirement_gather_edit_form';
	$route['admin/del-row-requirement-details'] = 'admin_panel/Projects/del_row_requirement_details';
	$route['admin/del-row-project-details'] = 'admin_panel/Projects/del_row_project_details';
	$route['admin/del-row-quotation-details'] = 'admin_panel/Projects/del_row_quotation_details';
	$route['admin/del-row-invoice-details'] = 'admin_panel/Projects/del_row_invoice_details';
	$route['admin/del-row-particular-details'] = 'admin_panel/Projects/del_row_particular_details';
	$route['admin/del-row-commission-details'] = 'admin_panel/Projects/del_row_commission_details';
	$route['admin/del-row-invoicepayment-details'] = 'admin_panel/Projects/del_row_invoicepayment_details';
	$route['admin/fetch-quotation-details-on-pk'] = 'admin_panel/Projects/fetch_quotation_details_on_pk';
	$route['admin/fetch-invoice-details-on-pk'] = 'admin_panel/Projects/fetch_invoice_details_on_pk';
	$route['admin/calculate-tax'] = 'admin_panel/Projects/calculate_tax';
	$route['admin/calculate-invoice-tax'] = 'admin_panel/Projects/calculate_invoice_tax';
	//print
	$route['admin/print-quotation/(:num)/(:num)'] = 'admin_panel/Projects/print_quotation_details/$1/$2';
	$route['admin/print-invoice/(:num)/(:num)'] = 'admin_panel/Projects/print_invoice_details/$1/$2';
	$route['admin/print-salaryslip/(:num)'] = 'admin_panel/Employeesalary/print_salaryslip/$1';
	//'Admin_dashboard/Admin_print/cbill';
	


	