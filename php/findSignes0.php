<?
    include('config/connect.php');

    $find = $_GET['ask'];

    if (!$find) {
        echo json_encode("");
    }
    $query =   "SELECT t1.Name_ru as name, count(t2.Nomenclature_Id) as count
                from Taxon as t1, Taxon_Value as t2
                where t2.KeyValue_Id in (".$find.")
                and t1.Nomenclature_Id=t2.Nomenclature_Id
                group by name";
    // echo $query;
    $result = mysqli_query($connection_link,$query) or die(mysqli_error($connection_link));
    while ($row = $result->fetch_assoc()) {
        $array[] = $row;
    }
    echo json_encode($array);
?>
