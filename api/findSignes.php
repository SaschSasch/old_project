<?
    include('config/connect.php');

    $find = $_GET['ask'];

    if (!$find) {
        echo json_encode("");
    }
    $parsed = explode(",", $find);
    
	$result1 = mysqli_query($connection_link, "select count(*) as val from DPr.Keyk");
    while ($row = $result1->fetch_assoc()) {
        $preCorrect[] = $row;
    }
    $correct = intval($preCorrect[0]['val']);
    $preValues = array_map(function($n) use ($correct) {
        return intval($n) - $correct;
    }, $parsed);
    $preValues = array_filter($preValues, function($n) {
        return intval($n) > 0;
    });
    $values = implode(",", $preValues);
    $query =   "select TV.Nomenclature_Id as id, T.Name_ru as name, T.Description as description, count(TV.Nomenclature_Id) as count,
                R.Source as pic
                from Taxon_Value as TV, Taxon as T, Resource as R
                where TV.KeyValue_Id in (".$values.") and T.Nomenclature_Id = TV.Nomenclature_Id and R.Resource_Id = (
                	select Resource_Id from Resource_Taxon as RT where T.Nomenclature_Id = RT.Nomenclature_Id limit 1
                )
                group by TV.Nomenclature_Id, R.Source";
    // echo $query;
    $result = mysqli_query($connection_link,$query) or die(mysqli_error($connection_link));
    while ($row = $result->fetch_assoc()) {
        $array[] = $row;
    }
    echo json_encode($array);
?>
