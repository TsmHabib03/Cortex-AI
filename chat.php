<?php
header('Content-Type: application/json');

// Read JSON input
$data = json_decode(file_get_contents("php://input"), true);
$msg = $data['message'] ?? '';

if (!$msg) {
    echo json_encode(["reply" => "Say something 🙂"]);
    exit;
}

// 🔐 PUT YOUR KEY HERE (DO NOT SHARE IT)
$API_KEY = "YOUR_HUGGINGFACE_API_KEY";

// Faster free model
$url = "https://api-inference.huggingface.co/models/google/gemma-2b-it";

$payload = json_encode([
    "inputs" => $msg
]);

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer $API_KEY",
        "Content-Type: application/json"
    ],
    CURLOPT_POSTFIELDS => $payload
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Model sleeping / busy
if ($httpCode !== 200) {
    echo json_encode([
        "reply" => "Cortex AI is warming up… send again in a few seconds ⏳"
    ]);
    exit;
}

$out = json_decode($response, true);

// Extract AI reply safely
$reply =
    $out[0]['generated_text']
    ?? $out['generated_text']
    ?? "I’m awake, but I didn’t understand that 😅";

echo json_encode([
    "reply" => $reply
]);
