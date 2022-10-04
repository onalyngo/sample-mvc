<div class="container py-5">
    <h3 class="mb-3">Members</h3>
    <a href="add_member"><button class="btn btn-success">+ADD</button></a>
    <hr>
    <div class="row py-3">           
            <div class="col-3">
                <label><h4>Name:</h4></label>
            </div>
            <div class="col-3">
                <label><h4>Username:</h4></label>
            </div>  
            <div class="col-2">
                <label><h4> Date Created:</h4></label>               
            </div>     
            <div class="col-4 text-center">
                <label><h4>Action</h4></label>
            </div>                          
    </div>
    <hr>
    <?php foreach( $this->data as $key=>$row ):?>
        <form method="post"> 
            <div class="row py-3">
                    <input type="hidden" id="id_member" name="id_member" value="<?php echo $row["member_id"]?>">
                    <div class="col-3">
                        <label><?php echo $row["fname"]." ". $row["lname"]; ?></label>
                    </div>
                    <div class="col-3">
                        <label><?php echo $row["username"]?></label>
                    </div>
                    <div class="col-2"> 
                        <label><?php echo $row["created_at"]?></label>
                    </div>  
                    <div class="col-2">
                        <button id="view" name="view" class="btn btn-success mx-auto d-block">View More</button>
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