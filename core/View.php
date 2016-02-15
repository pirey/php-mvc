<?php

class View
{
    // holds the view's content
    private $_content;

    // holds the layout file
    private $_layout;

    // holds the loaded data
    private $_data = array();

    public function __construct()
    {
        $this->setLayout(Config::getDefault("layout")); 
    }

    /**
     * remove the layout, displaying the page without layout file
     */
    public function noLayout()
    {
        $this->_layout = null;
    }

    /**
     * set the layout file
     * @param [type] $layoutFile [description]
     */
    public function setLayout($layoutFile)
    {
        $this->_layout = $layoutFile;
    }

    public function setContent($contentFile)
    {
        $this->_content = $contentFile;
    }

    /**
    * preparing data to fill in the view later
    */
    public function setData($data) {
        if (is_array($data)) {
            $this->_data = $data;
        }
    }

    /**
    * show the page, and populate it with stored data, if any
    */
    public function show($content = null, $layout = null) {
        if ($content) {
            $this->setContent($content);
        }

        if ($layout) {
            $this->setLayout($layout);
        }

        // first, we hand over the data
        extract($this->_data);

        // load content
        if (!empty($this->_content)) {
            ob_start();
            require_once(APP . Config::$view_path . $this->_content);
            $CONTENT = ob_get_clean();
        } else {
            $CONTENT = "";
        }

        // load the layout
        if (!empty($this->_layout)) {
            ob_start();
            require_once(APP . Config::$view_path . $this->_layout);
            $VIEW = ob_get_clean();
        } else {
            $VIEW = "";
        }

        // display the page
        if (empty($VIEW)) {
            print($CONTENT);
        } else {
            print($VIEW);
        }
    }

    
}
