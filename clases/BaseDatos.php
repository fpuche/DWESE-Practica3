<?php

class BaseDatos 
{
    private $conexion;
    private $sentencia;

    function __construct() 
    {
        try 
        {
            $this->conexion = new PDO('mysql:host=' . Configuracion::SERVIDOR . ';dbname=' . Configuracion::BASEDATOS, 
                    Configuracion::USUARIO, 
                    Configuracion::CLAVE, 
                    array(
                          PDO::ATTR_PERSISTENT => true,
                          PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8')
            );
        } catch (Exception $exc) {
            $this->conexion = null;
        }
    }

    public function closeConexion() {
        $this->closeConsulta();
        $this->conexion = null;
        
        
    }
    
    function closeConsulta(){
        if($this->sentencia!=null){
            $this->sentencia->closeCursor();
            $this->sentencia=null;
            
        }
    }

    public function getAutonumerico() {
        return $this->conexion->lastInsertId();
    }

    public function getFila() {
        if($this->sentencia != null)
        {
           return $this->sentencia->fetch(); 
        }
         return false;            
    }

    public function getNumeroFilas() {
        if($this->sentencia != null)
        {
           return $this->sentencia->rowCount(); 
        }        
        return -1;
    }

    public function isConectado() 
    {
        return $this->conexion != null;
    }

    public function setBaseDatos($baseDatos) 
    {
        return $this->conexion->query("use $baseDatos");
    }

    public function setConsulta($consulta, $parametros) 
    {
        $this->sentencia = $this->conexion->prepare($consulta);
        foreach ($parametros as $indice =>$valor) {
            $this->sentencia->bindValue($indice, $valor);
        }
       return $this->sentencia->execute();      
    }
    
    public function setConsultaPreparada($consulta, $parametros) 
    {        
        $this->sentencia = $this->conexion->prepare($consulta);
        $pos =1;
        foreach ($parametros as $valor) {
            $this->sentencia->bindValue($pos, $valor);
            $pos++;
        }
       return $this->sentencia->execute(); 
    }

    public function setConsultaSQL($consulta) 
    {        
        $this->sentencia = $this->conexion->query($consulta); 
        if($this->sentencia == false)
        {
            $this->sentencia =null;
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function setTransaccion() 
    {
        $this->conexion->beginTransaction();         
    }
    
    public function validaTransaccion() 
    {
       $this->conexion->commit();    
    }
    
    public function anulaTransaccion() 
    {
       $this->conexion->rollBack();     
    }    
    
    public function ejecutarTransaccion($consulta, $parametros) 
    {
       $this->setTransaccion();
       $error = false;
       foreach ($consulta as $i =>$consulta) {
           $resultado = $this->setConsulta($consulta, $parametros[$i]);
           if($resultado==false ||$this->getNumeroFilas()<1)
           {
               $error=true;
               break;
           }
           if($error)
           {
               $this->anulaTransaccion();
               return false;
           }
           else
           {
               $this->validaTransaccion();
               return true;
           }           
       }
    } 
    
   function getError(){
       return $this->sentencia->errorInfo();//devuelve un aray de hasta 3 elementos
   } 
}

?>
