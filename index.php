<?php
$values = array(
    'placeholder1' => 'placeholder1',
    'placeholder2' => 'placeholder2',
    'placeholder3' => 'placeholder3',
    'placeholder4' => 'placeholder4'
);

$tempHtml = new TemplateParser($values);
echo $tempHtml->replace();

class TemplateParser {

    protected $_openingTag = '{{';
    protected $_closingTag = '}}';
    protected $_tempHtml = <<<HTML
<html>
<body>

<h1>PHP</h1>
<h3>The goal of the PHP challenge, is to create a simple but flexible template parser.<br>
It  must automatically  translate  an  HTML  template  with  placeholders  into  a  HTML  string  with <br>
placeholders replaced by the corresponding values. <br>
It  must  be  possible  to  supply  an  object  or  array  with  key-value  pairs,  where  the  key  indicates  the <br>
placeholder that must be replaced by the value.<br>
 Consider using regular expressions</h3>

<br><br><br>

<input placeholder="{{placeholder1}}" /><br>
<input placeholder="{{placeholder2}}" /><br>
<input placeholder="{{placeholder3}}" /><br>
<input placeholder="{{placeholder4}}" /><br>
</body>
</html> 
HTML;

    public function __construct($values) {
        $this->values = $values; 
    }

    public function replace() {
        $html = $this->_tempHtml;
        foreach ($this->values as $key => $value) {
            $html = str_replace($this->_openingTag . $key . $this->_closingTag, $value, $html);
        }
        return $html;
    }
}
?>