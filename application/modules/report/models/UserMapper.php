<?php
/*
Copyright © 2014 TestArena 

This file is part of TestArena.

TestArena is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

The full text of the GPL is in the LICENSE file.
*/
class Report_Model_UserMapper extends Custom_Model_Mapper_Abstract
{
  protected $_dbTableClass = 'Report_Model_UserDbTable';
  
  public function getAll(Zend_Controller_Request_Abstract $request)
  {
    $db = $this->_getDbTable();
    
    $adapter = new Zend_Paginator_Adapter_DbSelect($db->getSqlAll($request));
    $adapter->setRowCount($db->getSqlAllCount($request));
 
    $paginator = new Zend_Paginator($adapter);
    $paginator->setCurrentPageNumber($request->getParam('page'));
    
    $list = array();
    
    foreach ($paginator->getCurrentItems() as $row)
    {
      $user = new Application_Model_User($row);
      $list[] = $user;
    }

    return array($list, $paginator);
  }

  public function getById(Application_Model_User $user)
  {
    $row = $this->_getDbTable()->getById($user->getId());
    
    if (null === $row)
    {
      return false;
    }
    
    return $user->setDbProperties($row->toArray());
  }
  
  public function getAllForExport(Zend_Controller_Request_Abstract $request)
  {
    $rows = $this->_getDbTable()->getAllForExport($request);
    
    if ($rows === null)
    {
      return false;
    }
    
    return $rows->toArray();
  }
}