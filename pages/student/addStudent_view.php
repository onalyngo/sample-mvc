<div class="col-4 mx-auto border shadow rounded py-4 mt-5 px-4">
    <h4>Add Student</h4>
    <form method="POST">    
        <input type="hidden" id="csrf" name="csrf" value="<?php echo $_SESSION["CSRF_TOKEN"]?>">    
        <label class="mt-4">First Name:</label>
        <input type="text" class="form-control" id="fname" name="fname">
        <label class="mt-4">Last Name:</label>
        <input type="text" class="form-control" id="lname" name="lname">
        <label class="mt-4">Grade Level:</label>
        <input type="text" class="form-control" id="gradeLevel" name="gradeLevel">        
        
        <button class="btn btn-primary mt-4" id="submit" name="submit">Add</button>        
    </form>
</div>