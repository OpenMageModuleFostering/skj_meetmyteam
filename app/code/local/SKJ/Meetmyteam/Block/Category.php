<?php
/**
 * @category   SKJ
 * @package    SKJ_Meetmyteam
 * @author     Sanjeev Kumar Jha <jha.sanjeev.in@gmail.com>
 * @website    http://www.sanjeevkumarjha.com.np
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class SKJ_Meetmyteam_Block_Category extends Mage_Core_Block_Template
{
	
    public function getCategoryList()
    {
    	$collection = Mage::getModel('meetmyteam/category')->getCollection()
    				->addFieldToFilter('status' , '1');
    	
    	return $collection;
    }
    
    public function getCategory()
    {
    	$id = Mage::app()->getRequest()->getParam('id');
		$catCollection = Mage::getModel('meetmyteam/category')->getCollection();
		$catCollection->addFieldToFilter('status',Array('eq'=>1));
		$catCollection->addFieldToFilter('meetmyteam_cat_id',Array('eq'=>$id));
		
		return $catCollection->getFirstItem();
    }

   public function getAllMembers()     
   {      	     
     	
		$collection = Mage::getModel('meetmyteam/meetmyteam')->getCollection();
		$collection->addFieldToFilter('status',Array('eq'=>1));

		// Search
		if($_GET['q-team'])
		{
			
			if($_GET['q-team']){
				$collection->addFieldToFilter('title', array(
				    array('like' => '%'.$_GET['q-team'].'%'),   
				));	
			}
			
		}

		// To filter category
		$categoryId = Mage::app()->getRequest()->getParam('id');
		if($categoryId){
			//$collection->addFieldToFilter('category',Array('eq'=>$categoryId));		
			$collection->addFieldToFilter('category',  ['finset' => $categoryId]);
		}


		// Sorting by position
		$collection->getSelect()->order('position', 'ASC');

		// Sorting by name
		//$collection->getSelect()->order('title', 'ASC');	

		//$collection->printlogquery(true);

		return $collection;        
    }
    
    
}
