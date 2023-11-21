<?php
       include_once '../model/database.php';
    //    include_once '../model/datafieldmodel.php';  
    //    include_once '../model/session.php'; 

        if (isset($_POST['AddComment'])) {
            $comment = $_POST['comment'];

            // Insert the comment into the faq_table
            $sqlInsertComment = "INSERT INTO faq_table (comment) VALUES (:comment)";
            $statement = $db->prepare($sqlInsertComment);
            $statement->execute(array(':comment' => $comment));

            // Provide a success message
            echo "<p style='color: green'><b>Comment added successfully</b></p>";
        }

?>



<!DOCTYPE html>
<html>

<head>
    <title>FAQ</title>
</head>

<body>

    <fieldset>
        <legend>
            <h2>Career Panel</h2>
        </legend>
        <pre>
            <a href="add_career.php"><u>Add Career</u></a>
            <a href="edit_career.php"><u>Edit Career</u></a>
            <a href="delete_career.php"><u>Delete Career</u></a>
            <a href="faq.php"><u>FAQ</u></a>
        </pre>
    </fieldset>

    <fieldset>
        <legend>
            <h2>FAQ Section</h2>
        </legend>

        <!-- Form to add comments -->
        <form action="faq.php" method="post">
            <label for="comment">Comment:</label>
            <input type="text" name="comment" id="comment">
            <button type="submit" name="AddComment">Add Comment</button>
        </form>



        <!-- Display comments and their answers -->
        <table border="1">
            <thead>
                <tr>
                    <th>Comment</th>
                    <th>Answer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlSelectComments = "SELECT * FROM faq_table";
                $statement = $db->query($sqlSelectComments);
                $comments = $statement->fetchAll(PDO::FETCH_ASSOC);

                foreach ($comments as $comment) {
                    $answer = "Your answer goes here."; // Replace with the actual logic to generate answers
                    echo "<tr>";
                    echo "<td>" . $comment['comment'] . "</td>";
                    echo "<td>" . $answer . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </fieldset>
    <?php 
        if(!empty($form_errors)) echo "<p>Status:</p>";
        if(!empty($form_errors)) echo show_errors($form_errors);
        // var_dump($_SESSION);
         ?>
</body>

</html>