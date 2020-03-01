<?php

include_once("conn/conexao.php");
$result_events = "SELECT id, title, start, end FROM eventos";
$resultado_events = mysqli_query($conn, $result_events);

while ($row = mysqli_fetch_array($resultado_events)) {
    echo $row['id'];
    echo $row['title'];
    echo $row['start'];
    echo $row['end'];
     
}
?>

groupId: '<?php echo $row['id']; ?>',