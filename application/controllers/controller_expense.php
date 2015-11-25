<?php

class Controller_Expense extends Controller
{

	function __construct()
	{
		$this->model = new Model_Expense();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();
		$this->view->generate('expense/index.php', 'template_view.php', $data);
	}

    function action_edit()
    {
        $data = $this->model->get_data();
        $this->view->generate('expense/edit.php', 'template_view.php', $data);

    }

    function action_delete($id, $prop) {
        $this->model->del_data($id);
        $this->action_detail($prop);
    }

    function action_add($cat_id){
        $this->model->add_data($cat_id);
        $host = $_SERVER["HTTP_HOST"].'/expense/detail/'.$cat_id;
        header('Location: http://'.$host);
    }

    function action_detail($cat) {
        $data = $this->model->get_detail($cat);
        $this->view->generate('expense/detail.php', 'template_view.php', $data);
    }
}
