<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Parameter'), ['action' => 'edit', $parameter->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Parameter'), ['action' => 'delete', $parameter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parameter->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Parameters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parameter'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sensors'), ['controller' => 'Sensors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sensor'), ['controller' => 'Sensors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="parameters view large-9 medium-8 columns content">
    <h3><?= h($parameter->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Sensor') ?></th>
            <td><?= $parameter->has('sensor') ? $this->Html->link($parameter->sensor->name, ['controller' => 'Sensors', 'action' => 'view', $parameter->sensor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($parameter->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Max') ?></th>
            <td><?= $this->Number->format($parameter->max) ?></td>
        </tr>
        <tr>
            <th><?= __('Min') ?></th>
            <td><?= $this->Number->format($parameter->min) ?></td>
        </tr>
        <tr>
            <th><?= __('Error Time') ?></th>
            <td><?= $this->Number->format($parameter->error_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($parameter->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($parameter->modified) ?></td>
        </tr>
    </table>
</div>
