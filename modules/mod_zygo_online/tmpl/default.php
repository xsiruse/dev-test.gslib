<?php
/**
* @id           $Id$
* @author       Sherza (zygopterix@gmail.com)
* @package      ZYGO Online
* @copyright    Copyright (C) 2015 Psytronica.ru. http://psytronica.ru  All rights reserved.
* @license      GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
*/
defined('_JEXEC') or die('Restricted access');

$document = JFactory::getDocument();
$document->addStyleSheet(JURI::root().'/modules/mod_zygo_online/tmpl/zygo_online.css');

?>
<div id="mod_zygo_online" class="mod_zygo_online_<?php echo $params->get('moduleclass_sfx'); ?>">
	<div class="mod_zygo_avatars">
	<?php
	if(!empty($users)){
		foreach ( $users as $user ){	
		?>
			<img class="mod_zygo_online_img hasTooltip" title="<?php echo $user->name; ?>"
			src="<?php echo $user->avatar->link; ?>" 
			alt="<?php echo JText::sprintf( 'MOD_ZYGO_ONLINE_GO_TO_PROFILE', $user->name ); ?>" />
		<?php
		}
	}
	?>
	</div>
	<div class="mod_zygo_total">
		<?php
			if($total->users){

				$termUser = ZygoHelper::getPluralTerm($total->users, "1", "2", "3");

				echo '<span class="mod_zygo_total_users">';
			 	echo JText::sprintf( 'MOD_ZYGO_ONLINE_USER'.$termUser , $total->users); 
			 	echo '</span>';
			}
		
			if ( $params->get( 'show_guest', 1 ) && $total->guests) { 

				$termGuest = ZygoHelper::getPluralTerm($total->guests, "1", "2", "3");

				if($total->users) echo ' '.JText::_('MOD_ZYGO_ONLINE_AND').' '; 

				echo '<span class="mod_zygo_total_guests">';
				echo JText::sprintf( 'MOD_ZYGO_ONLINE_GUEST'.$termGuest, $total->guests ); 
				echo '</span>';
			} 

			echo " ".JText::_("MOD_ZYGO_ONLINE_ONLINE"); 
		?> 

	</div>

	<?php if(!empty($robots) && $params->get( 'show_robots', 0 )){
		echo '<div class="mod_zygo_total_robots">';

		foreach($robots as $rname=>$browser){
			echo '<div title="'.str_replace('"', '', $browser).'">'.$rname.'</div>';
		}
		echo '</div>';
	}?>
</div>
