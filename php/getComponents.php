<!--
    include('config/connect.php');

    $result = mysqli_query($connection_link,  <!-- "SELECT max(level_number) as id, Nomenclature_Id, ParentNomenclature_Id, Name_ru
                                                FROM Taxon
                                                group by Nomenclature_Id
                                                order by id desc ") or die(mysqli_error($connection_link));
    while ($row = $result->fetch_assoc()) {
        $query =   "SELECT count(*) as count, name
                    FROM `Taxon` WHERE Nomenclature_Id in (
                        select Nomenclature_Id from Taxon_KeyValue
                        where KeyValue_Id in (
                            select KeyValue_Id
                            from Taxon_KeyValue
                            where Nomenclature_Id = ".$row['Nomenclature_Id']."
                        )
                    )
                    group by Nomenclature_Id
                    order by count desc"; - ->
        $result1 = mysqli_query($connection_link, $query) or die(mysqli_error($connection_link));

        while ($row1 = $result1->fetch_assoc()) {
            $row['Taxon'][] = $row1;
            // echo json_encode($row1);
        }
        $array[] = $row;
    }
    // var_dump($array);
    echo json_encode($array);
?>
-->

<?
    include('config/connect.php');
    $result = mysqli_query($connection_link,"select Nomenclature_Id as 'id', ParentNomenclature_Id as 'parent', Name_ru as 'name' from DPr.Taxon
                              order by id") or die(mysqli_error($connection_link));
    while ($row = $result->fetch_assoc()) {
        $array[] = $row;
    }
    echo json_encode($array);
?>
