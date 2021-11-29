<!DOCTYPE html>
    <head>
        <title>Upload Question Paper</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form action="add_file.php" method="post" enctype="multipart/form-data">
            <label for="Branch">Enter Branch :</label><input type="text" id="Branch" name="Branch"><br>
            <label for="Year">Enter Year :</label><input type="number" id="Year" name="Year"><br>
            <label for="Subject">Enter Subject :</label><input type="text" id="Subject" name="Subject"><br>
            <label for="Roll_no">Enter Roll Number :</label><input type="text" id="Roll_no" name="Roll_no"><br>            
            <label for="uploaded_file">Upload Question Paper :</label><input type="file" id="uploaded_file" name="uploaded_file"><br>
            <input type="submit" value="Upload file" name = "Submit">
        </form>
        <p>
            <a href="list_files.php">See all files</a>
        </p>
    </body>
    </html>