<!-- Main -->
<div id="main">

<!-- Content -->
    <section id="content" class="main">

        <!-- Text -->
        <!-- Form -->
            <section>
                <form method="post" action="add_client-config.php">
                    <div class="row gtr-uniform">
                        <div class="col-4 col-12-xsmall">
                            <h2>First Name</h2>
                            <input type="text" name="clientFirstName" id="clientFirstName" value="" placeholder="First Name" required/>
                        </div>
                        <div class="col-4 col-12-xsmall">	
                            <h2>Middle Name</h2>
                            <input type="text" name="clientMiddleName" id="clientMiddleName" value="" placeholder="Middle Name" />
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <h2>Last Name</h2>
                            <input type="text" name="clientLastName" id="clientLastName" value="" placeholder="Last Name" required/>
                        
                        </div>
                        
                        <div class="col-6">
                            <h2>Gender</h2>
                            <select name="clientGender" id="clientGender">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                
                            </select>
                        </div>

                        
                        <div class="col-6 col-12-xsmall">
                            <h2>Birthdate</h2>
                            <input type="date" name="clientBirthday" id="clientBirthday" value="" placeholder="MM/DD/YY" />
                        </div>

                        
                        <div class="col-6 col-12-xsmall">
                            <h2>Age</h2>
                            <input type="text" name="clientAge" id="clientAge" value="" placeholder="Age" />
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <h2>Email</h2>
                            <input type="email" name="clientEmail" id="clientEmail" value="" placeholder="Email" />
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <h2>Contact Number</h2>
                            <input type="text" name="clientContactNum" id="clientContactNum" value="" placeholder="************" />
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <h2>Nationality</h2>
                            <input type="text" name="clientNationality" id="clientNationality" value="" placeholder="Nationality" required/>
                        </div>
                        
                        <div class="col-6 col-12-xsmall">
                            <h2>Remarks</h2>
                            <input type="text" name="clientRemarks" id="clientRemarks" value="" placeholder="Remarks" />
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <h2>Passenger Type</h2>
                            <select name="clientType" id="clientType">
                                <option value="Normal">Normal</option>
                                <option value="Unaccompanied Minor">Unaccompanied Minor</option>
                                <option value="Handicapped">Handicapped</option>
                                <option value="Medically OK for travel">Medically OK for travel</option>
                                <option value="Senior Citizen">Senior Citizen</option>
                                
                            </select>
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <h2>Additional Passenger (If none, type "0")</h2>
                            <input type="text" name="clientAddPass" id="clientAddPass" value="" placeholder="Number of Passengers " />
                            
                        </div>
                        
                        
                    </div>
                </form>
            </section>
    </section>
</div>