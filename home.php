<?php
include_once("conn/conexao.php");
$result_events = "SELECT id, title, color,  start, end FROM eventos";
$resultado_events = mysqli_query($conn, $result_events);
?>

<!DOCTYPE php>
<html lang="pt-br">

<head>
    <meta charset='utf-8' />

    <!-- CSS Styles -->
    <link href='css/core.css' rel='stylesheet' />
    <link href='css/personalizado.css' rel='stylesheet' />
    <link href='css/daygrid.css' rel='stylesheet' />
    <link href='css/timegrid.css' rel='stylesheet' />
    <link href='css/list.css' rel='stylesheet' />

    <!-- Java Script -->
    <script src='js/core.js'></script>
    <script src='js/interaction.js'></script>
    <script src='js/daygrid.js'></script>
    <script src='js/timegrid.js'></script>
    <script src='js/rrule.js'></script>
    <script src='js/list.js'></script>
    <script src='js/rruleMain.js'></script>
    <script src='js/pt-br.js'></script>
</head>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var initialLocaleCode = 'pt-br';
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            locale: initialLocaleCode,
            defaultDate: new Date(),
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectMirror: true,
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                <?php
                while ($row = mysqli_fetch_array($resultado_events)) {
                ?> {
                        groupId: '<?php echo $row['id']; ?>',
                        title: '<?php echo $row['title']; ?>',
                        start: '<?php echo $row['start']; ?>',
                        end: '<?php echo $row['end']; ?>',
                        color: '<?php echo $row['color']; ?>',
                    },
                <?php
                }
                ?>
            ]
        });
        calendar.render();
    });
</script>

<body>

    <div id='calendar'></div>

</body>

</html>