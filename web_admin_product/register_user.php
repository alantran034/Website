<?php
include 'db_user.php'; // kết nối đến user_db

$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Kiểm tra dữ liệu rỗng
if(empty($username) || empty($email) || empty($password)){
    echo json_encode(['status'=>0,'message'=>'Vui lòng điền đầy đủ thông tin']);
    exit;
}

// Kiểm tra trùng username/email
$stmt = $conn->prepare("SELECT user_id FROM users WHERE username=? OR email=?");
$stmt->bind_param("ss",$username,$email);
$stmt->execute();
$stmt->store_result();
if($stmt->num_rows > 0){
    echo json_encode(['status'=>0,'message'=>'Tên tài khoản hoặc email đã tồn tại']);
    exit;
}

// Mã hóa mật khẩu
$hash = password_hash($password, PASSWORD_DEFAULT);

// Thêm vào database
$stmt = $conn->prepare("INSERT INTO users(username,email,password) VALUES(?,?,?)");
$stmt->bind_param("sss",$username,$email,$hash);
if($stmt->execute()){
    echo json_encode(['status'=>1,'message'=>'Đăng ký thành công']);
}else{
    echo json_encode(['status'=>0,'message'=>'Có lỗi xảy ra']);
}
?>
