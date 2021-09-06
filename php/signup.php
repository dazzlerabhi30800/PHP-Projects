<?php
session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn,$_POST['fname']);
$lname = mysqli_real_escape_string($conn,$_POST['lname']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
    // let's check user email id is valid or not
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // if your email is valid
        // let's check that email already exist in the database
        $sql = mysqli_query($conn,"SELECT email FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            echo "$email - This email already exist";
        }
        else{
            // let's check user upload file or not
            if(isset($_FILES['image'])){ // if image file is uploaded
                $img_name = $_FILES['image']['name']; // getting user uploaded img name
                $img_type = $_FILES['image']['type']; // getting user uploaded img type
                $tmp_name = $_FILES['image']['tmp_name']; // this temporary name is used to move/save file in our folder

                // let's explode image and get the last extension like png jpg
                $img_explode = explode('.',$img_name);
                $img_ext = end($img_explode); // here we upload the extension of an user upload file

                $extensions = ['png','jpeg','jpg']; // these are some valid img ext and store these in an array
                if(in_array($img_ext,$extensions) === true){ // if user uploaded img ext is matched with an array extensions
                    $time = time(); // this will return us current time
                                    // we need the time because  when you uploading user img to in our folder we rename file with current time so 
                                    // all the img file will have a unique name

                    // let's move the user uploaded img file to our folder
                    $new_img_name = $time.$img_name;

                    if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                        $status = "Active Now";
                        $random_id = rand(time(),1000000); // creating random user id

                        // let's insert user data inside table
                        $sql2 = mysqli_query($conn,"INSERT INTO users (unique_id,fname,lname,email,password,img,status) VALUES ('{$random_id}', '{$fname}','{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");


                        if($sql2){
                            $sql3 = mysqli_query($conn,"SELECT * FROM users WHERE email = '{$email}' ");
                            if(mysqli_num_rows($sql3) > 0){
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id']; // using this session we used user_id in other php file
                                echo "success";
                            }
                        }
                        else{
                            echo "Something went wrong";
                        }
                    }

                }
                else{
                    echo "Please select an valid img file";
                }
            }
        }
    }
    else{
        echo "$email - This is not a valid email";
    }
}
else{
    echo "All inputs fields are required";
}

?>