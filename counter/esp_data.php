<!DOCTYPE html>
<html>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>

  <body>
      <?php
      /*
      * 2023-05-01 grantamaral@gmail.com
      * modified from: Rui Santos
      * project details at https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
    */

      $servername = "localhost";
      $dbname = "birdbox";
      $username = "myUser";
      $password = "myPass";
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT id, sensor, location, value1, value2, value3, reading_time FROM SensorData ORDER BY id DESC";
      echo '<div>HTTP request from G:\\Users\grant\Arduino\post_data_log\post_data_log.ino<br>
        <a href="https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
" target="_blank">randomnerd post data</a><hr></div>';
        echo '<table cellspacing="5" cellpadding="5">
          <tr> 
            <td>ID</td> 
            <td>Sensor</td> 
            <td>Location</td> 
            <td>Value 1</td> 
            <td>Value 2</td>
            <td>Value 3</td> 
            <td>Timestamp</td> 
          </tr>';

      if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
          $row_id = $row["id"];
          $row_sensor = $row["sensor"];
          $row_location = $row["location"];
          $row_value1 = $row["value1"];
          $row_value2 = $row["value2"];
          $row_value3 = $row["value3"];
          $row_reading_time = $row["reading_time"];
          // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
          //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));

          // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
          //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));

          echo '<tr> 
                    <td>' . $row_id . '</td> 
                    <td>' . $row_sensor . '</td> 
                    <td>' . $row_location . '</td> 
                    <td>' . $row_value1 . '</td> 
                    <td>' . $row_value2 . '</td>
                    <td>' . $row_value3 . '</td> 
                    <td>' . $row_reading_time . '</td> 
                  </tr>';
        }
        $result->free();
      }

      $conn->close();
      ?>
      </table>
  </body>

</html>
