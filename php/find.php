<?
  // echo json_encode($_GET['find']);
  $find = $_GET['find'];
  if (!$find) {
    echo json_encode("");
  }
  // echo json_encode($find);
  $link=mysqli_connect("localhost", "root", "", "diplom");
  $result = mysqli_query($link,"SELECT distinct * from `component` where name like '%".$find."%'") or die(mysqli_error($link));
  while ($row = $result->fetch_assoc()) {
    $array[] = $row;
  }
  $result1 = mysqli_query($link,"SELECT distinct * from `signes` where name like '%".$find."%'") or die(mysqli_error($link));
  while ($row = $result1->fetch_assoc()) {
    $array[] = $row;
  }
  $result2 = mysqli_query($link,"SELECT distinct * from `styles` where name like '%".$find."%'") or die(mysqli_error($link));
  while ($row = $result2->fetch_assoc()) {
    $array[] = $row;
  }
  echo json_encode($array);
?>
