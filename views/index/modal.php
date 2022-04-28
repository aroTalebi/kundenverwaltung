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
                        <input type="text" class="form-control" id="name1" placeholder="Enter last name" name="name1" value="<?php echo isset($data[2]['name1']) ? $data[2]['name1'] : '' ?>">
                        <span class="text-danger error-style"><?php
                                                        if (isset($data[1]['name1Empty'])) {
                                                            echo $data[1]['name1Empty'];
                                                        } elseif (isset($data[1]['name1Invalid'])) {
                                                            echo $data[1]['name1Invalid'];
                                                        }
                                                        ?>
                        </span>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="name2" class="form-label">Vor-Name:</label>
                        <input type="text" class="form-control" id="name2" placeholder="Enter first name" name="name2" value="<?php echo isset($data[2]['name2']) ? $data[2]['name2'] : '' ?>">
                        <span class="text-danger error-style"><?php
                                                        if (isset($data[1]['name2Empty'])) {
                                                            echo $data[1]['name2Empty'];
                                                        } elseif (isset($data[1]['name2Invalid'])) {
                                                            echo $data[1]['name2Invalid'];
                                                        }
                                                        ?>
                        </span>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="strasse" class="form-label">Straße:</label>
                        <input type="text" class="form-control" id="strasse" placeholder="Enter street" name="strasse" value="<?php echo isset($data[2]['strasse']) ? $data[2]['strasse'] : '' ?>">
                        <span class="text-danger error-style"><?php
                                                        if (isset($data[1]['strasseEmpty'])) {
                                                            echo $data[1]['strasseEmpty'];
                                                        } elseif (isset($data[1]['strasseInvalid'])) {
                                                            echo $data[1]['strasseInvalid'];
                                                        }
                                                        ?>
                        </span>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="plz" class="form-label">Postleitzahl:</label>
                        <input type="text" class="form-control" id="plz" placeholder="Enter postal code" name="plz" value="<?php echo isset($data[2]['plz']) ? $data[2]['plz'] : '' ?>">
                        <span class="text-danger error-style"><?php
                                                        if (isset($data[1]['plzEmpty'])) {
                                                            echo $data[1]['plzEmpty'];
                                                        } elseif (isset($data[1]['plzInvalid'])) {
                                                            echo $data[1]['plzInvalid'];
                                                        }
                                                        ?>
                        </span>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="ort" class="form-label">Ort:</label>
                        <input type="text" class="form-control" id="ort" placeholder="Enter location" name="ort" value="<?php echo isset($data[2]['ort']) ? $data[2]['ort'] : '' ?>">
                        <span class="text-danger error-style"><?php
                                                        if (isset($data[1]['ortEmpty'])) {
                                                            echo $data[1]['ortEmpty'];
                                                        } elseif (isset($data[1]['ortInvalid'])) {
                                                            echo $data[1]['ortInvalid'];
                                                        }
                                                        ?>
                        </span>
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