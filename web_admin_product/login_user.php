<?php
session_start();
include 'db_user.php';

$usernameOrEmail = trim($_POST['username']);
$password = trim($_POST['password']);

if(empty($usernameOrEmail) || empty($password)){
    echo json_encode(['status'=>0,'message'=>'Vui lòng nhập đầy đủ thông tin']);
    exit;
}

// Lấy user từ DB theo username hoặc email
$stmt = $conn->prepare("SELECT user_id, username, email, password FROM users WHERE username=? OR email=?");
$stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows === 0){
    echo json_encode(['status'=>0,'message'=>'Tài khoản không tồn tại']);
    exit;
}

$user = $result->fetch_assoc();

// Kiểm tra mật khẩu
if(password_verify($password, $user['password'])){
    // Lưu session
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['username'] = $user['username'];
    echo json_encode(['status'=>1,'message'=>'Đăng nhập thành công','username'=>$user['username']]);
}else{
    echo json_encode(['status'=>0,'message'=>'Mật khẩu không đúng']);
}
?>
