<?
    include('config/connect.php');

    mysqli_query($connection_link, "set @cnt = (select count(*) from DPr.Keyk)");
    $result = mysqli_query($connection_link,"select Key_Id as 'id', ParentKey_Id as 'parent', Name_ru as 'name' from DPr.Keyk
                                union
                                select KeyValue_Id + @cnt as 'id', Key_Id as 'parent', Value_ru as 'name' from DPr.Key_Value
                                order by id") or die(mysqli_error($connection_link));
    while ($row = $result->fetch_assoc()) {
        $array[] = $row;
    }
    echo json_encode($array);
?>
