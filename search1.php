<!DOCTYPE html>

<?php
include "connect.php";
$i = 0;
$rowcount = 0;
if (isset($_REQUEST['action'])) {

    if ($_REQUEST['action'] == 'sent') {
        $input_text = trim($_REQUEST['searchText']);
        if($input_text == "")
        {
            echo "<script>alert('Please input year');history.go(-1);</script>";
        }
        $sql = "SELECT * FROM Movies WHERE year = $input_text ORDER BY title";
        $result = mysqli_query($movies_db, $sql);
        $rowcount = mysqli_num_rows($result);
       
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CBB108018 - 郭明穎</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <div class="page">
        <div class="sidebar">

            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Search 0</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="search1.php">Search 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search2.php">Search 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search3.php">Search 3</a>
                </li>

            </ul>

        </div>
        <div class="container">
            <h3>Search 1</h3>
            <form>
                <div class="input-group mb-3">

                    <input type="text" name="searchText" class="form-control" id="itemInput" value="" placeholder="Year">
                    <input type="hidden" name="action" value="sent">
                    <input type="submit" value="Search" class="btn btn-outline-primary">

                </div>
            </form>
            <table class="table table-bordered">
                <thead align='center' valign="middle">
                    <tr>
                        <th>Title</th>
                        <th>Year</th>
                        <th>Length</th>
                        <th>Genre</th>
                        <th>Studio Name</th>
                        <th>Producer CID</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <th>Title</th>
                        <th>Year</th>
                        <th>Length</th>
                        <th>Genre</th>
                        <th>Studio Name</th>
                        <th>Producer CID</th>

                    </tr>
                 -->
                    <?php
                    if ($rowcount > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $title_arr[$i] = $row['title'];
                            $year_arr[$i] = $row['year'];
                            $length_arr[$i] = $row['length'];
                            $genre_arr[$i] = $row['genre'];
                            $studio_name_arr[$i] = $row['studioName'];
                            $producerCID_arr[$i] = $row['producerCID'];
                            echo "
                                    <tr>
                                        <th>$title_arr[$i]</th>
                                        <th>$year_arr[$i]</th>
                                        <th>$length_arr[$i]</th>
                                        <th>$genre_arr[$i]</th>
                                        <th>$studio_name_arr[$i]</th>
                                        <th>$producerCID_arr[$i]</th>
                
                                    </tr>";

                            $i++;
                        }
                    }else{

                    }

                    ?>
                </tbody>

            </table>

        </div>
    </div>


    <script src="./script.js"></script>


</body>

</html>