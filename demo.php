<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Teko|Yanone+Kaffeesatz');

#body {
  display: flex;
  flex-flow: column wrap;
  align-items: center;
}
h1, h3 {
  font-family: Teko;
  margin-bottom: 0;
}
#wrapper {
  display: flex;
  flex-flow: row wrap;
}
.inner-wrapper {
  text-align: center;
  margin-right: 10px;
}
.cta, .cta-2 {
  font-family: Yanone Kaffeesatz;
  display: inline-block;
  cursor: pointer;
  color: white;
  padding: 15px 10px;
  background-color: black;
  border: 2px solid black;
  text-transform: uppercase;
}
.cta a, .cta-2 a {
  color: white;
  text-decoration: none;
}
.cta:hover, .cta-2:hover {
  background-color: white;
} 
.cta:hover a, .cta-2:hover {
  color: black;
  text-decoration: none;
}
    </style>
</head>
<body>
<div id="body">
  <h1>Button To Download File</h1>
  <div id="wrapper">
    <div class="inner-wrapper">
      <h3>Just HTML</h3>
      <div class="cta">
        <a href="" target="_blank" download="">Download File</a>
      </div>
    </div>
    <div class="inner-wrapper">
      <h3>Javascript</h3>
      <div class="cta-2">
        Download File 2
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script>
    document.addEventListener('click', function() {
  var anchorElement = document.createElement('a');
  var fileName = 'file name';
  var fileLink = 'index.html';
  anchorElement.href = fileLink;
  anchorElement.download = fileName;
  anchorElement.target = '_blank';
  document.body.appendChild(anchorElement);
  console.log(anchorElement);
  anchorElement.click();
})
</script>