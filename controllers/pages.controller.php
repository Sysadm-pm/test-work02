<?php
class PagesController extends Controller
{
    public function __construct($data = array() )
    {
        parent::__construct($data);
        $this->model = new Page();

    }

    public function index()
    {
        //$this->data['pages'] = $this->model->getList();
        $this->data['contracts'] = $this->model->getListContracts();
        $this->data['customers'] = $this->model->getListCustomers();
        $this->data['services'] = $this->model->getListServices();
        if ($_POST){
            $this->data['data'] =$this->model->getAllInfo($_POST['number']);
        }
    }

    public function view()
    {
        $params = App::getRouter()->getParams();

        if (isset($params[0]) )
        {
            $alias = strtolower($params[0]);
            $this->data['page'] = $this->model->getByAlias($alias);
        }
    }
    public function admin_index()
    {
        $this->data['pages'] = $this->model->getList();
        $this->data['contracts'] = $this->model->getListContracts();
        $this->data['customers'] = $this->model->getListCustomers();
        $this->data['services'] = $this->model->getListServices();
    }

    public function admin_add()
    {
        if($_POST)
        {
            $result = $this->model->save($_POST);
            if ($result)
            {
                Session::setFlash('Page was saved.');
            }else
                {
                    Session::setFlash('Error.');
                }
            Router::redirect('/admin/pages/');
        }
    }
    public function admin_addcontract()
    {
        if($_POST)
        {
            $result = $this->model->saveContract($_POST);
            if ($result)
            {
                Session::setFlash('Page was saved.');
            }else
                {
                    Session::setFlash('Error.');
                }
            Router::redirect('/admin/pages/');
        }
    }
    public function admin_addcustomer()
    {
        if($_POST)
        {
            $result = $this->model->saveCustomer($_POST);
            if ($result)
            {
                Session::setFlash('Page was saved.');
            }else
                {
                    Session::setFlash('Error.');
                }
            Router::redirect('/admin/pages/');
        }
    }
    public function admin_addservice()
    {
        if($_POST)
        {
            $result = $this->model->saveService($_POST);
            if ($result)
            {
                Session::setFlash('Page was saved.');
            }else
                {
                    Session::setFlash('Error.');
                }
            Router::redirect('/admin/pages/');
        }
    }



    public function admin_edit()
    {
        if($_POST)
        {
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $result = $this->model->save($_POST,$id);
            if ($result)
            {
                Session::setFlash('Page was saved.');
            }else
            {
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/pages/');
        }

        if (isset($this->params[0]) )
        {
            $this->data['page'] = $this->model->getById($this->params[0]);
        }else
            {
                Session::setFlash('Wrong page id.');
                Router::redirect('/admin/pages/');
            }

    }
    public function admin_editcontract()
    {

        if (isset($this->params[0]) )
        {
            $this->data['Contract'] = $this->model->getContract($this->params[0]);
        }else
            {
                Session::setFlash('Wrong page id.');
                Router::redirect('/admin/pages/');
            }

        if($_POST)
        {
            $id_contract = isset($_POST['id_contract']) ? $_POST['id_contract'] : null;
            $result = $this->model->saveContract($_POST,$id_contract);
            if ($result)
            {
                Session::setFlash('Page was saved.');
            }else
            {
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/pages/');
        }
    }
    public function admin_editcustomer()
    {

        if (isset($this->params[0]) )
        {
            $this->data['Customer'] = $this->model->getCustomer($this->params[0]);
        }else
            {
                Session::setFlash('Wrong page id.');
                Router::redirect('/admin/pages/');
            }

        if($_POST)
        {
            $id_customer = isset($_POST['id_customer']) ? $_POST['id_customer'] : null;
            $result = $this->model->saveCustomer($_POST,$id_customer);
            if ($result)
            {
                Session::setFlash('Page was saved.');
            }else
            {
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/pages/');
        }
    }
    public function admin_editservice()
    {

        if (isset($this->params[0]) )
        {
            $this->data['Service'] = $this->model->getService($this->params[0]);
        }else
            {
                Session::setFlash('Wrong page id.');
                Router::redirect('/admin/pages/');
            }

        if($_POST)
        {
            $id_service = isset($_POST['id_service']) ? $_POST['id_service'] : null;

            $result = $this->model->saveService($_POST,$id_service);
            if ($result)
            {
                Session::setFlash('Page was saved.');
            }else
            {
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/pages/');
        }
    }


    public function admin_delete()
    {
        if(isset($this->params[0]) )
        {
            $result = $this->model->delete($this->params[0]);
            if ($result)
            {
                Session::setFlash('Page was deleted.');
            }else
            {
                Session::setFlash('Error.');
            }
        }
        Router::redirect('/admin/pages/');
    }
    public function admin_deleteContract()
    {
        if(isset($this->params[0]) )
        {
            $result = $this->model->deleteContract($this->params[0]);
            if ($result)
            {
                Session::setFlash('Page was deleted.');
            }else
            {
                Session::setFlash('Error.');
            }
        }
        Router::redirect('/admin/pages/');
    }
    public function admin_deleteCustomer()
    {
        if(isset($this->params[0]) )
        {
            $result = $this->model->deleteCustomer($this->params[0]);
            if ($result)
            {
                Session::setFlash('Page was deleted.');
            }else
            {
                Session::setFlash('Error.');
            }
        }
        Router::redirect('/admin/pages/');
    }
    public function admin_deleteService()
    {
        if(isset($this->params[0]) )
        {
            $result = $this->model->deleteService($this->params[0]);
            if ($result)
            {
                Session::setFlash('Page was deleted.');
            }else
            {
                Session::setFlash('Error.');
            }
        }
        Router::redirect('/admin/pages/');
    }


}
