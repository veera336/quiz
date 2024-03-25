<?php
include('session.php');
?>
<html>
<head>
    <title>OUTPUT</title>
    <link rel="stylesheet" href="styles2.css">
    <style>
.output-box, .error-box {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 2px solid #ccc;
            background-color: #f7f7f7;
        }

        .output-title, .error-title {
            font-size: 20px;
            color: #333;
        }

        .output-content {
            color: green;
        }

        .error-content {
            color: red;
        }
    </style>
<?php
include('session.php');

$un = $_SESSION["username"];
$code = $_POST["code"];
$input = $_POST["input_data"];

if (empty($code)) {
    die("The code area is empty");
}

$filename_code = "R" . $un . ".java";
$filename_in = "input" . $un . ".txt";
$filename_error = "error" . $un . ".txt";
$runtime_file = "runtime" . $un . ".txt";
$executable = "R" . $un . ".class";
$out = "java R" . $un;

$file_code = fopen($filename_code, "w+");
fwrite($file_code, $code);
fclose($file_code);

if (!empty($input)) {
    $file_in = fopen($filename_in, "w+");
    fwrite($file_in, $input);
    fclose($file_in);
    $out .= " < " . $filename_in;
}

$command = "javac " . $filename_code;
$command_error = $command . " 2>" . $filename_error;
$runtime_error_command = $out . " 2>" . $runtime_file;

exec($command_error);
$error = file_get_contents($filename_error);

echo '<div class="output-box">';
if (trim($error) == "") {
    exec($runtime_error_command);
    $runtime_error = file_get_contents($runtime_file);

    if (trim($runtime_error) == "") {
        $output = shell_exec($out);

        echo "<h2 class='output-title'>Output:</h2><pre class='output-content'>$output</pre>";
    } else {
        echo "<h2 class='error-title'>Runtime Error:</h2><pre class='error-content'>$runtime_error</pre>";
    }
} else {
    echo "<h2 class='error-title'>Compilation Error:</h2><pre class='error-content'>$error</pre>";
}
echo '</div>';

if (file_exists($filename_in)) {
    unlink($filename_in);
}
if (file_exists($filename_code)) {
    unlink($filename_code);
}
if (file_exists($filename_error)) {
    unlink($filename_error);
}
if (file_exists($runtime_file)) {
    unlink($runtime_file);
}
if (file_exists($executable)) {
    unlink($executable);
}

?>  

</html>
