<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Calculadora</title>
<style type="text/css">

</style>
</head>
<body>

<?php

class calculadora {

var $nums = '';
var $calc = '';
var $op = '';

function mostrar () {
 
 $num = @$_GET['num'][0];
 $calc = @$_GET['calc'];

 if(empty( $num ) AND empty( $calc )) {
  return false;
 }

 if(!isset( $display )) {
  $display = $calc;
 }

 $this->nums .= empty( $num ) ? $display : $display.$num;
 
 $this->setOperacao();
 
 if(!empty( $this->op )) {
  $this->calc = $this->nums.rawurldecode( $this->op ).$num;
 }

 return $this->calcular();
}

function setOperacao () {  
 if(!empty( $_GET['op'] )) {
  $this->op = $_GET['op'];
 }
}

function calcular() {
 
 $calc = empty( $this->calc ) ? $this->nums : $this->calc;

 if(isset( $_GET['resultado'] )) {
  if(preg_match( '/^([0-9]+)(\/|\*|\+|\-)([0-9]+)+$/', $calc, $match )) {
   switch( $match[2] ) {
    case "+":
     return $match[1]+$match[3];
    break;
    case "-":
     return $match[1]-$match[3];
    break;
    case "/":
     return $match[1]/$match[3];
    break;
    case "*":
     return $match[1]*$match[3];
    break;
   }
  } else {
   return "Ocorreu um erro";
  }
 }
 return $calc;
}
}
$calc = new calculadora();
?>

<style>
*{
    margin: 0;
    padding: 0;
}

.fundo {
    background-image: linear-gradient(45deg, black, lightgreen);
    height: 100vh;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
}

.calculadora {
    position: absolute;
    background-color: rgba(0, 0, 0, 0.8);
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    border-radius: 15px;
    padding: 15px;
}

.botao {
    width: 50px;
    height: 50px;
    font-size: 25px;
    cursor: pointer;
    background-color: rgb(31, 31, 31);
    border: none;
    color: white;
    margin: 3px;
}

.botao:hover{
    background-color: black;
}

#titulo {
    color: white;
}

#calc {
    text-align: right;
    padding: 5px;
    width: 207px;
    height: 30px;
    font-size: 25px;
}
</style>

<div class="fundo">
<form action="" method="get">

<div class="calculadora">
<table id="calculadora" cellpadding="10" cellspacing="0" align="center">
<tr>
  <td align="center" colspan="4">
      <span id="titulo">Calculadora</span><br/>
       <input id="calc" type="text" name="calc" value="<?=$calc->mostrar();?>" />
   </td>
</tr>
<tr>
  <td>
     <input type="submit" class="botao" name="num[]" value="7" />
  </td>
  <td>
     <input type="submit" class="botao" name="num[]" value="8" />
  </td>
  <td>
     <input type="submit" class="botao" name="num[]" value="9" />
  </td>
  <td>
     <input type="submit" class="botao" name="op" value="/" />
  </td>
</tr>
<tr>
  <td>
     <input type="submit" class="botao" name="num[]" value="4" />
  </td>
  <td>
      <input type="submit" class="botao" name="num[]" value="5" />
  </td>
  <td>
      <input type="submit" class="botao" name="num[]" value="6" />
  </td>
  <td>
      <input type="submit" class="botao" name="op" value="*" />
  </td>
</tr>
<tr>
   <td>
      <input type="submit" class="botao" name="num[]" value="1" />
   </td>
    <td>
<input type="submit" class="botao" name="num[]" value="2" />
   </td>
   <td>
      <input type="submit" class="botao" name="num[]" value="3" />
   </td>
   <td>
      <input type="submit" class="botao" name="op" value="-" />
   </td>
</tr>
<tr>
  <td>
      <input type="submit" class="botao" name="num[]" value="0" />
  </td>
  <td>
      <input type="submit" class="botao" name="num[]" value="." />
  </td>
  <td>
      <input type="submit" class="botao" name="resultado" value="=" />
  </td>
  <td>
      <input type="submit" class="botao" name="op" value="+" />
  </td>
</tr>
</table>
</div>
</form>
</div>
</body>
</html>

