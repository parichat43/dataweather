<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<style>
    .card {
      background-color : #FFCDCD;
      width: 45%;
      margin: auto;
      margin-top: 20px;
      margin-bottom: 20px;
      padding-top: 30px;
      padding-bottom: 30px;
      border: 3px; width: 500px;
    }
    .container {
      padding: 2px 16px;
    }
    .showedata{
      padding-left: 23px;
      padding-bottom: 5px;
    }
    h3{
      padding-top: 15px;
   }
    .searchdata{
      padding-left: 23px;
    }

    </style>

<body>
   
  <div class="container">  
         <div class="card">
          <h2><b><center>Weather Card</center></b></h2>
        
          <div class="row">
            <a><input type="text" id="la" placeholder="Latitude" class="form-control" style="width: 190px; margin-left: 150px; margin-top: 20px;" > </a>
            <a><input type="text" id="long" placeholder="Longitude" class="form-control" style="width: 190px;margin-left: 150px;  margin-top: 20px; "></a>
            <a><button id="load" class="btn btn-primary btn-sm" style=" width: 120px; margin-top: 10px; margin-left: 185px;"><b>Load</b></button></a>
        </div>
         <br/>  

    <img src="https://cdn.pixabay.com/photo/2016/11/07/05/13/map-1804891_1280.jpg" alt="map" style="width:100%">

            <div class="showedata">      
            <h3>Weather <span id="name">At </span><br> </h3>
                <span id="sys_country">Country: </span><br>
                <span id="main_temp">Temp: </span> Celsius<br>
                <span id="main_temp_max">Temp max: </span> Celsius<br>
                <span id="main_temp_min">Temp min: </span> Celsius<br>
                <span id="humidity">Humidity: </span> %<br>
                <span id="sys_sunrise">Sunrise: </span> unix<br>
                <span id="sys_sunset">Sunset: </span> unix<br>
                <span id="wind_deg">Wind deg: </span> degree<br>
                <span id="wind_speed">Wind speed: </span> m/s<br>
                <span id="clouds">Cloud: </span> %<br>
              
            </div>
            <div class="searchdata">
              <h3>Weather at <span id="name1"> </span><br> </h3>
              Country: <span id="sys_country1"> </span><br>
              Temp: <span id="main_temp1"> </span> Celsius<br>
              Temp max: <span id="main_temp_max1"> </span> Celsius<br>
              Temp min: <span id="main_temp_min1"> </span> Celsius<br>
              Humidity: <span id="humidity1"> </span> %<br>
              Sunrise: <span id="sys_sunrise1"> </span> unix<br>
              Sunset: <span id="sys_sunset1"> </span> unix<br>
              Wind deg: <span id="wind_deg1"></span> degree<br>
              Wind speed: <span id="wind_speed1"> </span> m/s<br>
              Cloud: <span id="clouds1"> </span> %<br>
            </div>
          </div>
         </div>
    </div>  
          
 <script> 
   function loadweather(){ 
     $(".searchdata").hide();
     var url ="http://api.openweathermap.org/data/2.5/weather?lat=8.769789&lon=99.864247&appid=33786f69fe3e7bf115d7613f30438546&units=metric";
     
           $.get(url)
            .done((data)=>{
              console.log(data)
                $("#name").append(data.name);
                $("#main_temp").append(data.main.temp);
                $("#main_temp_max").append(data.main.temp_max);
                $("#main_temp_min").append(data.main.temp_min);
                $("#humidity").append(data.main.humidity);
                $("#sys_country").append(data.sys.country);
                $("#sys_sunrise").append(data.sys.sunrise);
                $("#sys_sunset").append(data.sys.sunset);
                $("#wind_deg").append(data.wind.deg);
                $("#wind_speed").append(data.wind.speed);
                $("#clouds").append(data.clouds.all);
                      })         
           .fail((xhr, status, err)=>{
                    console.log("error")
                });
                 
          }
   
   function searchweather(){ 
           $(".showedata").hide();
           $(".searchdata").show();
           var url ="https://api.openweathermap.org";
           var a = $("#la").val();
           var b = $("#long").val();

           url = url + "/data/2.5/weather?lat=" + a + "&lon=" + b +"&appid=33786f69fe3e7bf115d7613f30438546&units=metric"; 
           
            $.getJSON(url)
            .done((data)=>{
              console.log(data)
              $("#name1").append(data.name);
              $("#main_temp1").append(data.main.temp);
              $("#main_temp_max1").append(data.main.temp_max);
              $("#main_temp_min1").append(data.main.temp_min);
              $("#humidity1").append(data.main.humidity);
              $("#sys_country1").append(data.sys.country);
              $("#sys_sunrise1").append(data.sys.sunrise);
              $("#sys_sunset1").append(data.sys.sunset);
              $("#wind_deg1").append(data.wind.deg);
              $("#wind_speed1").append(data.wind.speed);
              $("#clouds1").append(data.clouds.all);

                      })         
           .fail((xhr, status, err)=>{
                    console.log("error")
                });
          }
         
    function remove(){
         $("#name1").empty();
         $("#main_temp1").empty();
         $("#main_temp_max1").empty();
         $("#main_temp_min1").empty();
         $("#humidity1").empty();
         $("#sys_country1").empty();
         $("#sys_sunrise1").empty();
         $("#sys_sunset1").empty();
         $("#wind_deg1").empty();
         $("#wind_speed1").empty();
         $("#clouds1").empty();

    }
    $(()=>{ 
            loadweather();
            $("#load").click(()=>{ 
               searchweather();
            });
            $("#load").click(()=>{
                remove();
            }); 
            
     });
   </script>        
  </body>
</html>