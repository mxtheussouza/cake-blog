<div class="aside">
    <div style="position: relative; height: 100%;">
        <ul>
            <li data-toggle="tooltip" data-placement="right" title="Usuário"><?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-user')), array('controller' => 'users', 'action' => 'index'), array('escape' => false)) ?></li>

            <li data-toggle="tooltip" data-placement="right" title="Posts"><?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-home')), array('controller' => 'posts', 'action' => 'index'), array('escape' => false)) ?></li>

            <li data-toggle="tooltip" data-placement="right" title="Sair"><?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-sign-out-alt')), array('controller' => 'users', 'action' => 'logout'), array('escape' => false)) ?></li>
        </ul>
    </div>
</div>

<div style="padding: 2rem; margin-left: 60px;">
    <h1>Usuários</h1>
    <table class="table table-bordered" style="background: #fff;">
        <tr>
            <th>Nome</th>
            <th>Role</th>
            <th>Data de Criação</th>
        </tr>

        <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <?php echo $user['User']['username']; ?>
                </td>
                <td><?php echo $user['User']['role']; ?></td>
                <td><?php echo $user['User']['created']; ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>