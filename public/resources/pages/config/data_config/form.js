var DATA_CONFIG_FORM = (function () {

    var state = {};

    function load() {
        FORM_CRUD.load();
        state.instanceCrudForm = FORM_CRUD;
    }

    return {load, state};
})();