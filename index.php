<?php
require_once 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Строительная компания: информация о сотрудниках</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript">
		function tableSorting() {
          var table;
          var row;
          var changing;
          var a;
          var b;
          var c;
          var shouldChange;
          table = document.getElementById("workerstable_id");
          changing = true;
          while (changing) {
            changing = false;
            row = table.getElementsByTagName("TR");
            for (a = 1; a < (row.length - 1); a++) {
              shouldChange = false;
              b = row[a].getElementsByTagName("TD")[1];
              c = row[a + 1].getElementsByTagName("TD")[1];
              if (b.innerHTML.toLowerCase() > c.innerHTML.toLowerCase()) {
                shouldSwitch = true;
                break;
              }
            }
            if (shouldSwitch) {
              row[a].parentNode.insertBefore(row[a + 1], row[a]);
              changing = true;
            }
        }
    }
	</script>
</head>
<body>
	<center>
		<h1>Наши сотрудники:</h1>
		<table id="workerstable_id" class="table">
			<thead>
		 		<tr>
			<th>ID</th>
			<th><button onclick="tableSorting();">ФИО</button></th>
			<th>Должность</th>
			<th>Дата рождения:</th>
			<th>Номер телефона:</th>
				</tr>
			</thead>
		
		<?php
			$workers = mysqli_query($connection, "SELECT * FROM `worker`");
      $workers = mysqli_fetch_all($workers);
			foreach ($workers as $worker) {
				?>
				<tbody>
					<tr>
					<td><?= $worker[0] ?></td>
					<td><?= $worker[1] ?></td>
					<td><?= $worker[2] ?></td>
					<td><?= $worker[3] ?></td>
					<td><?= $worker[4] ?></td>
					</tr>
				</tbody>

				<?php
			}
		?>
	</table>
	</center>
</body>
</html>