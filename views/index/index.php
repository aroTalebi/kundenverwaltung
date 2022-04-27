<body>
    <div class="customer col-xxl-12 col-xl-12 col-1g-12 col-md-12 col-sm-6">
        <form action="index/delete" method="GET" id="form_delete">
            <table class="table .table-striped .table-bordered">
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
                            <th><input class="form-check-input check" type="checkbox"></th>
                            <td><?= $row['name1'] ?></td>
                            <td><?= $row['name2'] ?></td>
                            <td><?= $row['strasse'] ?></td>
                            <td><?= $row['plz'] ?></td>
                            <td><?= $row['ort'] ?></td>
                            <td><a href="home/delete/"><span class="badge bg-danger">Löschen</span></a>
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
            </div>
        </form>

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