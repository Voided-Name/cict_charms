<?php
function console_log_var_dump($variable)
{
  // ChatGPT
  ob_start();                 // Start output buffering
  var_dump($variable);        // Dump the variable
  $output = ob_get_clean();   // Capture the output and end buffering

  // Prepare the output for JavaScript
  $output = preg_replace("/\r|\n/", "", $output);    // Remove newlines
  $output = addslashes($output);                     // Escape single quotes and backslashes

  // Output the JavaScript to log to the console
  echo "<script>console.log('PHP var_dump: {$output}');</script>";
}
