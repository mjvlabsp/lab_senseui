<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Log'), ['action' => 'edit', $log->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Log'), ['action' => 'delete', $log->id], ['confirm' => __('Are you sure you want to delete # {0}?', $log->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Log'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Log'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sensors'), ['controller' => 'Sensors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sensor'), ['controller' => 'Sensors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Data'), ['controller' => 'Data', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Data'), ['controller' => 'Data', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="log view large-9 medium-8 columns content">
    <h3><?= h($log->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Sensor') ?></th>
            <td><?= $log->has('sensor') ? $this->Html->link($log->sensor->name, ['controller' => 'Sensors', 'action' => 'view', $log->sensor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($log->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Value') ?></th>
            <td><?= $this->Number->format($log->value) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($log->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Data') ?></h4>
        <?php if (!empty($log->data)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Sensor Id') ?></th>
                <th><?= __('Value') ?></th>
                <th><?= __('Log Id') ?></th>
                <th><?= __('Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($log->data as $data): ?>
            <tr>
                <td><?= h($data->id) ?></td>
                <td><?= h($data->sensor_id) ?></td>
                <td><?= h($data->value) ?></td>
                <td><?= h($data->log_id) ?></td>
                <td><?= h($data->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Data', 'action' => 'view', $data->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Data', 'action' => 'edit', $data->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Data', 'action' => 'delete', $data->id], ['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
