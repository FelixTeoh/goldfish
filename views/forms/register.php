<?php 

    if(!isset($_SESSION["user_details"]) || $_SESSION["user_details"] -> isAdmin == false) {
    }
    $title = "Register";
    function get_content() {
?>

    <div class="container" >
        <div class="row logre-body" data-aos="flip-up">
            <div class="col-md-6 mx-auto py-5">
                <form method="POST" action="/controllers/auth/register.php" style="padding: 50px 25px; border-radius: 5%; opacity: 0.7;" novalidate class="needs-validation bg-dark text-white">
                <h2 class="text-center p-h1">Register</h2>
                    <div class="form-group lr-1">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" placeholder="Firstname" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please Enter First Name!
                        </div>
                    </div>
                    <div class="form-group lr-1">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Lastname" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please Enter Last Name!
                        </div>  
                    </div>
                    <div class="form-group lr-1">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please Enter Username!
                        </div>  
                    </div>
                    <div class="form-group lr-1">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please Enter Email!
                        </div>  
                    </div>
                    <div class="form-group lr-1">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please Enter Password!
                        </div>  
                    </div>
                    <div class="form-group lr-1">
                        <label>Confirm Password</label>
                        <input type="password" name="password2" class="form-control" placeholder="Confirm Password" id="myInput" required>
                        <input type="checkbox" onclick="myFunction()">Show Password
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please Enter The Same Password!
                        </div>  
                    </div><br>
<!--                     <div class="form-group">
                        <label>Admin / User</label>
                        <select name="isAdminSelection">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div> -->
                    <button class="btn btn-success">Register</button>
                </form>
            </div>
        </div>
    </div>

<?php
    }
    require_once "../partials/layout.php";
?>  