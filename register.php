<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="//unpkg.com/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="//unpkg.com/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
    <script src="//unpkg.com/bootstrap-select@1.12.4/dist/js/bootstrap-select.min.js"></script>
    <script src="//unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>


    <!-- Include a library with country data (example uses country-list) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/country-list/2.2.0/country-list.min.js"></script>

    <title>Registration</title>
    <style>
    body {
        background: url('logos/background.jpg') no-repeat center center fixed;
        background-size: cover;
        /* You can adjust the following for color overlay or transparency */
        background-color: rgba(0, 0, 0, 0.5);
        /* Optional: Adds a semi-transparent overlay */
        background-blend-mode: overlay;
        /* Optional: Blends the background image with the color */
    }

    #logo {
        margin-left: 150px;
        margin-bottom: 30px;
    }

    .dropdown-toggle {
        display: none;
    }

    #pic1_mobile,
    #pic2_mobile,
    #powered_by_mobile {
        display: none;
    }

    @media only screen and (max-width: 1000px) {
        #logo {
            margin-left: 100px;
            margin-bottom: 30px;
        }
    }

    @media only screen and (max-width: 992px) {

        #pic1_mobile,
        #pic2_mobile,
        #powered_by_mobile {
            display: block;
        }

        #pic1_desktop,
        #pic2_desktop,
        #powered_by_desktop {
            display: none;
        }

    }

    @media only screen and (max-width: 480px) {
        #logo {
            margin-left: 60px;
        }
    }

    @media only screen and (max-width: 450px) {
        #logo {
            margin-left: 0;
        }
    }

    /* Search */
    .tt-menu {
        background-color: white;
        border: 1px solid #ddd;
        max-height: 200px;
        overflow-y: auto;
        width: 100%;
    }

    .tt-suggestion {
        padding: 10px;
        cursor: pointer;
    }

    .tt-suggestion:hover {
        background-color: #f0f0f0;
    }

    .tt-suggestion.tt-cursor {
        background-color: #007bff;
        color: white;
    }
    </style>

</head>

