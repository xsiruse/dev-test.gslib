<div class="fabrikFilterContainer">
    <?php if ($this->filterMode === 3 || $this->filterMode === 4) {?>
        <div class="searchall">
            <ul class="fabrik_action">
                <?php if (array_key_exists('all', $this->filters)) {
                    echo '<li>' . $this->filters['all']->element . '</li>';
                }?>
                <?php if ($this->filter_action != 'onchange') {?>
                    <li>
                        <input type="button" class="fabrik_filter_submit button" value="<?php echo JText::_('COM_FABRIK_GO');?>" name="filter" >
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php } else { ?>
        <table class="filtertable fabrikList">
            <thead>
                <tr class="fabrik___heading">
                    <?php foreach ($this->filters as $filter) {?>
                        <th><?php echo $filter->label;?></th>
                    <?php }?>
                </tr>
            </thead>
            <tbody>
                <tr class="fabrik_row oddRow1">
                    <?php
                        $c = 0;
                        foreach ($this->filters as $filter) {
                            $required = $filter->required == 1 ? ' notempty' : ""; ?>
                            <td class="<?php echo $required?>">
                                <?php echo $filter->element;?>
                            </td>
                            <?php $c ++;
                        } ?>
                </tr>
            </tbody>
            <tfoot>
                <?php if ($this->filter_action != 'onchange') {?>
                    <tr class="fabrik_row oddRow0">
                        <td colspan="<?php echo count($this->filters)?>" style="text-align:right;">
                            <input type="button" class="fabrik_filter_submit button" value="<?php echo JText::_('COM_FABRIK_GO');?>"
                              name="filter" />
                        </td>
                    </tr>
                <?php }?>
            </tfoot>
        </table>
    <?php }?>
</div>