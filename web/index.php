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
  </header>

  <hr/>

  <div id="server_info">
    <button onclick="getPHPdata()">Server Info</button>
  </div>

  <hr/>

  <div id="personal_info">
    <img src="me.jpg" alt="Tim Womble, circa 2015"/>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>

  <hr/>

  <script>
    // SERVER_NAME, REQUEST_METHOD, REQUEST_TIME, REMOTE_PORT
    function getPHPdata() {
      serverBlock = document.getElementById("server_info");
      serverBlock.innerHTML = "<div>Server Name: " + "<?=$_SERVER['SERVER_NAME']?>" + "</div>"
      serverBlock.innerHTML += "<div>Remote Port: " + "<?=$_SERVER['REMOTE_PORT']?>" + "</div>"
      serverBlock.innerHTML += "<div>Request Method: " + "<?=$_SERVER['REQUEST_METHOD']?>" + "</div>"
      serverBlock.innerHTML += "<div>Request Time: " + "<?=$_SERVER['REQUEST_TIME']?>" + "</div>"
      serverBlock.style.displayTemplateColumns = " 50% 50%;";
    }
  </script>

</body>
</html>