<body>

    <section class="vh-100" style="width: 125%;">
        <div class="container-fluid h-100">
            <div class="row d-flex justify-content-between align-items-center h-100">
                <div class="col-lg-6 col-xl-6">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-12">


                                    <div class="row">
                                        <div class="col-12">
                                            <img src="Logos/g_logo.png" width="300" id="logo" class="img-fluid"
                                                alt="Sample image">
                                        </div>

                                        <div class="col-12 col-lg-12 align-self-center">
                                            <p class="text-center h5" style="font-weight:bold;">LIFT CITY EXPO <span
                                                    style="color:#1C7532;">RIYADH</span> 2024 Online Visitor
                                                Pre-Registration</p>
                                        </div>



                                    </div>

                                    <form class="mx-1 mx-md-4" action="Controllers/VisitorController.php" method="POST"
                                        onsubmit="return handleFormSubmit();">




                                        <div class="d-flex flex-row align-items-center mb-4">

                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">

                                                <input type="text" id="name_first" name="name_first"
                                                    class="form-control" placeholder=" Name" required />


                                            </div>
                                        </div>




                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="Email" required />
                                            </div>
                                        </div>


                                        <!-- <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="tel" id="phone" name="phone" class="form-control"
                                                    placeholder="Mobile Number" required />
                                            </div>
                                        </div> -->
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="hidden" id="code" name="code" value="1">
                                                <input type="text" id="phone" name="phone" value="">
                                            </div>
                                        </div>


                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-building fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="company" name="company" class="form-control"
                                                    placeholder="Company" required />
                                            </div>
                                        </div>



                                        <!-- Country -->
                                        <!-- <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-flag fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <select id="selectpicker" name="country"
                                                    class="selectpicker countrypicker form-control"></select>
                                            </div>
                                        </div> -->
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-flag fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <!-- Pre-populate input with "Saudi Arabia" -->
                                                <input type="text" id="countrySearch" name="country"
                                                    class="form-control" placeholder="Search your country"
                                                    autocomplete="off" value="Saudi Arabia">
                                            </div>
                                        </div>

                                        <!-- Google reCAPTCHA widget -->
                                        <div class="g-recaptcha"
                                            data-sitekey="6Lfok2kqAAAAADYzqL4iycQyFDsuvu6Z9dvM63Vt"></div>

                                        <!-- Submit Button -->
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                        </div>

                                    </form>

                                    <!-- Load the reCAPTCHA API -->
                                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

                                    <script>
                                    function validateRecaptcha() {
                                        var response = grecaptcha.getResponse();
                                        if (response.length === 0) {
                                            showToast("Please complete the reCAPTCHA.");
                                            return false; // Prevent the form from submitting
                                        }
                                        return true; // Allow form submission
                                    }
                                    </script>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5 d-flex justify-content-end">
                    <div class="row">
                        <!-- <div class="col-12">
                            <img src="Logos/g_logo.png" width="300" id="logo" class="img-fluid" alt="Sample image">
                        </div> -->
                        <div class="col-6 col-lg-4 align-self-center" id="pic1_desktop">
                            <a href="#"><img class="d-block w-100 px-3 mb-3" src="Logos/full-logo.png" alt=""></a>
                            <div class="col-12 col-lg-12 align-self-center" id="powered_by_desktop">
                                <p class="text-center h6" style="font-weight:bold;">powered by: Trindly & ND World</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Load intl-tel-input CSS and JS libraries -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js">
    </script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" />

    <script>
    // Initialize intl-tel-input
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
        initialCountry: "sa", // Set Saudi Arabia as default
        separateDialCode: false, // Combine country code with the number
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    // Combine country code and phone number and validate reCAPTCHA on form submission
    function handleFormSubmit() {
        var phoneInput = document.querySelector("#phone");
        var fullPhoneNumber = iti.getNumber(); // Get full phone number with country code

        // Set the value of the phone input to the full number (to be submitted)
        phoneInput.value = fullPhoneNumber;

        // Check the reCAPTCHA response
        var response = grecaptcha.getResponse();
        if (response.length === 0) {
            alert("Please complete the reCAPTCHA.");
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }
    </script>

    <script>
    $(document).ready(function() {
        // Check if error parameter is set in the URL  
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('error')) {
            var errorMessage = decodeURIComponent(urlParams.get('error'));
            // Display the error message using Toastr  
            toastr.error(errorMessage, 'Error', {
                timeOut: 5000
            });
        }
    });
    </script>

    <!-- Country Library -->
    <script>
    // List of countries
    const countries = [
        "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia",
        "Australia",
        "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize",
        "Benin",
        "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso",
        "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad", "Chile",
        "China",
        "Colombia", "Comoros", "Congo (Congo-Brazzaville)", "Costa Rica", "Croatia", "Cuba", "Cyprus",
        "Czech Republic",
        "Democratic Republic of the Congo", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor",
        "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia",
        "Fiji",
        "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala",
        "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia",
        "Iran",
        "Iraq", "Ireland", "Israel", "Italy", "Ivory Coast", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya",
        "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya",
        "Liechtenstein",
        "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta",
        "Marshall Islands",
        "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco",
        "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger",
        "Nigeria", "North Korea", "North Macedonia", "Norway", "Oman", "Pakistan", "Palau", "Panama",
        "Papua New Guinea",
        "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda",
        "Saint Kitts and Nevis",
        "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe",
        "Saudi Arabia",
        "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands",
        "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname",
        "Sweden",
        "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga",
        "Trinidad and Tobago",
        "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates",
        "United Kingdom",
        "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen",
        "Zambia",
        "Zimbabwe"
    ];

    // Initialize Typeahead.js
    $('#countrySearch').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        name: 'countries',
        source: function(query, syncResults) {
            const matches = countries.filter(country =>
                country.toLowerCase().includes(query.toLowerCase()));
            syncResults(matches);
        }
    });

    // // Handle the case when a valid country is selected
    // $('#countrySearch').bind('typeahead:select', function(ev, suggestion) {
    //     $(this).val(suggestion); // Set input value to selected country
    // });

    // // Handle when no match is found, and prevent input changes
    // $('#countrySearch').on('blur', function() {
    //     const inputValue = $(this).val();
    //     if (!countries.includes(inputValue)) {
    //         $(this).val(''); // Clear the input if no valid country is selected
    //     }
    // });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>