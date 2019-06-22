<?php
require_once 'init.php';

$itemsQuery=$cdb->prepare("
  SELECT id, itemname, done
  FROM todo
  WHERE usrname= :usrname
");

$itemsQuery->execute([
    'usrname'=>$_SESSION['username']
  ]);

$todo=$itemsQuery->rowCount() ? $itemsQuery : [];

//for debugging
//foreach ($todo as $item) {
//  echo $item['name'], '<br>';
//  print_r($item);
//}
?>

<html>
<head>
  <title>Kalam</title>

  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> <!-- including bootstrap-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Shadows+Into+Light&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"> </script>

</head>

<body>
  <nav class="navbar sticky-top navbar-dark bg-dark" role="navigation">
    <div class="container">
      <h1> Kalam   <img src="feather.svg" alt="$0"/> </h1>
      <form class="nv">
        <a href="home.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="logout.php">Logout</a>
      </form>
    </div>
  </nav>
  <div class="container">
    </br>
    <h2 align="center"> Welcome <?php echo $_SESSION['username']; ?>!</h2> <!-- Why is this variable undefined???-->

  <div class="sh-btns">
    <input type="button" value="Show" class="btn btn-quaternary" id="show"><!--more bootstrap buttons-->
    <input type="button" value="Hide" class="btn btn-quaternary" id="hide">
    <script>//Jquerry feature
    $(document).ready(function(){
      $("#hide").click(function(){
        $(".weatherapi").hide();
      });
      $("#show").click(function(){
        $(".weatherapi").show();
      });
    });
  </script>
  </div>
  </br>
  </br>
  <div class="weatherapi">
  </br>
  <input id="city"></input>
  <button class="btn btn-tertiary"id="getWeatherForcast">Get Weather</button>
  <div class="ShowWeatherForcast"></div>

  <script type="text/javascript">
    $(document).ready(function(){

      $("#getWeatherForcast").click(function(){

            var city = $("#city").val();
            var key  = '32719ee1243159758dd53b7383cdfbe3';

            $.ajax({ //JQuerry ajax method
              url:'http://api.openweathermap.org/data/2.5/weather',
              dataType:'json',
              type:'GET',
              data:{q:city, appid: key, units: 'metric'},

              success: function(data){
                var wf = '';
                $.each(data.weather, function(index, val){

                  wf += "</br><p><b>" +"The weather in " + data.name +" is:" + "</b></p>"+ data.main.temp + '&deg;C ' +
                  ' | ' + val.main + ", " + val.description

                  });

                 $(".ShowWeatherForcast").html(wf);
                }

              })

        });
      });
    </script>
     </div>

      <div class="list">
          <h3 align="center" class="header"> To Do List </h3>

          <?php if(!empty($todo)): ?>
          <ul class="items">
            <?php foreach($todo as $item):?>
              <li>
                <span class="item <?php echo $item['done'] ? 'done' : '' ?>"><?php echo $item['itemname']; ?> </span>
                <?php if(!$item['done']): ?>
                  <a href="markas.php?as=done&item=<?php echo $item['id']; ?>" class="done-button"> Mark as done </a>
                <?php else: ?>
                <a href="mark.php?as=done&item=<?php echo $item['id']; ?>" class="done-button"> Mark as undone </a>
                <?php endif; ?>
                <a href="del.php?item=<?php echo $item['id']; ?>" class="delete-button">Delete </a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <p>You haven't added any items yet!</p>
        <?php endif; ?>
          <form class="add-item" action="add.php" method="post">
            <input type="text" name="name" placeholder="Add an item to the todo list." class="input" autocomplete="off" required>
            <input type="submit" value="Add" class="btn btn-secondary"> <!--Bootstrap button component class-->
          </form>
      </div>
</div>
</body>

</html>
