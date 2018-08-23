<?php
class Page extends Model
{
    public function getListContracts($only_published = false)
    {
        $sql = "SELECT * FROM obj_contracts WHERE 1";

        return $this->db->query($sql);
    }
    public function getListCustomers($only_published = false)
    {
        $sql = "SELECT * FROM obj_customers WHERE 1";

        return $this->db->query($sql);
    }
    public function getListServices($only_published = false)
    {
        $sql = "SELECT * FROM obj_services WHERE 1";

        return $this->db->query($sql);
    }

    public function getAllInfo($id_contract,$status = null)
    {
        $alias = $this->db->escape($id_contract);
        $sql = "select * from obj_contracts,obj_customers where obj_customers.id_customer = obj_contracts.id_customer and obj_contracts.id_contract = ".$id_contract;
        $object = $this->db->query($sql);
        foreach ($object as $key=>$value) {
          // code...
          $sql2 = "select id_service,obj_services.id_contract,title_service,status from obj_services ,obj_contracts where obj_services.id_contract = obj_contracts.id_contract and obj_services.id_contract = ".$value['id_contract'];
          if($status){
            $sql2 .=  " and obj_services.status in ({$status})";
          }
          $object[$key]['services'] = $this->db->query($sql2);
        }


        //$object['services'] = $element;
        return $object;
    }
    public function getContract($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM obj_contracts WHERE id_contract = '{$id}' LIMIT 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }
    public function getCustomer($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM obj_customers WHERE id_customer = '{$id}' LIMIT 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }
    public function getService($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM obj_services WHERE id_service = '{$id}' LIMIT 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function saveCustomer($data, $id_customer = null)
    {
        if(!isset($data['name_customer']) || !isset($data['company']) )
        {
            return false;
        }
        $id_customer = (int)$id_customer;
        $name_customer = $this->db->escape($data['name_customer']);
        $company = $this->db->escape($data['company']);

        if(!$id_customer)
        {
            $sql = "
            INSERT INTO obj_customers SET
            name_customer = '{$name_customer}',
            company = '{$company}'
            ";
        }else
        {
            $sql = "
                        UPDATE obj_customers SET
                        name_customer = '{$name_customer}',
                        company = '{$company}'
                        WHERE id_customer = {$id_customer}
                        ";
        }
        return $this->db->query($sql);
    }
    public function saveContract($data, $id_contract = null)
    {
        if(!isset($data['id_customer']) || !isset($data['number']) || !isset($data['date_sign']) || !isset($data['staff_number']) )
        {
            return false;
        }
        $id_contract = (int)$id_contract;
        $id_customer = (int)$data['id_customer'];
        $number = (int)$data['number'];
        $date_sign = $this->db->escape($data['date_sign']);
        $staff_number = (int)$data['staff_number'];

        if(!$id_contract)
        {
            $sql = "
            INSERT INTO obj_contracts SET
            id_customer = '{$id_customer}',
            number = '{$number}',
            date_sign = '{$date_sign}',
            staff_number = '{$staff_number}'
            ";
        }else
        {
            $sql = "
                        UPDATE obj_contracts SET
                        id_customer = '{$id_customer}',
                        number = '{$number}',
                        date_sign = '{$date_sign}',
                        staff_number = '{$staff_number}'
                        WHERE id_contract = {$id_contract}
                        ";
        }
        return $this->db->query($sql);
    }
    public function saveService($data, $id_service = null)
    {
        if(!isset($data['id_contract']) || !isset($data['title_service']) || !isset($data['status']) )
        {
            return false;
        }
        $id_service = (int)$id_service;
        $id_contract = (int)$data['id_contract'];
        $title_service = $this->db->escape($data['title_service']);
        $status = $this->db->escape($data['status']);

        if(!$id_service)
        {
            $sql = "
            INSERT INTO obj_services SET
            id_contract = '{$id_contract}',
            title_service = '{$title_service}',
            status = '{$status}'
            ";
        }else
        {
            $sql = "
                        UPDATE obj_services SET
                        id_contract = '{$id_contract}',
                        title_service = '{$title_service}',
                        status = '{$status}'
                        WHERE id_service = {$id_service}
                        ";
        }
        return $this->db->query($sql);
    }
    public function deleteContract($id)
    {
        $id = (int)$id;
        $sql = "DELETE FROM obj_contracts WHERE id_contract = {$id}";
        return $this->db->query($sql);
    }
    public function deleteCustomer($id)
    {
        $id = (int)$id;
        $sql = "DELETE FROM obj_customers WHERE id_customer = {$id}";
        return $this->db->query($sql);
    }
    public function deleteService($id)
    {
        $id = (int)$id;
        $sql = "DELETE FROM obj_services WHERE id_service = {$id}";
        return $this->db->query($sql);
    }

}
