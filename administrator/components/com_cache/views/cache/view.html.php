<?php
/**
* @version		$Id$
* @package		Joomla.Administrator
* @subpackage	Cache
* @copyright	Copyright (C) 2005 - 2007 Open Source Matters, Inc. All rights reserved.
* @license		GNU General Public License, see LICENSE.php
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport('joomla.application.component.view');

/**
 * HTML View class for the Cache component
 *
 * @static
 * @package		Joomla.Administrator
 * @subpackage	Cache
 * @since 1.6
 */
class CacheViewCache extends JView
{
	protected $data;
	
	protected $state;
	
	protected $client;
	
	protected $pagination;
	
	public function display($tpl = null)
	{
		$data 		= $this->get('Data');
		$client 	= $this->get('Client');
		$pagination = $this->get('Pagination');
		$state	 	= $this->get('State');


		$this->assignRef('data',		$data);
		$this->assignRef('client',		$client);
		$this->assignRef('state',		$state);
		$this->assignRef('pagination',	$pagination);

		$this->_setToolbar();
		parent::display($tpl);
	}
	
	protected function _setToolbar()
	{
		$condition = ($this->client->name == 'site');
		JSubMenuHelper::addEntry(JText::_('Site'), 'index.php?option=com_cache&client=0', $condition);
		JSubMenuHelper::addEntry(JText::_('Administrator'), 'index.php?option=com_cache&client=1', !$condition);	
	
		JToolBarHelper::title(JText::_('Cache Manager - Clean Cache Admin' ), 'checkin.png');
		JToolBarHelper::custom('delete', 'delete.png', 'delete_f2.png', 'Delete', true);
		JToolBarHelper::help('screen.cache');
	}
}
