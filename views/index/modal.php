<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="index/create" method="post">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Kunde Einfügen</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="token" value="<?php echo Model::tokenSet(); ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="name1" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name1" placeholder="Enter last name" name="name1">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="name2" class="form-label">Vor-Name:</label>
                        <input type="text" class="form-control" id="name2" placeholder="Enter first name" name="name2">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="strasse" class="form-label">Straße:</label>
                        <input type="text" class="form-control" id="strasse" placeholder="Enter street" name="strasse">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="plz" class="form-label">Postleitzahl:</label>
                        <input type="text" class="form-control" id="plz" placeholder="Enter postal code" name="plz">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="ort" class="form-label">Ort:</label>
                        <input type="text" class="form-control" id="ort" placeholder="Enter location" name="ort">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn-sm btn-success" data-bs-dismiss="modal">Speichern</button>
                </div>
            </form>
        </div>
    </div>
</div>