
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- <script src="jquery-3.5.1.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Crud Operation</title>
  </head>
  <style>
   .button {
        height: 31px;
        width: 63px;
        font: bold 11px Arial;
        text-decoration: none;
        background-color: #EEEEEE;
        color: #333333;
        padding: 5px 13px 7px 15px;
        border-top: 1px solid #CCCCCC;
        border-right: 1px solid #333333;
        border-bottom: 1px solid #333333;
        border-left: 1px solid #CCCCCC;
    }   
  </style>
  <body>
      <a href="javascript:void(0)" class="button" style="margin-top: 10px;margin-right: 10px;line-height: 18px;margin-bottom: 10px;float: right;" data-bs-toggle="modal" data-bs-target="#Add_Modal">Add</a>
    <!-- <h1>Hello, world!</h1> -->
    <div class="container-fluid">
        <table class="table table-bordered table-dark">
            <thead class="thead-dark">
                <tr>
                <th scope="col" class="text-center">Srno</th>
                <th scope="col" class="text-center">Name</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Password</th>
                <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach($Crud_Data as $Crud_Data_v)
                {
            ?>
                <tr id="srno_<?php echo $Crud_Data_v['srno']; ?>">
                    <th scope="row" class="text-center"><?php echo $Crud_Data_v['srno']; ?></th>
                    <td class="text-center"><?php echo $Crud_Data_v['name']; ?></td>
                    <td class="text-center"><?php echo $Crud_Data_v['email']; ?></td>
                    <td class="text-center"><?php echo $Crud_Data_v['password']; ?></td>
                    <td class="text-center" ><a href="javascript:void(0)" class="button me-2" onclick="return Get_Crud_Details(<?php echo $Crud_Data_v['srno']; ?>)">Update</a><a href="javascript:void(0)" class="button" onclick="return Delete_Crud_Details(<?php echo $Crud_Data_v['srno']; ?>)">Delete</a></td>
                </tr>
            <?php 
                }
            ?>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  </body>

    <!-- Add_Modal -->
    <div class="modal fade" id="Add_Modal" tabindex="-1" aria-labelledby="Add_ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Add_ModalLabel">Add Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email address</label>
                        <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
                    </div>
                </form>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="Add_Btn">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Edit_Modal -->
    <div class="modal fade" id="Edit_Modal" tabindex="-1" aria-labelledby="Edit_ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Edit_ModalLabel">Edit Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="Get_Crud_Data">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="Edit_Btn">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Delete_Modal -->
    <div class="modal fade" id="Delete_Modal" tabindex="-1" aria-labelledby="Delete_ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Delete_ModalLabel">Delete Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <strong>Are You Sure Want to delete data? </strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success" id="Delete_Btn">Yes</button>
            </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="Delete_Id_Hdn" data-id="">
</html>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
    // console.log('hello');
    function Get_Crud_Details(Id)
    {
        // console.log('hello');
        if(Id!='')
        {
            $.ajax({
                url: "<?php echo base_url();?>index.php/Crud/Get_Crud_Details",
                type: "POST",
                data : {'Id':Id},
                success: function(data)
                {
                    data = JSON.parse(data);
                    // console.log(data);
                    if(data.status == '1')
                    {
                        $('#Get_Crud_Data').html(data.html);
                        $('#Edit_Modal').modal('toggle');
                        // toastr.success(data.message);
                    }
                    else
                    {
                        toastr.error(data.message);
                    }
                    
                    // $("#div1").html(result);
                }
            });
        }
    }

    $('#Add_Btn').on('click',function(){
        var formData = new FormData();
        // formData.append('Edit_Id_Hdn', $('#Edit_Id_Hdn').val());
        formData.append('Name', $('#Name').val());
        formData.append('Email', $('#Email').val());
        formData.append('Password',$('#Password').val());
        $.ajax({
                url: "<?php echo base_url();?>index.php/Crud/Add_Crud_Details",
                type: "POST",
                data : formData,
                contentType : false,
                processData: false,
                success: function(data)
                {
                    data = JSON.parse(data);
                    // console.log(data);
                    if(data.status == '1')
                    {
                        // $('#Get_Crud_Data').html(data.html);
                        $('#Add_Modal').modal('toggle');
                        toastr.success(data.message);
                        setTimeout(function(){ 
                            location.reload();
                        },3000);
                    }
                    else
                    {
                        toastr.error(data.message);
                    }
                    
                    // $("#div1").html(result);
                }
            });
    });

    $('#Edit_Btn').on('click',function(){
        var formData = new FormData();
        formData.append('Edit_Id_Hdn', $('#Edit_Id_Hdn').val());
        formData.append('Edit_Name', $('#Edit_Name').val());
        formData.append('Edit_Email', $('#Edit_Email').val());
        formData.append('Edit_Password',$('#Edit_Password').val());
        $.ajax({
                url: "<?php echo base_url();?>index.php/Crud/Edit_Crud_Details",
                type: "POST",
                data : formData,
                contentType : false,
                processData: false,
                success: function(data)
                {
                    data = JSON.parse(data);
                    // console.log(data);
                    if(data.status == '1')
                    {
                        // $('#Get_Crud_Data').html(data.html);
                        $('#Edit_Modal').modal('toggle');
                        toastr.success(data.message);
                    }
                    else
                    {
                        toastr.error(data.message);
                    }
                    
                    // $("#div1").html(result);
                }
            });
    });

    function Delete_Crud_Details(Id)
    {
        if(Id!='')
        {
            $('#Delete_Id_Hdn').attr('data-id',Id);
            $('#Delete_Modal').modal('toggle');
        }
    }

    $('#Delete_Btn').on('click',function(){
        Id = $('#Delete_Id_Hdn').attr('data-id');
        // console.log(Id);
        // console.log('hello');        
        $.ajax({
            url: "<?php echo base_url();?>index.php/Crud/Delete_Crud_Details",
            type: "POST",
            data : {'Id':Id},
            success: function(data)
            {
                data = JSON.parse(data);
                // console.log(data);
                if(data.status == '1')
                {
                    $('#srno_'+Id).remove();
                    // $('#Get_Crud_Data').html(data.html);
                    $('#Delete_Modal').modal('toggle');
                    toastr.success(data.message);
                }
                else
                {
                    toastr.error(data.message);
                }
                
                // $("#div1").html(result);
            }
        });
    });

</script>