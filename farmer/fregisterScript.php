<?php
session_start();
if (empty(session_id())) {
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_only_cookies', 1);
}

require_once('../sql.php');
$error = '';

function is_valid_email($email)
{
    global $conn, $error;
    $email = mysqli_real_escape_string($conn, trim($email));
    $slquery = "SELECT farmer_id FROM farmerlogin WHERE email = '$email'";
    $selectresult = mysqli_query($conn, $slquery);

    if ($selectresult && mysqli_num_rows($selectresult) > 0) {
        $error = '<div class="alert alert-info alert-dismissible fade show text-center" id="popup" role="alert"><strong class="text-center text-dark">This email already exists</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return false;
    }

    return true;
}

function is_valid_passwords($password, $cpassword)
{
    global $error;
    if ($password !== $cpassword) {
        $error = '<div class="alert alert-info alert-dismissible fade show text-center" id="popup" role="alert"><strong class="text-center text-dark">Your passwords do not match. Please type carefully</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return false;
    }
    if (strlen($password) < 8) {
        $error = '<div class="alert alert-info alert-dismissible fade show text-center" id="popup" role="alert"><strong class="text-center text-dark">Password must be at least 8 characters long</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return false;
    }
    return true;
}

function create_user($name, $password, $email, $mobile, $gender, $dob, $statename, $district, $city)
{
    global $conn;
    $name = mysqli_real_escape_string($conn, trim($name));
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $email = mysqli_real_escape_string($conn, trim($email));
    $mobile = mysqli_real_escape_string($conn, trim($mobile));
    $gender = mysqli_real_escape_string($conn, trim($gender));
    $dob = mysqli_real_escape_string($conn, trim($dob));
    $statename = mysqli_real_escape_string($conn, trim($statename));
    $district = mysqli_real_escape_string($conn, trim($district));
    $city = mysqli_real_escape_string($conn, trim($city));

    $query = "INSERT INTO farmerlogin (farmer_name, password, email, phone_no, F_gender, F_birthday, F_State, F_District, F_Location) VALUES ('$name', '$passwordHash', '$email', '$mobile', '$gender', '$dob', '$statename', '$district', '$city')";
    $result = mysqli_query($conn, $query);
    return $result ? true : false;
}

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmpassword'])) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $mobile = trim($_POST['mobile'] ?? '');
    $gender = trim($_POST['gender'] ?? '');
    $dob = trim($_POST['dob'] ?? '');
    $state = trim($_POST['state'] ?? '');
    $district = trim($_POST['district'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $cpassword = trim($_POST['confirmpassword'] ?? '');

    $statename = '';
    if ($state !== '') {
        $query5 = "SELECT StateName FROM state WHERE StCode = '" . mysqli_real_escape_string($conn, $state) . "'";
        $ses_sq5 = mysqli_query($conn, $query5);
        $row5 = mysqli_fetch_assoc($ses_sq5);
        $statename = $row5['StateName'] ?? '';
    }

    if (is_valid_email($email) && is_valid_passwords($password, $cpassword)) {
        if (create_user($name, $password, $email, $mobile, $gender, $dob, $statename, $district, $city)) {
            $_SESSION['farmer_login_user'] = $email;
            header('Location: ftwostep.php');
            exit;
        }

        $error = '<div class="alert alert-info alert-dismissible fade show text-center" id="popup" role="alert"><strong class="text-center text-dark">Error While Registering User</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
}
?>
