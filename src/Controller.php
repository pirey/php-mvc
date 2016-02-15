<?php

class Controller
{
    /**
    * controller's loaded model(s)
    */
    protected $model = array();

    /**
    * associated view
    */
    protected $view;

    public function __construct() {
        $this->view = new View();
    }

    /**
     * load a model, stores it in $this-model, and returns it.
     * @param  [type]  $className [description]
     * @param  boolean $refName   [description]
     * @return [type]             [description]
     */
    public function loadModel($className, $refName = false)
    {
        // two versions of loaded model: with reference, and..without reference
        if ($refName) {
            $key = $refName;
        } else {
            $key = $modelName;
        }

        try {
            $this->model[$key] = loadClass($modelName, APP . Config::$model_path);
        } catch (ClassNotFoundException $e) {
            exit($e->getMessage());
        }

        return $this->model[$key];

    }


    /**
     * call a model loaded in $this->model property
     * @param  [type] $refName [description]
     * @return called model
     */
    protected function _model($refName)
    {
        if (array_key_exists($refName, $this->model) && is_object($this->model[$refName])) {
            return $this->model[$refName];
        } else {
            throw new ModelNotLoadedException("Model $refName not loaded.");
        }
    }

    /**
     * use a loaded model
     * @param  [type] $refName [description]
     * @return [type]          [description]
     */
    public function model($refName)
    {
        try {
            return $this->_model($refName);
        } catch (ModelNotLoadedException $e) {
            exit($e->getMessage());
        }
    }

}
