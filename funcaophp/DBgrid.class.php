<?php
class DBgrid{

      var $result;
      var $tabla;
      var $titulo;
      var $linea;
      
	  function DBgrid($result, $tabla, $titulo, $linea){
               $this->result=$result;
               $this->tabla=$tabla;
               $this->titulo=$titulo;
               $this->linea=$linea;
               echo ("<table ".$this->tabla.">");
               echo "<tr>";
               for ($i=0; $i< mysql_num_fields($result); $i++){
                   echo "<td ".$this->titulo.">".mysql_field_name($result,$i). "</td>";
                   }
               echo "</tr>";

               while ($row=mysql_fetch_array($result)){
                     echo "<tr>";
                     for ($i=0; $i< mysql_num_fields($result); $i++){
                         echo "<td ".$this->linea.">".$row[mysql_field_name($result,$i)]."</td>";
                         }
                     echo "</tr>";
                     }
               echo "</table>";
               }
}
?>