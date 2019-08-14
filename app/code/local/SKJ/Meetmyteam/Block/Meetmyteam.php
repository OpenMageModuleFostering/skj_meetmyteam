<?php
/**
 * @category   SKJ
 * @package    SKJ_Meetmyteam
 * @author     Sanjeev Kumar Jha <jha.sanjeev.in@gmail.com>
 * @website    http://www.sanjeevkumarjha.com.np
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class SKJ_Meetmyteam_Block_Meetmyteam extends Mage_Core_Block_Template
{
	    
     public function getAllMembers()     
     {      	     


     
        $collection = Mage::getModel('meetmyteam/meetmyteam')->getCollection();
		$collection->addFieldToFilter('status',Array('eq'=>1));

		// Search
		if($_GET['q-team'])
		{
			//Print_r($_GET);exit;	
			//echo $_GET['q-team'];exit;
			if($_GET['q-team']){
				$collection->addFieldToFilter('title', array(
				    array('like' => '%'.$_GET['q-team'].'%'), //spaces on each side   
				));	
			}
			
		}


		//$collection->printlogquery(true);exit;
		
		// To filter category
		$categoryId = $this->getCategoryId();
		if($categoryId)
		$collection->addFieldToFilter('category',Array('eq'=>$categoryId));		

		// Sorting
		$collection->getSelect()->order('position', 'ASC');

		// Sorting by name
		//$collection->getSelect()->order('title', 'ASC');	
		
		return $collection;        
    }
    
    
}
