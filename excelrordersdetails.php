<?php 
// Load the database configuration file 
include('db.php'); 
 
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "REPORT OF ITEMS DETAILS_" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('ID', 'WORK ORDER NO', 'DATE', 'UNIT(SECTION)', 'REPORT BY', 'ACTION BY', 'TECHNICIAN ALLOTTED', 'COMPLETION DATE & TIME', 'LOCATION', 'NATURE OF COMPLAINT', 'REMARKS', 'IN-CHARGE'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
        $query=$conn->query("select * from `grievancecell`");
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['id'], $row['orderno'], $row['odatetime'], $row['unit'], $row['reportby'], $row['actionby'], $row['tecallotted'], $row['cdatetime'], $row['locationn'], $row['ncomplaint'], $row['remarks'], $row['incharge']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;