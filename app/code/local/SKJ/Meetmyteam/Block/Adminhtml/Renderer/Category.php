<?php
/**
 * Render for my team
 *
 *
 * @category   SKJ
 * @package    SKJ_Meetmyteam
 * @author     Sanjeev Kumar Jha <jha.sanjeev.in@gmail.com>
 */
class SKJ_Meetmyteam_Block_Adminhtml_Renderer_Category extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

	public function render(Varien_Object $row)
	{
		$categoryIds =  $row->getCategory();
		$categoryIdsArray = explode(',', $categoryIds);
		$str = '<ul>';
		foreach ($categoryIdsArray as $value) {
			$categoryData = Mage::getModel('meetmyteam/category')->load($value);
			$str.='<li>'.$categoryData->getTitle().'</li>';

		}
		$str.= '</ul>';

		return $str;
	}

}
