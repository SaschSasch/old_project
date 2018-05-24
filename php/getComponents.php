<?
  $link=mysqli_connect("localhost", "root", "", "diplom");
  $result = mysqli_query($link,"SELECT max(level_number) as id, id_component, id_parent, level_number, name, photo FROM component group by id_component order by id desc ") or die(mysqli_error($link));
  while ($row = $result->fetch_assoc()) {
    $query = "SELECT count(*) as count, name FROM `styles` WHERE id_style in (select id_style from styles_signes where id_sign in (select id_sign from component_signes where id_component = ".$row['id_component'].")) group by id_style order by count desc";
    $result1 = mysqli_query($link, $query) or die(mysqli_error($link));

    while ($row1 = $result1->fetch_assoc()) {
      $row['styles'][] = $row1;
      // echo json_encode($row1);
    }
    $array[] = $row;
  }
  // var_dump($array);
  echo json_encode($array);
?>
