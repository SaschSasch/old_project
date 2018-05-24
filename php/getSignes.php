<?
  $link=mysqli_connect("localhost", "root", "", "DPr"); //feeeeeeeee
  $result = mysqli_query($link,"select max(parent.Key_Id) as parent.Key_Id, parent.Name_ru, childs.Key_id, childs.Value_ru from Keyk parent, Key_Value childs where parent.Key_Id = childs.Key_Id group by parent.Key_Id order by parent.Key_Id desc ") or die(mysqli_error($link));
  while ($row = $result->fetch_assoc()) {
    $array[] = $row;
  }
  var_dump($array);
  echo json_encode($array);
?>
