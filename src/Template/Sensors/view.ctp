<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sensor'), ['action' => 'edit', $sensor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sensor'), ['action' => 'delete', $sensor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sensor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sensors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sensor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Data'), ['controller' => 'Data', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Data'), ['controller' => 'Data', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Log'), ['controller' => 'Log', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Log'), ['controller' => 'Log', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parameters'), ['controller' => 'Parameters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parameter'), ['controller' => 'Parameters', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sensors view large-9 medium-8 columns content">
    <h3><?= h($sensor->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Mac Address') ?></th>
            <td><?= h($sensor->mac_address) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($sensor->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($sensor->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= h($sensor->location) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($sensor->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($sensor->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($sensor->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($sensor->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Data') ?></h4>
        <?php if (!empty($sensor->data)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Sensor Id') ?></th>
                <th><?= __('Value') ?></th>
                <th><?= __('Log Id') ?></th>
                <th><?= __('Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sensor->data as $data): ?>
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
    <div class="related">
        <h4><?= __('Related Log') ?></h4>
        <?php if (!empty($sensor->log)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Sensor Id') ?></th>
                <th><?= __('Value') ?></th>
                <th><?= __('Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sensor->log as $log): ?>
            <tr>
                <td><?= h($log->id) ?></td>
                <td><?= h($log->sensor_id) ?></td>
                <td><?= h($log->value) ?></td>
                <td><?= h($log->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Log', 'action' => 'view', $log->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Log', 'action' => 'edit', $log->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Log', 'action' => 'delete', $log->id], ['confirm' => __('Are you sure you want to delete # {0}?', $log->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Parameters') ?></h4>
        <?php if (!empty($sensor->parameters)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Sensor Id') ?></th>
                <th><?= __('Max') ?></th>
                <th><?= __('Min') ?></th>
                <th><?= __('Error Time') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sensor->parameters as $parameters): ?>
            <tr>
                <td><?= h($parameters->id) ?></td>
                <td><?= h($parameters->sensor_id) ?></td>
                <td><?= h($parameters->max) ?></td>
                <td><?= h($parameters->min) ?></td>
                <td><?= h($parameters->error_time) ?></td>
                <td><?= h($parameters->created) ?></td>
                <td><?= h($parameters->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Parameters', 'action' => 'view', $parameters->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Parameters', 'action' => 'edit', $parameters->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Parameters', 'action' => 'delete', $parameters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parameters->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
