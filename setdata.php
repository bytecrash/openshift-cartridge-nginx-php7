 ‎    <form action="<?php $_PHP_SELF ?>" method="POST">‎
  ‎ ‎
  ‎        Name: <input type="text" name="name">‎
  ‎        Phone: <input type="text" name="phone">‎
  ‎ ‎      address:  <input type="text" name="address">
           bread : <input type="text" name="bread">‎
           count: <input type="text" name="count">‎‎
  ‎        <input type="submit">‎
  ‎    </form>
<?php

    $sitename = "http://localhost/";
     $hostname = "sql208.adfreehost.ir";
    $username = "adfr_20066596";
    $password = "s5f4062v";
    $database = "adfr_20066596_noun";

   $error = array();
       if( isset( $_POST['name'] )  && ( !empty( $_POST['name'] ) )  &&
        isset( $_POST['phone'] )  && ( !empty( $_POST['phone'] ) )  &&
        isset( $_POST['address'] )   && ( !empty( $_POST['address'] )) &&
         isset( $_POST['bread'] )   && ( !empty( $_POST['bread'] ))&&isset( $_POST['count'] )   && ( !empty( $_POST['count'] ))
         )
    {
     $name=$_POST['name'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $bread=$_POST['bread'];
    $count=$_POST['count'];

            $query= "INSERT INTO bread(name, phone,  address, bread,count) " .
                    "VALUES('".$name."', '".$phone."', '".$address."', '".$bread."', '".$count.
                    "')";
            $connect = @mysqli_connect( $hostname , $username , $password , $database );
            if( $connect )
            {
                @mysqli_query( $connect , "SET CHARACTER SET utf8;" );

                @mysqli_query( $connect , $query );

                if( @mysqli_affected_rows( $connect ) > 0 )
                {
                    $error['error'] = "done";
                }
                else
                {
                    @unlink( $location );

                    $error['error'] = "failure_inserting_database!";
                }
            }
            else
            {
                @unlink( $location );

                $error['error'] = "failure_connecting_database";
            }

    }
    else
    {
         $error['error'] = "failure_post";
    }

    die ( json_encode( $error['error'] ) );

?>
‎
