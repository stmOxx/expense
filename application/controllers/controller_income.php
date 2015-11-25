<?php

class Controller_Income extends Controller
{

	function __construct()
	{
		$this->model = new Model_Income();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();
		$this->view->generate('income/index.php', 'template_view.php', $data);
	}

    function action_edit()
    {
        $data = $this->model->get_data();
        $this->view->generate('income/edit.php', 'template_view.php', $data);

    }

    function action_delete($id) {
        $msg = $this->model->del_data($id);
        $data = $this->model->get_data();
        $this->view->generate('income/edit.php', 'template_view.php', $data, $msg);
    }

    function action_add(){
        $this->model->add_data();
        $host = $_SERVER["HTTP_HOST"].'/income/edit';
        header('Location: http://'.$host);
    }
}
