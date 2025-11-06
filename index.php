<?php
// Tệp index gốc — xử lý định tuyến hoặc điều hướng mặc định

// Nếu có .htaccess thì về sau Apache sẽ rewrite, nhưng để an toàn ta tự điều hướng:
header("Location: views/index.php");
exit;