<div class="container py-5 bg-light">
    <input type="hidden" id="id" name="id" value="<?php echo $row["id"]?>">
    <h3 class="mb-3 text-center">Students</h3>
    <a href="addStudent"><button class="btn btn-success mb-3"><i class="fa fa-plus"></i> ADD</button></a>
    <a href="logout_page"><button class="btn btn-danger mb-3">LOGOUT</button></a>
    <div class="row py-3 text-center">           
            <div class="col-3">
                <label><h4>Full Name</h4></label>
            </div> 
            <div class="col-3">
                <label><h4>Grade Level</h4></label>
            </div> 
            <div class="col-3">
                <label><h4> Date Created</h4></label>               
            </div>   
            <div class="col-2 text-center">
                <label><h4>Action</h4></label>
            </div>                          
    </div>
    <hr>
    <?php foreach( $this->data as $key=>$student ):?>
        <form method="post"> 
            <div class="row py-3 text-center">
                    <input type="hidden" id="csrf" name="csrf" value="<?php echo $_SESSION["CSRF_TOKEN"]?>">
                    <input type="hidden" id="id" name="id" value="<?php echo $student["id"]?>">
                    <div class="col-3">
                        <label><?php echo $student["fname"]." ". $student["lname"]; ?></label>
                    </div>
                    <div class="col-3">
                        <label><?php echo $student["gradeLevel"]; ?></label>
                    </div>
                    <div class="col-3"> 
                        <label><?php echo date( "d-m-Y h:i A",strtotime($student['created_at']))?></label>
                    </div>  
                    <div class="col-1">
                        <button id="edit" name="edit" class="btn btn-primary">Edit</button>
                    </div>
                    <div class="col-1">
                        <button id="del" name="del" class="btn btn-danger">Delete</button>
                    </div>                                  
            </div>
        </form>
        <hr>
    <?php endforeach;?> 
</div>