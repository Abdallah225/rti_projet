<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src='regis.js'></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">    
            
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title" style='text-align: center;'>Recuperation de mot de passe </div>
            </div>  
            <div class="panel-body" >
                <form method="post" action="">
                    <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />
                            

                    <form  class="form-horizontal" method="post" >
    
                        <div id="div_id_name" class="form-group required"> 
                            <label for="id_name" class="control-label col-md-4  requiredField"> Entrez votre adresse mail<span class="asteriskField">*</span> </label> 
                            <div class="controls col-md-8 "> 
                                <input class="input-md textinput textInput form-control" required id="id_email" name="email" placeholder="Adresse mail" style="margin-bottom: 10px" type="email" />
                            </div>
                        </div>
                        
                        
                       <center>
                        <div class="form-group"> 
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                                <input type="submit" name="recuperation" value="Recuperer mon mot de passe" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                            </div>
                        </div> 
                        </center>
                    </form>

                </form>
            </div>
        </div>
    </div> 
</div>
</div>

