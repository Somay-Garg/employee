<?php
    require_once "config.php";
    require "activity.php";

    if(isset($_POST['confirm'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $pos = $_POST['pos'];
        $dept = $_POST['dept'];
        $email = $_POST['email'];
        $salary = $_POST['salary'];
        $since = $_POST['since'];
        $active = $_POST['active'];

        $sql = "INSERT INTO `employees`(`firstname`, `lastname`, `pos`, `dept`, `email`, `salary`, `since`, `active`) VALUES ('$fname','$lname','$pos','$dept','$email','$salary','$since','$active')";
        if(!mysqli_query($con,$sql))
            echo mysqli_error($con);
    }

    $sql = "select * from employees";
    $employees = mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalelable=no">
        <meta http-equiv="X-UA-Compatible" content="true">
        <meta name="HandheldFriendly" content="true">
        <meta charset="UTF-8">
        <title> Joe's Coaches</title>
        <link rel="stylesheet" href="./stylesheet.css">     
    </head>
    <body>
        <div class="modalbg"></div>
        <div class="nav-wrapper">
            <nav class="nav">
                <div class="icon">
                    <p id="icon-text">Joe's Coaches</p>
                    <img id="icon-img" src="./bus logo.png" alt="">
                </div>
                <ul class="nav-list">
                    <li class="nav-item"><a href="index.html">Account</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </nav>
        </div>

        <div class="employees">
            <h2>Employees</h2>
            <div class="employee-list">
                <?php if(mysqli_num_rows($employees)>0){
                    while($employee = mysqli_fetch_assoc($employees)){
                ?>
                <li>
                    <div class="employee-card" id="employee1">
                        <?php
                            $d1 =  new Date((int)substr($employee['since'],8,2),(int)substr($employee['since'],5,2),(int)substr($employee['since'],0,4));
                            $currDate = getdate(date("U"));
                            $d2 = new Date($currDate['mday'],$currDate['mon'],$currDate['year']);
                            $activity = getDifference($d1,$d2)/365;
                        ?>
                        <img class="user-img" src="./New Default Profile.jpg" style="<?php if($activity>=5 && $employee['active']=='1'){echo "border-color:green;";} ?>" alt="">
                        <span>
                            <div class="employment-details" id="employee1-details">
                                <span class="name-format"><?php echo $employee['firstname']; ?></span>
                                <span class="name-format"><?php echo $employee['lastname']; ?></span>
                                <br>
                                <span><?php echo $employee['pos']; ?></span>
                                <br>
                                <span><?php echo $employee['dept']; ?></span>
                                <br>
                                <span><?php echo $employee['email']; ?></span>
                                <br>
                                <span>&#8377;<?php echo $employee['salary']; ?></span>
                                <br>
                                <span>Joined us on <?php echo $employee['since']; ?></span>
                                <br>
                                <span><?php if($employee['active']=='1'){ 
                                        ?>Still Active<?php 
                                    }else{?>
                                        Not Active
                                    <?php } ?></span>
                            </div>
                        </span>
                    </div>
                </li>
                <?php }} ?>
            </div>
        </div>

        <!-- Modal -->
        <div id="employeeModal" class="modal">
            <div class="modal-content">
                <header class="modal-header">
                  <div class="modal-header-content">
                      <span>Add employee</span>
                  </div>
                </header>
                <form method="POST" class="modal-container">
                    <label for="fname">First Name</label>
                    <input class="input" name="fname" type="text" id="name">
                    <br>
                    <label for="lname">Last Name</label>
                    <input class="input" name="lname" type="text" id="surname">
                    <br>
                    <label for="position">Position</label>
                    <input class="input" name="pos" type="text" id="position">
                    <br>
                    <label for="dept">Department</label>
                    <input class="input" name="dept" type="text" id="department">
                    <br>
                    <label for="email">Email</label>
                    <input class="input" name="email" type="email" id="email">
                    <br>
                    <label for="salary">Salary</label>
                    <input class="input" name="salary" type="text" id="salary">
                    <br>
                    <label for="since">Joined On</label>
                    <input class="input" name="since" type="date" id="since">
                    <br>
                    <div class="active" style="display: inline-flex;"> 
                        <label for="active"> Still Active</label>
                        <input class="radio" type="radio" name="active" value="1" checked>
                        <label for="notActive"> Not Active</label>
                        <input class="radio" type="radio" name="active" value="0">
                    </div>
                    <br>

                    <button id="confirmBtn" type="submit" name="confirm">Confirm</button>
                    <button id="cancelBtn" type="button" name="button" onclick="removeEmpModal()">Cancel</button>

                </form>

                <footer class="modal-footer">

                </footer>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        
        <button class="btn" type="button" name="button" onclick="showAddEmpModal()">Add Employee</button>

        <script type="text/javascript" src="./main.js">
        
        </script>
    </body>
</html>