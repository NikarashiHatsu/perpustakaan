<?php
    $response = array();
    
    try {
        new \Imagick(public_path() . '/tester/sample.pdf[0]');
    } catch (\Throwable $th) {
        if(strpos($th, 'PDFDelegateFailed')) {
            $response['ghostscript'] = 0;
        } else {
            $response['ghostscript'] = 1;
        }
    }
    if (!extension_loaded('imagick')) {
        $response['imagick'] = 0;
    } else {
        $response['imagick'] = 1;
    }
    if (!extension_loaded('openssl')) {
        $response['openssl'] = 0;
    } else {
        $response['openssl'] = 1;
    }
    if (!extension_loaded('pdo')) {
        $response['pdo'] = 0;
    } else {
        $response['pdo'] = 1;
    }
    if (!extension_loaded('mbstring')) {
        $response['mbstring'] = 0;
    } else {
        $response['mbstring'] = 1;
    }
    if (!extension_loaded('tokenizer')) {
        $response['tokenizer'] = 0;
    } else {
        $response['tokenizer'] = 1;
    }
    if (!extension_loaded('xml')) {
        $response['xml'] = 0;
    } else {
        $response['xml'] = 1;
    }
    if (!extension_loaded('ctype')) {
        $response['ctype'] = 0;
    } else {
        $response['ctype'] = 1;
    }
    if (!extension_loaded('json')) {
        $response['json'] = 0;
    } else {
        $response['json'] = 1;
    }
    if (!extension_loaded('bcmath')) {
        $response['bcmath'] = 0;
    } else {
        $response['bcmath'] = 1;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ups...</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/mdb.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" />
</head>
<style>
    html {
        height: 100%;
    }
    body {
        margin: 0;
        height: 100%;
    }
    .row-coolors {
        width: 100%;
        height: 100vh;
        position: relative;
    }
    .col-coolors {
        height: 100vh;
        position: absolute;
        top: 0;
    }
    .col-coolors:nth-child(1) {
        background-color: #11151C;
        width: 20px;
    }
    .col-coolors:nth-child(2) {
        background-color: #212D40;
        width: 40px;
        left: 20px;
    }
    .col-coolors:nth-child(3) {
        background-color: #364156;
        width: 60px;
        left: 60px;
    }
    .col-coolors:nth-child(4) {
        background-color: #7D4E57;
        width: 100px;
        left: 120px;
    }
    .col-coolors:nth-child(5) {
        background-color: #D66853;
        width: calc(100vw - 220px);
        left: 220px;
        color: white;
        padding: 2rem 3rem 1rem 3rem;
    }
    .checker {
        width: 100%;
        position: relative;
    }
    .status {
        padding: 0.5rem 0.75rem;
        width: 40px;
        text-align: center;
        border-radius: 10px;
        background-color: green;
        position: absolute;
    }
    .name {
        padding: 0.25rem;
        position: absolute;
        left: 45px;
        line-height: 1000px;
    }
</style>
<body class="blue-gradient">
    <div class="container">
        <div class="row white-text py-3">
            <div class="col-sm-12">
                <h1>Hai, sepertinya kamu kekurangan sesuatu. Mari cek ekstensi yang kita butuhkan:</h1>
                <hr style='border-top: 1px solid rgba(255, 255, 255, .25) !important;' />
                <div class="checker" style="margin-bottom: 4rem;">
                    <div class="status elegant-color">
                        <?php
                            if($response['ghostscript'] == 0) {
                                echo "<i class='fas fa-times red-text'></i>";                            
                            } else {
                                echo "<i class='fas fa-check green-text'></i>";
                            }
                        ?>
                    </div>
                    <div class="name">
                        <h4>Ekstensi Ghostscript</h4>
                    </div>
                </div>
                <div class="checker" style="margin-bottom: 7rem;">
                    <div class="status elegant-color">
                        <?php
                            if($response['imagick'] == 0) {
                                echo "<i class='fas fa-times red-text'></i>";                            
                            } else {
                                echo "<i class='fas fa-check green-text'></i>";
                            }
                        ?>
                    </div>
                    <div class="name">
                        <h4>Ekstensi Imagick</h4>
                    </div>
                </div>
                <div class="checker" style="margin-bottom: 10rem;">
                    <div class="status elegant-color">
                        <?php
                            if($response['openssl'] == 0) {
                                echo "<i class='fas fa-times red-text'></i>";                            
                            } else {
                                echo "<i class='fas fa-check green-text'></i>";
                            }
                        ?>
                    </div>
                    <div class="name">
                        <h4>Ekstensi OpenSSL</h4>
                    </div>
                </div>
                <div class="checker" style="margin-bottom: 13rem;">
                    <div class="status elegant-color">
                        <?php
                            if($response['pdo'] == 0) {
                                echo "<i class='fas fa-times red-text'></i>";                            
                            } else {
                                echo "<i class='fas fa-check green-text'></i>";
                            }
                        ?>
                    </div>
                    <div class="name">
                        <h4>Ekstensi PDO</h4>
                    </div>
                </div>
                <div class="checker" style="margin-bottom: 16rem;">
                    <div class="status elegant-color">
                        <?php
                            if($response['mbstring'] == 0) {
                                echo "<i class='fas fa-times red-text'></i>";                            
                            } else {
                                echo "<i class='fas fa-check green-text'></i>";
                            }
                        ?>
                    </div>
                    <div class="name">
                        <h4>Ekstensi Mbstring</h4>
                    </div>
                </div>
                <div class="checker" style="margin-bottom: 19rem;">
                    <div class="status elegant-color">
                        <?php
                            if($response['tokenizer'] == 0) {
                                echo "<i class='fas fa-times red-text'></i>";                            
                            } else {
                                echo "<i class='fas fa-check green-text'></i>";
                            }
                        ?>
                    </div>
                    <div class="name">
                        <h4>Ekstensi Tokenizer</h4>
                    </div>
                </div>
                <div class="checker" style="margin-bottom: 22rem;">
                    <div class="status elegant-color">
                        <?php
                            if($response['xml'] == 0) {
                                echo "<i class='fas fa-times red-text'></i>";                            
                            } else {
                                echo "<i class='fas fa-check green-text'></i>";
                            }
                        ?>
                    </div>
                    <div class="name">
                        <h4>Ekstensi XML</h4>
                    </div>
                </div>
                <div class="checker" style="margin-bottom: 25rem;">
                    <div class="status elegant-color">
                        <?php
                            if($response['ctype'] == 0) {
                                echo "<i class='fas fa-times red-text'></i>";                            
                            } else {
                                echo "<i class='fas fa-check green-text'></i>";
                            }
                        ?>
                    </div>
                    <div class="name">
                        <h4>Ekstensi CType</h4>
                    </div>
                </div>
                <div class="checker" style="margin-bottom: 28rem;">
                    <div class="status elegant-color">
                        <?php
                            if($response['json'] == 0) {
                                echo "<i class='fas fa-times red-text'></i>";                            
                            } else {
                                echo "<i class='fas fa-check green-text'></i>";
                            }
                        ?>
                    </div>
                    <div class="name">
                        <h4>Ekstensi JSON</h4>
                    </div>
                </div>
                <div class="checker" style="margin-bottom: 31rem;">
                    <div class="status elegant-color">
                        <?php
                            if($response['bcmath'] == 0) {
                                echo "<i class='fas fa-times red-text'></i>";                            
                            } else {
                                echo "<i class='fas fa-check green-text'></i>";
                            }
                        ?>
                    </div>
                    <div class="name">
                        <h4>Ekstensi BCMath</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>