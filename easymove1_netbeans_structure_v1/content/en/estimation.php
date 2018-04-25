<div class="container" style="min-width: 350px">

    <h1>Estimation in English will come</h1>
    <p>
        Nous vous offrons plusieurs choix pour vous informer du coût de votre déménagement :<br />
        1 – Par téléphone : appelez-nous au 450-668-5203 et un agent évaluera avec vous le coût de votre déménagement, quitte à vous rendre visite si nécessaire;<br />
        2 – Pour plus de précision et de certitude, remplissez le formulaire. Nous pourrons alors vous contacter avec un devis dès plus précis possible selon l’information recu de votre part.
    </p>
    
    <form id="formEstimation">
        <div class="row">
            <div class="col-sm-6">
                <h2 style="margin-top: 10px;margin-bottom: 20px;">Vos coordonnées</h2>
                <div id="formMainBoxes" class="form-group">

                    <div>
                        <label for="name">Nom<span class="required">*</span>:</label>
                        <input required="required" class="form-control" type="text" name="name" id="name"><br />
                    </div>

                    <div>   
                        <label for="phone">Téléphone<span class="required">*</span>:</label>
                        <input required="required" class="form-control" type="text" name="phone" id="phone"><br />
                    </div> 

                    <div>
                        <label for="email">Courriel<span class="required">*</span>:</label>
                        <input required="required" type="email" class="form-control" id="email" placeholder="Entrer un email" name="email"><br />
                    </div>

                    <div>    
                        <label for="moveDate">Date<span class="required">*</span>:</label>
                        <input required="required" class="form-control" type="date" name="moveDate" id="moveDate"><br />
                    </div>


                    <div>
                        <label for="cityDepSimple">Ville de depart:</label>
                        <input class="form-control" type="text" name="cityDep" id="cityDep"><br />
                    </div>

                    <div>
                        <label for="cityDepSimple">Ville de destination:</label>
                        <input class="form-control" type="text" name="cityDep" id="cityDep"><br />
                    </div>
                    <div>
                        <p><span class="required">*</span> - les champs obligatoires</p>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default">Envoyer</button>
                    </div>
                </div><br />
            </div>
            
            
            <div class="col-sm-6" style="max-width: 590px">
                <div class="checkbox form-control" style="background: lightgreen;">
                    <label style="font-weight: bold"><input style="width: 14px; height: 14px; "  type="checkbox" value="" 
                                                            name="addInfo" id="addInfo"> Information supplémentaire</label>
                </div>

                <div id="formAddBoxes" class="form-group">
                    <div>
                        <label for="workers" style="display: inline-block">Nombre de déménageurs: </label>
                        <input style="display: inline-block; width: 60px;" class="form-control" type="number" min="1" max="6" value="2" 
                               name="workers" id="workers">
                    </div>

                    <h3 class="form-control" style="width: 100%; background: lightgray; font-size: large; font-weight: bold">Des adresses</h3>

                    <div style="border-style: dotted; border-color: lightgray; border-radius: 5px; padding: 5px; margin: 2px; background: #eee" >
                        <h5 style="font-weight: bold; font-size: large">1. Adresse actuelle</h5>
                        <div style="margin-bottom: 10px">
                            <label class="firstLabelAdd"  style="display: inline-block" for="adrAct">Adresse: </label>
                            <input style="display: inline; width: 330px" class="form-control" type="text" name="adrAct" id="adrAct"><br />
                        </div>

                        <div>
                            <div style="display:inline-block ; margin-right: 15px; width: 180px; margin-bottom: 10px">
                                <label class="firstLabelAdd" for="floorAct">Étage:</label>
                                <input style="display: inline; width: 70px" class="form-control" type="number" min="0" max="100" 
                                       name="floorAct" id="floorAct">
                            </div>
                            <div style="display: inline-block; min-width: 210px; margin-bottom:10px ">
                                <label>Escalier:&nbsp;&nbsp;<input style="display: inline; width:16px; height: 16px;" 
                                                                   class="checkbox" type="checkbox" value="" name="stairsAct" id="stairsAct"></label>
                                <label>&nbsp;&nbsp;&nbsp;&nbsp;Ascenseur:&nbsp;&nbsp;<input style="display: inline; width:16px; height: 16px;" 
                                                                   class="checkbox" type="checkbox" value="" name="elevatorAct" id="elevatorAct"></label>
                            </div>
                        </div>
                        <div style="display: inline-block; min-width: 295px; margin-bottom:5px">
                            <div style="margin-bottom: 5px; display: inline-block">
                                <label class="firstLabelAdd"  style="display: inline-block" for="cityAct">Ville: </label>
                                <input style="display: inline; width: 150px" class="form-control" type="text" name="cityAct" id="cityAct"><br />
                            </div>

                            <div class="dropdown" style="display: inline-block">
                                <select id="provAct" name="provAct" class="form-control">
                                    <option selected="selected" value="QC" >QC</option>
                                    <option value="ON">ON</option>
                                    <option value="AB">AB</option>
                                    <option value="BC">BC</option>
                                    <option value="MB">MB</option>
                                    <option value="NB">NB</option>
                                    <option value="NS">NS</option>
                                    <option value="PE">PE</option>
                                    <option value="SK">SK</option>
                                    <option value="NL">NL</option>
                                    <option value="NT">NT</option>
                                    <option value="NU">NU</option>
                                    <option value="YT">YT</option>
                                </select>
                            </div>
                        </div>
                        <div style="margin-bottom: 5px; display: inline-block">
                            <label style="display: inline-block" for="zipAct"></label>
                            <input style="display: inline; width: 105px" placeholder="Code postal" class="form-control" type="text" name="zipAct" id="zipAct"><br />
                        </div>
                        
                    </div>  
                    <!--end of actual address-->
                    
                    <!--Destination Addresse-->
                    <div style="border-style: dotted; border-color: lightgray; border-radius: 5px; padding: 5px; margin: 10px 2px 2px 2px; background: #eee"  >
                        <h5 style="font-weight: bold; font-size: large">2. Destination</h5>
                        <div style="margin-bottom: 10px">
                            <label class="firstLabelAdd"  style="display: inline-block" for="adrDest">Adresse: </label>
                            <input style="display: inline; width: 330px" class="form-control" type="text" name="adrDest" id="adrDest"><br />
                        </div>

                        <div>
                            <div style="display:inline-block ; margin-right: 15px; width: 180px; margin-bottom: 10px">
                                <label class="firstLabelAdd" for="floorDest">Étage:</label>
                                <input style="display: inline; width: 70px" class="form-control" type="number" min="0" max="100" 
                                       name="floorDest" id="floorDest">
                            </div>
                            <div style="display: inline-block; min-width: 210px; margin-bottom:10px ">
                                <label>Escalier:&nbsp;&nbsp;<input style="display: inline; width:16px; height: 16px;" 
                                                                   class="checkbox" type="checkbox" value="" name="stairsDest" id="stairsDest"></label>
                                <label>&nbsp;&nbsp;&nbsp;&nbsp;Ascenseur:&nbsp;&nbsp;<input style="display: inline; width:16px; height: 16px;" 
                                                                   class="checkbox" type="checkbox" value="" name="elevatorDest" id="elevatorDest"></label>
                            </div>
                        </div>
                        <div style="display: inline-block; min-width: 295px; margin-bottom:5px">
                            <div style="margin-bottom: 5px; display: inline-block">
                                <label class="firstLabelAdd"  style="display: inline-block" for="cityDest">Ville: </label>
                                <input style="display: inline; width: 150px" class="form-control" type="text" name="cityDest" id="cityDest"><br />
                            </div>

                            <div class="dropdown" style="display: inline-block">
                                <select id="provDest" name="provDest" class="form-control">
                                    <option selected="selected" value="QC" >QC</option>
                                    <option value="ON">ON</option>
                                    <option value="AB">AB</option>
                                    <option value="BC">BC</option>
                                    <option value="MB">MB</option>
                                    <option value="NB">NB</option>
                                    <option value="NS">NS</option>
                                    <option value="PE">PE</option>
                                    <option value="SK">SK</option>
                                    <option value="NL">NL</option>
                                    <option value="NT">NT</option>
                                    <option value="NU">NU</option>
                                    <option value="YT">YT</option>
                                </select>
                            </div>
                        </div>
                        <div style="margin-bottom: 5px; display: inline-block">
                            <label style="display: inline-block" for="zipDest"></label>
                            <input style="display: inline; width: 105px" placeholder="Code postal" class="form-control" type="text" name="zipDest" id="zipDest"><br />
                        </div>
                        
                    </div>  
                    <!--end of destination address-->


                    <!--Intermediate Addresse-->
                    <div style="border-style: dotted; border-color: lightgray; border-radius: 5px; padding: 5px; margin: 10px 2px 2px 2px; background: #eee"  >
                        <h5 style="font-weight: bold; font-size: large">3.Adresse intermédiaire</h5>
                        <div style="margin-bottom: 10px">
                            <label class="firstLabelAdd"  style="display: inline-block" for="adrInt">Adresse: </label>
                            <input style="display: inline; width: 330px" class="form-control" type="text" name="adrInt" id="adrInt"><br />
                        </div>

                        <div>
                            <div style="display:inline-block ; margin-right: 15px; width: 180px; margin-bottom: 10px">
                                <label class="firstLabelAdd" for="floorInt">Étage:</label>
                                <input style="display: inline; width: 70px" class="form-control" type="number" min="0" max="100" 
                                       name="floorInt" id="floorInt">
                            </div>
                            <div style="display: inline-block; min-width: 210px; margin-bottom:10px ">
                                <label>Escalier:&nbsp;&nbsp;<input style="display: inline; width:16px; height: 16px;" 
                                                                   class="checkbox" type="checkbox" value="" name="stairsInt" id="stairsInt"></label>
                                <label>&nbsp;&nbsp;&nbsp;&nbsp;Ascenseur:&nbsp;&nbsp;<input style="display: inline; width:16px; height: 16px;" 
                                                                   class="checkbox" type="checkbox" value="" name="elevatorInt" id="elevatorInt"></label>
                            </div>
                        </div>
                        <div style="display: inline-block; min-width: 295px; margin-bottom:5px">
                            <div style="margin-bottom: 5px; display: inline-block">
                                <label class="firstLabelAdd"  style="display: inline-block" for="cityInt">Ville: </label>
                                <input style="display: inline; width: 150px" class="form-control" type="text" name="cityInt" id="cityInt"><br />
                            </div>

                            <div class="dropdown" style="display: inline-block">
                                <select id="provInt" name="provInt" class="form-control">
                                    <option selected="selected" value="QC" >QC</option>
                                    <option value="ON">ON</option>
                                    <option value="AB">AB</option>
                                    <option value="BC">BC</option>
                                    <option value="MB">MB</option>
                                    <option value="NB">NB</option>
                                    <option value="NS">NS</option>
                                    <option value="PE">PE</option>
                                    <option value="SK">SK</option>
                                    <option value="NL">NL</option>
                                    <option value="NT">NT</option>
                                    <option value="NU">NU</option>
                                    <option value="YT">YT</option>
                                </select>
                            </div>
                        </div>
                        <div style="margin-bottom: 5px; display: inline-block">
                            <label style="display: inline-block" for="zipInt"></label>
                            <input style="display: inline; width: 105px" placeholder="Code postal" class="form-control" type="text" name="zipInt" id="zipInt"><br />
                        </div>
                        
                    </div>  
                    <!--end of intermediate address-->
                    <h3 class="form-control" style="width: 100%; background: lightgray; font-size: large; font-weight: bold">Description des objets à déplacer</h3>
                    <div style="border-style: dotted; border-color: lightgray; border-radius: 5px; padding: 5px; margin: 10px 2px 2px 2px; background: #eee"  >
                        <div style="display: inline-block;">
                            <div style="display: inline-block; margin: 5px 0">
                                <label for="boxes" style="display: inline-block; width: 60px">Boites:</label>
                                <input style="display: inline-block; width: 70px;" class="form-control" type="number" min="0" max="999"  
                                       name="boxes" id="boxes">
                            </div>
                            <div style="display: inline-block; margin: 5px 0">
                                <label for="beds" style="display: inline-block; width: 60px">&nbsp;Lits:</label>
                                <input style="display: inline-block; width: 70px;" class="form-control" type="number" min="0" max="999"  
                                       name="beds" id="beds">
                            </div>
                        </div>    
                        <div style="display: inline-block; margin: 5px 0">
                            <label for="sofas" style="display: inline-block; width: 60px">Canapés:</label>
                            <input style="display: inline-block; width: 70px;" class="form-control" type="number" min="0" max="999"  
                                   name="sofas" id="sofas">
                        </div>
                        
                        <div style="display: inline-block; margin: 5px 0">
                            <label for="tables" style="display: inline-block; width: 60px">Tables:</label>
                            <input style="display: inline-block; width: 70px;" class="form-control" type="number" min="0" max="999"  
                                   name="tables" id="tables">
                        </div>
                        <div style="display: inline-block; min-width: 280px">
                            <div style="display: inline-block; margin: 5px 0">
                                <label for="desks" style="display: inline-block; width: 60px">Bureaux:</label>
                                <input style="display: inline-block; width: 70px;" class="form-control" type="number" min="0" max="999"  
                                       name="desks" id="desks">
                            </div>
                            <div style="display: inline-block; margin: 5px 0">
                                <label for="chairs" style="display: inline-block; width: 60px">Chaises:</label>
                                <input style="display: inline-block; width: 70px;" class="form-control" type="number" min="0" max="999"  
                                       name="chairs" id="chairs">
                            </div>
                        </div>
                        <br/>
                        <div style="display: inline-block; margin: 5px 0">
                            <label for="wds" style="display: inline-block">Électroménagers:&nbsp;</label>
                            <input style="display: inline-block; width: 70px;" class="form-control" type="number" min="0" max="999"  
                                   name="wds" id="wds">
                        </div>
                        
                        <div style="margin-bottom: 5px; display: inline-block">
                            <textarea id="message" name="message" class="form-control" cols="61" rows="4" style="display: inline-block" placeholder="Message"></textarea>
                        </div>
                        
                        <div>
                        <button type="submit" class="btn btn-default">Envoyer</button>
                        </div>
                        
                    </div>
                    
                </div>

            </div>

        </div>
    </form>

</div><!-- /.container -->