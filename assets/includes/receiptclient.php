




<!-- Main -->
<div id="main">

<!-- Content -->
    <section id="content" class="main">

        <!-- Text -->
        <!-- Form -->
            <section>
                <form method="post" action="add_client-config.php">
                    <div class="row gtr-uniform">

                    
                        <div class="col-12">
                            <h2>Client</h2>
                        </div>

                        <?php
                        
                        $con = mysqli_connect("localhost", "root", "", "id17946631_pars");
                        
                           
                            
                            $result = mysqli_query($con,"SELECT clientFirstName, clientMiddleName, clientLastName, clientNationality, clientGender, flight.flightNumber, flightSeatNumber, flightSeatClass, flightOrigin, flightDestination, timeDepartOrigin, timeArriveDestination FROM client INNER JOIN flightseat ON client.clientID = flightseat.clientID INNER JOIN flight ON flightseat.flightNumber = flight.flightNumber");
                            
                            


                            while($row=mysqli_fetch_array($result))
                            {
                            
                        ?>

                         <div class="col-4 col-12-xsmall"> 
                            <h2>First Name: <?= $row["clientFirstName"]; ?> </h2>
                            
                        </div>
                        <div class="col-4 col-12-xsmall">	
                            <h2>Middle Name: <?= $row["clientMiddleName"]; ?> </h2>
                            
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <h2>Last Name: <?= $row["clientLastName"]; ?> </h2>
                            
                        </div>
                        
                        <div class="col-6 col-12-xsmall">
                            <h2>Nationality: <?= $row["clientNationality"]; ?> </h2>
                            
                        </div>
                        
                        <div class="col-6">
                            <h2>Gender: <?php if ($row["clientGender"] == 1)
                                                echo "Male";
                                                else
                                                echo "female"; ?>
                                                </h2>
                            
                        </div>
                       

                       
                        <div class="col-7 col-12-xsmall">
                            <h2>Flight No.:  <?= $row["flightNumber"];?></h2>
                        </div>
                        
                        <div class="col-6 col-12-xsmall">
                            
                            <h2>Seat No.: <?= $row["flightSeatNumber"];?></h2>
                            
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <h2>Class Type: <?= $row["flightSeatClass"];?></h2>
                            
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <h2>Origin: <?= $row["flightOrigin"];?></h2>
                            
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <h2>Destination: <?= $row["flightDestination"];?></h2>
                            
                        </div>
                        
                        <div class="col-6 col-12-xsmall">
                            <h2>Departure Time: <?= $row["timeDepartOrigin"];?></h2>
                            
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <h2>Arrival Time: <?= $row["timeArriveDestination"];?></h2>
                            
                        </div>
                            
                        <?php
                        }
                        ?>
                        
                        
                    </div>
                </form>
            </section>
    </section>
</div>
