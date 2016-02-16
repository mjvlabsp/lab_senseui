<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Data'), ['action' => 'edit', $data->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Data'), ['action' => 'delete', $data->id], ['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Data'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Data'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sensors'), ['controller' => 'Sensors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sensor'), ['controller' => 'Sensors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Log'), ['controller' => 'Log', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Log'), ['controller' => 'Log', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="data view large-9 medium-8 columns content">
    <h3><?= h($data->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Sensor') ?></th>
            <td><?= $data->has('sensor') ? $this->Html->link($data->sensor->name, ['controller' => 'Sensors', 'action' => 'view', $data->sensor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Log') ?></th>
            <td><?= $data->has('log') ? $this->Html->link($data->log->id, ['controller' => 'Log', 'action' => 'view', $data->log->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($data->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Value') ?></th>
            <td><?= $this->Number->format($data->value) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($data->created) ?></td>
        </tr>
    </table>
</div>
