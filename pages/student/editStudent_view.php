<div class="col-4 mx-auto border shadow rounded py-4 mt-5 px-4">
    <h4>Edit Student Details</h4>
    <form method="post">
        <input type="hidden" id="id" name="id" value="<?php echo $this->data["id"];?>">
        <label class="mt-4">First Name:</label>
        <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $this->data["fname"];?>">
        <label class="mt-4">Last Name:</label>
        <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $this->data["lname"];?>">
        <label class="mt-4">Grade Level:</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $this->data["gradeLevel"];?>">        
        <button class="btn btn-primary mt-4" id="save" name="save">Save</button>        
    </form>
</div>