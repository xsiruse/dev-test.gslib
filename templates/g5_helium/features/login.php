<?php
defined('JPATH_BASE') or die();

gantry_import('core.gantryfeature');

class GantryFeatureLogin extends GantryFeature {
    var $_feature_name = 'login';

    function render($position="") {
        ob_start();
        $user =& JFactory::getUser();
        ?>
        <div class="rt-block">
            <div class="rt-popupmodule-button">
            <?php if ($user->guest) : ?>
                <a data-rokbox href="#" class="buttontext button" data-rokbox-element="#rt-popuplogin">
                    <span class="desc"><?php echo $this->get('text'); ?></span>
                </a>
            <?php else : ?>
                <a data-rokbox href="#" class="buttontext button" data-rokbox-element="#rt-popuplogin">
                    <span class="desc"><?php echo $this->get('logouttext'); ?> <?php echo JText::sprintf($user->get('username')); ?></span>
                </a>
            <?php endif; ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}