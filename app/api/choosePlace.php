<html>
<?php  include("../template/php/header.php");?>



  <body style="margin:0px;padding:0px;overflow:hidden">
 
    <?php
        @include 'lib/setParameters.php';
        $query = "SELECT * FROM auditorias";               
        $queryResultArray = array();
        $queryResult = mysqli_query($conn,$query);
       
        while($resultRow = mysqli_fetch_assoc($queryResult)) {     
            $queryResultArray[] = $resultRow; 
            $auditoriaName = $resultRow['nome'];
            $renderLink = "chooseId.php?tableName=".$auditoriaName;
	    
            echo("<a href=\"$renderLink\" class=\"list-group-item list-group-item-action\">$auditoriaName</a>");
            }     
    
      
        
      
     
     
     ?>    

      </div>    
  </body>
</html>

   
  
        

               
        
        
      
        
        
       

</form>

<?php echo("<td><a href='../' class='btn btn-primary'>Voltar</a></td>");?>