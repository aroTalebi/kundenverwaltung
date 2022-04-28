<body>
    <div class="customer col-xxl-12 col-xl-12 col-1g-12 col-md-12 col-sm-6">
        <!-- search Form with Name and Postalcode -->
        <div class="mb-5">
            <form action="index/search" method="post">
                <div class="row border pt-2 pb-2">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Name" name="name1">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Postleitzahl" name="plz">
                    </div>
                    <div class="col mt-1">
                        <button type="submit" class="btn btn-sm btn-success">Suchen</button>
                    </div>
                    <div class="col mt-1">
                        <a href="index/home" class="btn btn-sm btn-outline-dark">Alle Personen</a>
                    </div>
                    <span class="statistik bg-dark">
                        <?php echo isset($data[3]) ? $data[3] : '' ?>
                    </span>
                </div>
            </form>
        </div>
        <!-- End Search  -->
        <div>
            <form action="index/delete" method="post" id="form_delete">
                <table class="table .table-striped">
                    <thead>
                        <tr>
                            <th><input id="checkAll" class="form-check-input" type="checkbox" id="check1" name="option1" value="something"></th>
                            <th>Name</th>
                            <th>Vor-Name</th>
                            <th>Straße</th>
                            <th>Postleitzahl</th>
                            <th>Ort</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data[0] as $row) : ?>
                            <tr>
                                <th><input class="form-check-input check" type="checkbox" value="<?= $row['kunde_id'] ?>" name="delete_group[]"></th>
                                <td><?= $row['name1'] ?></td>
                                <td><?= $row['name2'] ?></td>
                                <td><?= $row['strasse'] ?></td>
                                <td><?= $row['plz'] ?></td>
                                <td><?= $row['ort'] ?></td>
                                <td><a href="index/delete/<?= $row['kunde_id'] ?>"><span class="badge bg-danger">Löschen</span></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="d-flex flex-row">
                    <div class="m-2">
                        <button type="submit" class="btn btn-sm btn-danger">Löschen</button>
                    </div>
                    <div class="m-2">
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#myModal">Kunde Einfügen</button>
                    </div>
                    <div class="m-3">
                        <?php echo ($data[2] > 0) ? '<span class="text-danger error-style">Es gibt Fehler zu speichern !</span>' : '' ?>
                    </div>
                </div>
            </form>
        </div>

        <!-- The Modal for add a Person  -->
        <?php require("modal.php"); ?>

    </div>
    <!-- here all the checkbox checked -->
    <script>
        $("#checkAll").click(function() {
            $(".check").prop('checked', $(this).prop('checked'));
        });
    </script>
</body>

</html>