<?php
session_start();
session_unset();
session_destroy();
echo json_encode(["status" => 1, "message" => "Đã đăng xuất"]);
?>
