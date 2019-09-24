<?php
include('connection.php');

$name = $_POST['name'];
$gur_name = $_POST['gur_name'];
$adress = $_POST['adress'];
$mobile = $_POST['mobile'];
$dob = $_POST['dob'];
$aadhar = $_POST['aadhar'];
$gender = $_POST['gender'];
$caste = $_POST['caste'];
$education = $_POST['edu_qua'];
$cid = $_POST['course'];
$bid=$_POST['batch'];
$filename = $_FILES['photo']['name'];
$temp_name = $_FILES['photo']['tmp_name'];
$folder ="student_img/".$filename;
//move_uploaded_file($temp_name,$folder);
$sql= "INSERT INTO `student`(`stu_name`, `Gur _name`, `address`, `mobile`, `dob`, `aadhar`, `gender`, `caste`, `edu_qua`, `course_id`, `batch_id`, `photo`) VALUES ('$name','$gur_name','$adress','$mobile','$dob','$aadhar','$gender','$caste','$education','$cid','$bid','$folder')";

//upload photo
$target_dir = "student_img/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size & set limit 50kb
if ($_FILES["photo"]["size"] > 50000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}

?>