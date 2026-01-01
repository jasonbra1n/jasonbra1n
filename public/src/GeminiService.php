<?php

/**
 * GeminiService Class
 * 
 * Handles communication with the Google Gemini API.
 */
class GeminiService {
    private $apiKey;
    private $db;
    const API_ENDPOINT = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent';

    /**
     * Constructor
     * @param PDO $db Database connection object
     */
    public function __construct($db) {
        $this->db = $db;
        $this->loadApiKey();
    }

    /**
     * Load the API key from the database settings.
     */
    private function loadApiKey() {
        try {
            $settings = new Settings($this->db);
            $this->apiKey = $settings->get('gemini_api_key');
        } catch (Exception $e) {
            // Handle error if Settings class or key is not found
            error_log("GeminiService Error: Could not load API key. " . $e->getMessage());
            $this->apiKey = null;
        }
    }

    /**
     * Check if the service is ready to make requests.
     * @return bool
     */
    public function isReady() {
        return !empty($this->apiKey);
    }

    /**
     * Send a prompt to the Gemini API and get the response.
     * @param string $prompt The text prompt to send.
     * @return string|null The generated text content or null on error.
     */
    public function generateContent($prompt) {
        if (!$this->isReady()) {
            error_log("GeminiService Error: API key is not set.");
            return null;
        }

        $url = self::API_ENDPOINT . '?key=' . $this->apiKey;

        $data = [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $prompt]
                    ]
                ]
            ]
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); // Should be true in production

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_error = curl_error($ch);
        curl_close($ch);

        if ($http_code !== 200) {
            error_log("Gemini API Error: HTTP Code $http_code. Response: $response. cURL Error: $curl_error");
            return null;
        }

        $result = json_decode($response, true);

        if (isset($result['candidates'][0]['content']['parts'][0]['text'])) {
            return $result['candidates'][0]['content']['parts'][0]['text'];
        } else {
            error_log("Gemini API Error: Unexpected response format. " . print_r($result, true));
            return null;
        }
    }
}