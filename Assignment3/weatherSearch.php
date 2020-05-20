
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<script type = "text/javascript">

    $(document).ready( function(){
        $("#btn").click(function(){

            var zip = $("#zip").val();
            if(!(/^([0-9]{5})(?:[-\s]*([0-9]{4}))?$/.test(zip))){
                x = "Invalid zip";
                $("#B").html(x);
                return;
            }
             		"GET",

                $.ajax({
                    url: 		"weather-0.php",
                    data: 		"zip="+zip,
                    beforeSend: function(){
                        $("#B").html("<div id=\"box\"></div>");                },
                    error: 	 function(xhr, status, error) {
                        alert( "Error Mesaage:  \r\nNumeric code is: "  + xhr.status + " \r\nError is " + error);   },
                    success: 	 function(result){

                        r = JSON.parse(result);

                        let unix_timestamp = r.sys.sunrise;
                        var date = new Date(unix_timestamp * 1000);
                        var hours = date.getHours();
                        var minutes = "0" + date.getMinutes();
                        var seconds = "0" + date.getSeconds();
                        var formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);

                        res =  "<br>City: "		               + r.name +  " "			          +
                               "<br>Temperature: "             + r.main.temp + "&deg;C "          +
                               "<br>Weather: " 	               + r.weather[0].main                +
                               "<br>Coordinates(Lat, Long): "  + r.coord.lat +", " + r.coord.lon +
                               "<br>Description: "             + r.weather[0].description         +
                               "<br>Humidity: "                + r.main.humidity                  + "%"+
                               "<br>Wind Speed: "              + r.wind.speed                     + "m/s"+
                               "<br>Sunrise/epoch: "           + formattedTime + " AM"
                        ;

                        $("#B").html(res);
                    }
                });
        });
    });
</script>
<style>


    #box {

        width: 100px; height: 100px;

        border: 20px solid #aaaaaa;

        border-top: 20px solid red;
        border-radius: 50%;
        animation: AAA 2s linear infinite;
    }


    @keyframes AAA {
        0%     {transform: rotate(0deg)     ;   }
        100%   {transform: rotate(360deg)   ;   }
    }

</style>


<h2> Weather Report</h2>
<input 	id = "zip" type = "text" name = "zip" autocomplete="off" >
<button id = "btn" type = "button">REQUEST WEATHER</button><br><br>
<div    id = "B" class="box"></div>
