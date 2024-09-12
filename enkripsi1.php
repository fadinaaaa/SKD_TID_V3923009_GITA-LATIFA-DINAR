<?php  
// Fungsi cipher untuk enkripsi dan dekripsi
function cipher($char, $key){
    if (ctype_alpha($char)) {
        $nilai = ord(ctype_upper($char) ? 'A' : 'a');
        $ch = ord($char);
        $mod = fmod($ch + $key - $nilai, 26);
        return chr($mod + $nilai);
    } else {
        return $char;
    }
} 

// Fungsi enkripsi
function enkripsi($input, $key){
    $output = "";
    $chars = str_split($input);
    foreach($chars as $char){
        $output .= cipher($char, $key);
    }
    return $output;
}

// Fungsi dekripsi
function dekripsi($input, $key){
    return enkripsi($input, 26 - $key);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encryption & Decryption - GITA LATIFA</title>
    <style>
        /* General Styles */
        body {
            background-color: #e0f7fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container */
        .container {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        /* Header */
        h1 {
            color: #00796b;
            font-size: 2em;
            margin-bottom: 20px;
        }

        /* Input Fields */
        input[type="text"], input[type="number"], textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #00796b;
            border-radius: 8px;
            font-size: 1em;
            background-color: #b2dfdb;
            color: #333;
        }

        /* Textarea */
        textarea {
            height: 100px;
            resize: none;
        }

        /* Buttons */
        .btn {
            background-color: #00796b;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 8px;
            margin: 10px;
        }

        .btn:hover {
            background-color: #004d40;
        }

        /* Footer */
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #999;
        }

        .footer span {
            color: #00796b;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Encrypt & Decrypt</h1>
        <form action="" method="post">
            <input type="text" name="plain" placeholder="Enter your message" required />
            <input type="number" name="key" placeholder="Enter key (0-25)" required />
            <br />
            <button type="submit" name="enkripsi" class="btn">Encrypt</button>
            <button type="submit" name="dekripsi" class="btn">Decrypt</button>
            <br />
            <textarea readonly placeholder="Result">
                <?php  
                    if (isset($_POST["enkripsi"])) { 
                        echo enkripsi($_POST["plain"], $_POST["key"]);
                    } else if (isset($_POST["dekripsi"])) {
                        echo dekripsi($_POST["plain"], $_POST["key"]);
                    }
                ?>
            </textarea>
        </form>
    </div>
</body>
</html>
