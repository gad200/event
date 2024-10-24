<?php
// models/Visitor.php
require_once '../DB/DBConnection.php'; // Include your database connection class
require '../vendor/autoload.php'; // Include QR code library

use Endroid\QrCode\QrCode;

class Visitor {
    private $conn;
    private $table = 'visitors'; // Database table name

    public function __construct() {
        $db = new DBConnection(); // Initialize the database connection
        $this->conn = $db->connect();
    }

    // Destructor to close the database connection when the object is destroyed
    public function __destruct() {
        $this->conn = null; // Close the database connection
    }

    // Function to handle form submission, validate, store visitor data, and generate QR code
    public function addVisitor() {
        
        // Check if form data is set and not empty
        if (isset($_POST['name_first']) && isset($_POST['company']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['country'])) {

            // Get form data from POST
            $firstName = $_POST['name_first'];
            $company = $_POST['company'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $country = $_POST['country'];

            // Generate a random code for the visitor
            $code = strval(rand(100000, 999999999));

            // Validate input data
            if (empty($firstName) || empty($company) || empty($email) || empty($phone)) {
                header("Location:register.php?error=Please fill all required fields.");
                return;
            }

            // Prepare SQL statement using PDO for inserting visitor data
            $sql = "INSERT INTO $this->table (`Name_First`, `Email_Enter_Email`, `Mobile_Number`, `Company`, `Address_Country`,`Entry_Code`) VALUES ( :firstName, :email, :phone, :company, :country, :code)";
            $stmt = $this->conn->prepare($sql);

            // Bind parameters using PDO
            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':company', $company);
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':code', $code);

            // Execute the statement and check for success
            if ($stmt->execute()) {

                // Generate QR Code
                $qrCode = new QrCode("Name: $firstName\nCompany: $company\nEmail: $email\nPhone: $phone\nCountry: $country\nCode: $code");

                // Save QR code image to the server
                $qrCodePath = 'qrcodes/' . $code . '.png'; // Ensure the qrcodes/ directory exists and is writable

                // Notify success and redirect
                echo "<script>
                        localStorage.setItem('code', '$code');
                        localStorage.setItem('register', 1);
                      
                        window.location.replace('../newqrcode.php?code=$code');
                      </script>";
            } else {
                header("Location:../register.php?error= Could not register visitor.");
            }

            // Close statement
            $stmt = null;
        } else {
            header("Location:../register.php?error=Please submit the form.");
            exit();
        }
    }
}