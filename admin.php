<div id="admin-whole">      

        <div id="admin-div" class="three-divs">
            <h3 id="that_head">Admin List</h3>
            <?php
            include_once 'db.php';
                $query = "Select * FROM admin_list WHERE 1=1";
                $result = mysqli_query($con2, $query);
                while($row = mysqli_fetch_array($result)) echo("<div id='that_bellow'>• ".$row['email']."</div>");
            ?>
            <form method="post" action="index.php">
                <br> 
                <div>                
                    <input type="text" name="email" placeholder="Email" class="that_input_box">
                </div>
                <br> 
                <div>
                    <button type="submit" name="addadmin" class="that_button">Add Admin</button>
                    <button type="submit" name="removeadmin" class="that_button">Remove Admin</button>
                </div>
            </form>
        </div> 

        <div id="teacher-div" class="three-divs">
            <h3 id="that_head">Teacher List</h3>    
            <?php
                $query = "Select * FROM teacher_list WHERE 1=1";
                $result = mysqli_query($con2, $query);
                while($row = mysqli_fetch_array($result)) echo("<div id='that_bellow'>• ".$row['email']."</div>");
            ?>
            <form method="post" action="index.php">
                <br> 
                <div>                
                    <input type="text" name="email" placeholder="Email" class="that_input_box">
                </div>
                <br> 
                <div>
                    <button type="submit" name="addteacher" class="that_button">Add Teacher</button>
                    <button type="submit" name="removeteacher" class="that_button">Remove Teacher</button>
                </div>
            </form>
        </div>        
        
        <div id="student-div" class="three-divs">
            <h3 id="that_head">Student List</h3>    
            <?php
                $query = "Select * FROM student_list WHERE 1=1";
                $result = mysqli_query($con2, $query);
                while($row = mysqli_fetch_array($result)) echo("<div id='that_bellow'>• ".$row['email']."&nbsp - &nbsp".$row['student_id']."</div>");
            ?>
            <form method="post" action="index.php">
                <br> 
                <div>                
                    <input type="text" name="email" placeholder="Email" class="that_input_box"> <br>
                    <input type="text" name="student_id" placeholder="Student ID" class="that_input_box">
                </div>
                <br> 
                <div>
                    <button type="submit" name="addstudent" class="that_button">Add Student</button>
                    <button type="submit" name="removestudent" class="that_button">Remove Student</button>
                </div>
            </form>
        </div>           

    </div>   