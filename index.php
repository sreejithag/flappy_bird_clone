<?php
   include("config.php");
   $qry="select * from score order by sc desc";
   $result = mysqli_query($db, $qry);
   $row1 = mysqli_fetch_assoc($result);
   $row2 = mysqli_fetch_assoc($result);
   $row3 = mysqli_fetch_assoc($result);
   $row4 = mysqli_fetch_assoc($result);
   $row5 = mysqli_fetch_assoc($result);
   ?>
<!DOCTYPE html>  
<html>
   <head>
      <meta charset="utf-8" />
      <title>Lazy Bird</title>
      <script type="text/javascript" src="phaser.min.js"></script>
      <script type="text/javascript" src="main.js"></script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style>
         .table td.fit, 
         .table th.fit {
         white-space: nowrap;
         width: 1%;
         body
         {
         width:1920px;
         background-color: #f8e0b3;
         height:1080px;
         }
         @media screen and (min-width: 500px) {
         body {
         width:420px;
         }
         }
         @media screen and (min-width: 800px) {
         body {
         width:720px;
         }
         }
         }
      </style>
   </head>
   <body>
      <div class="container" >
         <!-- Modal -->
         <div class="modal fade" id="signup" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <b>Enter your name </b>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <input name="username" id="username" class="form-control form-control-sm" id="inputlg" type="text">
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" id="start" class="btn btn-success">Start</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container">
         <!-- Modal -->
         <div class="modal fade" id="highscore" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h2 style="color:red">
                        GAME OVER!!
                     </h2>
                     <p id="warning"></p>
                  </div>
                  <div class="modal-body">
                     <div >
                        <h4>Leader Board</h4>
                        <table class="table table-condensed,col-md-3">
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>score</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td><?php echo $row1['name'];?></td>
                                 <td><?php echo $row1['sc'];?></td>
                              </tr>
                              <tr>
                                 <td><?php echo $row2['name'];?></td>
                                 <td><?php echo $row2['sc'];?></td>
                              </tr>
                              <tr>
                                 <td><?php echo $row3['name'];?></td>
                                 <td><?php echo $row3['sc'];?></td>
                              </tr>
                              <tr>
                                 <td><?php echo $row4['name'];?></td>
                                 <td><?php echo $row4['sc'];?></td>
                              </tr>
                              <tr>
                                 <td><?php echo $row5['name'];?></td>
                                 <td><?php echo $row5['sc'];?></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <p id="score"></p>
                  </div>
                  <div class="modal-footer">
                     <p id="data" style="align:left"></p>
                     <button type="button" id="restart" class="btn btn-primary">Restart</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>