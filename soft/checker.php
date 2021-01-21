<?php

if( isset ( $_POST['start']))
{
    include("../config/db_connection.php") ;
    $id = $_POST['id1'] ;
    $query = "SELECT IS_STAR FROM all_cases WHERE `ALL_CASES_NO` = '$id'";
    $result = mysqli_fetch_assoc( mysqli_query( $con , $query )) ;
    $query = "" ;
    if( $result['IS_STAR'] == '1' )
    {
        $query = "UPDATE all_cases set IS_STAR = 0 where `ALL_CASES_NO` = '$id' " ;
    }
    else
    {
        $query = "UPDATE all_cases set IS_STAR = 1 where `ALL_CASES_NO` = '$id' " ;
    }
    $result = mysqli_query( $con , $query ) ;
    if( $result )
    {
        echo "ahasan" ;
    }
    else
    {
        echo ( mysqli_error( $con ) ) ;
    }
}


?>