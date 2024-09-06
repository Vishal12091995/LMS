<?php
// Start the session
session_start();

// Make sure no output is sent before the header
session_unset();
session_destroy();

// Redirect to index.php
header("Location: index.php");
exit(); // Ensure no further code is executed
?>
