<?php
$title = "Dashboard";
include "header.php";
include "config.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Embedded PDF</title>
</head>
<body>
    
    <object data="agent_profiles/Partner Training pdf.pdf" type="application/pdf" width="100%" height="100%">
        <p>Your browser does not support PDFs. <a href="path_to_your_pdf.pdf">Download the PDF</a></p>
    </object>
</body>
</html>


























<?php
include "footer.php";
?>