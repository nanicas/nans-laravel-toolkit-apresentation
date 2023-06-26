var LIST_CRUD = (function () {

    var state = {};

    function load() {

        DASHBOARD.load();

        state.deleteForm = $('.delete-form');
        state.crudListBox = $('#crud-list');
        state.table = $('table.dataTable', state.crudListBox);

        state.deleteForm.submit(function (e) {
            HELPER.behaviorOnSubmit(e, $(this), function (data) {
                DASHBOARD.setTopMessage(data.response.message);

                if (!data.status) {
                    return;
                }

                state.table.find('tr[data-id="' + data.response.id + '"]').remove();

                var remaingRows = state.table.find('tbody > tr');
                if (remaingRows.length == 0) {
                    window.location.reload();
                }
            });
        });
    }

    function initTable(columns) {

        state.datatable = state.table.DataTable({
            processing: true,
            paging: true,
            serverSide: true,
            searchDelay: 1500,
            ajax: state.table.data('route'),
            language: languagePT,
            columns: columns,
            drawCallback: function( settings ) {
                APP.replaceIcons();
            }
        });
    }

    return {load, initTable};
})();