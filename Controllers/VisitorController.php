<?php
// controllers/VisitorController.php

require_once '../Models/Visitor.php'; // Include the Visitor model

class VisitorController {
    private $visitor;
    private $secretKey = "6Lfok2kqAAAAAGB0uztLuwzV-wPduhEgGs5UUXIQ"; // Replace with your actual secret key

    public function __construct() {
        $this->visitor = new Visitor(); // Instantiate the Visitor model
    }

    // Main method to handle form submission
    public function handleFormSubmission() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['g-recaptcha-response'])) {
            $recaptchaResponse = htmlspecialchars(trim($_POST['g-recaptcha-response']));

            // Verify reCAPTCHA response
            if ($this->verifyRecaptcha($recaptchaResponse)) {
                // Proceed with adding the visitor if reCAPTCHA is successful
                $this->visitor->addVisitor();
                exit; // Ensure exit after visitor handling
            } else {
                $this->redirectWithError('reCAPTCHA verification failed. Please try again.');
            }
        } else {
            $this->redirectWithError('Please complete the reCAPTCHA.');
        }
    }

    // Method to verify reCAPTCHA response
    private function verifyRecaptcha($recaptchaResponse) {
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $data = [
            'secret'   => $this->secretKey,
            'response' => $recaptchaResponse
        ];

        // Initialize cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        // Execute the request and get the response
        $result = curl_exec($ch);
        curl_close($ch);

        // Handle network or API errors
        if ($result === false) {
            return false; // Return false if the request failed
        }

        $responseData = json_decode($result);

        // Return the success status from Google's API
        return isset($responseData->success) && $responseData->success;
    }

    // Method to handle redirection with error message
    private function redirectWithError($errorMessage) {
        header("Location: ../register.php?error=" . urlencode($errorMessage));
        exit;
    }
}

// Instantiate the controller and handle form submission
$controller = new VisitorController();
$controller->handleFormSubmission();