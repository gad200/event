<?php

// Include the mPDF and QR Code libraries
require_once __DIR__ . '/vendor/autoload.php'; // Ensure the path is correct for mPDF
include "vendor/phpqrcode/qrlib.php"; // Include phpqrcode library
require_once "DB/DBConnection.php"; // Include DBConnection

// Database configuration
class VisitorHandler {
    private $conn;

    public function __construct() {
        $db = new DBConnection(); // Initialize the database connection
        $this->conn = $db->connect();
    }

    // Destructor to close the database connection when the object is destroyed
    public function __destruct() {
        $this->conn = null; // Close the database connection
    }

    public function generateVisitorPDF($entryCode) {
        // Check if the entry code exists in the database
        $stmt = $this->conn->prepare("SELECT `Name_Prefix`, `Name_First`, `Name_Last`, `Company` FROM visitors WHERE `Entry_Code` = :entry_code LIMIT 1");
        $stmt->bindParam(':entry_code', $entryCode);
        $stmt->execute();

        $visitor = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($visitor) {
            // Extract the visitor's name components
            $namePrefix = $visitor['Name_Prefix'];
            $firstName = $visitor['Name_First'];
            $lastName = $visitor['Name_Last'];
            $fullName = trim($namePrefix . ' ' . $firstName . ' ' . $lastName); // Combine names with space and remove extra spaces

            // Define the path to save the QR code image
            $qrCodePath = 'qrcodes/' . $entryCode . '.png';

            // Generate the QR code with a custom size
            if (!file_exists('qrcodes')) {
                mkdir('qrcodes', 0777, true); // Create the directory if it doesn't exist
            }

            // QRcode::png(content, filename, error correction level, matrix point size)
            QRcode::png($entryCode, $qrCodePath, QR_ECLEVEL_L, 12); // Smaller matrix size (12) to control QR size

            // Initialize mPDF with custom 70mm x 30mm size and small margins
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                'format' => [70, 30], // Custom size
                'margin_left' => 5,   // Custom margins (5mm)
                'margin_right' => 5,
                'margin_top' => 5,
                'margin_bottom' => 5,
                'default_font' => 'dejavusans' // Set default font that supports Arabic (DejaVuSans is a good option)
            ]);

            // Create the HTML content for the PDF with small font and tight line height
            $html = '
            <div style="text-align: left; font-size: 14px; line-height: 1.2;"> 
                <p><strong>Name: ' . htmlspecialchars($fullName) . '</strong></p>
                <p><strong>Company: ' . htmlspecialchars($visitor['Company']) . '</strong></p>
            </div>
            ';

            // Write the HTML content to the PDF
            $mpdf->WriteHTML($html);

            // Display the PDF inline in the browser
            $mpdf->Output('visitor_details.pdf', 'I'); // 'I' forces inline display in the browser
        } else {
            // If not found, show an error message and redirect back
            echo "<script>alert('User Not Found'); window.location.href = 'event.php';</script>";
        }
    }
}

// Get the entry code from the form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['Entry_Code'])) {
    $entryCode = $_POST['Entry_Code'];

    // Create an instance of VisitorHandler and generate the PDF
    $visitorHandler = new VisitorHandler();
    $visitorHandler->generateVisitorPDF($entryCode);
} else {
    echo "<script>alert('Entry Code is missing.'); window.location.href = 'event.php';</script>";
}