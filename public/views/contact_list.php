<?php include 'layout/header.php'; ?>

<?php
    function formatPhoneNumber($phoneNumber) {
        $phoneNumber = preg_replace('/\D/', '', $phoneNumber);
        
        if (strlen($phoneNumber) == 11) {
            return preg_replace('/(\d{2})(\d{1})(\d{4})(\d{4})/', '($1) $2 $3-$4', $phoneNumber);
        } else {
            return $phoneNumber;
        }
    }
?>

<div class="container">
    <div class="header">
        <h2>Lista de Contatos</h2>
        <a href="javascript:void(0);" class="btn-add-register" onclick="openModal('add')">Adicionar Contato</a>
    </div>

    <table id="contactsTable" class="table">
        <thead>
            <tr>
                <th>Registro</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($contatos)): ?>
                <?php foreach ($contatos as $contato): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($contato['con_id']); ?></td>
                        <td><?php echo htmlspecialchars($contato['con_name']); ?></td>
                        <td><?php echo htmlspecialchars(formatPhoneNumber($contato['con_phone_number'])); ?></td>
                        <td>
                        <a id="btn_pencil" href="javascript:void(0);" onclick="openModal('edit', { id: '<?php echo htmlspecialchars($contato['con_id']); ?>', name: '<?php echo htmlspecialchars($contato['con_name']); ?>', phone: '<?php echo htmlspecialchars(formatPhoneNumber($contato['con_phone_number'])); ?>' })" title="Editar Contato">
                        <i class="fa-solid fa-pencil"></i></a> <a id="btn_trash" href="javascript:void(0);" onclick="confirmDeletion(<?php echo $contato['con_id']; ?>)" title="Excluir Contato"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Nenhum contato encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Registration Modal -->
<div id="contactModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Adicionar Contato</h2>
        <form action="/crv_agenda/public/index.php" method="POST" onsubmit="return validateForm()">
            <input type="hidden" name="action" value="create">
            <input type="hidden" id="con_id" name="con_id">
            <div class="form-group">
                <label for="con_name">Nome:</label>
                <input type="text" id="con_name" name="con_name" required>
            </div>
            <div class="form-group">
                <label for="con_phone_number">Telefone:</label>
                <input type="text" id="con_phone_number" name="con_phone_number" required>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn-add">Salvar</button>
            </div>
        </form>
    </div>
</div>
<!-- Edite Modal -->
<div id="contacteditContactModalModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Atualizar Contato</h2>
        <form action="/crv_agenda/public/index.php" method="POST" onsubmit="return validateForm()">
            <input type="hidden" name="action" value="update">
            <input type="hidden" id="con_id" name="con_id">
            <div class="form-group">
                <label for="con_name">Nome:</label>
                <input type="text" id="con_name" name="con_name" required>
            </div>
            <div class="form-group">
                <label for="con_phone_number">Telefone:</label>
                <input type="text" id="con_phone_number" name="con_phone_number" required>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn-add">Atualizar</button>
            </div>
        </form>
    </div>
</div>
