<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_service extends CI_Model
{

    protected $tbl = 'set_masjid';

    public function __construct()
    {
        parent::__construct();
    }

    public function count($where = null, $join = null)
    {
        if (is_null($where)) {
            $where['custom'] = "1=1";
        }

        $count = $this->m_crud->getdata('array', $this->tbl . ' tbl', '*',  $where, null, null, null, $join);

        if (count($count) > 0) {
            return count($count);
        }

        return 0;
    }

    public function getrow($where = null, $select = '*', $join = null)
    {
        if (is_null($where)) {
            $where['custom'] = "1=1";
        }

        return $this->m_crud->getdata('row', $this->tbl . ' tbl', $select, $where, null, null, null, $join);
    }

    public function getall($where = null, $select = '*', $join = null)
    {
        if (is_null($where)) {
            $where['custom'] = "1=1";
        }

        return $this->m_crud->getdata('array', $this->tbl . ' tbl', $select, $where, null, null, null, $join);
    }
}
