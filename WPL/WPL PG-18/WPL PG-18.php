<!DOCTYPE html>
<html>
<head>
    <title>Book Inventory</title>
</head>
<body>

<div id="regform">
    <h1>Book Inventory System</h1>
    <h3>Book Details Entry Form</h3>
    
    <form name="bookForm" action="WPL PG-18.php" method="post">
        
        <label for="book_id">Book ID:</label>
        <input type="text" id="book_id" name="book_id" required> <br><br>
        
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required> <br><br>
        
        <label for="authors">Authors:</label>
        <input type="text" id="authors" name="authors" required> <br><br>
        
        <label for="edition">Edition:</label>
        <input type="text" id="edition" name="edition" > <br><br>
        
        <label for="publisher">Publisher:</label>
        <input type="text" id="publisher" name="publisher" > <br><br>
        
        <input type="submit" name="submit_insert" value="Submit"><br><br>
    </form>

    <hr>
    
    <h4>Search Book by Author</h4>
    <form name="searchForm" action="WPL PG-18.php" method="post">
        <label for="search_author">Author Name:</label>
        <input type="text" name="search_author_name" required>
        <input type="submit" name="search_book" value="Search"><br><br>
    </form>

    <?php
    $conn = mysqli_connect("localhost","root","","test"); 
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully<br>"; 

    if (isset($_POST['submit_insert'])) {
        
        $book_id = $_POST['book_id'];
        $title = $_POST['title'];
        $authors = $_POST['authors'];
        $edition = $_POST['edition'];
        $publisher = $_POST['publisher'];

        echo " The values are: ".'<br>';
        echo "Book ID: ".$book_id.'<br>';
        echo "Title: ".$title.'<br>';
        echo "Authors: ".$authors.'<br>';
        
        $sql = "INSERT INTO books (book_id, title, authors, edition, publisher) 
                VALUES ('$book_id', '$title', '$authors', '$edition', '$publisher')";
        
        if (mysqli_query($conn, $sql)) {
            echo "<br><b>New record created successfully</b><br>";
        } else {
            echo "<br><b>Error:</b> " . $sql . "<br>" . mysqli_error($conn) . "<br>";
        }
    } 

    if(isset($_POST['search_book'])) {
        
        $search_author_name = $_POST['search_author_name'];
        
        $sql = "SELECT book_id, title, authors, edition, publisher FROM books 
                WHERE authors LIKE '%$search_author_name%'";
        
        $res = mysqli_query($conn, $sql);
        $totRows = mysqli_num_rows($res);

        echo "<h2>Search Results</h2>";
        echo "Searched for Author: <b>$search_author_name</b><br>";

        if($totRows == 0) { 
            echo "<b>No records found!</b><br>"; 
        } else {
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>Book ID</th><th>Title</th><th>Authors</th><th>Edition</th><th>Publisher</th></tr>";
            
            while($row = mysqli_fetch_assoc($res)) {
                echo "<tr>";
                echo "<td>".$row["book_id"]."</td>";
                echo "<td>".$row["title"]."</td>";
                echo "<td>".$row["authors"]."</td>";
                echo "<td>".$row["edition"]."</td>";
                echo "<td>".$row["publisher"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    } 
    
    mysqli_close($conn); 
    ?>
</div> 

</body>
</html>