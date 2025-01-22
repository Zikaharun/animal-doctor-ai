<?php

if (isset($_GET['role']) && isset($_GET['prompt']) && $_GET['role'] !== '' && $_GET['prompt'] !== '') {


// Your Groq API key
$apiKey = "YOUR_SECRET_API";

// API URL
$url = "API_URL"
// JSON payload
$data = [
    "messages" => [
        [
            "role" => "system",
         "content" => $_GET['role']
        ],
        [
            'role' => 'user',
            'content' => $_GET['prompt']
        ]
    ],
    "model" => "llama-3.3-70b-versatile"
];

// Initialize cURL
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $apiKey",
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

// Execute the request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    // Output the JSON response
    header('Content-Type: application/json');
    echo $response;
}

// Close cURL session
curl_close($ch);

} else {
    echo "something wrong";
}

?>
