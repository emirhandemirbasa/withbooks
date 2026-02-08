<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WITHBOOKS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="/withbooks/css/form.css">
    <link rel="stylesheet" href="/withbooks/css/alert.css">
    <link rel="stylesheet" href="/withbooks/node_modules/animate.css/animate.min.css" />    
    <link rel="stylesheet" href="/withbooks/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
</head>
<body>
