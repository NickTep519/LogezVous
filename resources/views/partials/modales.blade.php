<!-- 👁️ MODALE INFO UTILISATEUR -->

<div class="modal fade" id="userInfoModal" tabindex="-1" aria-labelledby="userInfoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="userInfoLabel">
                    <i class="bi bi-person-lines-fill me-2"></i>Informations de l'utilisateur
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nom :</strong> Marie Dupont</li>
                    <li class="list-group-item"><strong>Email :</strong> marie.dupont@email.com</li>
                    <li class="list-group-item"><strong>Rôle :</strong> Administratrice</li>
                    <li class="list-group-item"><strong>Statut :</strong> <span class="badge bg-success">Actif</span>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


 <!-- 🗑️ MODALE DE CONFIRMATION SUPPRESSION -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="confirmDeleteLabel"><i
                        class="bi bi-exclamation-triangle-fill me-2"></i>Confirmation de suppression
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Fermer"></button>
            </div>
            <div class="modal-body text-center">
                <p>Êtes-vous sûr de vouloir <strong>supprimer</strong> cet utilisateur ?</p>
                <p class="text-muted small">Cette action est irréversible.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger">Supprimer</button>
            </div>
        </div>
    </div>
</div>
