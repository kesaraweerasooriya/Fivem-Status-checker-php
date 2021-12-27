<?php

include 'config.php';

$string = file_get_contents("http://".$server_IP.":".$server_port."/info.json"); //Fetching server data
$server_info = json_decode($string, true);




$stringp = file_get_contents("http://".$server_IP.":".$server_port."/players.json"); //Fetching players data
$player_info = json_decode($stringp, true);
 $player_count = count($player_info);
 

  if (!$srvcon = @fsockopen($server_IP, $server_port)) // attempt to connect
        {
            $server_status = 'Offline <i class="fa fa-circle" style="color:red; background-color:red; font-size: 10px;"></i>';
        }
        else
        {
            $server_status = 'Online <i class="fa fa-circle" style="color:green; background-color:green;font-size: 10px;"></i>';
            if ($srvcon)
            {
                @fclose($srvcon); //close connection
            }
        } 

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  


    <title>Fivem Server Status</title>

 
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

  
 
  </head>

  <body>

  

    <main role="main">
  <section class="jumbotron text-center">
        <div class="container">
         
          <p class="lead text-muted">Fivem Simple Server Info Tracker Created By Kesara Weerasooriya (kaizer).</p>
          
        </div>
      </section>


<div class="text-center">
     <h1 class="card-title">Server Info</h1>
</div>
      <div class="py-5 bg-light">
        <div class="container">

          <div class="row">
            <div class="col-md-12">
              <div class="card text-center">
  <div class="card-header">
   <?php echo $server_name;?> is <?php echo $server_status;?>
  </div>
  <img src="<?php echo  $server_info['vars']['banner_detail'];?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h3 class="card-title"><?php echo $server_name;?></h3>
    <h5 class="card-title">Tags : <?php echo  $server_info['vars']['tags'];?></h5>
   

    <a href="<?php echo $server_connect;?>" class="btn btn-outline-success">Connect</a>
  </div>
  <div class="card-footer text-muted">
     <b>Players :- <?php echo $player_count ?>/<?php echo  $server_info['vars']['sv_maxClients'];?></b>
  </div>
</div>
            </div>
            
           

          
            
          
           

            
           
          </div>
        </div>
       
      </div>



 <div class="text-center">
     <h1 class="card-title">Player Info</h1>
</div>

    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Ping</th>
      
    </tr>
  </thead>
  <tbody>
   
      <?php 
       foreach ($player_info as $row) {
   echo '<tr><td>'.$row["id"].'</td>';
   echo '<td>'.$row["name"].'</td>';
   echo '<td>'.$row["ping"].'</td>';
  echo '</tr>';
 }
      
     ?>
    
  
  
  </tbody>
</table>

    </main>



   
   
  </body>
</html>
