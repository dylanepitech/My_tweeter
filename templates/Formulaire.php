<?php 
namespace Templates;

class Formulaire{

    public function open($method, $id)
    {
        echo "<form method='$method' id='$id'>";
    }
    public function input($label, $type ,$name){
        // echo "<label>$label</label>";
        echo "<input type='$type' id='$name' name='$name' placeholder='$label'>";
    }
    public function checkbox($label,$name){
        echo "<div class='flex row center item-center h-3'>";
        echo "<label>$label</label>";
        echo "<input type='checkbox' id='$name' name='$name' class='checkbox'>";
        echo "</div>";

    }
    public function select_open($label,$name){
        // echo "<label>$label</label>";
        echo "<select name='$name'>";
    }
    public function option($value,$content)
    {
        echo "<option value='$value' >$content</option>";
    }
    public function password($name, $label)
    {
        echo "<input type='password' id='$name' name='$name' placeholder='$label'>";

    }
    public function select_close(){
        echo "</select>";
    }
    public function button($color, $content){
        echo "<button class='btn-$color'>$content</button>";
    }

    public function close()
    {
        echo "</form>";
    }
}

?>