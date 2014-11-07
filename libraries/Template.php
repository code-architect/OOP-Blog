<?php
/**
 * Created by Indranil Samanta.
 * Class Name: Template Class
 * Description: Creates a template/view Object
 * User: Common
 * Date: 12/10/14
 * Time: 13:22
 */

class Template{
    // path to template
    protected $template;
    // Variable passed in
    protected $vars = array();


    /**
     * Constructor
     * @param $template
     */
    public function __construct($template){
        $this->template = $template;
    }


    /**
     * Get template variable
     * @param $key
     */
    public function __get($key){
        return $this->vars[$key];
    }


    /**
     * Set template variable
     * @param $key
     * @param $value
     */
    public function __set($key, $value){
        $this->vars[$key] = $value;
    }


    /**
     * Convert object to string
     */
    public function __toString(){
        extract($this->vars);
        chdir(dirname($this->template));
        ob_start();

        include basename($this->template);

        return ob_get_clean();
    }













}

