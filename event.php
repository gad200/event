<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
    <style>
    body {
        background-color: #f0f0f0;
        font-family: Arial, sans-serif;
    }

    .center {
        padding: 20px;
        background-color: white;
        margin: 50px auto;
        width: 600px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    #qr-reader {
        margin: 20px auto;
        width: 100%;
        display: none;
    }

    #visitor {
        text-align: center;
        margin: auto;
        width: 100%;
        border: 1px solid black;
        border-radius: 5px;
        padding: 10px;
    }

    .center input[type="text"] {
        margin-top: 10px;
        margin-left: 25px;
        height: 40px;
        font-size: 18px;
        text-align: center;
        width: 90%;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .camera-box {
        width: 100%;
        height: 400px;
        border: 2px solid black;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .notification {
        color: red;
        font-weight: bold;
        margin-top: 10px;
        text-align: center;
    }

    button {
        margin-left: 25%;
        margin-top: 10px;
        font-size: 22px;
        width: 50%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #45a049;
    }

    #cancelButton {
        background-color: #f44336;
        margin-left: 5px;
    }

    button:disabled {
        background-color: #cccccc;
        cursor: not-allowed;
    }

    h1 {
        font-size: 18px;
        font-weight: bold;
        margin: 5px 0;
    }
    </style>
</head>

<body>
    <div class="center">
        <form method="POST" action="print.php" id="checkForm">
            <input type="text" placeholder="Entry Code" name="Entry_Code" id="Entry_Code">

            <!-- Scan Button -->
            <button type="button" id="scanButton" onclick="startScanner()">Start QR Code Scan</button>

            <!-- Cancel Button -->
            <button type="button" id="cancelButton" style="display:none;" onclick="stopScanner()">Cancel Scan</button>

            <div id="qr-reader" class="camera-box"></div> <!-- Camera box for QR scanning -->

            <div id="visitor" style="width: 550px; margin-top: 10px;">
                <h1 id="name"></h1>
                <h1 id="Company"></h1>
                <div class="notification" id="notification"></div> <!-- Notification for user not found -->
            </div>

            <!-- Print Button -->
            <button type="submit" id="print">Print</button>
        </form>
    </div>

    <!-- Include the library -->
    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
    <script type="text/javascript">
    let html5QrCode;

    function startScanner() {
        const qrReader = document.getElementById("qr-reader");
        qrReader.style.display = "block"; // Show the camera box

        // Hide scan button and show cancel button
        document.getElementById("scanButton").style.display = "none";
        document.getElementById("cancelButton").style.display = "inline-block";

        html5QrCode = new Html5Qrcode("qr-reader");

        html5QrCode.start({
                facingMode: "environment"
            }, {
                fps: 10, // Moderate FPS to ensure quick capture
                qrbox: {
                    width: 250,
                    height: 250
                }
            },
            (decodedText, decodedResult) => {
                // Stop scanning after getting the first result
                html5QrCode.stop().then(() => {
                    console.log("QR Code scanning stopped.");
                }).catch((err) => {
                    console.error("Unable to stop scanning:", err);
                });

                // Populate the Entry_Code input with the scanned QR code
                document.getElementById("Entry_Code").value = decodedText;

                // Display success message
                document.getElementById("notification").textContent = `QR Code scanned: ${decodedText}`;

                // Automatically submit the form to process the code
                document.getElementById("checkForm").submit();
            },
            (errorMessage) => {
                // Log errors to console for debugging
                console.error(`Error while scanning: ${errorMessage}`);
            }
        ).catch((err) => {
            console.error("Unable to start scanning:", err);
        });
    }

    function stopScanner() {
        if (html5QrCode) {
            html5QrCode.stop().then(() => {
                console.log("QR Code scanning stopped.");
            }).catch((err) => {
                console.error("Unable to stop scanning:", err);
            });

            // Hide the camera box
            document.getElementById("qr-reader").style.display = "none";

            // Show scan button and hide cancel button
            document.getElementById("scanButton").style.display = "inline-block";
            document.getElementById("cancelButton").style.display = "none";
        }
    }
    </script>
</body>

</html>