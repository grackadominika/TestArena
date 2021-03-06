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
class Zend_View_Helper_TestAddRouteName extends Zend_View_Helper_Abstract
{
  const ROUTE_OTHER_TEST_ADD       = 'test_add_other_test';
  const ROUTE_TEST_CASE_ADD        = 'test_add_test_case';
  const ROUTE_EXPLORATORY_TEST_ADD = 'test_add_exploratory_test';  
  const ROUTE_AUTOMATIC_TEST_ADD   = 'test_add_automatic_test';
  const ROUTE_CHECKLIST_VIEW        = 'test_add_checklist';
  
  public function testAddRouteName(Custom_Interface_Test $test)
  {
    switch ($test->getTypeId())
    {
      case Application_Model_TestType::OTHER_TEST:
        return self::ROUTE_OTHER_TEST_ADD;
        
      case Application_Model_TestType::TEST_CASE:
        return self::ROUTE_TEST_CASE_ADD;
        
      case Application_Model_TestType::EXPLORATORY_TEST:
        return self::ROUTE_EXPLORATORY_TEST_ADD;
        
      case Application_Model_TestType::AUTOMATIC_TEST:
        return self::ROUTE_AUTOMATIC_TEST_ADD;
      
      case Application_Model_TestType::CHECKLIST:
        return self::ROUTE_CHECKLIST_VIEW;
    }
    
    return null;
  }
}