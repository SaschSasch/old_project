<?
    include('config/connect.php');

    $find = $_GET['find'];
    if (!$find) {
        echo json_encode("");
    }
    $result = mysqli_query($connection_link,"SELECT distinct * from `component`
                                            where name like '%".$find."%'") or die(mysqli_error($connection_link));
    while ($row = $result->fetch_assoc()) {
        $array[] = $row;
    }
    $result1 = mysqli_query($connection_link,"SELECT distinct * from `signes`
                                            where name like '%".$find."%'") or die(mysqli_error($connection_link));
    while ($row = $result1->fetch_assoc()) {
        $array[] = $row;
    }
    $result2 = mysqli_query($connection_link,"SELECT distinct * from `styles`
                                            where name like '%".$find."%'") or die(mysqli_error($connection_link));
    while ($row = $result2->fetch_assoc()) {
        $array[] = $row;
    }
    echo json_encode($array);
?>
