<?php
class Hi extends Controller
{
    public function index()
    {
        $this->view->noLayout();
        $this->view->show('hi.php');
    }

    public function layout()
    {
        $this->view->show('hi.php', 'layout.php');
    }
}
