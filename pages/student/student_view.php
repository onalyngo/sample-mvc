<?php
session_start();

if( !isset($_SESSION["CSRF_TOKEN"]) ):
    header("location:login");
endif;
?>

<div class="container py-5 bg-light">
    <input type="hidden" id="id" name="id" value="<?php echo $data["id"]?>">
    <h3 class="mb-3 text-center">Students</h3>
    
    <table class="table table-sm table-hover">
        <thead>
            <tr>
                <th scope="col" width="20%">Date Created</th>
                <th scope="col" width="25%">Full Name</th>
                <th scope="col" width="35%">Grade Level</th>
                <th scope="col" width="1%"></th>
                <th scope="col" width="1%"></th>
                <th scope="col" width="1%"></th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td><?=date( "d-m-Y h:i A",strtotime($data['created_at']))?></td>
                <td><?=$data['fname']. " " . $data['lname']?></td>
                <td><?=$data['gradeLevel']?></td>
                
            </tr>
            
        </tbody>
    </table>

</div>