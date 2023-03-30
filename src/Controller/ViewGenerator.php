<?php

namespace App\Controller;

class ViewGenerator
{
    // file name associated with the view
    private $viewName;

    // view title (class attribute)
    private $title;

    // parametters if isset
    private $params;


    public function __construct($action)
    {
        $this->viewName = __DIR__ . '/../view/' . $action . ".php"; // ex: HomeView.php
        $this->title = ucfirst($action);
    }


    /**
     * generate and display the view
     *
     * @param  array $data data to load in the view.
     * @return ?bool|string html content of the view.
     */
    public function generate($data = null)
    {
        if ($data != null) {
            /// generate specific part of the view
            $body = $this->loadFile($this->viewName, $data);

            // generate template with specific part of the view
            $vue = $this->loadFile(
                __DIR__ . '/../view/__template__.php',
                array('title' => $this->title, 'body' => $body)
            );
        } else {
            $body = $this->loadFile($this->viewName);

            // generate template with specific part of the view
            $vue = $this->loadFile(
                __DIR__ . '/../view/__template__.php',
                array('title' => $this->title, 'body' => $body)
            );
        }
        // return the view
        echo $vue;
    }


    /**
     * add data to a view (title, body, etc.)
     *
     * @param  string $file   name of the view to load.
     * @param  array $data data to load in the view.
     * @return ?bool|string html content of the view.
     */
    private function loadFile($file, $data = null)
    {
        if (file_exists($file)) {
            if ($data != null) {
                // database data extraction
                extract($data);


                // start buffering
                ob_start();


                // include the view
                require $file;

                // return the view content
                return ob_get_clean();
            } else {
                // start buffering
                ob_start();

                // include the view
                require $file;

                // return the view content
                return ob_get_clean();
            }
        } else {
            throw new \Exception("Fichier '$file' introuvable");
        }
    }

    public function setParam(array $params)
    {
        $this->params = $params;
    }

    public function getParam()
    {
        return $this->params;
    }
}
