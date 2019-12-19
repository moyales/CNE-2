<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    /*
    public function __construct() {
        parent::__construct();
    }    
    */

    public function index()
    {

        $this->load->model('main_model');

        // For Welcome, First Name
        $data['firstName'] = $this->main_model->getFirstName();

        // For History
        $data['EIEIO'] = $this->main_model->getExpenseHistoryData();
        $data['INCOME'] = $this->main_model->getIncomeHistoryData();

        // For BAN Balance
        $data['income'] = $this->main_model->getIncomeData(); $data['income'] + 0;
        $data['expenses'] = $this->main_model->getExpenseData(); $data['expenses'] + 0;
        $data['balance'] = $data['income'] - $data['expenses'];
        
        // For BAN Budget Variance
        $data['forecast'] = $this->main_model->getForecastData();
        $data['variance'] = (1 - (($data['forecast'] - $data['expenses']) / $data['forecast'])) * 100;

        // For BAN Expense-to-Income Ratio
        $data['e2i'] = $data['expenses'] / $data['income'];

        $data['title'] = "Main";
        $this->load->view('templates/main_header', $data);     
        $this->load->view('templates/main_income', $data);    
        $this->load->view('templates/main_footer', $data);   
    }

    public function test123 () {
        $data['title'] = "Main";
        $this->load->view('includes/header', $data);     
        $this->load->view('pages/body_nav', $data);    
        $this->load->view('includes/footer', $data);           
    }

    public function view($page = 'index')
    {
        
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $sess_id = $this->session->userdata('username');

        if(empty($sess_id))
        {
            redirect('login');
        }

        $this->load->model('main_model');

        // For Welcome, First Name
        $data['firstName'] = $this->main_model->getFirstName();

        // For History
        $data['EIEIO'] = $this->main_model->getExpenseHistoryData();
        $data['INCOME'] = $this->main_model->getIncomeHistoryData();

        // For BAN Balance
        $data['income'] = $this->main_model->getIncomeData(); $data['income'] + 0;
        $data['expenses'] = $this->main_model->getExpenseData(); $data['expenses'] + 0;
        $data['balance'] = $data['income'] - $data['expenses'];
        
        // For BAN Budget Variance
        $data['forecast'] = $this->main_model->getForecastData();
        $data['variance'] = (1 - (($data['forecast'] - $data['expenses']) / $data['forecast'])) * 100;

        // For BAN Expense-to-Income Ratio
        $data['e2i'] = $data['expenses'] / $data['income'];

        switch ($page)
        {
            case "main_income": $data['title'] = "Income"; break;
            case "main_expenses": $data['title'] = "Expenses"; break;
            case "main_goals": $data['title'] = "Goals"; break;
            case "main_forecast": $data['title'] = "Forecast"; break;
            case "main_summary": $data['title'] = "Summary"; break;
            case "main_history": $data['title'] = "History"; break;
            case "main_goals": $data['title'] = "Goals"; break;
            case "main_form_error": $data['title'] = "Form Error"; break;
            case "main_form_success": $data['title'] = "Form Success"; break;
            default: $data['title'] = ucfirst($page); break; // Capitalize the first letter
        }        

        $this->load->view('templates/main_header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/main_footer', $data);
    }

    public function validate_credentials() {

        $this->load->model('membership_model');
        $query = $this->membership_model->validate();  // Perform a validate routine in the model

        if ($query) {  // If there is a result
            $data = array (
                'username' => $this->input->post('username'),
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            print json_encode(array("loginStatus"=>"success"));
            //redirect('main/main_summary/', $data);
        }
        else {  // If incorrect entry
            //redirect('login_error');
            print json_encode(array("loginStatus"=>"error"));
        }
    }

    function manage_income()
	{
        
        $this->load->library('form_validation');
		
        // field name, error message, validation rules
		$this->form_validation->set_rules('incomeType', 'Income Type', 'required');
		$this->form_validation->set_rules('incomeSource', 'Income Source', 'required');
		$this->form_validation->set_rules('incomeFrequency', 'Income Frequency', 'required');
		$this->form_validation->set_rules('incomeStartingDate', 'Starting Date', 'required');
		$this->form_validation->set_rules('incomeAmount', 'Amount', 'required');
		
		
		if($this->form_validation->run() == FALSE)
		{
			redirect('main/main_form_error');
		}
		
		else
		{			
			$this->load->model('main_model');
			
			if($query = $this->main_model->create_income())
			{
				redirect('main/main_form_success');
			}
			else
			{
				redirect('main/main_form_error');			
			}
        }
    }

    function manage_expenses()
	{
        
		$this->load->library('form_validation');
		
        // field name, error message, validation rules
		$this->form_validation->set_rules('expenseType', 'Expense Type', 'required');
		$this->form_validation->set_rules('expenseCategory', 'Expense Category', 'required');
		$this->form_validation->set_rules('expenseFrequency', 'Expense Frequency', 'required');
        $this->form_validation->set_rules('expenseAmount', 'Amount', 'required');
        $this->form_validation->set_rules('expenseTitle', 'Title', 'required');
		
		
		if($this->form_validation->run() == FALSE)
		{
			redirect('main/main_form_error');
		}
		
		else
		{	
			$this->load->model('main_model');
			
			if($query = $this->main_model->create_expenses())
			{
                //redirect('main/main_form_success');
                print json_encode(array("status"=>"success"));
			}
			else
			{
                //redirect('main/main_form_error');			
                print json_encode(array("status"=>"error"));
			}
        }
    }

    function manage_goals()
	{
        
		$this->load->library('form_validation');
		
        // field name, error message, validation rules
		$this->form_validation->set_rules('goalType', 'Goal Type', 'required');
		$this->form_validation->set_rules('goalTitle', 'Goal Title', 'required');
		$this->form_validation->set_rules('goalAmount', 'Goal Amount', 'required');
		
		if($this->form_validation->run() == FALSE)
		{
			redirect('main/main_form_error');
		}
		
		else
		{	
			$this->load->model('main_model');
			
			if($query = $this->main_model->create_goals())
			{
				redirect('main/main_form_success');
			}
			else
			{
				redirect('main/main_form_error');			
			}
        }
    }

    function manage_forecast()
	{
        
		$this->load->library('form_validation');
		
        // field name, error message, validation rules
        $this->form_validation->set_rules('expectedIncome', 'Expected Income', 'required');
        $this->form_validation->set_rules('expectedFood', 'Expected Food', 'required');
        $this->form_validation->set_rules('expectedEntertainment', 'Expected Entertainment', 'required');
        $this->form_validation->set_rules('expectedTransport', 'Expected Transport', 'required');
        $this->form_validation->set_rules('expectedShopping', 'Expected Shopping', 'required');
        $this->form_validation->set_rules('expectedSchool', 'Expected School', 'required');
        $this->form_validation->set_rules('expectedRecurring', 'Expected Recurring', 'required');
        $this->form_validation->set_rules('expectedOther', 'Expected Other', 'required');
		
		
		if($this->form_validation->run() == FALSE)
		{
			redirect('main/main_form_error');
		}
		
		else
		{	
			$this->load->model('main_model');
			
			if($query = $this->main_model->create_forecast())
			{
				redirect('main/main_form_success');
			}
			else
			{
				redirect('main/main_form_error');			
			}
        }
    }

    public function getActualsData() {
        $this->load->model('main_model');
        header('Content-type: application/json');
        echo json_encode($this->main_model->getActualsDataFromDatabase());
    }

    public function getExpenseHistoryData () {
        $this->load->model('main_model');
        $data['EIEIO'] = $this->main_model->getExpenseHistoryData();
        $data['INCOME'] = $this->main_model->getIncomeHistoryData();

        $this->load->view('templates/main_header', $data);
        $this->load->view('pages/main_history', $data);
        $this->load->view('templates/main_footer', $data);
    }

}