<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Crud extends CI_Controller 
{
    function __construct() 
    {
        //load database in autoload libraries 
        parent::__construct();         
        $this->load->database();
    }

    function index()
    {
        $data['Crud_Data'] = $this->db->query('SELECT * FROM form')->result_array();
        $this->load->view('crud_view',$data);
    }

    function Add_Crud_Details()
    {
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        // echo "<pre>";
        // print_r($_POST);
        if($Name!='' && $Email!='' && $Password!='')
        {
            $Add_data_arry = array(
                'name'  => $Name,
                'email' => $Email,
                'password'  => $Password
            );
            $this->db->insert('form',$Add_data_arry);
            $data['status'] = '1';
            $data['message'] = 'Add data successfully';
        }
        else
        {
            $data['status'] = '0';
            $data['message'] = 'required data missing';
        }
        echo json_encode($data);
    }

    function Get_Crud_Details()
    {
        $Id = $_POST['Id'];
        // print_r($Id);
        $Form_Data =$this->db->query('SELECT * FROM form WHERE srno='.$Id.'');
        if($Form_Data->num_rows())
        {
            $Form_Data=$Form_Data->row_array();
            // print_r($Form_Data);
            $html='';
            $html.='
                <form id="Get_Form_Data">
                    <div class="form-group">
                        <label for="Edit_Name">Name</label>
                        <input type="text" class="form-control" id="Edit_Name" name="Edit_Name" value="'.$Form_Data['name'].'" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="Edit_Email">Email address</label>
                        <input type="email" class="form-control" id="Edit_Email" name="Edit_Email" value="'.$Form_Data['email'].'" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="Edit_Password">Password</label>
                        <input type="password" class="form-control" id="Edit_Password" name="Edit_Password" value="'.$Form_Data['password'].'" placeholder="Password">
                        <input type="hidden" id="Edit_Id_Hdn" value="'.$Form_Data['srno'].'"  placeholder="Password">
                    </div>          
                </form>
            ';
            $data['html'] = $html;
            $data['status'] = '1';
            $data['message'] = 'Get data successfully';
        }
        else
        {
            $data['status'] = '0';
            $data['message'] = 'Something went wrong';
        }
        echo json_encode($data);     
    }
    
    function Edit_Crud_Details()
    {
        $Edit_Id_Hdn =  $_POST['Edit_Id_Hdn'];
        $Edit_Name = $_POST['Edit_Name'];
        $Edit_Email = $_POST['Edit_Email'];
        $Edit_Password = $_POST['Edit_Password'];
        // echo "<pre>";
        // print_r($_POST);
        if($Edit_Name!='' && $Edit_Email!='' && $Edit_Password!='')
        {
            $Edit_data_arry = array(
                'name'  => $Edit_Name,
                'email' => $Edit_Email,
                'password'  => $Edit_Password
            );
            $this->db->update('form',$Edit_data_arry,array('srno' => $Edit_Id_Hdn));
            $data['status'] = '1';
            $data['message'] = 'Update data successfully';
        }
        else
        {
            $data['status'] = '0';
            $data['message'] = 'required data missing';
        }
        echo json_encode($data);
    }

    function Delete_Crud_Details()
    {
        $Id = $_POST['Id'];
        if($Id!='')
        {
            $this->db->where('srno', $Id);
            $this->db-> delete('form');
            $data['status'] = '1';
            $data['message'] = 'Delete Data Succesfully';
        }
        else
        {
            $data['status'] = '0';
            $data['message'] = 'Something went wrong';
        }
        echo json_encode($data);
    }
}
?>