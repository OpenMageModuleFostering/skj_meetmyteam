<?php

class SKJ_Meetmyteam_Block_Adminhtml_Meetmyteam_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
	

	/**
	 * Preparing global layout
	 *
	 * You can redefine this method in child classes for changin layout
	 *
	 * @return Mage_Core_Block_Abstract
	 */

  /*	*/
	protected function _prepareLayout()
	{
		parent::_prepareLayout();
		
		$this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
		
	}
  /**/
	
	
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('meetmyteam_form', array('legend'=>Mage::helper('meetmyteam')->__('Item information')));
           
      // Get category collection
     
      
      $categoryCollection = Mage::getModel('meetmyteam/category')->getCollection()
      ->addFieldToFilter('status' , '1');
      ;
      
      /*
      $optioncat[''] = 'Select category';
      foreach($categoryCollection as $category){
      	$optioncat[$category->getID()] = $category->getTitle();
      }
      
      $fieldset->addField('category', 'select', array(
      		'label'     => Mage::helper('meetmyteam')->__('Category'),
      		'name'      => 'category',
      		'values'    => $optioncat,
      		'required'  => true,
      ));
      */


     // $optioncat[-1] = array('label'=>'Select Category','value'=>-1);
    /**/
      
      foreach($categoryCollection as $category){
        $optioncat[$category->getID()] = array('label'=>$category->getTitle(),'value'=>$category->getID());
      }
        

      $fieldset->addField('category', 'multiselect', array(
          'label'     => Mage::helper('meetmyteam')->__('Select Category'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'     => 'category[]',
          'onclick' => "return false;",
          'onchange' => "return false;",
          'value'  => '4',
          'values' => $optioncat,
          'disabled' => false,
          'readonly' => false,          
          'tabindex' => 1
        ));
        /* */         

      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('meetmyteam')->__('Name'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));
      
      $fieldset->addField('description', 'text', array(
      		'label'     => Mage::helper('meetmyteam')->__('Designation'),
      		'class'     => 'required-entry',
      		'required'  => true,
      		'name'      => 'description',
      ));
       
      
      $fieldset->addField('filename', 'image', array(
          'label'     => Mage::helper('meetmyteam')->__('Image'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('meetmyteam')->__('Status'),
          'name'      => 'status',
			'required'  => true,
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('meetmyteam')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('meetmyteam')->__('Disabled'),
              ),
          ),
      ));
     
     $fieldset->addField('position', 'text', array(
          'label'     => Mage::helper('meetmyteam')->__('Position'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'position',
      ));

     /*
      
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('meetmyteam')->__('Content'),
          'title'     => Mage::helper('meetmyteam')->__('Content'),
          'style'     => 'width:700px; height:300px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
      */
      
/**/
  $wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig();

  $wysiwygConfig->addData(array(
        'add_variables'             => false,
        'plugins'                   => array(),
        'widget_window_url'         => Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/widget/index'),
        'directives_url'            => Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/cms_wysiwyg/directive'),
        'directives_url_quoted'     => preg_quote(Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/cms_wysiwyg/directive')),
        'files_browser_window_url'  => Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/cms_wysiwyg_images/index'),
    ));

	$fieldset->addField('contents', 'editor', array(
		'name' => 'contents',
		'label' => $this->__('Content'),
		'title' => $this->__('Content'),
		'style' => 'width:700px; height:300px;',
		'config' => $wysiwygConfig,
		'required' => true,
		'wysiwyg' => true
	));
                
    /* */ 

      
      if ( Mage::getSingleton('adminhtml/session')->getMeetmyteamData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getMeetmyteamData());
          Mage::getSingleton('adminhtml/session')->setMeetmyteamData(null);
      } elseif ( Mage::registry('meetmyteam_data') ) {
          $form->setValues(Mage::registry('meetmyteam_data')->getData());
      }
      return parent::_prepareForm();
  }
}
