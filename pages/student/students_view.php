<?php
session_start();

if( !isset($_SESSION["CSRF_TOKEN"]) ):
    header("location:login");
endif;
?>

<div class="container py-5 bg-light">
    <input type="hidden" id="id" name="id" value="<?php echo $row["id"]?>">
    <h3 class="mb-3 text-center">Students</h3>
    <a href="<?php echo $this->addStudent;?>"><button class="btn btn-success mb-3"><i class="fa fa-plus"></i> ADD</button></a>
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
            <?php foreach ($this->data as $key=>$student): ?>
            <tr>
                <td><?=date( "d-m-Y h:i A",strtotime($student['created_at']))?></td>
                <td><?=$student['fname']. " " . $student['lname']?></td>
                <td><?=$student['gradeLevel']?></td>
                <td>
                    <a href="<?php echo $this->editStudent;?>" id="edit" name="edit" class="btn btn-info mx-auto">Edit</a>
                </td>
                <td>
                    <a href="<?php echo $this->delete;?>" id="del" name="del" class="btn btn-danger mx-auto">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>