<!DOCTYPE html>
<html>
    <head>
        <title>Insert MongoDB</title>
    </head>
    <body>
        <h1>Flowers</h1>
        <form method="post" action="store.php" enctype="multipart/form-data">
       <table>        
           <tr>
               <td>Nume: </td>
               <td><input type="text" name="nume" autofocus></td>
           </tr>
           <tr>
               <td>Culoare:</td> 
               <td><input type="text" name="culoare"></td>
           </tr>
           <tr>
               <td>Marime:</td> 
               <td><input type="text" name="marime"></td>
           </tr>
           <tr>
               <td>Pret:</td> 
               <td><input type="text" name="pret"></td>
           </tr>
           <tr>
               <td>Imagine:</td>
               <td><input type="file" name="image"></td>
           </tr>
           <tr>
               <td><input type="submit" value="Submit" name="submit"></td>
               <td><input type="reset" value="Reset"></td>
           </tr>
      </table>   
        </form>
    </body>
</html> 
