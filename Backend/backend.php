<?php
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed']);
    exit;
}
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';
if ($name === '' || $message === '') {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Thiếu tên hoặc tin nhắn']);
    exit;
}
$name_safe = htmlspecialchars($name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$message_safe = htmlspecialchars($message, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$response_message = "Xin chào {$name_safe}, đã nhận: {$message_safe}";
echo json_encode([
    'success' => true,
    'name' => $name_safe,
    'message' => $response_message
]);
