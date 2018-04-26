



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>  
<style>
    hidden {
        visibility: hidden;
    }
</style>
<div data-ng-app="regApp">
    <form  class="form-horizontal" action="index.php?content=contactServer" method="post"  data-ng-controller="regCtrl" name="regForm">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Nom:</label>
            <div class="col-sm-10">
                <input  name="name" id="name" class="form-control" type="text" placeholder="Entrer un Nom"  required >
            </div>
        </div>

        <div class="form-group">  
            <label class="control-label col-sm-2" for="phone">Téléphone:</label>
            <div class="col-sm-10">
                <input  name="phone" id="phone" class="form-control" type="text" placeholder="Entrer un Téléphone"   data-ng-pattern="phonePattern" data-ng-model="phone" required>
                <span class="error" data-ng-show="regForm.phone.$error.pattern">Please match pattern ex: 555-555-5555</span>
            </div>
        </div> 

        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Courriel:</label>
            <div class="col-sm-10">
                <input name="email" id="email" type="email" class="form-control" placeholder="Entrer un email"  data-ng-pattern="emailPattern" data-ng-model="email"  required>
                <span class="error" data-ng-show="regForm.email.$error.pattern">Please match pattern ex: abc@domain.com</span>
            </div>
        </div>

        <div class="form-group">    
            <label class="control-label col-sm-2" for="message">Message:</label>
            <div class="col-sm-10">
                <textarea id="message" name="message" class="form-control" rows="5" placeholder="Entrer un message"  required ></textarea>
            </div>
        </div>
        <div class="form-group">        
            <div class="col-sm-offset-1 col-sm-11">
                <button  type="submit" class="btn btn-default" data-ng-disabled="regForm.phone.$error.pattern || regForm.email.$error.pattern">soumettre</button>
            </div>
        </div>
    </form>
</div>
<script>
    var app = angular.module('regApp', []);
    app.controller('regCtrl', function ($scope) {
        $scope.phonePattern = /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/;
        $scope.emailPattern = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    });
</script>