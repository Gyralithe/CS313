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

  <script>
    var hyperlinks = document.getElementsByTagName("a");
    for (link in hyperlinks) {
      link.addEventListener("onmouseover", showBox(this));
      link.addEventListener("onmouseout", hideBox(this));
    }

    function showBox(element) {
      element.style.backgroundColor = "#AAC8FF";
    }

    function hideBox(element) {
      element.style.backgroundColor = "transparent";
    }
  </script>

</body>
</html>