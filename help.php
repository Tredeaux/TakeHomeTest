<?php

    echo "<Strong>
        Welcome to Tredeaux's API
            </strong><br><br>";

    echo "<strong>First Time Setup;</strong><br>
            If you are running to API for the first time then run <strong>localhost/init.php</strong><br>
            to Setup the database.<br> For ease of testing the Database is using root user with no password,<br>
            this is unsecure but for testing purposes it's the easiest to set up for a quick view.";

    echo "<br><br>
        <strong>Use:</strong><br>
        To add Client Data use <a href='addClient.php'><strong>localhost/addClient.php?</strong></a> followed by the parameters <br>
        Some parameteres are required and the info will be provided on /addClient.php on what is missing.
        <br><br>
        Required fields:<br>
        id, name, surname, idNumber, telephoneNumber1, language, male, emailAddress.
        <br><br>
        The fields will be converted to proper formats and checked, if the data is valid it will be added to the Database.
        <br>
        To view the database click <a href='http://localhost/phpmyadmin/sql.php?db=apidb&table=clients&pos=0'>here</a> or click on XAMPP";

    echo "<br>Support:<br><br>
        For support or bug reports contact <a href='mailto:tredeaux.pitout@gmail.com'>tredeaux.pitout@gmail.com</a>";
?>