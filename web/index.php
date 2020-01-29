<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <title>Homepage (CS313)</title>
</head>

<body>
  <header>
    <h1>Homepage for CS313</h1>
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
    <p>My name is Tim Womble. I'm 24 years old and this is my 5th semester at BYUI. My current major is Computer Science, though I was leaning towards Computer Engineering for a while. Actually, just this semester I've become fairly interested in UI development through the Human-Computer Interactions course I'm taking. <br/><br/> I'm from Craig, CO (look it up), though I've lived in Michigan and Texas before and I was born in American Fork, UT. I'm the oldest of 5 children and my sister Jordan is also here studying at BYUI, majoring in Zoology.</p>
  </div>

  <hr/>

  <div id="favorites">
    <div>
      <img src="Pictures/dqviii.jpg" alt="Dragon Quest VIII: Journey of the Cursed King"/>
      <div>Favorite Video Game: Dragon Quest VIII</div>
    </div>
    <div>
      <img src="Pictures/LotR Books.jpg" alt="The Hobbit & The Lord of the Rings"/>
      <div>Favorite Book(s): The Lord of the Rings</div>
    </div>
  </div>

  <script>
    // SERVER_NAME, REQUEST_METHOD, REQUEST_TIME, REMOTE_PORT
    function getPHPdata() {
      serverBlock = document.getElementById("server_info");
      serverBlock.innerHTML = "<div>Server Name: " + "<?=$_SERVER['SERVER_NAME']?>" + "</div>"
      serverBlock.innerHTML += "<div>Remote Port: " + "<?=$_SERVER['REMOTE_PORT']?>" + "</div>"
      serverBlock.innerHTML += "<div>Request Method: " + "<?=$_SERVER['REQUEST_METHOD']?>" + "</div>"
      serverBlock.innerHTML += "<div>Request Time: " + "<?=$_SERVER['REQUEST_TIME']?>" + "</div>"
      serverBlock.style.cssText += "grid-template-columns: 50% 50%"
    }
  </script>

</body>
</html>

<!-- 
  DATABASE_URL='postgres://pwsxizfirgaqoi:2cafd59bf9b0a7dd40e798e8952ab5b2f8f099ae9b8f531f78bcca381ec9aadd@ec2-52-71-122-102.compute-1.amazonaws.com:5432/da8a2pin4pjpod' 

  also:
    pgweb --url postgres://pwsxizfirgaqoi:2cafd59bf9b0a7dd40e798e8952ab5b2f8f099ae9b8f531f78bcca381ec9aadd@ec2-52-71-122-102.compute-1.amazonaws.com:5432/da8a2pin4pjpod

-->