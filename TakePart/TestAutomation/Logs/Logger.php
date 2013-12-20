<?php
/*
 * Created on Oct 11, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 /*
* Class StringBuilder
*
* This class tries to emulate a simple StringBuilder
*
* @author pedrocorreia.net
*/
class StringBuilder{
private $_result;
 
/**
* Constructor
*
*/
public function __construct(){$this->_result=array();}
 
/**
* Destructor
*
*/
public function __destruct(){$this->_ClearElements();}
 
/**
* Append Line
*
* @param String
*/
public function Append($value){$this->_AddElement($value);}
 
/**
* Append Line including "\n" at the beginning
*
* @param String
*/
public function AppendLine($value){$this->_AddElement("\r\n$value");}
 
/**
* Insert element at a specific position
*
* @param Int Position
* @param String value
*/
public function Insert($pos, $value){$this->_AddElement($value,$pos-1);}
 
/**
* Switch Elements
*
* @param Int 1st Position
* @param Int 2nd Position
*/
public function Exchange($from, $to){$this->_SwitchElements($from-1,$to-1);}
 
/**
* Update Element
*
* @param String Value
* @param Int Position
*/
public function Update($value,$pos){$this->_UpdateElement($pos-1,$value);}
 
/**
* Replace Element (Alias of Update)
*
* @param Int Position
* @param String
*/
public function Replace($pos,$value){$this->Update($value,$pos);}
 
/**
* Get number of Elements
*
* @return Int
*/
public function Count(){return sizeof($this->_result);}
 
/**
* Get total String Length
*
* @return Int
*/
public function Length(){
$count=$this->Count();
$sum=0;
for($i=0;$i<$count;$i++){
$sum+=strlen($this->_GetElement($i));
}
 
return $sum;
}
 
/**
* Get specific Element
*
* @param Int Position
* @return String
*/
public function Element($pos){
try{$elem=$this->_GetElement($pos-1);}
catch (Exception $ex){$elem="Exception: $ex";}
 
return $elem;
}
 
/**
* Remove element
*
* @param Int Position
* @return Bool
*/
public function Remove($pos){
$res=true;
try{$this->_RemoveElement($pos-1);}
catch (Exception $ex){$res=false;}
return $res;
}
 
/**
* Clear all elements
*
*/
public function Clear(){$this->_ClearElements();}
 
/**
* Convert StringBuilder to String
*
* @return String
*/
public function ToString(){
$count=$this->Count();
for($i=0;$i<$count;$i++){
$str.=nl2br($this->_GetElement($i));
}
 
return $str;
}
 
/**
* Add/ Insert Element
*
* @param String
* @param Int [Optional] Insert element at specific index
*
* note: when inserting element at specific index, if that index's
* bigger than Elements Count, or invalid, i.e.,
* negative or and inexistent index;
* the value will be appended
*/
private function _AddElement($value,$pos=null){
if(!is_numeric($pos)){
$this->_result[]=$value;
}
else{
if(!$this->_IsValidIndex($pos)) $pos=$this->Count();
array_splice($this->_result,$pos,0,$value);
}
}
 
/**
* Update Element
*
* @param Int Index
* @param String Value
*/
private function _UpdateElement($pos,$value){
if(!$this->_IsValidIndex($pos)) throw new Exception("OUT_OF_BOUNDS");
$this->_result[$pos]=$value;
}
 
/**
* Get Element
*
* @param Int Index
* @return String
*/
private function _GetElement($pos){
if(!$this->_IsValidIndex($pos)) throw new Exception("OUT_OF_BOUNDS");
return $this->_result[$pos];
}
 
/**
* Remove Element
*
* @param Int Index
*/
private function _RemoveElement($pos){
if(!$this->_IsValidIndex($pos)) throw new Exception("OUT_OF_BOUNDS");
unset($this->_result[$pos]);
$this->_result=array_values($this->_result);
}
 
/**
* Switch Elements
*
* @param Int 1st Index
* @param Int 2nd Index
*/
private function _SwitchElements($pos1,$pos2){
if(!$this->_IsValidIndex($pos1) || !$this->_IsValidIndex($pos2)){
throw new Exception("OUT_OF_BOUNDS");
}
$aux=$this->_GetElement($pos2);
$this->_result[$pos2]=$this->_GetElement($pos1);
$this->_result[$pos1]=$aux;
}
 
/**
* Clear StringBuilder
*
*/
private function _ClearElements(){unset($this->_result);}
 
/**
* Check if the index is valid
*
* @param Int Index to examine
* @return Bool
*/
private function _IsValidIndex($num){
return ($num<$this->Count() && $num>=0);
}
 
}
?>
