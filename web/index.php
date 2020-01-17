<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <title>Homepage (CS313)</title>
</head>

<body>
  <header>
    <h1>Homepage</h1>
    <a href="assignments.html"><b>Assignments Directory</b></a>
    <span> || </span>
    <a href="index_info.php">PHP Info</a>
    <hr/>
  </header>

  <div id="server_info">
    <button onclick="getPHPdata()">Server Info</button>
    <hr/>
  </div>

  <script>
    // SERVER_NAME, REQUEST_METHOD, REQUEST_TIME, REMOTE_PORT
    function getPHPdata() {
      serverBlock = document.getElementById("server_info");
      serverBlock.innerHTML = "<div>Server Name: " + "<?=echo $_SERVER['SERVER_NAME']?>" + "</div>"
      serverBlock.innerHTML += "<div>Remote Port: " + "<?=echo $_SERVER['REMOTE_PORT']?>" + "</div>"
      serverBlock.innerHTML += "<div>Request Method: " + "<?=echo $_SERVER['REQUEST_METHOD']?>" + "</div>"
      serverBlock.innerHTML += "<div>Request Time: " + "<?=echo $_SERVER['REQUEST_TIME']?>" + "</div>"
      serverBlock.style.displayTemplateColumns = " 50% 50%;";
    }
  </script>

</body>
</html>