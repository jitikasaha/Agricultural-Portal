<?php
include('../sql.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header('Content-Type: application/json');

// Check authentication
if (!isset($_SESSION['farmer_login_user'])) {
    http_response_code(401);
    echo json_encode([
        'error' => [
            'message' => 'Unauthorized. Please login as a farmer to use the chat assistant.'
        ]
    ]);
    exit;
}

// Get input payload
$raw_input = file_get_contents('php://input');
$data = json_decode($raw_input, true);

if (!$data || !isset($data['messages']) || !is_array($data['messages'])) {
    http_response_code(400);
    echo json_encode([
        'error' => [
            'message' => 'Invalid request payload.'
        ]
    ]);
    exit;
}

$api_key = app_env('OPENAI_API_KEY', '');

// If API key is missing or placeholder, provide friendly built-in assistant response
if (empty($api_key) || strpos($api_key, 'sk-xxxx') === 0 || strlen($api_key) < 15) {
    $last_user_msg = '';
    foreach (array_reverse($data['messages']) as $msg) {
        if (isset($msg['role']) && $msg['role'] === 'user') {
            $last_user_msg = $msg['content'];
            break;
        }
    }

    $reply = "Hello! I am your Agriculture Assistant.\n\n"
           . "*(Notice: To enable live GPT answers, set a valid `OPENAI_API_KEY` in your `.env` file.)*\n\n"
           . "In the meantime, our portal provides built-in machine learning models to help you:\n"
           . "1. **Crop Recommendation**: Find the best crops suited for your soil's Nitrogen, Phosphorus, Potassium, temperature, and rainfall.\n"
           . "2. **Fertilizer Recommendation**: Determine the exact fertilizer needed for your soil and crop type.\n"
           . "3. **Yield Prediction**: Predict yield based on season, state, and area.\n"
           . "4. **Weather Forecast**: Access real-time multi-day weather predictions for your district.";

    echo json_encode([
        'choices' => [
            [
                'message' => [
                    'role' => 'assistant',
                    'content' => $reply
                ]
            ]
        ]
    ]);
    exit;
}

// Forward request to OpenAI API
$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => json_encode([
        'model'    => 'gpt-3.5-turbo',
        'messages' => $data['messages']
    ]),
    CURLOPT_HTTPHEADER     => [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $api_key
    ],
    CURLOPT_TIMEOUT        => 30
]);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curl_err = curl_error($ch);
curl_close($ch);

if ($curl_err) {
    http_response_code(502);
    echo json_encode([
        'error' => [
            'message' => 'Gateway error communicating with OpenAI: ' . $curl_err
        ]
    ]);
    exit;
}

http_response_code($http_code);
echo $response;
exit;
