<?
  $find = $_GET['ask'];
  // echo $find;
  if (!$find) {
    echo json_encode("");
  }
  $link=mysqli_connect("localhost", "root", "", "diplom");
  $query = "SELECT table1.name as name, table1.photo as photo, count(table2.id_style) as count from styles as table1, styles_signes as table2 where table2.id_sign in (".$find.") and table1.id_style=table2.id_style group by name";
  // echo $query;
  $result = mysqli_query($link,$query) or die(mysqli_error($link));
  while ($row = $result->fetch_assoc()) {
    $array[] = $row;
  }
  // var_dump($array);
  echo json_encode($array);
?>
